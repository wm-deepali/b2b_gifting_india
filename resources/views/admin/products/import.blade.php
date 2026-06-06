@include('admin.top-header')

<style>
    .import-card {
        border: 0;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
    }

    .upload-box {
        border: 2px dashed #d6d6d6;
        border-radius: 15px;
        padding: 50px 20px;
        text-align: center;
        background: #fafafa;
        transition: .3s;
    }

    .upload-box:hover {
        border-color: #003108;
        background: #f5fff7;
    }

    .upload-icon {
        font-size: 55px;
        color: #003108;
        margin-bottom: 15px;
    }

    .btn-import {
        background: linear-gradient(90deg, #f97316, #fb923c);
        border: 0;
        color: #fff;
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: 600;
    }

    .btn-import:hover {
        color: #fff;
        opacity: .9;
    }

    .info-box {
        background: #f8fafc;
        border-radius: 12px;
        padding: 15px;
        border: 1px solid #e5e7eb;
    }

    .excel-columns {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 15px;
        font-size: 13px;
        line-height: 28px;
    }

    code {
        color: #d63384;
    }
</style>

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="card import-card mb-4">
            <div class="card-body text-center py-3">

                <h2 class="mb-1">
                    Bulk Import Products
                </h2>

                <p class="text-muted mb-0">
                    Import products using Excel or CSV file
                </p>

            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('imported') !== null)

            <div class="alert alert-info mt-3">
                <h5>Import Summary</h5>

                <p class="mb-1">
                    Imported:
                    <strong>{{ session('imported') }}</strong>
                </p>

                <p class="mb-0">
                    Skipped:
                    <strong>{{ session('skipped') }}</strong>
                </p>
            </div>

        @endif

        @if(session('skipped_products'))

            <div class="card mt-3">
                <div class="card-header">
                    Skipped Products
                </div>

                <div class="card-body p-0">

                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Reason</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach(session('skipped_products') as $item)

                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['sku'] }}</td>
                                    <td>{{ $item['reason'] }}</td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

        @endif

        <div class="card import-card">
            <div class="card-body">

                <h4>
                    <i class="fa fa-info-circle text-info"></i>
                    Instructions
                </h4>

                <ol class="mb-3">
                    <li>Download the sample CSV file.</li>
                    <li>Download reference files for Categories, Sub Categories, Brands, Occasions and Customizations.
                    </li>
                    <li>Prepare product images and upload them as a ZIP file.</li>
                    <li>Fill the CSV according to the sample format.</li>
                    <li>Import the completed CSV file.</li>
                </ol>

                <div class="alert alert-info mb-0">
                    <strong>Important Notes:</strong>
                    <ul class="mb-0 mt-2">
                        <li>
                            <strong>discount_type</strong> supports:
                            <code>percentage</code> or <code>amount</code>
                        </li>

                        <li>
                            Multiple values should be comma separated.
                        </li>

                        <li>
                            <strong>categories</strong>,
                            <strong>sub_categories</strong>,
                            <strong>occasions</strong>,
                            <strong>customizations</strong> and
                            <strong>inclusions</strong>
                            can contain multiple values.
                        </li>

                        <li>
                            Example:
                            <code>Corporate Gifts, Office Essentials</code>
                        </li>

                        <li>
                            Multiple images can be added using comma separated file names.
                        </li>

                        <li>
                            Example:
                            <code>SKU001.jpg,SKU001-2.jpg,SKU001-3.jpg</code>
                        </li>

                        <li>
                            The first image will be used as the default image.
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="card import-card mt-4">
            <div class="card-body">

                <h4>
                    <i class="fa fa-download text-primary"></i>
                    Download Sample File
                </h4>

                <p class="text-muted mt-3 mb-0">
                    Sample file contains all supported columns including
                    image_names, categories, occasions, customizations and inclusions.
                    Multiple images can be provided as comma separated file names.
                </p>

                <a href="{{ route('admin.products.import.sample') }}" class="btn btn-primary">
                    Download Sample
                </a>

            </div>
        </div>

        <div class="card import-card mt-4">
            <div class="card-body">

                <h4>
                    <i class="fa fa-list text-info"></i>
                    Download Reference Files
                </h4>

                <p class="text-muted">
                    Download these files to get valid IDs and names before preparing your import sheet.
                </p>

                <a href="{{ route('admin.products.reference.categories') }}" class="btn btn-info mb-2">
                    Categories
                </a>

                <a href="{{ route('admin.products.reference.subcategories') }}" class="btn btn-info mb-2">
                    Sub Categories
                </a>

                <a href="{{ route('admin.products.reference.brands') }}" class="btn btn-info mb-2">
                    Brands
                </a>

                <a href="{{ route('admin.products.reference.occasions') }}" class="btn btn-info mb-2">
                    Occasions
                </a>

                <a href="{{ route('admin.products.reference.customizations') }}" class="btn btn-info mb-2">
                    Customizations
                </a>

            </div>
        </div>

        <div class="card import-card mt-4">
            <div class="card-body">

                <h4>
                    <i class="fa fa-file-archive-o text-warning"></i>
                    Upload Product Images
                </h4>

                <form action="{{ route('admin.products.images.upload') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="upload-box">

                        <div class="upload-icon">
                            <i class="fa fa-file-archive-o"></i>
                        </div>

                        <h5>Select ZIP File</h5>

                        <input type="file" name="zip_file" class="form-control mt-3" accept=".zip">
                        <p class="text-muted mt-2 mb-0">
                            Example ZIP:
                            SKU001.jpg,
                            SKU001-2.jpg,
                            SKU001-3.jpg,
                            SKU002.jpg
                        </p>
                        <p class="text-muted mt-2 mb-0">
                            Maximum ZIP Size: 50 MB
                        </p>
                    </div>

                    <button type="submit" class="btn btn-warning mt-4">
                        Upload Images ZIP
                    </button>

                </form>

            </div>
        </div>

        <div class="card import-card mt-4">
            <div class="card-body">

                <h4>
                    <i class="fa fa-file-excel-o text-success"></i>
                    Import Products
                </h4>

                <form action="{{ route('admin.products.import.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="upload-box">

                        <div class="upload-icon">
                            <i class="fa fa-cloud-upload"></i>
                        </div>

                        <h5>Select Excel File</h5>

                        <input type="file" name="file" class="form-control mt-3" accept=".xlsx,.xls,.csv">
                        <p class="text-muted mt-2 mb-0">
                            Supported Formats: CSV, XLS, XLSX<br>
                            Maximum File Size: 10 MB
                        </p>
                    </div>

                    <button type="submit" class="btn btn-import mt-4">
                        Import Products
                    </button>


                </form>

            </div>
        </div>



    </div>

</div>

@include('admin.footer')