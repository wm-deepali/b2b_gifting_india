<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_items', function (Blueprint $table) {
            $table->foreignId('brand_id')->nullable()->after('product_id')->constrained('brands')->nullOnDelete();
            $table->string('sku_code')->nullable()->after('product_detail');
            $table->string('hsn_code')->nullable()->after('sku_code');
            $table->string('colour')->nullable()->after('hsn_code');
            $table->decimal('tax_percentage', 5, 2)->default(5)->after('quantity');
            $table->decimal('tax_amount', 10, 2)->default(0)->after('tax_percentage');
        });
    }

    public function down(): void
    {
        Schema::table('quote_items', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropColumn([
                'brand_id',
                'sku_code',
                'hsn_code',
                'colour',
                'tax_percentage',
                'tax_amount',
            ]);
        });
    }
};