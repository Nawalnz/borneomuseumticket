<h1>Booking Confirmation</h1>
<p>Dear {{ $ticketData['name'] }},</p>
<p>Thank you for booking your tickets. Your booking ID is <strong>{{ $bookingId }}</strong>.</p>
<p><strong>Details:</strong></p>
<ul>
    <li>Date: {{ $ticketData['date'] }}</li>
    <li>Total Price: ${{ $ticketData['totalPrice'] }}</li>
</ul>
<p>We look forward to seeing you!</p>
