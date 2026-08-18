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

                {{-- Customer Search --}}
                <div class="card">

                    <div class="card-header">
                        <h4 class="mb-0">Search Customer</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group mb-0">

                                    <label>Search by Mobile Number or Email</label>

                                    <div class="input-group">

                                        <input type="text" id="customerSearchTerm" class="form-control"
                                            placeholder="Enter mobile number or email">

                                        <div class="input-group-append">
                                            <button type="button" id="searchCustomerBtn" class="btn btn-primary">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 d-flex align-items-end">
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
                                    <label>Name</label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control"
                                        required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Company Name</label>
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
                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile_number" id="mobile_number" class="form-control"
                                        maxlength="15" required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>GSTIN</label>
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

                            <div class="col-md-4 position-relative">

                                <div class="form-group mb-0">
                                    <label>Search Product</label>
                                    <input type="text" id="productSearch" class="form-control"
                                        placeholder="Type product name..." autocomplete="off">
                                </div>

                                <div id="productSearchResults" class="list-group position-absolute w-100"
                                    style="z-index: 999; max-height: 250px; overflow-y: auto;"></div>

                            </div>

                            <div class="col-md-2">
                                <label class="d-block">&nbsp;</label>
                                <button type="button" id="optionsBtn" class="btn btn-outline-primary btn-block"
                                    disabled>
                                    <i class="fa fa-cog"></i> Options
                                </button>
                            </div>

                            <div class="col-md-1">
                                <label class="mb-0 small">Qty</label>
                                <input type="text" id="stagedQty" class="form-control" value="-" readonly>
                            </div>

                            <div class="col-md-1">
                                <label class="mb-0 small">Price</label>
                                <input type="text" id="stagedPrice" class="form-control" value="-" readonly>
                            </div>

                            <div class="col-md-1">
                                <label class="mb-0 small">Tax</label>
                                <input type="text" id="stagedTax" class="form-control" value="-" readonly>
                            </div>

                            <div class="col-md-1">
                                <label class="mb-0 small">Total</label>
                                <input type="text" id="stagedTotal" class="form-control" value="-" readonly>
                            </div>

                            <div class="col-md-2">
                                <label class="d-block">&nbsp;</label>
                                <button type="button" id="addProductBtn" class="btn btn-success btn-block" disabled>
                                    <i class="fa fa-plus"></i> Add More
                                </button>
                            </div>

                        </div>

                        <small class="text-muted d-block mt-1">
                            Product select karke "Options" pe click karein — Quantity, Price, Tax waha se set hoga.
                        </small>

                        <hr>

                        <div class="table-responsive">

                            <table class="table table-bordered mb-0" id="itemsTable">

                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th width="90">Options</th>
                                        <th width="80">Qty</th>
                                        <th width="110">Price</th>
                                        <th width="90">Tax</th>
                                        <th width="120">Total</th>
                                        <th width="60">Remove</th>
                                    </tr>
                                </thead>

                                <tbody id="itemsTableBody">
                                    <tr id="noItemsRow">
                                        <td colspan="7" class="text-center text-muted">
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

{{-- Options Modal (shared for staging + editing) --}}
<div class="modal fade" id="optionsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Product Options</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Product Detail</label>
                            <textarea id="opt_detail" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Brand</label>
                            <select id="opt_brand_id" class="form-control">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Customisation: clickable chip/tag toggles instead of multi-select --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Customisation</label>

                            <div class="customization-checkbox-list border rounded p-2 d-flex flex-wrap"
                                style="max-height: 140px; overflow-y: auto; gap: 6px;">

                                @forelse($customizations as $customization)
                                    <label class="customization-chip btn btn-sm btn-outline-secondary mb-0"
                                        for="custom_{{ $customization->id }}" style="cursor: pointer;">
                                        <input type="checkbox" class="customization-checkbox d-none"
                                            id="custom_{{ $customization->id }}" value="{{ $customization->id }}">
                                        {{ $customization->name }}
                                    </label>
                                @empty
                                    <small class="text-muted">No customisations available.</small>
                                @endforelse

                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>SKU Code</label>
                            <input type="text" id="opt_sku_code" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>HSN Code</label>
                            <input type="text" id="opt_hsn_code" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Colour</label>
                            <input type="text" id="opt_colour" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" id="opt_quantity" class="form-control" min="1" value="1">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" id="opt_price" class="form-control" step="0.01" min="0">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Taxes</label>
                            <select id="opt_tax_percentage" class="form-control">
                                <option value="0">0%</option>
                                <option value="5" selected>5%</option>
                                <option value="12">12%</option>
                                <option value="18">18%</option>
                                <option value="28">28%</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="d-block">Total (preview)</label>
                            <input type="text" id="opt_total_preview" class="form-control" readonly value="0.00">
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="optionsSubmitBtn" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script>
    $(function () {

        var itemIndex = 0;
        var itemsCount = 0;
        var selectedProduct = null;   // product chosen from search, not yet added
        var stagedItem = null;        // options filled for selectedProduct, before "Add More"
        var items = {};               // index -> full data of items already added
        var modalMode = null;         // 'stage' or 'edit'
        var editIndex = null;

        function calcTotal(price, qty, taxPercentage) {
            var subtotal = price * qty;
            var taxAmount = subtotal * (taxPercentage / 100);
            return {
                subtotal: subtotal,
                taxAmount: taxAmount,
                total: subtotal + taxAmount,
            };
        }

        // live preview inside modal
        function updateModalPreview() {
            var price = parseFloat($('#opt_price').val()) || 0;
            var qty = parseInt($('#opt_quantity').val()) || 0;
            var tax = parseFloat($('#opt_tax_percentage').val()) || 0;
            var calc = calcTotal(price, qty, tax);
            $('#opt_total_preview').val(calc.total.toFixed(2));
        }

        $('#opt_price, #opt_quantity, #opt_tax_percentage').on('input change', updateModalPreview);

        // keep chip's visual (active/inactive) state in sync with its checkbox
        $(document).on('change', '.customization-checkbox', function () {
            $(this).closest('.customization-chip')
                .toggleClass('btn-primary text-white', this.checked)
                .toggleClass('btn-outline-secondary', !this.checked);
        });

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

                    // Prefill whichever field matches what the user searched with
                    if (term.indexOf('@') !== -1) {
                        $('#email').val(term);
                        $('#mobile_number').val('');
                    } else {
                        $('#mobile_number').val(term);
                        $('#email').val('');
                    }

                    $('#customer_name').val('');
                    $('#business_name').val('');
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
            searchCustomer($('#customerSearchTerm').val().trim());
        });

        $('#customerSearchTerm').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                searchCustomer($(this).val().trim());
            }
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
            stagedItem = null;

            $('#productSearch').val(selectedProduct.name);
            $('#productSearchResults').empty();

            $('#optionsBtn').prop('disabled', false);
            $('#addProductBtn').prop('disabled', true);

            $('#stagedQty').val('-');
            $('#stagedPrice').val('-');
            $('#stagedTax').val('-');
            $('#stagedTotal').val('-');

        });

        // ---------- Open Options modal for staging (new item) ----------
        $('#optionsBtn').on('click', function () {

            if (!selectedProduct) {
                return;
            }

            modalMode = 'stage';
            editIndex = null;

            var base = stagedItem || {
                detail: selectedProduct.detail || '',
                brand_id: selectedProduct.brand_id || '',
                customization_ids: selectedProduct.customization_ids || [],
                sku_code: selectedProduct.sku || '',
                hsn_code: '',
                colour: '',
                quantity: 1,
                price: selectedProduct.price || 0,
                tax_percentage: 5,
            };

            fillModal(base);

            $('#optionsModal').modal('show');

        });

        // ---------- Open Options modal for editing an already-added row ----------
        $(document).on('click', '.rowOptionsBtn', function () {

            var index = $(this).data('index');
            var data = items[index];

            if (!data) {
                return;
            }

            modalMode = 'edit';
            editIndex = index;

            fillModal(data);

            $('#optionsModal').modal('show');

        });

        function fillModal(data) {

            $('#opt_detail').val(data.detail || '');
            $('#opt_brand_id').val(data.brand_id || '');

            // check the customization checkboxes that match this item's saved ids,
            // and sync the chip's visual state too
            var selectedIds = (data.customization_ids || []).map(String);

            $('.customization-checkbox').each(function () {
                var isChecked = selectedIds.indexOf(String($(this).val())) !== -1;
                $(this).prop('checked', isChecked);
                $(this).closest('.customization-chip')
                    .toggleClass('btn-primary text-white', isChecked)
                    .toggleClass('btn-outline-secondary', !isChecked);
            });

            $('#opt_sku_code').val(data.sku_code || '');
            $('#opt_hsn_code').val(data.hsn_code || '');
            $('#opt_colour').val(data.colour || '');
            $('#opt_quantity').val(data.quantity || 1);
            $('#opt_price').val(data.price || 0);
            $('#opt_tax_percentage').val(data.tax_percentage || 5);

            updateModalPreview();

        }
        // ---------- Options modal submit ----------
        $('#optionsSubmitBtn').on('click', function () {

            var quantity = parseInt($('#opt_quantity').val()) || 0;
            var price = parseFloat($('#opt_price').val()) || 0;

            if (quantity < 1) {
                alert('Quantity kam se kam 1 honi chahiye.');
                return;
            }

            if (price < 0) {
                alert('Price sahi daalein.');
                return;
            }

            var customizationIds = [];

            $('.customization-checkbox:checked').each(function () {
                customizationIds.push($(this).val());
            });

            var data = {
                detail: $('#opt_detail').val(),
                brand_id: $('#opt_brand_id').val(),
                customization_ids: customizationIds,
                sku_code: $('#opt_sku_code').val(),
                hsn_code: $('#opt_hsn_code').val(),
                colour: $('#opt_colour').val(),
                quantity: quantity,
                price: price,
                tax_percentage: parseFloat($('#opt_tax_percentage').val()) || 0,
            };

            var calc = calcTotal(data.price, data.quantity, data.tax_percentage);

            if (modalMode === 'stage') {

                stagedItem = data;

                $('#stagedQty').val(data.quantity);
                $('#stagedPrice').val(data.price.toFixed(2));
                $('#stagedTax').val(data.tax_percentage + '%');
                $('#stagedTotal').val(calc.total.toFixed(2));

                $('#addProductBtn').prop('disabled', false);

            } else if (modalMode === 'edit' && editIndex !== null) {

                items[editIndex] = $.extend({}, items[editIndex], data);
                items[editIndex].total = calc.total;

                updateTableRow(editIndex, items[editIndex]);
                updateHiddenInputs(editIndex, items[editIndex]);

            }

            $('#optionsModal').modal('hide');

        });

        // ---------- Add product to items table ----------
        $('#addProductBtn').on('click', function () {

            if (!selectedProduct || !stagedItem) {
                return;
            }

            var index = itemIndex++;
            itemsCount++;
            $('#noItemsRow').remove();

            var calc = calcTotal(stagedItem.price, stagedItem.quantity, stagedItem.tax_percentage);

            var itemData = $.extend({}, stagedItem, {
                product_id: selectedProduct.id || '',
                product_name: selectedProduct.name,
                product_image: selectedProduct.image || '',
                total: calc.total,
            });

            items[index] = itemData;

            var rowHtml = '<tr id="itemRow' + index + '">'
                + '<td class="itemProductName">' + itemData.product_name + '</td>'
                + '<td><button type="button" class="btn btn-sm btn-outline-primary rowOptionsBtn" data-index="' + index + '"><i class="fa fa-cog"></i></button></td>'
                + '<td class="itemQty">' + itemData.quantity + '</td>'
                + '<td class="itemPrice">' + itemData.price.toFixed(2) + '</td>'
                + '<td class="itemTax">' + itemData.tax_percentage + '%</td>'
                + '<td class="itemTotal">' + calc.total.toFixed(2) + '</td>'
                + '<td><button type="button" class="btn btn-sm btn-danger removeItemBtn" data-index="' + index + '"><i class="fa fa-trash"></i></button></td>'
                + '</tr>';

            $('#itemsTableBody').append(rowHtml);

            updateHiddenInputs(index, itemData);

            // reset staging
            selectedProduct = null;
            stagedItem = null;
            $('#productSearch').val('');
            $('#optionsBtn').prop('disabled', true);
            $('#addProductBtn').prop('disabled', true);
            $('#stagedQty').val('-');
            $('#stagedPrice').val('-');
            $('#stagedTax').val('-');
            $('#stagedTotal').val('-');
            $('#itemsError').text('');

        });

        function updateTableRow(index, data) {

            var calc = calcTotal(data.price, data.quantity, data.tax_percentage);
            data.total = calc.total;

            var $row = $('#itemRow' + index);
            $row.find('.itemQty').text(data.quantity);
            $row.find('.itemPrice').text(data.price.toFixed(2));
            $row.find('.itemTax').text(data.tax_percentage + '%');
            $row.find('.itemTotal').text(calc.total.toFixed(2));

        }

        function updateHiddenInputs(index, data) {

            var customizationInputs = '';

            $.each(data.customization_ids || [], function (i, id) {
                customizationInputs += '<input type="hidden" name="items[' + index + '][customization_ids][]" value="' + id + '">';
            });

            var hiddenHtml = ''
                + '<input type="hidden" name="items[' + index + '][product_id]" value="' + (data.product_id ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][product_name]" value="' + data.product_name + '">'
                + '<input type="hidden" name="items[' + index + '][product_image]" value="' + (data.product_image ?? '') + '">'
                + '<input type="hidden" name="items[' + index + '][product_detail]" value="' + $('<div>').text(data.detail ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][brand_id]" value="' + (data.brand_id ?? '') + '">'
                + customizationInputs
                + '<input type="hidden" name="items[' + index + '][sku_code]" value="' + $('<div>').text(data.sku_code ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][hsn_code]" value="' + $('<div>').text(data.hsn_code ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][colour]" value="' + $('<div>').text(data.colour ?? '').html() + '">'
                + '<input type="hidden" name="items[' + index + '][price]" value="' + data.price + '">'
                + '<input type="hidden" name="items[' + index + '][quantity]" value="' + data.quantity + '">'
                + '<input type="hidden" name="items[' + index + '][tax_percentage]" value="' + data.tax_percentage + '">';

            $('#itemHidden' + index).remove();
            $('#hiddenItemsContainer').append('<div id="itemHidden' + index + '">' + hiddenHtml + '</div>');

        }

        // ---------- Remove item ----------
        $(document).on('click', '.removeItemBtn', function () {

            var index = $(this).data('index');

            $('#itemRow' + index).remove();
            $('#itemHidden' + index).remove();
            delete items[index];

            itemsCount--;

            if (itemsCount === 0) {
                $('#itemsTableBody').append('<tr id="noItemsRow"><td colspan="7" class="text-center text-muted">No products added yet.</td></tr>');
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