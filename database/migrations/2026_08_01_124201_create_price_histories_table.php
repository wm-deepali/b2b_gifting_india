<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->decimal('old_mrp', 12, 2)->nullable();
            $table->decimal('new_mrp', 12, 2)->nullable();

            $table->decimal('old_discount', 12, 2)->nullable();
            $table->decimal('new_discount', 12, 2)->nullable();

            $table->string('old_discount_type')->nullable();
            $table->string('new_discount_type')->nullable();

            $table->decimal('old_price', 12, 2)->nullable();
            $table->decimal('new_price', 12, 2)->nullable();

            $table->decimal('old_landing_price', 12, 2)->nullable();
            $table->decimal('new_landing_price', 12, 2)->nullable();

            $table->timestamps();

            $table->index(['product_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_histories');
    }
};