<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_sliders', function (Blueprint $table) {
            $table->renameColumn('image', 'desktop_image');
            $table->string('mobile_image')->nullable()->after('desktop_image');
        });
    }

    public function down(): void
    {
        Schema::table('home_sliders', function (Blueprint $table) {
            $table->dropColumn('mobile_image');
            $table->renameColumn('desktop_image', 'image');
        });
    }
};