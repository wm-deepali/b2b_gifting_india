@extends('layouts.app')
@section('title', 'Add Product')

@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="card">
            <div class="card-header"><b>Add Product</b></div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <!-- LEFT SIDE -->
                        <div class="col-md-8">

                            {{-- CATEGORY + SUBCATEGORY COMBINED --}}
                            <div class="form-group">
                                <label>Select Category & Sub Categories *</label>

                                <div class="border p-3" style="max-height:300px;overflow:auto;">

                                    @foreach($categories as $cat)
                                        <div class="mb-2">

                                            {{-- CATEGORY --}}
                                            <label class="d-flex align-items-center">
                                                <input type="checkbox" class="mr-2 category-checkbox"
                                                    data-id="{{ $cat->id }}" name="categories[]" value="{{ $cat->id }}">
                                                <span><strong>{{ $cat->name }}</strong></span>
                                            </label>
                                            {{-- SUBCATEGORY (HIDDEN INITIALLY) --}}
                                            <div class="ml-4 mt-2 subcategory-box" id="subcat_{{ $cat->id }}"
                                                style="display:none;">

                                                @foreach($cat->children as $sub)
                                                    <label class="d-flex align-items-center">
                                                        <input type="checkbox" class="mr-2" name="sub_categories[]"
                                                            value="{{ $sub->id }}">
                                                        {{ $sub->name }}
                                                    </label>
                                                @endforeach

                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            {{-- PRODUCT --}}
                            <div class="form-group mt-3">
                                <label>Product Name *</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label>Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control">
                            </div>

                            {{-- PRODUCT IMAGE --}}
                            <div class="form-group mt-3">
                                <label>Product Image</label>

                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label>Sub Title</label>
                                <input type="text" name="sub_title" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label>Product Summary</label>
                                <textarea name="summary" class="form-control"></textarea>
                            </div>

                            {{-- SKU + MIN QTY --}}
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label>SKU ID</label>
                                    <input type="text" name="sku" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Minimum Order Qty</label>
                                    <input type="number" name="min_qty" class="form-control">
                                </div>
                            </div>

                            {{-- DELIVERY --}}
                            <div class="form-group mt-3">
                                <label>Delivery Timeline</label>
                                <input type="text" name="delivery_time" class="form-control">
                            </div>

                            {{-- CHECKBOXES --}}
                            <div class="mt-3">
                                <label class="d-flex align-items-center"><input type="checkbox" name="quality"
                                        class="mr-2"> Quality Assurance</label>
                                <label class="d-flex align-items-center"><input type="checkbox" name="pan_india"
                                        class="mr-2"> PAN India Delivery</label>
                            </div>

                            {{-- PRICE --}}
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label>MRP</label>
                                    <input type="number" id="mrp" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label>Discount Type</label>
                                    <select id="discount_type" class="form-control">
                                        <option value="amount">Amount</option>
                                        <option value="percentage">%</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Discount</label>
                                    <input type="number" id="discount" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label>Offered Price</label>
                                <input type="text" id="price" name="price" readonly class="form-control">
                            </div>

                            {{-- CUSTOMIZATION --}}
                            <div class="form-group mt-3">
                                <label>Customization</label>

                                <select name="customizations[]" class="form-control" multiple>
                                    @foreach($customizations as $c)
                                        <option value="{{ $c->id }}">
                                            {{ $c->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <small class="text-muted">You can select multiple customization options</small>
                            </div>

                            {{-- FLAGS --}}
                            <div class="mt-3">
                                <label class="d-flex align-items-center"><input type="checkbox" name="featured"
                                        class="mr-2">
                                    Featured</label>
                                <label class="d-flex align-items-center" class="d-flex align-items-center"><input
                                        type="checkbox" name="new_arrival" class="mr-2"> New Arrival</label>
                                <label class="d-flex align-items-center"><input type="checkbox" name="sale"
                                        class="mr-2"> For Sale</label>
                            </div>

                            {{-- INCLUSIONS --}}
                            <div class="form-group mt-3">
                                <label>Inclusions</label>
                                <div id="incWrap">
                                    <input type="text" name="inclusions[]" class="form-control mb-2">
                                </div>
                                <button type="button" onclick="addInc()" class="btn btn-sm btn-primary">Add
                                    More</button>
                            </div>

                            {{-- DETAILS --}}
                            <div class="form-group mt-3">
                                <label>Details</label>
                                <textarea name="details" id="details" class="form-control"></textarea>
                            </div>

                            {{-- DELIVERY & RETURNS --}}
                            <div class="form-group mt-3">
                                <label>Delivery & Returns</label>
                                <textarea name="delivery_returns" id="delivery_returns" class="form-control"></textarea>
                            </div>

                        </div>

                        <!-- RIGHT SIDE -->
                        <div class="col-md-4">

                            {{-- OCCASIONS (CHECKBOX STYLE) --}}
                            <div class="form-group mt-3">
                                <label>Occasions</label>

                                <div class="border p-3" style="max-height:200px;overflow:auto;">

                                    @foreach($occasions as $o)
                                        <label class="d-flex align-items-center">
                                            <input type="checkbox" class="mr-2" name="occasions[]" value="{{ $o->id }}">
                                            {{ $o->title }}
                                        </label>
                                    @endforeach

                                </div>
                            </div>

                            {{-- META --}}
                            <div class="form-group mt-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control"></textarea>
                            </div>

                            {{-- BUTTON OPTIONS --}}
                            <div class="mt-3">
                                <label class="d-flex align-items-center">
                                    <input type="checkbox" name="cart" class="mr-2" checked>
                                    Add to Cart
                                </label>
                                <label class="d-flex align-items-center">
                                    <input type="checkbox" name="whatsapp" class="mr-2">
                                    WhatsApp
                                </label>
                                <label class="d-flex align-items-center">
                                    <input type="checkbox" name="call" class="mr-2">
                                    Call Now
                                </label>
                            </div>

                            <div class="form-group mt-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <button class="btn btn-success mt-3">Save Product</button>

                </form>
            </div>
        </div>

    </div>
</div>

@include('admin.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>

    CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('details');
    CKEDITOR.replace('delivery_returns');

    // slug
    $('#name').keyup(function () {
        $('#slug').val($(this).val().toLowerCase().replace(/ /g, '-'));
    });

    // price calc
    $('#mrp,#discount,#discount_type').on('keyup change', function () {
        let m = +$('#mrp').val() || 0;
        let d = +$('#discount').val() || 0;
        let t = $('#discount_type').val();

        let p = t == 'percentage' ? m - (m * d / 100) : m - d;
        $('#price').val(p);
    });

    // inclusion add
    function addInc() {
        $('#incWrap').append('<input type="text" name="inclusions[]" class="form-control mb-2">');
    }

    // show/hide subcategories
    $('.category-checkbox').on('change', function () {
        let id = $(this).data('id');

        if ($(this).is(':checked')) {
            $('#subcat_' + id).slideDown();
        } else {
            $('#subcat_' + id).slideUp();

            // uncheck child checkboxes
            $('#subcat_' + id).find('input[type=checkbox]').prop('checked', false);
        }
    });
</script>