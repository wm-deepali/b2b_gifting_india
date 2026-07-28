<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: sans-serif; font-size: 14px; color: #333; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .company-name { font-size: 18px; font-weight: bold; color: #1a1a1a; }
        .footer { margin-top: 25px; color: #888; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <p class="company-name">{{ $settings?->company_name }}</p>

        <p>Dear {{ $quote->customer->customer_name }},</p>

        <p>
            Please find attached your proposal
            <strong>#{{ $quote->proposal_id }}</strong>
            for a total amount of ₹{{ number_format($quote->total_amount, 2) }}.
        </p>

        <p>If you have any questions, feel free to reach out to us.</p>

        <p>
            Regards,<br>
            {{ $settings?->company_name }}
            @if($settings?->phone)
                <br>{{ $settings->phone }}
            @endif
            @if($settings?->email)
                <br>{{ $settings->email }}
            @endif
        </p>

        <div class="footer">
            This is an automated email regarding your proposal request.
        </div>
    </div>
</body>
</html>