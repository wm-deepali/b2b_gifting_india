@include('admin.top-header')

<div class="main-section">
@include('admin.header')

<div class="app-content content container-fluid">

<div class="card shadow-sm">
<div class="card-header"><b>Edit Product</b></div>

<div class="card-body">
<form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row">

<!-- LEFT -->
<div class="col-md-8">

<div class="card p-3 mb-3">
                                <h5><b>Category</b></h5>

                                <div style="max-height:300px;overflow:auto;">
                                    @foreach($categories as $cat)
                                        <div class="mb-2">

                                            <label>
                                                <input type="checkbox" class="category-checkbox" data-id="{{ $cat->id }}"
                                                    name="categories[]" value="{{ $cat->id }}" {{ in_array($cat->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                <strong>{{ $cat->name }}</strong>
                                            </label>

                                            @php
    $selectedSubIds = $product->subcategories->pluck('id')->toArray();
    $hasSelectedChild = collect($cat->children)->pluck('id')->intersect($selectedSubIds)->isNotEmpty();
@endphp

<div class="ml-4 subcategory-box" id="subcat_{{ $cat->id }}"
    style="{{ $hasSelectedChild ? '' : 'display:none;' }}">
                                                @foreach($cat->children as $sub)
                                                    <label>
                                                        <input type="checkbox" name="sub_categories[]" value="{{ $sub->id }}" {{ in_array($sub->id, $product->subcategories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                        {{ $sub->name }}
                                                    </label>
                                                @endforeach
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>

{{-- BASIC --}}
<div class="card p-3 mb-3">
<h5><b>Basic Info</b></h5>

<label>Name</label>
<input type="text" name="name" value="{{ $product->name }}" class="form-control">

<label class="mt-2">Slug</label>
<input type="text" name="slug" value="{{ $product->slug }}" class="form-control">

<label class="mt-2">Brand</label>
<select name="brand_id" class="form-control">
<option value="">Select Brand</option>
@foreach($brands as $brand)
<option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
{{ $brand->name }}
</option>
@endforeach
</select>

<label class="mt-2">Image</label>
<input type="file" name="image" class="form-control">
@if($product->image)
<img src="{{ asset('storage/'.$product->image) }}" width="80" class="mt-2 rounded">
@endif

<label class="mt-2">Sub Title</label>
<input type="text" name="sub_title" value="{{ $product->sub_title }}" class="form-control">

<label class="mt-2">Summary</label>
<textarea name="summary" class="form-control">{{ $product->summary }}</textarea>

</div>

{{-- INVENTORY --}}
<div class="card p-3 mb-3">
<h5><b>Inventory</b></h5>

<input type="text" name="sku" value="{{ $product->sku }}" class="form-control mb-2" placeholder="SKU">

<input type="number" name="min_qty" value="{{ $product->min_qty }}" class="form-control mb-2" placeholder="Min Qty">

<input type="text" name="delivery_time" value="{{ $product->delivery_time }}" class="form-control" placeholder="Delivery Time">

<div class="mt-2">
<label><input type="checkbox" name="quality" {{ $product->quality ? 'checked' : '' }}> Quality</label>
<label><input type="checkbox" name="pan_india" {{ $product->pan_india ? 'checked' : '' }}> PAN India</label>
</div>

</div>

{{-- PRICING --}}
<div class="card p-3 mb-3">
<h5><b>Pricing</b></h5>

<div class="row">
<div class="col-md-4">
<input type="number" name="mrp" id="mrp" value="{{ $product->mrp }}" class="form-control" placeholder="MRP">
</div>

<div class="col-md-4">
<select name="discount_type" id="discount_type" class="form-control">
<option value="amount" {{ $product->discount_type == 'amount' ? 'selected' : '' }}>Amount</option>
<option value="percentage" {{ $product->discount_type == 'percentage' ? 'selected' : '' }}>%</option>
</select>
</div>

<div class="col-md-4">
<input type="number" name="discount" id="discount" value="{{ $product->discount }}" class="form-control" placeholder="Discount">
</div>
</div>

<input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control mt-2" readonly>

</div>

{{-- FLAGS --}}
<div class="card p-3 mb-3">
<h5><b>Flags</b></h5>

<label><input type="checkbox" name="featured" {{ $product->featured ? 'checked' : '' }}> Featured</label>
<label><input type="checkbox" name="new_arrival" {{ $product->new_arrival ? 'checked' : '' }}> New</label>
<label><input type="checkbox" name="sale" {{ $product->sale ? 'checked' : '' }}> Sale</label>
<label><input type="checkbox" name="best_seller" {{ $product->best_seller ? 'checked' : '' }}> Best Seller</label>

<label><input type="checkbox" name="ready_to_ship" {{ $product->ready_to_ship ? 'checked' : '' }}> Ready to Ship</label>
<label><input type="checkbox" name="bulk_available" {{ $product->bulk_available ? 'checked' : '' }}> Bulk</label>
<label><input type="checkbox" name="gift_hamper" {{ $product->gift_hamper ? 'checked' : '' }}> Gift Hamper</label>

</div>

{{-- CUSTOMIZATION --}}
<div class="card p-3 mb-3">
<h5><b>Customization</b></h5>

<div class="row">
@foreach($customizations as $c)
<div class="col-md-6">
<label>
<input type="checkbox" name="customizations[]" value="{{ $c->id }}"
{{ in_array($c->id, $product->customizations->pluck('id')->toArray()) ? 'checked' : '' }}>
{{ $c->name }}
</label>
</div>
@endforeach
</div>

</div>

{{-- INCLUSIONS --}}
<div class="card p-3 mb-3">
<h5><b>Inclusions</b></h5>

<div id="incWrap">
@foreach($product->inclusions as $inc)
<input type="text" name="inclusions[]" value="{{ $inc->title }}" class="form-control mb-2">
@endforeach
</div>

<button type="button" onclick="addInc()" class="btn btn-sm btn-primary">Add More</button>
</div>

{{-- DETAILS --}}
<div class="card p-3 mb-3">
<textarea name="details" id="details" class="form-control">{{ $product->details }}</textarea>
<textarea name="delivery_returns" id="delivery_returns" class="form-control mt-2">{{ $product->delivery_returns }}</textarea>
</div>

</div>

<!-- RIGHT -->
<div class="col-md-4">

<div class="card p-3 mb-3">
<h5>Occasions</h5>
@foreach($occasions as $o)
<label>
<input type="checkbox" name="occasions[]" value="{{ $o->id }}"
{{ in_array($o->id, $product->occasions->pluck('id')->toArray()) ? 'checked' : '' }}>
{{ $o->title }}
</label><br>
@endforeach
</div>

<div class="card p-3 mb-3">
<input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control mb-2" placeholder="Meta Title">
<textarea name="meta_description" class="form-control">{{ $product->meta_description }}</textarea>
</div>

<div class="card p-3 mb-3">
<label><input type="checkbox" name="cart" {{ $product->cart ? 'checked' : '' }}> Cart</label>
<label><input type="checkbox" name="whatsapp" {{ $product->whatsapp ? 'checked' : '' }}> WhatsApp</label>
<label><input type="checkbox" name="call" {{ $product->call ? 'checked' : '' }}> Call</label>
</div>

<select name="status" class="form-control">
<option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
<option value="0" {{ !$product->status ? 'selected' : '' }}>Inactive</option>
</select>

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
CKEDITOR.replace('details');
CKEDITOR.replace('delivery_returns');

$('#mrp,#discount,#discount_type').on('keyup change', function () {
let m = +$('#mrp').val() || 0;
let d = +$('#discount').val() || 0;
let t = $('#discount_type').val();
let p = t == 'percentage' ? m - (m * d / 100) : m - d;
if(p < 0) p = 0;
$('#price').val(p.toFixed(2));
});

function addInc(){
$('#incWrap').append('<input type="text" name="inclusions[]" class="form-control mb-2">');
}
</script>