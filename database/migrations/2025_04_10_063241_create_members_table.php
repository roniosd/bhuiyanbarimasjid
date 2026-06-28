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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 200);
            $table->string('father', 200)->nullable();
            $table->string('mother', 200)->nullable();
            $table->date('dob');
            $table->string('mobile', 20);
            $table->string('email', 200)->nullable();

            $table->string('occupation', 200)->nullable();
            $table->string('workspace', 200)->nullable();
            $table->string('education')->nullable();
            $table->string('photo')->nullable();

            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('member_type', ['general', 'premium', 'vip']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
