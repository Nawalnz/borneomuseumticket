<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_number')->unique(); // Unique identifier for the reservation
            $table->string('customer_email')->nullable(); // Email for online purchases
            $table->enum('status', ['pending', 'paid', 'used'])->default('pending'); // Reservation status
            $table->decimal('total_amount', 8, 2)->default(0); // Total cost of the reservation
            $table->string('payment_method')->nullable(); // Payment method (e.g., cash, spay, card)
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
