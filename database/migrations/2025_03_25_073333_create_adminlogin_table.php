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
        Schema::create('adminlogins', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 50);
            $table->string('email', 100)->unique();
            $table->string('username', 15);
            $table->string('password', 100);
            $table->string('phone', 20)->nullable();
            $table->string('photo', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('last_login')->nullable();
            $table->integer('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminlogins');
    }
};
