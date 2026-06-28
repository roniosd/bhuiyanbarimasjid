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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donar', 50);
            $table->string('contact', 50);
            $table->decimal('amount', 10, 2); 
            $table->timestamp('transaction_time')->useCurrent();
            $table->foreignId('fund_id')->constrained('funds')->onDelete('cascade');
            $table->string('timezone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
