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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade'); // Links to the reservations table
            $table->string('type'); // Ticket type: Sarawakian, Non-Sarawakian, Student, etc.
            $table->decimal('price', 8, 2); // Price per ticket
            $table->integer('quantity'); // Number of tickets of this type
            $table->decimal('total_amount', 8, 2); // Total cost (price * quantity)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
