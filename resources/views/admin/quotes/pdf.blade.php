<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $quote->proposal_id }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        /* ==========================================================
           Page setup — dompdf reads @page for per-page margins.
           Top/bottom margins reserve room for the fixed header/footer
           below. Left/right reduced from the old 35px .sheet padding
           so more content fits per row.
           ========================================================== */
        @page {
            margin: 145px 22px 95px 22px;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #23291f;
            margin: 0;
        }

        .sheet {
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .muted {
            color: #6b7568;
        }

        .text-right {
            text-align: right;
        }

        /* ==========================================================
           REPEATING HEADER
           position: fixed + negative top places this inside the
           @page top-margin box, so dompdf repeats it on every page.
           ========================================================== */
        .pdf-header {
            position: fixed;
            top: -128px;
            left: 0;
            right: 0;
            height: 112px;
        }

        .pdf-header .header-shade {
            background: #ffffff;
            border-top: 4px solid #123108;
            padding: 16px 22px 12px 22px;
        }

        .pdf-header .header-table td {
            vertical-align: middle;
        }

        .pdf-header .brand-table td {
            vertical-align: middle;
        }

        .pdf-header .logo-cell {
            width: 54px;
            padding-right: 10px;
        }

        .pdf-header .logo {
            max-height: 46px;
            max-width: 54px;
        }

        .pdf-header .company-name {
            font-size: 16px;
            font-weight: bold;
            color: #23291f;
            margin: 0;
        }

        .pdf-header .company-tagline {
            font-size: 9.5px;
            font-style: italic;
            color: #6b7568;
            margin-top: 1px;
        }

        .pdf-header .invoice-title {
            font-size: 19px;
            font-weight: bold;
            text-transform: uppercase;
            color: #123108;
            letter-spacing: 2px;
        }

        .pdf-header .invoice-meta {
            margin-top: 10px;
            width: auto;
            margin-left: auto;
            border-collapse: collapse;
        }

        .pdf-header .invoice-meta td {
            padding: 2px 0;
            font-size: 10.5px;
            white-space: nowrap;
        }

        .pdf-header .invoice-meta td.label {
            color: #6b7568;
            text-align: left;
            padding-right: 8px;
        }

        .pdf-header .invoice-meta td.value {
            text-align: right;
            color: #23291f;
            font-weight: 600;
        }

        .pdf-header .header-divider {
            border-top: 1px solid #e6e9e3;
        }

        /* ==========================================================
           REPEATING FOOTER — static company contact line, shown on
           every page, plus page number via dompdf's CSS counters.
           ========================================================== */
        .pdf-footer {
            position: fixed;
            bottom: -78px;
            left: 0;
            right: 0;
            height: 65px;
            background: #f6f8f4;
            border-top: 2px solid #123108;
            padding-top: 10px;
            text-align: center;
            font-size: 9px;
            color: #6b7568;
            line-height: 1.6;
        }

        .pdf-footer .footer-address {
            color: #6b7568;
        }

        .pdf-footer .footer-contact {
            margin-top: 2px;
        }

        .pdf-footer .footer-contact strong {
            color: #123108;
        }

        .pdf-footer .page-num {
            margin-top: 4px;
            font-size: 8.5px;
            color: #a3aa9c;
        }

        .pdf-footer .page-num:after {
            content: "Page " counter(page) " of " counter(pages);
        }

      .company-intro {
            font-size: 10.5px;
            color: #6b7568;
            margin-bottom: 12px;
        }

        .company-intro p {
            margin: 0 0 6px 0;
        }

        /* ==========================================================
           Parties block
           ========================================================== */
        .parties-table {
            page-break-inside: avoid;
        }

        .parties-table td {
            width: 50%;
            vertical-align: top;
            padding: 12px 15px;
            background: #eef3ea;
        }

        .parties-table td.from-block {
            border-right: 1px solid #e6e9e3;
        }

        .block-title {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #123108;
            margin-bottom: 6px;
        }

        .party-name {
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 2px;
            color: #23291f;
        }

        /* ---------- Items table (repeats header row on every page) ---------- */
        .items-table {
            margin-top: 18px;
            border: 1px solid #e6e9e3;
        }

        .items-table thead {
            display: table-header-group;
        }

        .items-table tbody tr {
            page-break-inside: avoid;
        }

        .items-table th {
            background: #123108;
            color: #ffffff;
            text-align: left;
            padding: 8px 10px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border: 1px solid #123108;
        }

        .items-table td {
            padding: 10px;
            border: 1px solid #e6e9e3;
            vertical-align: top;
        }

        .product-image-cell {
            width: 74px;
            text-align: center;
        }

        .product-image {
            width: 70px;
            height: 70px;
            border: 1px solid #eee;
            border-radius: 4px;
        }

        .no-image-box {
            width: 70px;
            height: 70px;
            line-height: 70px;
            text-align: center;
            background: #f6f8f4;
            color: #6b7568;
            font-size: 9px;
            border-radius: 4px;
            border: 1px solid #e6e9e3;
        }

        .product-name {
            font-weight: bold;
            font-size: 12px;
            color: #23291f;
        }

        .product-detail {
            color: #6b7568;
            font-size: 10px;
            margin-top: 2px;
        }

        .product-options {
            color: #6b7568;
            font-size: 10px;
            margin-top: 4px;
        }

        .product-options span {
            margin-right: 8px;
        }

        .product-options strong {
            color: #23291f;
        }

        .product-customization {
            color: #6b7568;
            font-size: 10px;
            margin-top: 4px;
        }

        .product-customization strong {
            color: #23291f;
        }

        .items-table td.text-right,
        .items-table th.text-right,
        .totals-table td.text-right {
            white-space: nowrap;
        }

        .item-total {
            font-weight: bold;
            color: #123108;
        }

        /* ---------- /Items table ---------- */

        .totals-table {
            width: 260px;
            margin-left: auto;
            margin-top: 10px;
            background: #eef3ea;
            page-break-inside: avoid;
        }

        .totals-table td {
            padding: 6px 10px;
        }

        .totals-table .grand-total-row td {
            border-top: 2px solid #123108;
            font-size: 14px;
            font-weight: bold;
            color: #123108;
        }

        .bank-details {
            margin-top: 30px;
            border-top: 1px solid #e6e9e3;
            padding-top: 15px;
            font-size: 10.5px;
            color: #555;
            page-break-inside: avoid;
        }

        .bank-details .block-title {
            margin-bottom: 8px;
        }

        .bank-details-table td {
            vertical-align: top;
            padding: 0;
        }

        .bank-details-table .qr-image {
            width: 90px;
            height: 90px;
        }

        .bank-details-table .qr-caption {
            color: #6b7568;
            font-size: 9px;
            margin-top: 4px;
        }

        .terms {
            margin-top: 25px;
            font-size: 10.5px;
            color: #555;
        }

        .terms .block-title {
            margin-bottom: 8px;
            page-break-after: avoid;
        }
    </style>
</head>

<body>

    {{-- ==========================================================
    Repeating header — same data/fields as before (logo,
    company name, "Quotation" title, No./Date), just wrapped
    in a position:fixed block so dompdf repeats it on every
    page. No Blade logic changed.
    ========================================================== --}}
    <div class="pdf-header">
        <div class="header-shade">
            <table class="header-table">
                <tr>
                    <td style="width: 55%;">
                        <table class="brand-table">
                            <tr>
                                @if(!empty($settings?->pdf_logo_path))
                                    <td class="logo-cell">
                                        <img src="{{ $settings->pdf_logo_path }}" class="logo">
                                    </td>
                                @endif
                                <td>
                                    <div class="company-name">{{ $settings?->company_name }}</div>
                                    @if(!empty($settings?->tagline))
                                        <div class="company-tagline">{{ $settings->tagline }}</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 45%;" class="text-right">
                        <div class="invoice-title">Quotaton</div>
                        <table class="invoice-meta">
                            <tr>
                                <td class="label">No.</td>
                                <td class="value">{{ $quote->proposal_id }}</td>
                            </tr>
                            <tr>
                                <td class="label">Date</td>
                                <td class="value">{{ $quote->created_at?->format('d M Y') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="header-divider"></div>
    </div>

    {{-- ==========================================================
    Repeating footer — static contact line as provided, plus
    auto page-number counter. Shown on every page.
    ========================================================== --}}
    <div class="pdf-footer">
        <div class="footer-address">1025, Tower A, GrandSlam Ithum, Sector - 62, Noida, Uttar Pradesh, India</div>
        <div class="footer-contact"><strong>Mobile:</strong> +91-7607770184 &nbsp;|&nbsp; <strong>Email:</strong>
            business@webmingo.com</div>
        <div class="page-num"></div>
    </div>

    <div class="sheet">

        @if(!empty($settings?->company_introduction))
            <div class="company-intro">
                {!! $settings->company_introduction !!}
            </div>
        @endif

        {{-- From / Proposal To --}}
        <table class="parties-table">

            <tr>
                <td class="from-block">
                    <div class="block-title">Company Detail</div>
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
                    <div class="block-title">Customer Detail</div>
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
                    <th style="width: 74px;">Image</th>
                    <th>Product</th>
                    <th class="text-right" style="width: 50px;">Qty</th>
                    <th class="text-right" style="width: 90px;">Price</th>
                    <th class="text-right" style="width: 50px;">Tax</th>
                    <th class="text-right" style="width: 110px;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quote->items as $item)
                    <tr>
                        <td class="product-image-cell">
                            @if($item->pdf_image_path)
                                <img src="{{ $item->pdf_image_path }}" class="product-image">
                            @else
                                <div class="no-image-box">No image</div>
                            @endif
                        </td>
                        <td>
                            <div class="product-name">{{ $item->product_name }}</div>
                            @if($item->product_detail)
                                <div class="product-detail">{{ $item->product_detail }}</div>
                            @endif

                            @php
                                $hasOptions = $item->brand?->name || $item->sku_code || $item->hsn_code || $item->colour;
                            @endphp

                            @if($hasOptions)
                                <div class="product-options">
                                    @if($item->brand?->name)
                                        <span><strong>Brand:</strong> {{ $item->brand->name }}</span>
                                    @endif
                                    @if($item->sku_code)
                                        <span><strong>SKU:</strong> {{ $item->sku_code }}</span>
                                    @endif
                                    @if($item->hsn_code)
                                        <span><strong>HSN:</strong> {{ $item->hsn_code }}</span>
                                    @endif
                                    @if($item->colour)
                                        <span><strong>Colour:</strong> {{ $item->colour }}</span>
                                    @endif
                                </div>
                            @endif

                            @if($item->customizations && $item->customizations->count())
                                <div class="product-customization">
                                    <strong>Customisation:</strong>
                                    {{ $item->customizations->pluck('name')->join(', ') }}
                                </div>
                            @endif
                        </td>
                        <td class="text-right">{{ $item->quantity }}</td>
                        <td class="text-right">&#8377;{{ number_format($item->price, 2) }}</td>
                        <td class="text-right">{{ rtrim(rtrim(number_format($item->tax_percentage, 2), '0'), '.') }}%</td>
                        <td class="text-right item-total">&#8377;{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
            $subTotal = $quote->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            $discount = $quote->discount_amount ?? 0;

            $packing = $quote->packing_charges ?? 0;
            $shipping = $quote->shipping_charges ?? 0;

            $taxes = $quote->items->sum(function ($item) {
                return ($item->price * $item->quantity) * ($item->tax_percentage / 100);
            });

            $packingTax = ($packing * ($quote->packing_tax_percentage ?? 0)) / 100;
            $shippingTax = ($shipping * ($quote->shipping_tax_percentage ?? 0)) / 100;

            $taxes += $packingTax + $shippingTax;
        @endphp

        <table class="totals-table">

            <tr>
                <td>Sub Total</td>
                <td class="text-right">&#8377;{{ number_format($subTotal, 2) }}</td>
            </tr>

            <tr>
                <td>Discount</td>
                <td class="text-right">-&#8377;{{ number_format($discount, 2) }}</td>
            </tr>

            <tr>
                <td>Packaging Charges</td>
                <td class="text-right">&#8377;{{ number_format($packing, 2) }}</td>
            </tr>

            <tr>
                <td>Shipping Charges</td>
                <td class="text-right">&#8377;{{ number_format($shipping, 2) }}</td>
            </tr>

            <tr>
                <td>Taxes</td>
                <td class="text-right">&#8377;{{ number_format($taxes, 2) }}</td>
            </tr>

            <tr class="grand-total-row">
                <td>Total</td>
                <td class="text-right">&#8377;{{ number_format($quote->total_amount, 2) }}</td>
            </tr>

        </table>

        {{-- Bank Details --}}
        @if($settings?->bank_name || $settings?->account_name || $settings?->account_number || $settings?->ifsc_code || $settings?->upi_id || $settings?->qr_code)
            <div class="bank-details">
                <div class="block-title">Bank Details</div>

                <table class="bank-details-table">
                    <tr>
                        <td style="width: 70%;">
                            @if($settings?->bank_name)
                                <div><span class="muted">Bank Name:</span> {{ $settings->bank_name }}</div>
                            @endif
                            @if($settings?->account_name)
                                <div><span class="muted">Account Name:</span> {{ $settings->account_name }}</div>
                            @endif
                            @if($settings?->account_number)
                                <div><span class="muted">Account Number:</span> {{ $settings->account_number }}</div>
                            @endif
                            @if($settings?->ifsc_code)
                                <div><span class="muted">IFSC Code:</span> {{ $settings->ifsc_code }}</div>
                            @endif
                            @if($settings?->upi_id)
                                <div><span class="muted">UPI ID:</span> {{ $settings->upi_id }}</div>
                            @endif
                        </td>
                        @if(!empty($settings?->pdf_qr_path))
                            <td style="width: 30%;" class="text-right">
                                <img src="{{ $settings->pdf_qr_path }}" class="qr-image">
                                <div class="qr-caption">Scan to pay</div>
                            </td>
                        @endif
                    </tr>
                </table>

            </div>
        @endif

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