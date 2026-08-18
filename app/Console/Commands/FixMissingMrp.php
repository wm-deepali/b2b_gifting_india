<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class FixMissingMrp extends Command
{
    /**
     * php artisan products:fix-mrp
     * php artisan products:fix-mrp --dry-run
     */
    protected $signature = 'products:fix-mrp {--dry-run : Show what would change without saving}';

    protected $description = 'Backfill MRP for products where mrp is 0/null but price is set, using price + discount';

    public function handle()
    {
        $dryRun = $this->option('dry-run');

        $query = Product::withTrashed()
            ->where(function ($q) {
                $q->whereNull('mrp')->orWhere('mrp', 0);
            })
            ->where('price', '>', 0);

        $total = $query->count();

        if ($total === 0) {
            $this->info('No products found with missing MRP and price > 0.');
            return self::SUCCESS;
        }

        $this->info("Found {$total} product(s) with mrp = 0/null and price > 0.");
        if ($dryRun) {
            $this->warn('Running in --dry-run mode. No changes will be saved.');
        }

        $fixed = 0;
        $skipped = 0;

        $this->withProgressBar($total, function () {}); // placeholder init, replaced below
        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $query->chunkById(200, function ($products) use (&$fixed, &$skipped, $dryRun, $bar) {
            foreach ($products as $product) {
                $price = (float) $product->price;
                $discount = (float) ($product->discount ?? 0);
                $discountType = $product->discount_type;

                $newMrp = null;

                if ($discount <= 0 || is_null($discountType)) {
                    $newMrp = $price;
                } elseif ($discountType === 'amount') {
                    $newMrp = $price + $discount;
                } elseif ($discountType === 'percentage') {
                    if ($discount >= 100) {
                        // Can't back-calculate: would divide by zero or go negative.
                        $skipped++;
                        $this->newLine();
                        $this->error("Skipped product #{$product->id} ({$product->name}): percentage discount of {$discount}% is invalid for back-calculation.");
                        $bar->advance();
                        continue;
                    }
                    $newMrp = $price / (1 - ($discount / 100));
                } else {
                    // Unknown discount_type value — fall back to price as mrp.
                    $newMrp = $price;
                }

                $newMrp = round($newMrp, 2);

                if (!$dryRun) {
                    $product->mrp = $newMrp;
                    $product->saveQuietly(); // saveQuietly to skip any observers firing unnecessarily; use save() if you need observers
                }

                $fixed++;
                $bar->advance();
            }
        });

        $bar->finish();
        $this->newLine(2);

        $this->info("Done. {$fixed} product(s) " . ($dryRun ? 'would be' : 'were') . " fixed.");
        if ($skipped > 0) {
            $this->warn("{$skipped} product(s) skipped due to invalid percentage discount (>=100%). Fix these manually.");
        }

        return self::SUCCESS;
    }
}