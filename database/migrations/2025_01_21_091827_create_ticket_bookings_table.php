<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketBookingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_bookings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('booking_id')->unique(); // Unique booking ID
            $table->string('name'); // Buyer name
            $table->string('email'); // Buyer email
            $table->date('date'); // Date of visit
            $table->boolean('payment_status')->default(false); // Whether payment is made
            $table->json('categories')->nullable(); // Categories and quantities (stored as JSON)
            $table->timestamp('purchase_date')->nullable(); // When purchase was made
            $table->boolean('expired')->default(false); // Whether ticket has expired
            $table->timestamps(); // Created at and updated at

            // Optional: Index for faster searches on date or email
            $table->index(['date', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_bookings');
    }
}
