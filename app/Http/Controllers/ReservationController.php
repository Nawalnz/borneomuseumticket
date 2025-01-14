<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('ticket', 'user')->get();
        return view('reservations.index', compact('reservations'));
    }
    
    public function create()
    {
        $tickets = Ticket::all();
        return view('reservations.create', compact('tickets'));
    }
    
    public function store(Request $request)
    {
        Reservation::create($request->validate([
            'user_id' => 'required|exists:users,id',
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer',
            'status' => 'required|in:pending,completed,cancelled',
        ]));
    
        return redirect()->route('reservations.index');
    }
    
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
    
}

