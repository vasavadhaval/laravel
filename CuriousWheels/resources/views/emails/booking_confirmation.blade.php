<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request Confirmation</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>

    <p>We are pleased to inform you that your booking request has been successfully confirmed. Below are the details of your booking:</p>

    <ul>
        <li><strong>Vehicle:</strong> {{ $booking->vehicle->make }} ({{ $booking->vehicle->model }})</li>
        <li><strong>Start Date:</strong> {{ $booking->start_date }}</li>
        <li><strong>End Date:</strong> {{ $booking->end_date }}</li>
        <li><strong>Pickup Location:</strong> {{ $booking->pickup_location }}</li>
        <li><strong>Total Cost:</strong> ₹ {{ number_format($booking->total_cost, 2) }}</li>
    </ul>

    <p>Thank you for choosing our services. If you have any questions or need further assistance, feel free to contact us.</p>

    <p>Best regards,<br> {{ config('app.name') }}</p>
</body>
</html>
