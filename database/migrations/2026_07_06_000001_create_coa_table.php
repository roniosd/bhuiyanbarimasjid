<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('coa', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['dr', 'cr']);
            $table->string('head', 100);
            $table->enum('is_child', ['yes', 'no'])->default('no');
            $table->foreignId('parent_head')->nullable()->constrained('coa')->nullOnDelete();
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coa');
    }
};
