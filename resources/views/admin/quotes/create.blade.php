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

        @if($draft ?? false)
            <div class="d-flex align-items-center justify-content-between mb-3 wm-draft-banner">
                <span><i class="fa fa-info-circle"></i> Your previous draft has been restored — the form below has been
                    pre-filled.</span>
                <form action="{{ route('admin.quotes.discard', $quoteId) }}" method="POST" class="mb-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Discard &amp; Start Fresh</button>
                </form>
            </div>
        @endif

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.quotes.store') }}" method="POST" id="quoteForm">

                @csrf
                @if($quoteId ?? null)
                    <input type="hidden" name="quote_id" value="{{ $quoteId }}">
                @endif

                {{-- Customer Search --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Search Customer</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group mb-0 wm-form-group">

                                    <label class="wm-label">Search by Mobile Number or Email</label>

                                    <div class="input-group wm-search-group">

                                        <input type="text" id="customerSearchTerm" class="form-control wm-input"
                                            placeholder="Enter mobile number or email">

                                        <div class="input-group-append">
                                            <button type="button" id="searchCustomerBtn"
                                                class="btn btn-primary wm-btn-primary">
                                                <i class="fa fa-search"></i> Search
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 d-flex align-items-end">
                                <small id="customerSearchStatus" class="text-muted wm-search-status"></small>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Customer Info --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Customer Info</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row">

                            {{-- Left column --}}
                            <div class="col-md-6">

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Name</label>
                                    <input type="text" name="customer_name" id="customer_name"
                                        class="form-control wm-input" required>
                                </div>

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Company Name</label>
                                    <input type="text" name="business_name" id="business_name"
                                        class="form-control wm-input">
                                </div>

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Mobile Number</label>
                                    <input type="text" name="mobile_number" id="mobile_number"
                                        class="form-control wm-input" maxlength="15" required>
                                </div>

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Email Id</label>
                                    <input type="email" name="email" id="email" class="form-control wm-input">
                                </div>

                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">GSTIN</label>
                                    <input type="text" name="gst_number" id="gst_number" class="form-control wm-input">
                                </div>

                            </div>

                            {{-- Right column --}}
                            <div class="col-md-6">

                                <div class="form-group wm-form-group">
                                    <label class="wm-label">Full Address</label>
                                    <textarea name="address" id="address" rows="2"
                                        class="form-control wm-input"></textarea>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">State</label>

                                            <select name="state_id" id="state_id" class="form-control wm-input">

                                                <option value="">Select State</option>

                                                @foreach($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group">

                                            <label class="wm-label">City</label>

                                            <select name="city_id" id="city_id" class="form-control wm-input">
                                                <option value="">Select City</option>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Pin Code</label>
                                            <input type="text" name="pincode" id="pincode" class="form-control wm-input"
                                                maxlength="10">
                                        </div>

                                    </div>


                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <div class="form-group wm-form-group mb-0">
                                            <label class="wm-label">Prepared By</label>
                                            <input type="text" name="prepared_by" id="prepared_by"
                                                class="form-control wm-input" placeholder="Enter name">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Products --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Add Products</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row align-items-end">

                            <div class="col-md-8 position-relative">

                                <div class="form-group mb-0 wm-form-group">
                                    <label class="wm-label">Search Product</label>
                                    <input type="text" id="productSearch" class="form-control wm-input"
                                        placeholder="Type product name..." autocomplete="off">
                                </div>

                                <div id="productSearchResults"
                                    class="list-group position-absolute w-100 wm-search-dropdown"
                                    style="z-index: 999; max-height: 250px; overflow-y: auto;"></div>

                            </div>

                            <div class="col-md-2">
                                <label class="d-block wm-label">&nbsp;</label>
                                <button type="button" id="optionsBtn"
                                    class="btn btn-outline-primary btn-block wm-btn-outline" disabled>
                                    <i class="fa fa-cog"></i> Options
                                </button>
                            </div>

                            <div class="col-md-2">
                                <label class="d-block wm-label">&nbsp;</label>
                                <button type="button" id="addProductBtn"
                                    class="btn btn-success btn-block wm-btn-success" disabled>
                                    <i class="fa fa-plus"></i> Add More
                                </button>
                            </div>

                        </div>

                        <div class="row align-items-end mt-3">

                            <div class="col-md-3">
                                <label class="mb-0 small wm-label">Qty</label>
                                <input type="text" id="stagedQty" class="form-control wm-input wm-input-readonly"
                                    value="-" readonly>
                            </div>

                            <div class="col-md-3">
                                <label class="mb-0 small wm-label">Price</label>
                                <input type="text" id="stagedPrice" class="form-control wm-input wm-input-readonly"
                                    value="-" readonly>
                            </div>

                            <div class="col-md-3">
                                <label class="mb-0 small wm-label">Tax</label>
                                <input type="text" id="stagedTax" class="form-control wm-input wm-input-readonly"
                                    value="-" readonly>
                            </div>

                            <div class="col-md-3">
                                <label class="mb-0 small wm-label">Total</label>
                                <input type="text" id="stagedTotal" class="form-control wm-input wm-input-readonly"
                                    value="-" readonly>
                            </div>

                        </div>

                        <small class="text-muted d-block mt-1 wm-hint">
                            Select a product and click "Options" to configure the Quantity, Price, and Tax.
                        </small>

                        <hr class="wm-divider">

                        <div class="table-responsive">

                            <table class="table table-bordered mb-0 wm-quotes-table" id="itemsTable">

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
                                        <td colspan="7" class="text-center text-muted wm-empty-state">
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

                {{-- Additional Charges (Packing & Shipping) --}}
                <div class="card wm-quotes-card mb-4">

                    <div class="card-header wm-quotes-header">
                        <h4 class="mb-0 wm-quotes-title">Additional Charges</h4>
                    </div>

                    <div class="card-body wm-form-body">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Packing Charges</label>
                                    <input type="number" name="packing_charges" id="packing_charges"
                                        class="form-control wm-input" step="0.01" min="0" value="0">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group wm-form-group mb-0">
                                    <label class="wm-label">Shipping Charges</label>
                                    <input type="number" name="shipping_charges" id="shipping_charges"
                                        class="form-control wm-input" step="0.01" min="0" value="0">
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="card wm-quotes-card">

                    <div class="card-footer text-right wm-quotes-footer">

                        <button type="submit" class="btn btn-primary wm-btn-primary">
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
        <div class="modal-content wm-modal-content">

            <div class="modal-header wm-modal-header">
                <h5 class="modal-title wm-modal-title">Product Options</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body wm-modal-body">

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group wm-form-group">
                            <label class="wm-label">Product Detail</label>
                            <textarea id="opt_detail" rows="3" class="form-control wm-input"></textarea>
                        </div>
                    </div>

                    {{-- Left column: SKU, HSN, Colour --}}
                    <div class="col-md-6">

                        <div class="form-group wm-form-group">
                            <label class="wm-label">SKU Code</label>
                            <input type="text" id="opt_sku_code" class="form-control wm-input">
                        </div>

                        <div class="form-group wm-form-group">
                            <label class="wm-label">HSN Code</label>
                            <input type="text" id="opt_hsn_code" class="form-control wm-input">
                        </div>

                        <div class="form-group wm-form-group mb-0">
                            <label class="wm-label">Colour</label>
                            <input type="text" id="opt_colour" class="form-control wm-input">
                        </div>

                    </div>

                    {{-- Right column: Brand, Customisation --}}
                    <div class="col-md-6">

                        <div class="form-group wm-form-group">
                            <label class="wm-label">Select Brand</label>
                           <select id="opt_brand_id" class="form-control wm-input">
                                <option value="">Select Brand</option>
                                <option value="__add_new__">+ Add New Brand</option>
                                <option disabled>──────────</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>

                            <div id="newBrandGroup" class="input-group mt-2" style="display:none;">
                                <input type="text" id="newBrandName" class="form-control wm-input"
                                    placeholder="Enter new brand name">
                                <div class="input-group-append">
                                    <button type="button" id="saveNewBrandBtn" class="btn btn-sm wm-btn-primary">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Customisation: clickable chip/tag toggles instead of multi-select --}}
                        <div class="form-group wm-form-group mb-0">
                            <label class="wm-label">Select Customisation</label>

                            <div class="customization-checkbox-list border rounded p-2 d-flex flex-wrap wm-chip-list"
                                style="max-height: 140px; overflow-y: auto; gap: 6px;">

                                @forelse($customizations as $customization)
                                    <label class="customization-chip btn btn-sm btn-outline-secondary mb-0 wm-chip"
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

                    <div class="col-md-3">
                        <div class="form-group wm-form-group">
                            <label class="wm-label">Quantity</label>
                            <input type="number" id="opt_quantity" class="form-control wm-input" min="1" value="1">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group wm-form-group">
                            <label class="wm-label">Price</label>
                            <input type="number" id="opt_price" class="form-control wm-input" step="0.01" min="0">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group wm-form-group">
                            <label class="wm-label">Taxes</label>
                            <select id="opt_tax_percentage" class="form-control wm-input">
                                <option value="0">0%</option>
                                <option value="5" selected>5%</option>
                                <option value="12">12%</option>
                                <option value="18">18%</option>
                                <option value="28">28%</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group wm-form-group">
                            <label class="d-block wm-label">Total (preview)</label>
                            <input type="text" id="opt_total_preview" class="form-control wm-input wm-input-readonly"
                                readonly value="0.00">
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer wm-modal-footer">
                <button type="button" class="btn btn-secondary wm-btn-cancel" data-dismiss="modal">Cancel</button>
                <button type="button" id="optionsSubmitBtn" class="btn btn-primary wm-btn-primary">Submit</button>
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
        var draftData = @json($draft ?? null); // session draft data, if resuming an edit

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

            $('#newBrandGroup').hide();
            $('#newBrandName').val('');

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

        // ---------- Inline "+ Add New Brand" from Options modal ----------
        $('#opt_brand_id').on('change', function () {

            if ($(this).val() === '__add_new__') {
                $('#newBrandGroup').show();
                $('#newBrandName').focus();
            } else {
                $('#newBrandGroup').hide();
            }

        });

        $('#saveNewBrandBtn').on('click', function () {

            var name = $('#newBrandName').val().trim();

            if (!name) {
                alert('Please enter a brand name.');
                return;
            }

            $.post('{{ route('admin.quotes.store-brand') }}', {
                _token: '{{ csrf_token() }}',
                name: name,
            }, function (brand) {

                var $option = $('<option></option>').val(brand.id).text(brand.name);
                $('#opt_brand_id option[value="__add_new__"]').before($option);
                $('#opt_brand_id').val(brand.id);

                $('#newBrandGroup').hide();
                $('#newBrandName').val('');

            }).fail(function (xhr) {
                var msg = (xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.name)
                    ? xhr.responseJSON.errors.name[0]
                    : 'Could not add brand — it may already exist.';
                alert(msg);
            });

        });

        // ---------- Options modal submit ----------
        $('#optionsSubmitBtn').on('click', function () {

            var quantity = parseInt($('#opt_quantity').val()) || 0;
            var price = parseFloat($('#opt_price').val()) || 0;

            if (quantity < 1) {
                alert('Quantity must be at least 1.');
                return;
            }

            if (price < 0) {
                alert('Please enter a valid price.');
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

        // ---------- Shared: add a fully-formed item row to the table ----------
        // Used both by "Add More" (fresh product) and by the draft prefill
        // (rehydrating rows already saved in the session).
        function addItemRow(itemData) {

            var index = itemIndex++;
            itemsCount++;
            $('#noItemsRow').remove();

            var normalized = {
                product_id: itemData.product_id || '',
                product_name: itemData.product_name,
                product_image: itemData.product_image || '',
                detail: itemData.product_detail || itemData.detail || '',
                brand_id: itemData.brand_id || '',
                customization_ids: itemData.customization_ids || [],
                sku_code: itemData.sku_code || '',
                hsn_code: itemData.hsn_code || '',
                colour: itemData.colour || '',
                quantity: parseInt(itemData.quantity) || 1,
                price: parseFloat(itemData.price) || 0,
                tax_percentage: parseFloat(itemData.tax_percentage) || 0,
            };

            var calc = calcTotal(normalized.price, normalized.quantity, normalized.tax_percentage);
            normalized.total = calc.total;

            items[index] = normalized;

            var rowHtml = '<tr id="itemRow' + index + '">'
                + '<td class="itemProductName">' + normalized.product_name + '</td>'
                + '<td><button type="button" class="btn btn-sm btn-outline-primary rowOptionsBtn" data-index="' + index + '"><i class="fa fa-cog"></i></button></td>'
                + '<td class="itemQty">' + normalized.quantity + '</td>'
                + '<td class="itemPrice">' + normalized.price.toFixed(2) + '</td>'
                + '<td class="itemTax">' + normalized.tax_percentage + '%</td>'
                + '<td class="itemTotal">' + calc.total.toFixed(2) + '</td>'
                + '<td><button type="button" class="btn btn-sm btn-danger removeItemBtn" data-index="' + index + '"><i class="fa fa-trash"></i></button></td>'
                + '</tr>';

            $('#itemsTableBody').append(rowHtml);

            updateHiddenInputs(index, normalized);

        }

        // ---------- Add product to items table ----------
        $('#addProductBtn').on('click', function () {

            if (!selectedProduct || !stagedItem) {
                return;
            }

            var itemData = $.extend({}, stagedItem, {
                product_id: selectedProduct.id || '',
                product_name: selectedProduct.name,
                product_image: selectedProduct.image || '',
            });

            addItemRow(itemData);

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
                $('#itemsTableBody').append('<tr id="noItemsRow"><td colspan="7" class="text-center text-muted wm-empty-state">No products added yet.</td></tr>');
            }

        });

        // ---------- Prevent submit without items ----------
        $('#quoteForm').on('submit', function (e) {

            if (itemsCount === 0) {
                e.preventDefault();
                $('#itemsError').text('Please add at least one product before proceeding.');
            }

        });

        // ---------- Prefill form from session draft (true "Edit" flow) ----------
        function prefillFromDraft(draft) {

            if (!draft) {
                return;
            }

            $('#customer_name').val(draft.customer_name || '');
            $('#business_name').val(draft.business_name || '');
            $('#mobile_number').val(draft.mobile_number || '');
            $('#email').val(draft.email || '');
            $('#gst_number').val(draft.gst_number || '');
            $('#address').val(draft.address || '');
            $('#pincode').val(draft.pincode || '');
            $('#prepared_by').val(draft.prepared_by || '');
            $('#packing_charges').val(draft.packing_charges || 0);
            $('#shipping_charges').val(draft.shipping_charges || 0);

            if (draft.state_id) {

                $('#state_id').val(draft.state_id);

                $.get('{{ route('admin.quote-settings.get-cities', ':state_id') }}'.replace(':state_id', draft.state_id), function (cities) {

                    var $city = $('#city_id');
                    $city.html('<option value="">Select City</option>');

                    $.each(cities, function (i, city) {
                        var selected = (city.id == draft.city_id) ? 'selected' : '';
                        $city.append('<option value="' + city.id + '" ' + selected + '>' + city.name + '</option>');
                    });

                });

            }

            $.each(draft.items || [], function (i, item) {
                addItemRow(item);
            });

        }

        prefillFromDraft(draftData);

    });
</script>

{{-- ==========================================================
Scoped UI styling for New Proposal page.
Zero edits made to any id, existing class, data-attribute,
or the
<script> block above — every functional selector
     jQuery relies on(IDs, .rowOptionsBtn, .removeItemBtn,
     .customization - checkbox, .customization - chip, .list - group - item,
     .itemQty /.itemPrice /.itemTax /.itemTotal /.itemProductName,
         #noItemsRow, modal data - dismiss, etc.) is untouched.
     This block only adds visual styling on top, matching the
     Manage Quotes / Manage Customers design language.
     ========================================================== --}}
    <style>
    :root {
        --wm-primary: #123108;
        --wm-primary-hover: #1c4a0d;
        --wm-primary-light: #eef3ea;
        --wm-border: #e6e9e3;
        --wm-text: #23291f;
        --wm-muted: #6b7568;
        --wm-row-odd: #ffffff;
        --wm-row-even: #f6f8f4;
        --wm-radius: 10px;
        --wm-danger: #b3261e;
        --wm-danger-light: #fbeceb;
    }

    /* Card shell */
    .wm-quotes-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 2px 10px rgba(18, 49, 8, 0.06);
        overflow: hidden;
    }

    .wm-quotes-header {
        background: linear-gradient(180deg, #ffffff 0%, #fafbf9 100%);
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
    }

    .wm-quotes-title {
        font-weight: 700;
        color: var(--wm-text);
        letter-spacing: 0.2px;
    }

    .wm-form-body {
        padding: 1.5rem 1.25rem;
    }

    .wm-form-group {
        margin-bottom: 1.1rem;
    }

    .wm-label {
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--wm-muted);
        margin-bottom: 6px;
        display: block;
    }

    /* Inputs, selects, textareas */
    .wm-input {
        border: 1px solid var(--wm-border) !important;
        border-radius: 8px !important;
        padding: 0.55rem 0.8rem !important;
        font-size: 0.9rem;
        color: var(--wm-text);
        background-color: #fbfcfa;
        transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
    }

    .wm-input:focus {
        border-color: var(--wm-primary) !important;
        box-shadow: 0 0 0 3px rgba(18, 49, 8, 0.12) !important;
        background-color: #ffffff;
        outline: none;
    }

    .wm-input:disabled,
    .wm-input-readonly {
        background-color: #f1f2ef !important;
        color: var(--wm-muted);
        text-align: center;
        font-weight: 600;
    }

    .wm-search-group {
        gap: 10px;
    }

    .wm-search-group .wm-input {
        border-radius: 8px !important;
    }

    .wm-search-group .input-group-append {
        margin-left: 0 !important;
    }

    .wm-hint {
        color: var(--wm-muted) !important;
        font-size: 0.8rem;
    }

    .wm-search-status {
        font-size: 0.85rem;
        font-weight: 600;
    }

    .wm-divider {
        border-top: 1px solid var(--wm-border);
        opacity: 1;
    }

    /* Buttons */
    .wm-btn-primary,
    .wm-btn-success,
    .wm-btn-outline,
    .wm-btn-cancel {
        border-radius: 8px !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        padding: 0.5rem 1rem !important;
        border: 1px solid transparent !important;
        transition: all 0.15s ease;
    }

    .wm-btn-primary {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-primary:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
    }

    .wm-btn-success {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-success:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
    }

    .wm-btn-outline {
        background-color: #ffffff !important;
        border-color: var(--wm-primary) !important;
        color: var(--wm-primary) !important;
    }

    .wm-btn-outline:hover:not(:disabled) {
        background-color: var(--wm-primary) !important;
        color: #ffffff !important;
    }

    .wm-btn-primary:disabled,
    .wm-btn-success:disabled,
    .wm-btn-outline:disabled {
        background-color: #eef0ec !important;
        border-color: var(--wm-border) !important;
        color: #a3aa9c !important;
        cursor: not-allowed;
    }

    .wm-btn-cancel {
        background-color: #fff !important;
        border-color: var(--wm-border) !important;
        color: var(--wm-muted) !important;
    }

    .wm-quotes-footer {
        background: #fafbf9;
        border-top: 1px solid var(--wm-border);
        padding: 0.85rem 1.25rem;
    }

    /* Product search dropdown (JS-generated .list-group-item results live here) */
    .wm-search-dropdown {
        border: 1px solid var(--wm-border);
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(18, 49, 8, 0.1);
        margin-top: 2px;
        overflow: hidden;
    }

    .wm-search-dropdown .list-group-item {
        border: none;
        border-bottom: 1px solid var(--wm-border);
        font-size: 0.88rem;
        padding: 0.6rem 0.9rem;
        color: var(--wm-text);
    }

    .wm-search-dropdown .list-group-item:last-child {
        border-bottom: none;
    }

    .wm-search-dropdown .list-group-item-action:hover {
        background-color: var(--wm-primary-light);
        color: var(--wm-primary);
    }

    /* Items table (rows added dynamically via JS keep these classes) */
    .wm-quotes-table {
        margin-bottom: 0;
    }

    .wm-quotes-table thead tr th {
        background-color: var(--wm-primary);
        color: #ffffff;
        font-weight: 600;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        border-color: var(--wm-primary);
        padding: 0.75rem 0.9rem;
    }

    .wm-quotes-table tbody tr td {
        padding: 0.7rem 0.9rem;
        vertical-align: middle;
        color: var(--wm-text);
        font-size: 0.88rem;
        border-color: var(--wm-border);
    }

    .wm-quotes-table tbody tr:nth-child(odd) {
        background-color: var(--wm-row-odd);
    }

    .wm-quotes-table tbody tr:nth-child(even) {
        background-color: var(--wm-row-even);
    }

    .wm-quotes-table tbody tr:hover {
        background-color: var(--wm-primary-light) !important;
    }

    .wm-quotes-table .itemProductName {
        font-weight: 600;
    }

    .wm-quotes-table .itemTotal {
        font-weight: 700;
        color: var(--wm-primary);
    }

    .wm-quotes-table .rowOptionsBtn {
        border-radius: 6px !important;
        border-color: var(--wm-primary) !important;
        color: var(--wm-primary) !important;
        background: #fff !important;
    }

    .wm-quotes-table .rowOptionsBtn:hover {
        background: var(--wm-primary) !important;
        color: #fff !important;
    }

    .wm-quotes-table .removeItemBtn {
        border-radius: 6px !important;
        background-color: var(--wm-danger-light) !important;
        border-color: var(--wm-danger-light) !important;
        color: var(--wm-danger) !important;
    }

    .wm-quotes-table .removeItemBtn:hover {
        background-color: var(--wm-danger) !important;
        border-color: var(--wm-danger) !important;
        color: #fff !important;
    }

    .wm-empty-state {
        padding: 1.25rem !important;
        color: var(--wm-muted) !important;
        font-size: 0.88rem;
    }

    /* Customisation chips (checkbox toggle classes managed by JS: btn-primary/text-white/btn-outline-secondary) */
    .wm-chip-list {
        border-color: var(--wm-border) !important;
        background-color: #fbfcfa;
    }

    .wm-chip.btn-outline-secondary {
        border-color: var(--wm-border) !important;
        color: var(--wm-muted) !important;
        background-color: #fff !important;
        font-size: 0.8rem;
        border-radius: 20px !important;
        padding: 0.3rem 0.85rem !important;
    }

    .wm-chip.btn-outline-secondary:hover {
        border-color: var(--wm-primary) !important;
        color: var(--wm-primary) !important;
    }

    .wm-chip.btn-primary {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #fff !important;
        font-size: 0.8rem;
        border-radius: 20px !important;
        padding: 0.3rem 0.85rem !important;
    }

    /* Modal */
    .wm-modal-content {
        border-radius: var(--wm-radius);
        border: none;
        overflow: hidden;
    }

    .wm-modal-header {
        background: linear-gradient(180deg, #ffffff 0%, #fafbf9 100%);
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
    }

    .wm-modal-title {
        font-weight: 700;
        color: var(--wm-text);
    }

    .wm-modal-body {
        padding: 1.5rem 1.25rem;
    }

    .wm-modal-footer {
        background: #fafbf9;
        border-top: 1px solid var(--wm-border);
        padding: 0.85rem 1.25rem;
    }

    /* Draft resume banner */
    .wm-draft-banner {
        background-color: #fff8e1;
        border: 1px solid #ffe4a1;
        color: #8a6300;
        border-radius: 8px;
        font-weight: 500;
        padding: 0.7rem 1rem;
        font-size: 0.88rem;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .wm-form-body {
            padding: 1.1rem 1rem;
        }
    }
</style>