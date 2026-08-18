<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // true = is product ka apna content use hoga, false = default settings wala content chalega
            $table->boolean('bulk_logistics_use_custom')->default(false)->after('delivery_time');
            $table->longText('bulk_logistics_content')->nullable()->after('bulk_logistics_use_custom');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['bulk_logistics_use_custom', 'bulk_logistics_content']);
        });
    }
};