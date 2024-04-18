<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request Rejection</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>

    <p>We regret to inform you that your booking request has been rejected. Unfortunately, we are unable to fulfill your request at this time. Your payment will be refunded soon.</p>

    <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>

    <p>Best regards,<br> {{ config('app.name') }}</p>
</body>
</html>
