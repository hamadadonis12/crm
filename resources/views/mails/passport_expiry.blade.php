<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Passport Expiry Reminder</title>
</head>
<body>
    <p>Dear {{ $client->fullname }},</p>
    <p>Your passport will expire on {{ $client->expiry_date }}. Please renew it before the expiry date to avoid issues.</p>
</body>
</html>
