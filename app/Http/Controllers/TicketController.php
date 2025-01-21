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

    public function confirm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'categories' => 'required|array',
            'categories.*.category' => 'required|exists:categories,id',
            'categories.*.quantity' => 'required|integer|min:1',
        ]);
    
        // Calculate total price and prepare category data
        $categories = [];
        $totalPrice = 0;
    
        foreach ($validated['categories'] as $selectedCategory) {
            $category = Category::find($selectedCategory['category']);
            $quantity = $selectedCategory['quantity'];
            $price = $category->price * $quantity;
            $totalPrice += $price;
    
            $categories[] = [
                'name' => $category->name,
                'price' => $category->price,
                'quantity' => $quantity,
                'subtotal' => $price,
            ];
        }
    
        // Store data in the session for further steps
        session()->put('ticket_data', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'date' => $validated['date'],
            'categories' => $categories,
            'totalPrice' => $totalPrice,
        ]);
    
        // Pass data to the confirmation view
        return view('tickets.confirm', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'date' => $validated['date'],
            'categories' => $categories,
            'totalPrice' => $totalPrice,
        ]);
    }    
    
    public function payment()
    {
        // Fetch data from session
        $ticketData = session('ticket_data');
    
        if (!$ticketData) {
            return redirect()->route('tickets.index')->with('error', 'No data found to process payment.');
        }
    
        return view('tickets.payment', ['ticketData' => $ticketData]);
    }

    public function storeAfterPayment(Request $request)
    {
        // Simulate successful payment (no actual processing for test purposes)
        $ticketData = session('ticket_data');
    
        if (!$ticketData) {
            return redirect()->route('tickets.index')->with('error', 'No ticket data found.');
        }
    
        $bookingId = strtoupper(bin2hex(random_bytes(3))); // Generate a dummy booking ID
    
        // Save ticket data to the database, send email, and clear session
        foreach ($ticketData['categories'] as $category) {
            Ticket::create([
                'name' => $ticketData['name'],
                'email' => $ticketData['email'],
                'date' => $ticketData['date'],
                'time' => now()->format('H:i'),
                'category_id' => Category::where('name', $category['name'])->first()->id,
                'quantity' => $category['quantity'],
                'booking_id' => $bookingId,
            ]);
        }
    
        session()->forget('ticket_data'); // Clear session after successful payment
    
        return redirect()->route('tickets.index')->with('success', 'Payment successful! Booking ID: ' . $bookingId);
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
