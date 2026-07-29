<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_settings', function (Blueprint $table) {
            $table->string('bank_name')->nullable()->after('terms_conditions');
            $table->string('account_name')->nullable()->after('bank_name');
            $table->string('account_number')->nullable()->after('account_name');
            $table->string('ifsc_code')->nullable()->after('account_number');
            $table->string('upi_id')->nullable()->after('ifsc_code');
            $table->string('qr_code')->nullable()->after('upi_id');
        });
    }

    public function down(): void
    {
        Schema::table('quote_settings', function (Blueprint $table) {
            $table->dropColumn([
                'bank_name',
                'account_name',
                'account_number',
                'ifsc_code',
                'upi_id',
                'qr_code',
            ]);
        });
    }
};