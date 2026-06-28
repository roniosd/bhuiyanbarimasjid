<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Email;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('slider');
            $table->string('title', 100);
            $table->string('description', 200);
            $table->string('logo', 20);
            $table->string('favicon', 20);
            $table->string('touch', 20);
            $table->string('flogo', 20);
            $table->string('tagline', 100);
            $table->string('tnt', 30);
            $table->string('about_company', 1000);
            $table->string('address', 300);
            $table->string('email', 50);
            $table->string('social_link', 1000);
            $table->string('copyright', 200);
            $table->string('terms', 200);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
