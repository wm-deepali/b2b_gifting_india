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
                        Manage Customers
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card">

                <div class="card-header d-flex align-items-center justify-content-between">

                    <h4 class="mb-0">
                        Manage Customers
                    </h4>

                    <form action="{{ route('admin.customers.index') }}"
                        method="GET"
                        class="d-flex">

                        <input type="text"
                            name="search"
                            class="form-control form-control-sm mr-2"
                            placeholder="Search business, email, mobile..."
                            value="{{ request('search') }}">

                        <button type="submit"
                            class="btn btn-sm btn-primary">
                            <i class="fa fa-search"></i>
                        </button>

                    </form>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Business Name</th>
                                    <th>Email Id</th>
                                    <th>Mobile Number</th>
                                    <th>Total Proposals</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($customers as $customer)

                                    <tr>
                                        <td>{{ $customer->created_at->format('d M Y, h:i A') }}</td>
                                        <td>{{ $customer->business_name ?? '-' }}</td>
                                        <td>{{ $customer->email ?? '-' }}</td>
                                        <td>{{ $customer->mobile_number }}</td>
                                        <td>{{ $customer->quotes_count }}</td>
                                        <td>

                                            @if($customer->status === 'active')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif

                                        </td>
                                        <td>

                                            <a href="{{ route('admin.customers.show', $customer->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-eye"></i> View
                                            </a>

                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7"
                                            class="text-center py-4">
                                            No customers found.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="card-footer">
                    {{ $customers->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')