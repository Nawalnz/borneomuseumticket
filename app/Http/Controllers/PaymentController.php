<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('reservation')->get();
        return view('payments.index', compact('payments'));
    }
    
    public function store(Request $request)
    {
        Payment::create($request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]));
    
        return redirect()->route('payments.index');
    }
    
}
