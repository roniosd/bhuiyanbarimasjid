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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 130);
            $table->string('title', 100);
            $table->mediumText('description');
            $table->string('excerpt', 500);
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->string('widget', 50);
            $table->string('template', 20);
            $table->string('photo', 20)->nullable();
            $table->enum('status', ['published', 'unpublished'])->default('published');
            $table->timestamp('published_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
