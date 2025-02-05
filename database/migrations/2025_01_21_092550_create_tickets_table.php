<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('ticket_bookings')->onDelete('cascade'); // Links to TicketBooking
            $table->string('name'); // Name of the user
            $table->string('email'); // Email of the user
            $table->date('date'); // Date of the ticket
            $table->foreignId('category_id')->constrained('categories'); // Links to a category
            $table->boolean('is_used')->default(false); // Whether the ticket has been used
            $table->boolean('is_expired')->default(false); // Whether the ticket has expired
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
