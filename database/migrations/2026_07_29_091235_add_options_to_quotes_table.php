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
            $table->decimal('shipping_charges', 10, 2)->default(0)->after('packing_charges');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn(['packing_charges','shipping_charges']);
        });
    }
};