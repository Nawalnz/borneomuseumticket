<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return Reservation::with('tickets')->get(); // Retrieve all reservations with related tickets
    }

    public function store(Request $request)
    {
        $reservation = Reservation::create([
            'reservation_number' => uniqid('RES'),
            'customer_email' => $request->customer_email,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'total_amount' => 0, // Will calculate after tickets are added
        ]);

        foreach ($request->tickets as $ticket) {
            $reservation->tickets()->create($ticket); // Add related tickets
        }

        $reservation->total_amount = $reservation->tickets->sum('total_amount');
        $reservation->save();

        return $reservation;
    }

    public function search($reservation_number)
    {
        return Reservation::with('tickets')
            ->where('reservation_number', $reservation_number)
            ->firstOrFail();
    }

    public function markAsUsed($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'used';
        $reservation->save();
    
        return $reservation;
    }
    

}

