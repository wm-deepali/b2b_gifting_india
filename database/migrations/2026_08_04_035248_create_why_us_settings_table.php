<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('why_us_settings', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('hero_title')->nullable();

            // Features intro
            $table->string('features_subtitle')->nullable();
            $table->string('features_title')->nullable();
            $table->text('features_description')->nullable();
            $table->json('features')->nullable(); // [{icon,title,desc}]

            // CTA section
            $table->string('cta_subtitle')->nullable();
            $table->string('cta_title')->nullable();
            $table->string('cta_title_highlight')->nullable(); // the "Smarter?" italic gold word
            $table->text('cta_desc')->nullable();
            $table->string('cta_primary_button_text')->nullable();
            $table->string('cta_primary_button_link')->nullable();
            $table->string('cta_secondary_button_text')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('why_us_settings');
    }
};