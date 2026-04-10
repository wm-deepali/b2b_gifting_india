@extends('layouts.app')
@section('title', 'Edit Product')

@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="card">
            <div class="card-header"><b>Edit Product</b></div>

            <div class="card-body">

                <form method="POST" action="{{ route('admin.products.update', $product->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <!-- LEFT -->
                        <div class="col-md-8">

                            {{-- CATEGORY + SUBCATEGORY --}}
                            <div class="form-group">
                                <label>Select Category & Sub Categories *</label>

                                <div class="border p-3" style="max-height:300px;overflow:auto;">

                                    @foreach($categories as $cat)
                                        <div class="mb-2">

                                            <label class="d-flex align-items-center">
                                                <input type="checkbox" class="mr-2 category-checkbox"
                                                    data-id="{{ $cat->id }}" name="categories[]" value="{{ $cat->id }}" {{ in_array($cat->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                <strong>{{ $cat->name }}</strong>
                                            </label>

                                            <div class="ml-4 mt-2 subcategory-box" id="subcat_{{ $cat->id }}"
                                                style="{{ collect($product->subcategories)->pluck('parent_id')->contains($cat->id) ? '' : 'display:none;' }}">

                                                @foreach($cat->children as $sub)
                                                    <label class="d-flex align-items-center">
                                                        <input type="checkbox" class="mr-2" name="sub_categories[]"
                                                            value="{{ $sub->id }}" {{ in_array($sub->id, $product->subcategories->pluck('id')->toArray()) ? 'checked' : '' }}>{{ $sub->name }}
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
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label>Slug</label>
                                <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                            </div>

                            {{-- PRODUCT IMAGE --}}
                            <div class="form-group mt-3">
                                <label>Product Image</label>

                                <input type="file" name="image" class="form-control">
                                @if($product->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" width="80"
                                            style="border-radius:6px;">
                                    </div>
                                @endif
                            </div>

                            {{-- SUB TITLE --}}
                            <div class="form-group mt-3">
                                <label>Sub Title</label>
                                <input type="text" name="sub_title" value="{{ $product->sub_title }}"
                                    class="form-control">
                            </div>

                            {{-- SUMMARY --}}
                            <div class="form-group mt-3">
                                <label>Product Summary</label>
                                <textarea name="summary" class="form-control">{{ $product->summary }}</textarea>
                            </div>

                            {{-- SKU + MIN QTY --}}
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label>SKU ID</label>
                                    <input type="text" name="sku" value="{{ $product->sku }}" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Minimum Order Qty</label>
                                    <input type="number" name="min_qty" value="{{ $product->min_qty }}"
                                        class="form-control">
                                </div>
                            </div>


                            {{-- DELIVERY --}}
                            <div class="form-group mt-3">
                                <label>Delivery Timeline</label>
                                <input type="text" name="delivery_time" value="{{ $product->delivery_time }}"
                                    class="form-control">
                            </div>

                            <div class="mt-3">
                                <label class="d-flex align-items-center"><input type="checkbox" name="quality"
                                        class="mr-2" {{ $product->quality ? 'checked' : '' }}> Quality Assurance</label>
                                <label class="d-flex align-items-center"><input type="checkbox" name="pan_india"
                                        class="mr-2" {{ $product->pan_india ? 'checked' : '' }}> PAN India
                                    Delivery</label>
                            </div>

                            {{-- PRICE --}}
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label>MRP</label>
                                    <input type="number" id="mrp" name="mrp" value="{{ $product->mrp }}"
                                        class="form-control ">
                                </div>

                                <div class="col-md-4">
                                    <label>Discount Type</label>
                                    <select id="discount_type" class="form-control">
                                        <option value="amount" {{ $product->discount_type == 'amount' ? 'selected' : '' }}>Amount</option>
                                        <option value="percentage" {{ $product->discount_type == 'percentage' ? 'selected' : '' }}>%</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Discount</label>
                                    <input type="number" id="discount" name="discount" value="{{ $product->discount }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label>Offered Price</label>
                                <input type="text" id="price" name="price" value="{{ $product->price }}"
                                    class="form-control">
                            </div>

                            {{-- CUSTOMIZATION --}}
                            <div class="form-group mt-3">
                                <label>Customization</label>

                                <select name="customizations[]" multiple class="form-control">
                                    @foreach($customizations as $c)
                                        <option value="{{ $c->id }}" {{ in_array($c->id, $product->customizations->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $c->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- FLAGS --}}
                            <div class="mt-3">
                                <label class="d-flex align-items-center"><input type="checkbox" name="featured"
                                        class="mr-2" {{ $product->featured ? 'checked' : '' }}>
                                    Featured</label>
                                <label class="d-flex align-items-center" class="d-flex align-items-center"><input
                                        type="checkbox" name="new_arrival" class="mr-2" {{ $product->new_arrival ? 'checked' : '' }}> New Arrival</label>
                                <label class="d-flex align-items-center"><input type="checkbox" name="sale" class="mr-2"
                                        {{ $product->sale ? 'checked' : '' }}> For Sale</label>
                            </div>

                            {{-- INCLUSIONS --}}
                            <div class="form-group mt-3">
                                <label>Inclusions</label>
                                <div id="incWrap">
                                    @foreach($product->inclusions as $inc)
                                        <input type="text" name="inclusions[]" value="{{ $inc->title }}"
                                            class="form-control mb-2">
                                    @endforeach
                                </div>
                                <button type="button" onclick="addInc()" class="btn btn-sm btn-primary">Add
                                    More</button>
                            </div>

                            <div class="form-group mt-3">
                                <label>Details</label>
                                <textarea name="details" id="details"
                                    class="form-control">{{ $product->details }}</textarea>
                            </div>

                            {{-- DELIVERY & RETURNS --}}
                            <div class="form-group mt-3">
                                <label>Delivery & Returns</label>
                                <textarea name="delivery_returns" id="delivery_returns"
                                    class="form-control">{{ $product->delivery_returns }}</textarea>
                            </div>

                        </div>

                        <!-- RIGHT -->
                        <div class="col-md-4">

                            {{-- OCCASIONS --}}
                            <div class="form-group mt-3">
                                <label>Occasions</label>
                                <div class="border p-3" style="max-height:200px;overflow:auto;">
                                    @foreach($occasions as $o)
                                        <label class="d-flex align-items-center">
                                            <input type="checkbox" class="mr-2" name="occasions[]" value="{{ $o->id }}" {{ in_array($o->id, $product->occasions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            {{ $o->title }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- META --}}
                            <div class="form-group mt-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                    class="form-control mt-3">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description"
                                    class="form-control mt-3">{{ $product->meta_description }}</textarea>
                            </div>

                            {{-- BUTTONS --}}
                            <div class="mt-3">
                                <label class="d-flex align-items-center">
                                    <input type="checkbox" name="cart" class="mr-2" {{ $product->cart ? 'checked' : '' }}>
                                    Add to Cart
                                </label>
                                <label class="d-flex align-items-center">
                                    <input type="checkbox" name="whatsapp" class="mr-2" {{ $product->whatsapp ? 'checked' : '' }}>
                                    WhatsApp
                                </label>
                                <label class="d-flex align-items-center">
                                    <input type="checkbox" name="call" class="mr-2" {{ $product->call ? 'checked' : '' }}>
                                    Call Now
                                </label>
                            </div>

                            <div class="form-group mt-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <button class="btn btn-success mt-3">Update Product</button>

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

    $('#name').keyup(function () {
        $('#slug').val($(this).val().toLowerCase().replace(/ /g, '-'));
    });

    $('#mrp,#discount,#discount_type').on('keyup change', function () {
        let m = +$('#mrp').val() || 0;
        let d = +$('#discount').val() || 0;
        let t = $('#discount_type').val();
        let p = t == 'percentage' ? m - (m * d / 100) : m - d;
        $('#price').val(p);
    });

    function addInc() {
        $('#incWrap').append('<input type="text" name="inclusions[]" class="form-control mb-2">');
    }

    $('.category-checkbox').on('change', function () {
        let id = $(this).data('id');
        if ($(this).is(':checked')) {
            $('#subcat_' + id).slideDown();
        } else {
            $('#subcat_' + id).slideUp();
            $('#subcat_' + id).find('input').prop('checked', false);
        }
    });
</script>