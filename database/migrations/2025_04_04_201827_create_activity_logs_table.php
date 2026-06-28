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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->string('component_type', 20);
            $table->unsignedBigInteger('component_id');
            $table->enum('action', ['add', 'edit', 'delete', 'update']);
            $table->foreignId(column: 'admin_id')->constrained('adminlogins')->onDelete('cascade');
            $table->timestamp('created')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
