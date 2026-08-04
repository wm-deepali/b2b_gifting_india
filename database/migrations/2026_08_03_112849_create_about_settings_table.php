<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('hero_title')->nullable();

            // Discover section
            $table->string('discover_subtitle')->nullable();
            $table->string('discover_title')->nullable();
            $table->text('discover_para1')->nullable();
            $table->text('discover_para2')->nullable();
            $table->string('discover_button_text')->nullable();
            $table->string('discover_image')->nullable();

            // Tech / philosophy section
            $table->string('tech_subtitle')->nullable();
            $table->string('tech_title')->nullable();
            $table->text('tech_description')->nullable();
            $table->json('tech_features')->nullable(); // [{icon,title,desc}]

            // CTA banner
            $table->string('cta_title')->nullable();
            $table->string('cta_desc')->nullable();
            $table->string('cta_button_text')->nullable();

            // Brand Promise section
            $table->string('promise_subtitle')->nullable();
            $table->string('promise_title')->nullable();
            $table->text('promise_description')->nullable();
            $table->json('promise_cards')->nullable(); // [{icon,title,desc}]

            // Stats strip
            $table->json('stats')->nullable(); // [{icon,number,label}]

            // Vision / Mission
            $table->string('vision_badge')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_desc')->nullable();
            $table->string('mission_badge')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_desc')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_settings');
    }
};