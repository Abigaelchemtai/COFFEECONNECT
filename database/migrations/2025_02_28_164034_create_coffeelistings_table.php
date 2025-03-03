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
        Schema::create('coffeelistings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('coffee_type', ['Speciality', 'Robusta', 'Arabica']);
            $table->decimal('quantity', 10, 2);
            $table->decimal('price_per_kg', 10, 2);
            $table->string('coffee_grade');
            $table->enum('status', ['Available', 'Sold Out', 'Pending'])->default('Available');
            $table->string('wallet_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffeelistings');
    }
};
