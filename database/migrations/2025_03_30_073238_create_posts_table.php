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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 400);
            $table->string('subtitle', 200)->nullable();
            $table->string('slug', 200)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('attachment', 1000)->nullable();
            $table->string('excerpt', 500)->nullable();
            $table->string('photo', 20)->nullable();
            $table->enum('type', ['post', 'news', 'event'])->default('news');
            $table->enum('news_type', ['sticky', 'breaking', 'featured'])->default('sticky');
            $table->enum('status', ['published', 'unpublished'])->default('published');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('tags', 200)->nullable();
            $table->foreignId('author')->constrained('adminlogins')->onDelete('cascade');
            $table->smallInteger('view')->default(0);
            $table->decimal('rating', 2, 1)->nullable();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
