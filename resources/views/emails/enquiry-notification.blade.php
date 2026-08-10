<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; color: #23291f; }
        .wrap { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #123108; color: #fff; padding: 16px 20px; border-radius: 8px 8px 0 0; }
        .body { border: 1px solid #e6e9e3; border-top: none; padding: 20px; border-radius: 0 0 8px 8px; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 8px 10px; border-bottom: 1px solid #eee; vertical-align: top; }
        td.label { font-weight: bold; width: 180px; color: #6b7568; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="header">
            <h2 style="margin:0;">New {{ $enquiryType }} Received</h2>
        </div>
        <div class="body">
            <table>
                @foreach($data as $key => $value)
                    @if(!is_array($value))
                        <tr>
                            <td class="label">{{ ucwords(str_replace('_', ' ', $key)) }}</td>
                            <td>{{ $value }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>

            @if(!empty($data['items']))
                <h4 style="margin-top:20px;">Items</h4>
                <table>
                    <tr>
                        <td class="label">Product</td>
                        <td class="label">Qty</td>
                        <td class="label">Price</td>
                    </tr>
                    @foreach($data['items'] as $item)
                        <tr>
                            <td>{{ $item['product'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>₹{{ number_format($item['price'], 2) }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</body>
</html>