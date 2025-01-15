<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }
    
    public function create()
    {
        return view('tickets.create');
    }
    
    public function store(Request $request)
    {
        Ticket::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]));
    
        return redirect()->route('tickets.index');
    }
    
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }
    
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]));
    
        return redirect()->route('tickets.index');
    }
    
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
    
}
