<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner Portal Invitation</title>
</head>
<body style="font-family: Arial, sans-serif; font-size:14px; color:#212529; line-height:1.6;">

    <p>
        Hello {{ $partner->company_name }},<br>
        you have been added as a B2B partner on <strong>Carspector</strong>.
    </p>

    <p>
        Please use the following link to set up your account and access your partner portal.
    </p>

    <p>
        <a href="{{ $registerUrl }}">{{ $registerUrl }}</a>
    </p>

    <p>
        Through the partner portal you can:
    </p>

    <ul>
        <li>Create inspection orders</li>
        <li>Track order statuses</li>
        <li>Manage your inspections in real time</li>
    </ul>

    <p>
        <strong>Important:</strong><br>
        This link expires in {{ $expiryHours }} hours.
    </p>

    <p>
        If you did not expect this email, you can safely ignore it.
    </p>

    <p>
        Best regards<br>
        Carspector Support Team
    </p>

    <p style="font-size:12px; color:#6c757d;">
        © {{ date('Y') }} Carspector GmbH<br>
    </p>

</body>
</html>