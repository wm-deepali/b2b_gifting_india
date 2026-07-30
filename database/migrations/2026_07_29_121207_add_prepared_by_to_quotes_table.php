<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('prepared_by')->nullable()->after('shipping_charges');
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('prepared_by');
        });
    }
};