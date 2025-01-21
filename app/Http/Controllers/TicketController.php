<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;

class TicketController extends Controller
{
    // Display the ticket booking form
    public function index()
    {
        $categories = Category::all()->slice(0, 12); // Fetch all categories from the database
        return view('tickets.index', compact('categories'));
    }

    // Handle the booking form submission
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'categories' => 'required|array',
            'categories.*.category' => 'required|exists:categories,id',
            'categories.*.quantity' => 'required|integer|min:1',
        ]);
    
        foreach ($data['categories'] as $category) {
            Ticket::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'date' => $data['date'],
                'time' => $data['time'],
                'category_id' => $category['category'],
                'quantity' => $category['quantity'],
            ]);
        }
    
        return redirect()->route('tickets.index')->with('success', 'Tickets booked successfully.');
    }

    public function bulk()
    {
        $bulkCategories = Category::whereIn('id', [/* IDs of bulk or corporate rate categories */])->get();
        return view('tickets.bulk', compact('bulkCategories'));
    }

    public function bulkStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'category' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:10',
        ]);
    
        // Store the bulk ticket purchase
        Ticket::create($data);
    
        return redirect()->route('tickets.index')->with('success', 'Bulk tickets booked successfully.');
    }
    
    // Create a new ticket (admin only)
    public function create()
    {
        return view('tickets.create');
    }

    // Save a new ticket to the database (admin only)
    public function adminStore(Request $request)
    {
        Ticket::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]));

        return redirect()->route('tickets.index');
    }

    // Show the form to edit a ticket (admin only)
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    // Update a ticket in the database (admin only)
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

    // Delete a ticket from the database (admin only)
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
