@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Bulk Order Enquiries
                    </li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover">

                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Category</th>
                                    <th>MOQ</th>
                                    <th>City</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($enquiries as $key => $item)

                                <tr id="row{{ $item->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->category->name ?? '-' }}</td>
                                    <td>{{ $item->moq }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>

                                    <td>
                                        <a href="{{ route('admin.supplier-enquiries.show', $item->id) }}"
                                            class="btn btn-info btn-sm">View</a>

                                        <form action="{{ route('admin.supplier-enquiries.destroy', $item->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                        <div class="mt-3">
                            {{ $enquiries->links() }}
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@include('admin.footer')