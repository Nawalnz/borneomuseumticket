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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // E.g., "Children", "Student", "Adult", "Senior"
            $table->string('nationality'); // E.g., "Malaysian (Sarawakian)", "Malaysian (Non-Sarawakian)", "Foreigner"
            $table->decimal('price', 8, 2); // E.g., 0.00, 5.00, 20.00, etc.
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
