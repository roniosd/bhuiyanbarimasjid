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
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200); 
            $table->string('description', 500);
            $table->string('featured_photo', 20); 
            $table->boolean('show_membership')->default(false); 
            $table->string('donation_info')->nullable();
            $table->boolean('show_payment_method')->default(false); 
            $table->decimal('donation_unit', 8, 2)->default(0);
            $table->enum('status', ['active', 'inactive'])->default('inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funds');
    }
};
