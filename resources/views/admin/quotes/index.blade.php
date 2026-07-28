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

                    <li class="breadcrumb-item active">
                        Manage Quotes
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card">

                <div class="card-header d-flex align-items-center justify-content-between">

                    <h4 class="mb-0">
                        Manage Quotes
                    </h4>

                    <div class="d-flex">

                        <form action="{{ route('admin.quotes.index') }}"
                            method="GET"
                            class="d-flex mr-2">

                            <input type="text"
                                name="search"
                                class="form-control form-control-sm mr-2"
                                placeholder="Search Proposal ID, business, mobile..."
                                value="{{ request('search') }}">

                            <button type="submit"
                                class="btn btn-sm btn-primary">
                                <i class="fa fa-search"></i>
                            </button>

                        </form>

                        <a href="{{ route('admin.quotes.create') }}"
                            class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i> New Proposal
                        </a>

                    </div>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Proposal ID</th>
                                    <th>Business Name</th>
                                    <th>Mobile Number</th>
                                    <th>Total Products</th>
                                    <th>Total Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($quotes as $quote)

                                    <tr>
                                        <td>{{ $quote->created_at->format('d M Y, h:i A') }}</td>
                                        <td>{{ $quote->proposal_id }}</td>
                                        <td>{{ $quote->customer->business_name ?? '-' }}</td>
                                        <td>{{ $quote->customer->mobile_number ?? '-' }}</td>
                                        <td>{{ $quote->items_count }}</td>
                                        <td>₹{{ number_format($quote->total_amount, 2) }}</td>
                                        <td>

                                            <a href="{{ route('admin.quotes.preview', $quote->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-eye"></i> View
                                            </a>

                                            <a href="{{ route('admin.quotes.download', $quote->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-download"></i> PDF
                                            </a>

                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7"
                                            class="text-center py-4">
                                            No proposals found.
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