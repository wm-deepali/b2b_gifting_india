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
           Top margin increased to fit the taller new header
           (logo + company block + black bar + meta band).
           ========================================================== */
        @page {
            margin: 206px 22px 95px 22px;
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
           REPEATING HEADER — matches reference design:
           logo left / company block right, black divider bar,
           then a grey meta band with Quotation Number / Date /
           Prepared By.
           ========================================================== */
        .pdf-header {
            position: fixed;
            top: -191px;
            left: 0;
            right: 0;
            height: 165px;
        }

        .pdf-header .header-shade {
            background: #ffffff;
            padding: 16px 22px 14px 22px;
        }

        .pdf-header .header-table td {
            vertical-align: middle;
        }

        .pdf-header .logo-col {
            width: 105px;
            padding-right: 18px;
        }

        .pdf-header .logo {
            max-width: 100px;
            max-height: 100px;
        }

        .pdf-header .company-name {
            font-size: 22px;
            font-weight: bold;
            color: #23291f;
            margin: 0 0 5px 0;
        }

        .pdf-header .company-line {
            font-size: 10px;
            color: #23291f;
            line-height: 1.6;
        }

        .pdf-header .company-line strong {
            color: #23291f;
        }

        .pdf-header .company-line span {
            margin-right: 16px;
        }

        .pdf-header .header-black-bar {
            background: #111111;
            height: 6px;
        }

        .pdf-header .header-meta-band {
            background: #e9e9e7;
            padding: 8px 22px;
        }

        .pdf-header .header-meta-table td {
            font-size: 10px;
            color: #23291f;
            vertical-align: middle;
        }

        .pdf-header .header-meta-table td strong {
            font-weight: bold;
        }

        /* ==========================================================
           REPEATING FOOTER — unchanged.
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
    REPEATING HEADER — logo left, company block right (name,
    address, mobile/GSTIN, email, website), black divider bar,
    then grey meta band with Quotation Number / Date / Prepared By.
    Quotation Number and Date are dynamic (same $quote fields as
    before). Prepared By is static text as requested.
    ========================================================== --}}
    <div class="pdf-header">
        <div class="header-shade">
            <table class="header-table">
                <tr>
                    <td class="logo-col">
                        @if(!empty($settings?->pdf_logo_path))
                            <img src="{{ $settings->pdf_logo_path }}" class="logo">
                        @endif
                    </td>
                    <td>
                        <div class="company-name">{{ $settings?->company_name }}</div>

                        @if($settings?->address || $settings?->city?->name || $settings?->state?->name || $settings?->pincode)
                            <div class="company-line">
                                {{ $settings?->address }}{{ $settings?->address && ($settings?->city?->name || $settings?->state?->name || $settings?->pincode) ? ', ' : '' }}{{ $settings?->city?->name }}{{ $settings?->city?->name && $settings?->state?->name ? ', ' : '' }}{{ $settings?->state?->name }}{{ $settings?->pincode ? ', ' . $settings->pincode : '' }}
                            </div>
                        @endif

                        @if($settings?->phone || $settings?->gst_number)
                            <div class="company-line">
                                @if($settings?->phone)
                                    <span><strong>Mobile:</strong> {{ $settings->phone }}</span>
                                @endif
                                @if($settings?->gst_number)
                                    <span><strong>GSTIN:</strong> {{ $settings->gst_number }}</span>
                                @endif
                            </div>
                        @endif

                        @if($settings?->email)
                            <div class="company-line"><strong>Email:</strong> {{ $settings->email }}</div>
                        @endif

                        @if($settings?->website)
                            <div class="company-line"><strong>www:</strong> {{ $settings->website }}</div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <div class="header-black-bar"></div>

        <div class="header-meta-band">
            <table class="header-meta-table">
                <tr>
                    <td><strong>Quotation Number:</strong> {{ $quote->proposal_id }}</td>
                    <td><strong>Quotation Date:</strong> {{ $quote->created_at?->format('d/m/Y') }}</td>
                    <td><strong>Prepared By:</strong> Sales Team</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- ==========================================================
    Repeating footer — untouched, exactly as before.
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
                    <th style="width: 60px;">Image</th>
                    <th class="text-right" style="width: 120px;">Product</th>
                    <th>Product</th>
                    <th class="text-right" style="width: 40px;">Qty</th>
                    <th class="text-right" style="width: 80px;">Price</th>
                    <th class="text-right" style="width: 80px;">Branding</th>
                    <th class="text-right" style="width: 40px;">Tax</th>
                    <th class="text-right" style="width: 100px;">Total</th>
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
                        <td class="text-right">₹{{ number_format($item->branding_charges ?? 0, 2) }}</td>
                        <td class="text-right">{{ rtrim(rtrim(number_format($item->tax_percentage, 2), '0'), '.') }}%</td>
                        <td class="text-right item-total">&#8377;{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
            // Sub Total includes Branding/Customization Charges — they're per-unit,
            // multiplied by qty, and taxed the same way as price (matches QuoteController@store).
            $subTotal = $quote->items->sum(function ($item) {
                return ($item->price + ($item->branding_charges ?? 0)) * $item->quantity;
            });

            $discount = $quote->discount_amount ?? 0;

            $packing = $quote->packing_charges ?? 0;
            $shipping = $quote->shipping_charges ?? 0;

            $taxes = $quote->items->sum(function ($item) {
                return (($item->price + ($item->branding_charges ?? 0)) * $item->quantity) * ($item->tax_percentage / 100);
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