@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Tickets</h1>

    <a href="{{ route('tickets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Ticket</a>

    <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Price</th>
                <th class="border border-gray-300 px-4 py-2">Quantity</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $ticket->title }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $ticket->price }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $ticket->quantity }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
