<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('status')->default('draft')->after('customer_id'); // 'draft' | 'print_ready'
        });

        // proposal_id ab tabhi milega jab "Generate Quote" click ho — isliye nullable
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('proposal_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->string('proposal_id')->nullable(false)->change();
        });
    }
};