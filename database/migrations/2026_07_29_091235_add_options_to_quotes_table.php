<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->decimal('packing_charges', 10, 2)->default(0)->after('customer_id');
            $table->decimal('packing_tax_percentage', 5, 2)->default(0)->after('packing_charges');
            $table->decimal('shipping_charges', 10, 2)->default(0)->after('packing_tax_percentage');
            $table->decimal('shipping_tax_percentage', 5, 2)->default(0)->after('shipping_charges');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn(['packing_charges', 'packing_tax_percentage', 'shipping_charges', 'shipping_tax_percentage']);
        });
    }
};