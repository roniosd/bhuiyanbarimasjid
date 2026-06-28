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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50);
            $table->string('title', 200)->nullable();
            $table->string('media', 200);
            $table->string('alt', 100)->nullable();
            $table->string('description', 500)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('album_id')->constrained('albums')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
