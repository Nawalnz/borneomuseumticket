<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', // Links to ticket_bookings
        'name',       // Name of the user
        'email',      // Email of the user
        'date',       // Date of the ticket
        'category_id',// Foreign key for the category
        'is_used',    // Whether the ticket has been used
        'is_expired', // Whether the ticket has expired
    ];

    /**
     * Relationship with TicketBooking.
     * Each ticket belongs to one ticket booking.
     */
    public function booking()
    {
        return $this->belongsTo(TicketBooking::class, 'booking_id', 'id');
    }

    /**
     * Relationship with Category.
     * Each ticket belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
