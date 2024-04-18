<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request Received</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>

    <p>Your booking request has been successfully submitted. Here are the details:</p>

    <p>Booking ID: {{ $booking->id }}</p>
    <p>Start Date: {{ $booking->start_date }}</p>
    <p>End Date: {{ $booking->end_date }}</p>
    <p>Pickup Location: {{ $booking->pickup_location }}</p>
    <!-- Additional booking details -->
    <p>Vehicle: {{ $booking->vehicle->make }} {{ $booking->vehicle->model }} ({{ $booking->vehicle->year }})</p>
    <p>Total Cost: ₹ {{ number_format($booking->total_cost, 2) }}</p>
    <p>Payment Status: {{ $booking->payment_status }}</p>

    <p>We will review your request and get back to you shortly. Thank you for choosing our service!</p>

    <p>Best regards,<br> {{ config('app.name') }}</p>
</body>
</html>
