<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_number', 'customer_email', 'status', 'total_amount', 'payment_method',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

