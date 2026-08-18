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
                        Bulk Logistics Content
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card">

                <div class="card-header">
                    <h4 class="mb-0">
                        Bulk Logistics & Direct Dispatch — Default Content
                    </h4>
                </div>

                <form action="{{ route('admin.bulk-logistics-settings.update') }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="card-body">


                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <label>
                                        Content
                                    </label>

                                    <textarea name="content"
                                        id="bulkLogisticsEditor"
                                        rows="10"
                                        class="form-control">{{ old('content', $setting->content) }}</textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit"
                            class="btn btn-primary">

                            <i class="fa fa-save"></i>
                            Save Default Content

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script><script>
    CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('bulkLogisticsEditor');
</script>