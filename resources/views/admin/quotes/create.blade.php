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
                        New Proposal
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.quotes.store') }}" method="POST" id="quoteForm">

                @csrf

                {{-- Mobile Search --}}
                <div class="card">

                    <div class="card-header">
                        <h4 class="mb-0">Search Customer</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group mb-0">

                                    <label>Mobile Number</label>

                                    <div class="input-group">

                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control"
                                            maxlength="15" required>

                                        <div class="input-group-append">
                                            <button type="button" id="searchCustomerBtn" class="btn btn-primary">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group mb-0">

                                    <label>Or Search by Email</label>

                                    <div class="input-group">

                                        <input type="email" id="searchEmail" class="form-control"
                                            placeholder="customer@example.com">

                                        <div class="input-group-append">
                                            <button type="button" id="searchByEmailBtn" class="btn btn-primary">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4 d-flex align-items-end">
                                <small id="customerSearchStatus" class="text-muted"></small>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Customer Info --}}
                <div class="card">

                    <div class="card-header">
                        <h4 class="mb-0">Customer Info</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control"
                                        required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input type="text" name="business_name" id="business_name" class="form-control">
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Email Id</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>GST Number</label>
                                    <input type="text" name="gst_number" id="gst_number" class="form-control">
                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Full Address</label>
                                    <textarea name="address" id="address" rows="2" class="form-control"></textarea>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>State</label>

                                    <select name="state_id" id="state_id" class="form-control">

                                        <option value="">Select State</option>

                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>City</label>

                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value="">Select City</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Pin Code</label>
                                    <input type="text" name="pincode" id="pincode" class="form-control" maxlength="10">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Products --}}
                <div class="card">

                    <div class="card-header">
                        <h4 class="mb-0">Add Products</h4>
                    </div>

                    <div class="card-body">

                        <div class="row align-items-end">

                            <div class="col-md-5 position-relative">

                                <div class="form-group mb-0">
                                    <label>Search Product</label>
                                    <input type="text" id="productSearch" class="form-control"
                                        placeholder="Type product name..." autocomplete="off">
                                </div>

                                <div id="productSearchResults" class="list-group position-absolute w-100"
                                    style="z-index: 999; max-height: 250px; overflow-y: auto;"></div>

                            </div>

                            <div class="col-md-2">

                                <div class="form-group mb-0">
                                    <label>Price</label>
                                    <input type="number" id="selectedPrice" class="form-control" step="0.01" min="0">
                                </div>

                            </div>

                            <div class="col-md-2">

                                <div class="form-group mb-0">
                                    <label>Quantity</label>
                                    <input type="number" id="selectedQty" class="form-control" value="1" min="1">
                                </div>

                            </div>

                            <div class="col-md-3">

                                <button type="button" id="addProductBtn" class="btn btn-success btn-block" disabled>
                                    <i class="fa fa-plus"></i> Add More
                                </button>

                            </div>

                        </div>

                        <hr>

                        <div class="table-responsive">

                            <table class="table table-bordered mb-0" id="itemsTable">

                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th width="120">Price</th>
                                        <th width="100">Qty</th>
                                        <th width="140">Total</th>
                                        <th width="60">Remove</th>
                                    </tr>
                                </thead>

                                <tbody id="itemsTableBody">
                                    <tr id="noItemsRow">
                                        <td colspan="5" class="text-center text-muted">
                                            No products added yet.
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>

                        <div id="hiddenItemsContainer"></div>

                        <small id="itemsError" class="text-danger"></small>

                    </div>

                </div>

                <div class="card">

                    <div class="card-footer text-right">

                        <button type="submit" class="btn btn-primary">
                            Next <i class="fa fa-arrow-right"></i>
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {

        var itemIndex = 0;
        var itemsCount = 0;
        var selectedProduct = null;

        // ---------- Customer search (by mobile or email) ----------
        function searchCustomer(term) {

            if (!term) {
                return;
            }

            $('#customerSearchStatus').removeClass('text-success text-danger').text('Searching...');

            $.get('{{ route('admin.quotes.search-customer') }}', { search: term }, function (res) {

                if (res.found) {

                    var c = res.customer;

                    $('#mobile_number').val(c.mobile_number);
                    $('#customer_name').val(c.customer_name);
                    $('#business_name').val(c.business_name);
                    $('#email').val(c.email);
                    $('#gst_number').val(c.gst_number);
                    $('#address').val(c.address);
                    $('#pincode').val(c.pincode);
                    $('#state_id').val(c.state_id);

                    var $city = $('#city_id');
                    $city.html('<option value="">Select City</option>');

                    $.each(res.cities, function (i, city) {
                        var selected = (city.id == c.city_id) ? 'selected' : '';
                        $city.append('<option value="' + city.id + '" ' + selected + '>' + city.name + '</option>');
                    });

                    $('#customerSearchStatus')
                        .addClass('text-success')
                        .text('Existing customer found — details auto-filled.');

                } else {

                    $('#customer_name').val('');
                    $('#business_name').val('');
                    $('#email').val('');
                    $('#gst_number').val('');
                    $('#address').val('');
                    $('#pincode').val('');
                    $('#state_id').val('');
                    $('#city_id').html('<option value="">Select City</option>');

                    $('#customerSearchStatus')
                        .addClass('text-danger')
                        .text('New customer — please fill in the details below.');
                }

            });
        }

        $('#searchCustomerBtn').on('click', function () {
            searchCustomer($('#mobile_number').val().trim());
        });

        $('#searchByEmailBtn').on('click', function () {
            searchCustomer($('#searchEmail').val().trim());
        });

        // ---------- Dependent State -> City dropdown ----------
        $('#state_id').on('change', function () {

            var stateId = $(this).val();
            var $city = $('#city_id');

            $city.html('<option value="">Select City</option>');

            if (!stateId) {
                return;
            }

            $.get('{{ route('admin.quote-settings.get-cities', ':state_id') }}'.replace(':state_id', stateId), function (cities) {

                $.each(cities, function (i, city) {
                    $city.append('<option value="' + city.id + '">' + city.name + '</option>');
                });

            });

        });

        // ---------- Product search ----------
        var searchTimer = null;

        $('#productSearch').on('keyup', function () {

            var term = $(this).val().trim();
            var $results = $('#productSearchResults');

            clearTimeout(searchTimer);

            if (term.length < 2) {
                $results.empty();
                return;
            }

            searchTimer = setTimeout(function () {

                $.get('{{ route('admin.quotes.search-products') }}', { term: term }, function (products) {

                    $results.empty();

                    if (products.length === 0) {
                        $results.append('<div class="list-group-item">No products found.</div>');
                        return;
                    }

                    $.each(products, function (i, product) {

                        var $item = $('<a href="javascript:void(0);" class="list-group-item list-group-item-action"></a>')
                            .text(product.name)
                            .data('product', product);

                        $results.append($item);

                    });

                });

            }, 300);

        });

        $(document).on('click', '#productSearchResults a', function () {

            selectedProduct = $(this).data('product');

            $('#productSearch').val(selectedProduct.name);
            $('#productSearchResults').empty();
            $('#selectedPrice').val(selectedProduct.price);
            $('#selectedQty').val(1);
            $('#addProductBtn').prop('disabled', false);

        });

        // ---------- Add product to items table ----------
        $('#addProductBtn').on('click', function () {

            if (!selectedProduct) {
                return;
            }

            var price = parseFloat($('#selectedPrice').val()) || 0;
            var qty = parseInt($('#selectedQty').val()) || 1;
            var total = price * qty;
            var index = itemIndex++;

            itemsCount++;
            $('#noItemsRow').remove();

            var rowHtml = '<tr id="itemRow' + index + '">'
                + '<td>' + selectedProduct.name + '</td>'
                + '<td>' + price.toFixed(2) + '</td>'
                + '<td>' + qty + '</td>'
                + '<td>' + total.toFixed(2) + '</td>'
                + '<td><button type="button" class="btn btn-sm btn-danger removeItemBtn" data-index="' + index + '"><i class="fa fa-trash"></i></button></td>'
                + '</tr>';

            $('#itemsTableBody').append(rowHtml);

            var hiddenHtml = ''
                + '<input type="hidden" name="items[' + index + '][product_id]" value="' + (selectedProduct.id ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][product_name]" value="' + selectedProduct.name + '">'
                + '<input type="hidden" name="items[' + index + '][product_image]" value="' + (selectedProduct.image ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][product_detail]" value="' + $('<div>').text(selectedProduct.detail ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][price]" value="' + price + '">'
                + '<input type="hidden" name="items[' + index + '][quantity]" value="' + qty + '">';

            $('#hiddenItemsContainer').append('<div id="itemHidden' + index + '">' + hiddenHtml + '</div>');

            // reset selection
            selectedProduct = null;
            $('#productSearch').val('');
            $('#selectedPrice').val('');
            $('#selectedQty').val(1);
            $('#addProductBtn').prop('disabled', true);
            $('#itemsError').text('');

        });

        // ---------- Remove item ----------
        $(document).on('click', '.removeItemBtn', function () {

            var index = $(this).data('index');

            $('#itemRow' + index).remove();
            $('#itemHidden' + index).remove();

            itemsCount--;

            if (itemsCount === 0) {
                $('#itemsTableBody').append('<tr id="noItemsRow"><td colspan="5" class="text-center text-muted">No products added yet.</td></tr>');
            }

        });

        // ---------- Prevent submit without items ----------
        $('#quoteForm').on('submit', function (e) {

            if (itemsCount === 0) {
                e.preventDefault();
                $('#itemsError').text('Please add at least one product before proceeding.');
            }

        });

    });
</script>