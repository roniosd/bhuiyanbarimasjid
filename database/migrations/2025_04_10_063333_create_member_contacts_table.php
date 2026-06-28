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
        Schema::create('member_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('village', 200)->nullable();
            $table->string('post', 200)->nullable();
            $table->string('subdistrict', 200)->nullable();
            $table->string('district', 200)->nullable();
            $table->enum('type', ['permanent', 'present']);
            $table->foreignId(column: 'member_id')->constrained('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_contacts');
    }
};
