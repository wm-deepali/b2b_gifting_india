<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->integer('packing_quantity')->default(1)->after('packing_charges');
            $table->decimal('packing_tax_percentage', 5, 2)->default(0)->after('packing_quantity');
            $table->integer('shipping_quantity')->default(1)->after('shipping_charges');
            $table->decimal('shipping_tax_percentage', 5, 2)->default(0)->after('shipping_quantity');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn(['packing_quantity', 'packing_tax_percentage', 'shipping_quantity', 'shipping_tax_percentage']);
        });
    }

};
