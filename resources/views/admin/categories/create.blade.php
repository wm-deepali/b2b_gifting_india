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
                        Add Category
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Category</strong>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">

                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <!-- Slug -->
                        <div class="form-group mt-3">
                            <label>Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control">
                        </div>

                        <!-- Parent/Sub -->
                        <div class="form-group mt-3">
                            <label>Category Type</label>
                            <select name="parent_id" class="form-control">
                                <option value="parent">Parent Category</option>

                                @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}">
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="form-group mt-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- Meta -->
                        <div class="form-group mt-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control"></textarea>
                        </div>

                        <!-- Popular -->
                        <div class="form-group mt-3">
                            <label>Popular</label>
                            <select name="is_popular" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="form-group mt-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4">

                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Save Category
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
document.getElementById('name').addEventListener('keyup', function () {

    let slug = this.value
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');

    document.getElementById('slug').value = slug;

});
</script>