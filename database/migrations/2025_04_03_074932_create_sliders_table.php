<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->nullable();
            $table->integer('position');
            $table->string('btn_label', 36)->nullable();
            $table->string('btn_link', 100)->nullable();
            $table->foreignId('category')->constrained('categories');
            $table->enum('status', ['published', 'unpublished'])->default('published');
            $table->string('description', 500)->nullable();
            $table->string('photo', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
