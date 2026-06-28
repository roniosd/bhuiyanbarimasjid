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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slogan', 200)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('slider')->nullable();
            $table->string('photo')->nullable();
            $table->string('venue', 100);
            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();
            $table->integer('zoom')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->string('city', 20)->nullable();
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->enum('registration', ['open', 'close'])->default('open');
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
