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
                        <a href="{{ route('admin.customers.index') }}">
                            Manage Customers
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Customer Details
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            {{-- Customer Info --}}
            <div class="card">

                <div class="card-header d-flex align-items-center justify-content-between">

                    <h4 class="mb-0">
                        Customer Info
                    </h4>

                    <form action="{{ route('admin.customers.update-status', $customer->id) }}"
                        method="POST">

                        @csrf

                        <select name="status"
                            class="form-control form-control-sm d-inline w-auto"
                            onchange="this.form.submit()">

                            <option value="active" {{ $customer->status === 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive" {{ $customer->status === 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </form>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <strong>Customer Name</strong>
                            <p class="mb-0">{{ $customer->customer_name }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <strong>Business Name</strong>
                            <p class="mb-0">{{ $customer->business_name ?? '-' }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <strong>Email Id</strong>
                            <p class="mb-0">{{ $customer->email ?? '-' }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <strong>Mobile Number</strong>
                            <p class="mb-0">{{ $customer->mobile_number }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <strong>GST Number</strong>
                            <p class="mb-0">{{ $customer->gst_number ?? '-' }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <strong>Pin Code</strong>
                            <p class="mb-0">{{ $customer->pincode ?? '-' }}</p>
                        </div>

                        <div class="col-md-8 mb-3">
                            <strong>Full Address</strong>
                            <p class="mb-0">{{ $customer->address ?? '-' }}</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <strong>State / City</strong>
                            <p class="mb-0">
                                {{ $customer->state?->name ?? '-' }}, {{ $customer->city?->name ?? '-' }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- Proposals --}}
            <div class="card">

                <div class="card-header">
                    <h4 class="mb-0">
                        Proposals
                    </h4>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Proposal ID</th>
                                    <th>Total Products</th>
                                    <th>Total Cost</th>
                                    <th>Download</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($quotes as $quote)

                                    <tr>
                                        <td>{{ $quote->created_at->format('d M Y, h:i A') }}</td>
                                        <td>{{ $quote->proposal_id }}</td>
                                        <td>{{ $quote->items_count }}</td>
                                        <td>₹{{ number_format($quote->total_amount, 2) }}</td>
                                        <td>

                                            <a href="{{ route('admin.quotes.download', $quote->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-download"></i> PDF
                                            </a>

                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5"
                                            class="text-center py-4">
                                            No proposals found for this customer.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="card-footer">
                    {{ $quotes->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')