<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->string("slug", 130);
            $table->enum("type",['post','news', 'event'])->default('news');
            $table->string("photo", 20)->nullable();
            $table->string("description", 200)->nullable();
            $table->smallInteger("count")->default(0);
            $table->enum("status",['published', 'unpublished'])->default(value: 'published');
            $table->enum("is_parent",['parent', 'child'])->default('parent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
