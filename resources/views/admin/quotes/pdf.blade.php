<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $quote->proposal_id }}</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
        }

        .sheet {
            padding: 30px 35px;
        }

        table { width: 100%; border-collapse: collapse; }

        .header-table td { vertical-align: top; }

        .logo { max-height: 60px; max-width: 180px; }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            color: #1a1a1a;
            margin: 8px 0 0 0;
        }

        .muted { color: #888; }

        .invoice-title {
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            color: #1a1a1a;
            letter-spacing: 1px;
        }

        .invoice-meta { margin-top: 6px; }
        .invoice-meta td { padding: 2px 0; text-align: right; }
        .invoice-meta .label { color: #888; padding-right: 10px; }

        .divider { border-top: 2px solid #1a1a1a; margin: 18px 0; }

        .parties-table td {
            width: 50%;
            vertical-align: top;
            padding: 12px 15px;
            background: #f7f7f8;
        }

        .parties-table td.from-block { border-right: 1px solid #e2e2e2; }

        .block-title {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #999;
            margin-bottom: 6px;
        }

        .party-name { font-size: 13px; font-weight: bold; margin-bottom: 2px; }

        .items-table { margin-top: 20px; border: 1px solid #e2e2e2; }

        .items-table th {
            background: #1a1a1a;
            color: #fff;
            text-align: left;
            padding: 8px 10px;
            font-size: 11px;
            text-transform: uppercase;
        }

        .items-table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }

        .product-image { width: 60px; height: 60px; }

        .product-name { font-weight: bold; font-size: 12px; }
        .product-detail { color: #777; font-size: 10px; margin-top: 2px; }

        .text-right { text-align: right; }

        .items-table td.text-right,
        .items-table th.text-right,
        .totals-table td.text-right {
            white-space: nowrap;
        }

        .totals-table { width: 260px; margin-left: auto; margin-top: 10px; }
        .totals-table td { padding: 6px 10px; }
        .totals-table .grand-total-row td {
            border-top: 2px solid #1a1a1a;
            font-size: 14px;
            font-weight: bold;
        }

        .terms { margin-top: 30px; font-size: 10.5px; color: #555; }
        .terms .block-title { margin-bottom: 8px; }
    </style>
</head>
<body>

    <div class="sheet">

        {{-- Header --}}
        <table class="header-table">
            <tr>
                <td style="width: 55%;">
                    @if(!empty($settings?->pdf_logo_path))
                        <img src="{{ $settings->pdf_logo_path }}" class="logo">
                    @endif
                    <div class="company-name">{{ $settings?->company_name }}</div>
                </td>
                <td style="width: 45%;" class="text-right">
                    <div class="invoice-title">Proposal</div>
                    <table class="invoice-meta">
                        <tr>
                            <td class="label">Proposal No.</td>
                            <td>{{ $quote->proposal_id }}</td>
                        </tr>
                        <tr>
                            <td class="label">Date</td>
                            <td>{{ $quote->created_at?->format('d M Y') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="divider"></div>

        {{-- From / Proposal To --}}
        <table class="parties-table">
            <tr>
                <td class="from-block">
                    <div class="block-title">From</div>
                    <div class="party-name">{{ $settings?->company_name }}</div>
                    @if($settings?->address)
                        <div>{{ $settings->address }}</div>
                    @endif
                    @if($settings?->city?->name || $settings?->state?->name || $settings?->pincode)
                        <div>
                            {{ $settings?->city?->name }}{{ $settings?->city?->name && $settings?->state?->name ? ', ' : '' }}{{ $settings?->state?->name }}
                            {{ $settings?->pincode ? '- ' . $settings->pincode : '' }}
                        </div>
                    @endif
                    @if($settings?->gst_number)
                        <div>GSTIN: {{ $settings->gst_number }}</div>
                    @endif
                    @if($settings?->phone)
                        <div>Phone: {{ $settings->phone }}</div>
                    @endif
                    @if($settings?->email)
                        <div>Email: {{ $settings->email }}</div>
                    @endif
                    @if($settings?->website)
                        <div>{{ $settings->website }}</div>
                    @endif
                </td>
                <td>
                    <div class="block-title">Proposal To</div>
                    <div class="party-name">{{ $quote->customer->customer_name }}</div>
                    @if($quote->customer->business_name)
                        <div>{{ $quote->customer->business_name }}</div>
                    @endif
                    @if($quote->customer->address)
                        <div>{{ $quote->customer->address }}</div>
                    @endif
                    @if($quote->customer->city?->name || $quote->customer->state?->name || $quote->customer->pincode)
                        <div>
                            {{ $quote->customer->city?->name }}{{ $quote->customer->city?->name && $quote->customer->state?->name ? ', ' : '' }}{{ $quote->customer->state?->name }}
                            {{ $quote->customer->pincode ? '- ' . $quote->customer->pincode : '' }}
                        </div>
                    @endif
                    @if($quote->customer->gst_number)
                        <div>GSTIN: {{ $quote->customer->gst_number }}</div>
                    @endif
                    <div>Phone: {{ $quote->customer->mobile_number }}</div>
                    @if($quote->customer->email)
                        <div>Email: {{ $quote->customer->email }}</div>
                    @endif
                </td>
            </tr>
        </table>

        {{-- Items --}}
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 70px;">Image</th>
                    <th>Product</th>
                    <th class="text-right" style="width: 60px;">Qty</th>
                    <th class="text-right" style="width: 100px;">Price</th>
                    <th class="text-right" style="width: 110px;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quote->items as $item)
                    <tr>
                        <td>
                            @if($item->pdf_image_path)
                                <img src="{{ $item->pdf_image_path }}" class="product-image">
                            @else
                                <span class="muted">No image</span>
                            @endif
                        </td>
                        <td>
                            <div class="product-name">{{ $item->product_name }}</div>
                            @if($item->product_detail)
                                <div class="product-detail">{{ $item->product_detail }}</div>
                            @endif
                        </td>
                        <td class="text-right">{{ $item->quantity }}</td>
                        <td class="text-right">&#8377;{{ number_format($item->price, 2) }}</td>
                        <td class="text-right">&#8377;{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Totals --}}
        <table class="totals-table">
            <tr class="grand-total-row">
                <td>Grand Total</td>
                <td class="text-right">&#8377;{{ number_format($quote->total_amount, 2) }}</td>
            </tr>
        </table>

        {{-- Terms --}}
        @if(!empty($settings?->terms_conditions))
            <div class="terms">
                <div class="block-title">Terms & Conditions</div>
                {!! $settings->terms_conditions !!}
            </div>
        @endif

    </div>

</body>
</html>