<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',          // Name of the person making the booking
        'email',         // Email of the person making the booking
        'date',          // Date for the tickets
        'total_price',   // Total price for the booking
        'payment_status',// Status of payment (e.g., pending, completed)
        'booking_id',    // Unique booking ID for tracking
        'is_expired',    // Whether the booking has expired
    ];

    /**
     * Relationship with Ticket.
     * Each ticket booking can have multiple tickets.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'booking_id', 'id');
    }
}
