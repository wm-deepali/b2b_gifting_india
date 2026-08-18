<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('price_histories', function (Blueprint $table) {
            $table->string('old_name')->nullable()->after('product_id');
            $table->string('new_name')->nullable()->after('old_name');
            $table->string('old_vendor_name')->nullable()->after('new_name');
            $table->string('new_vendor_name')->nullable()->after('old_vendor_name');
        });
    }

    public function down(): void
    {
        Schema::table('price_histories', function (Blueprint $table) {
            $table->dropColumn(['old_name', 'new_name', 'old_vendor_name', 'new_vendor_name']);
        });
    }
};