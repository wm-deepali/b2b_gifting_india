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

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.categories.index') }}">Manage Categories</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Category
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Category</strong>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control"
                                required>
                        </div>

                        <!-- Slug -->
                        <div class="form-group mt-3">
                            <label>Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ $category->slug }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Sub Title</label>
                            <input type="text" name="sub_title" value="{{ $category->sub_title }}" class="form-control">
                        </div>

                        <!-- Parent/Sub -->
                        <div class="form-group mt-3">
                            <label>Category Type</label>

                            <select name="parent_id" class="form-control">

                                <!-- Parent option -->
                                <option value="parent" {{ is_null($category->parent_id) ? 'selected' : '' }}>
                                    Parent Category
                                </option>

                                @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Image -->
                        <div class="form-group mt-3">
                            <label>Image</label>

                            <input type="file" name="image" class="form-control">

                            @if($category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" width="80">
                                </div>
                            @endif
                        </div>

                        <!-- Meta -->
                        <div class="form-group mt-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $category->meta_title }}"
                                class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description"
                                class="form-control">{{ $category->meta_description }}</textarea>
                        </div>

                        <!-- Popular -->
                        <div class="form-group mt-3">
                            <label>Popular</label>
                            <select name="is_popular" class="form-control">
                                <option value="0" {{ !$category->is_popular ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $category->is_popular ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="form-group mt-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4">

                            <button type="submit" id="updateBtn" class="btn btn-success">
                                <i class="fa fa-save"></i> Update Category
                            </button>

                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>
    // 🔥 Auto slug
    document.getElementById('name').addEventListener('keyup', function () {

        let slug = this.value
            .toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');

        document.getElementById('slug').value = slug;

    });

    // 🔥 Disable button on submit
    document.querySelector('form').addEventListener('submit', function () {

        let btn = document.getElementById('updateBtn');

        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';

    });
</script>