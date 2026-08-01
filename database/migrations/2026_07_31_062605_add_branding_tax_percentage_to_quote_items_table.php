<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_items', function (Blueprint $table) {
            // Branding/Customization charges now carry their own independent
            // tax percentage (Sub Total B), separate from the product's
            // tax_percentage (Sub Total A).
            $table->decimal('branding_tax_percentage', 5, 2)->default(0)->after('branding_charges');
            $table->decimal('branding_tax_amount', 12, 2)->default(0)->after('branding_tax_percentage');
        });
    }

    public function down(): void
    {
        Schema::table('quote_items', function (Blueprint $table) {
            $table->dropColumn(['branding_tax_percentage', 'branding_tax_amount']);
        });
    }
};