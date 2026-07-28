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
                        Quote Settings
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card">

                <div class="card-header">
                    <h4 class="mb-0">
                        Manage Quote Settings
                    </h4>
                </div>

                <form action="{{ route('admin.quote-settings.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="card-body">

                        <ul class="nav nav-tabs mb-3"
                            id="quoteSettingsTab"
                            role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active"
                                    id="company-tab"
                                    data-toggle="tab"
                                    href="#company-info"
                                    role="tab">
                                    Company Info
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"
                                    id="proposal-tab"
                                    data-toggle="tab"
                                    href="#proposal-settings"
                                    role="tab">
                                    Proposal Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"
                                    id="terms-tab"
                                    data-toggle="tab"
                                    href="#terms-conditions"
                                    role="tab">
                                    Terms & Conditions
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content" id="quoteSettingsTabContent">

                            {{-- Tab 1: Company Info --}}
                            <div class="tab-pane fade show active"
                                id="company-info"
                                role="tabpanel">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Company Logo
                                            </label>

                                            <input type="file"
                                                name="company_logo"
                                                class="form-control">

                                            @if(!empty($quoteSetting?->company_logo))

                                                <div class="mt-2">

                                                    <img src="{{ asset('storage/' . $quoteSetting->company_logo) }}"
                                                        width="180"
                                                        class="img-thumbnail">

                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Company Name
                                            </label>

                                            <input type="text"
                                                name="company_name"
                                                class="form-control"
                                                value="{{ old('company_name', $quoteSetting?->company_name) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label>
                                                Company Introduction
                                            </label>

                                            <textarea name="company_introduction"
                                                rows="5"
                                                class="form-control ckeditor">{{ old('company_introduction', $quoteSetting?->company_introduction) }}</textarea>

                                            <small class="text-muted">
                                                Ye proposal PDF ke first page (letterhead) pe show hoga.
                                            </small>

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label>
                                                Address
                                            </label>

                                            <textarea name="address"
                                                rows="3"
                                                class="form-control">{{ old('address', $quoteSetting?->address) }}</textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                State
                                            </label>

                                            <select name="state_id"
                                                id="state_id"
                                                class="form-control">

                                                <option value="">Select State</option>

                                                @foreach($states as $state)

                                                    <option value="{{ $state->id }}"
                                                        {{ old('state_id', $quoteSetting?->state_id) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                City
                                            </label>

                                            <select name="city_id"
                                                id="city_id"
                                                class="form-control">

                                                <option value="">Select City</option>

                                                @foreach($cities as $city)

                                                    <option value="{{ $city->id }}"
                                                        {{ old('city_id', $quoteSetting?->city_id) == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Pin Code
                                            </label>

                                            <input type="text"
                                                name="pincode"
                                                class="form-control"
                                                value="{{ old('pincode', $quoteSetting?->pincode) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Email
                                            </label>

                                            <input type="email"
                                                name="email"
                                                class="form-control"
                                                value="{{ old('email', $quoteSetting?->email) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Phone Number
                                            </label>

                                            <input type="text"
                                                name="phone"
                                                class="form-control"
                                                value="{{ old('phone', $quoteSetting?->phone) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Website
                                            </label>

                                            <input type="text"
                                                name="website"
                                                class="form-control"
                                                value="{{ old('website', $quoteSetting?->website) }}">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                GST Number
                                            </label>

                                            <input type="text"
                                                name="gst_number"
                                                class="form-control"
                                                value="{{ old('gst_number', $quoteSetting?->gst_number) }}">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- Tab 2: Proposal Settings --}}
                            <div class="tab-pane fade"
                                id="proposal-settings"
                                role="tabpanel">

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Proposal ID Prefix
                                            </label>

                                            <input type="text"
                                                name="id_prefix"
                                                class="form-control"
                                                value="{{ old('id_prefix', $quoteSetting?->id_prefix ?? 'B2B') }}">

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Number Padding Length
                                            </label>

                                            <input type="number"
                                                name="id_padding_length"
                                                min="1"
                                                max="10"
                                                class="form-control"
                                                value="{{ old('id_padding_length', $quoteSetting?->id_padding_length ?? 5) }}">

                                            <small class="text-muted">
                                                e.g. 5 digits → 00001
                                            </small>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Current Serial (Next ID Preview)
                                            </label>

                                            <input type="text"
                                                class="form-control"
                                                value="{{ ($quoteSetting?->id_prefix ?? 'B2B') . str_pad((($quoteSetting?->current_serial ?? 0) + 1), $quoteSetting?->id_padding_length ?? 5, '0', STR_PAD_LEFT) }}"
                                                readonly
                                                disabled>

                                            <small class="text-muted">
                                                Read-only, auto-generated on next proposal.
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- Tab 3: Terms & Conditions --}}
                            <div class="tab-pane fade"
                                id="terms-conditions"
                                role="tabpanel">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label>
                                                Terms & Conditions
                                            </label>

                                            <textarea name="terms_conditions"
                                                rows="8"
                                                class="form-control ckeditor">{{ old('terms_conditions', $quoteSetting?->terms_conditions) }}</textarea>

                                            <small class="text-muted">
                                                Ye proposal PDF ke last page pe show hoga.
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit"
                            class="btn btn-primary">

                            <i class="fa fa-save"></i>
                            Save Quote Settings

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function () {

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
        });
    </script>



