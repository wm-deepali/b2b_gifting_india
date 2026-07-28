@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.quotes.index') }}">
                            Manage Quotes
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Preview — {{ $quote->proposal_id }}
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card">

                <div class="card-body">

                    {{-- Toolbar --}}
                    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                        <h5 class="mb-0">Proposal #{{ $quote->proposal_id }}</h5>

                        <div class="d-flex align-items-center gap-2">

                            <form action="{{ route('admin.quotes.sendEmail', $quote->id) }}" method="POST"
                                class="d-flex align-items-center mr-2">
                                @csrf
                                <input type="email" name="email" class="form-control form-control-sm mr-2"
                                    value="{{ old('email', $quote->customer->email) }}" placeholder="Recipient email"
                                    required style="width: 220px;">
                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                    <i class="fa fa-envelope"></i> Send Email
                                </button>
                            </form>

                            <a href="{{ route('admin.quotes.download', $quote->id) }}" class="btn btn-primary">
                                <i class="fa fa-download"></i> Download PDF
                            </a>

                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <div class="border rounded p-4" style="background: #fff;">

                        {{-- Header --}}
                        <div class="d-flex align-items-start justify-content-between border-bottom pb-3 mb-3">

                            <div>
                                @if(!empty($settings?->company_logo))
                                    <img src="{{ asset('storage/' . $settings->company_logo) }}"
                                        style="max-height: 60px; max-width: 180px;" class="mb-2 d-block">
                                @endif
                                <h5 class="mb-0">{{ $settings?->company_name }}</h5>
                            </div>

                            <div class="text-right">
                                <div class="text-uppercase font-weight-bold" style="letter-spacing: 1px;">
                                    Proposal
                                </div>
                                <div class="text-muted small mt-1">
                                    No. {{ $quote->proposal_id }}<br>
                                    Date: {{ $quote->created_at?->format('d M Y') }}
                                </div>
                            </div>

                        </div>

                        @if(!empty($settings?->company_introduction))
                            <div class="mb-3 small text-muted">
                                {!! $settings->company_introduction !!}
                            </div>
                        @endif

                        {{-- From / Proposal To --}}
                        <div class="row no-gutters border rounded mb-4 overflow-hidden">

                            <div class="col-md-6 p-3 border-right" style="background: #f7f7f8;">
                                <div class="text-uppercase text-muted small font-weight-bold mb-2">From</div>
                                <div class="font-weight-bold">{{ $settings?->company_name }}</div>
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
                            </div>

                            <div class="col-md-6 p-3" style="background: #f7f7f8;">
                                <div class="text-uppercase text-muted small font-weight-bold mb-2">Proposal To</div>
                                <div class="font-weight-bold">{{ $quote->customer->customer_name }}</div>
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
                            </div>

                        </div>

                        {{-- Items --}}
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead style="background: #1a1a1a; color: #fff;">
                                    <tr>
                                        <th style="width: 90px;">Image</th>
                                        <th>Product</th>
                                        <th class="text-right" style="width: 70px;">Qty</th>
                                        <th class="text-right" style="width: 110px;">Price</th>
                                        <th class="text-right" style="width: 120px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quote->items as $item)
                                        <tr>
                                            <td class="text-center">
                                                @if($item->product_image)
                                                    <img src="{{ $item->product_image }}"
                                                        style="width: 70px; height: 70px; object-fit: contain; border: 1px solid #eee; border-radius: 4px;">
                                                @else
                                                    <div class="bg-light text-muted small d-flex align-items-center justify-content-center"
                                                        style="width: 70px; height: 70px; border-radius: 4px;">
                                                        No image
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="font-weight-bold">{{ $item->product_name }}</div>
                                                @if($item->product_detail)
                                                    <div class="text-muted small">{{ $item->product_detail }}</div>
                                                @endif
                                            </td>
                                            <td class="text-right">{{ $item->quantity }}</td>
                                            <td class="text-right">₹{{ number_format($item->price, 2) }}</td>
                                            <td class="text-right">₹{{ number_format($item->total_price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Grand total --}}
                        <div class="d-flex justify-content-end mt-3">
                            <div style="min-width: 260px;">
                                <div class="d-flex justify-content-between border-top pt-2" style="font-size: 16px;">
                                    <strong>Grand Total</strong>
                                    <strong>₹{{ number_format($quote->total_amount, 2) }}</strong>
                                </div>
                            </div>
                        </div>

                        {{-- Terms --}}
                        @if(!empty($settings?->terms_conditions))
                            <div class="border-top mt-4 pt-3">
                                <div class="text-uppercase text-muted small font-weight-bold mb-2">Terms & Conditions</div>
                                <div class="small text-muted">
                                    {!! $settings->terms_conditions !!}
                                </div>
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')