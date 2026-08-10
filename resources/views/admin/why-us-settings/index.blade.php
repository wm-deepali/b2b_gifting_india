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
                    <li class="breadcrumb-item active">Manage Why Choose Us Page</li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @php
                $whyUsFeaturesList = is_string($whyUs->features ?? null)
                    ? (json_decode($whyUs->features, true) ?? [])
                    : ($whyUs->features ?? []);
            @endphp

            <form action="{{ route('admin.why-us-settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Hero --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Hero Section</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Hero Title</label>
                            <input type="text" name="hero_title" class="form-control"
                                value="{{ old('hero_title', $whyUs->hero_title ?? '') }}">
                        </div>
                    </div>
                </div>

                {{-- Features intro --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Features Section</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" name="features_subtitle" class="form-control"
                                value="{{ old('features_subtitle', $whyUs->features_subtitle ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="features_title" class="form-control"
                                value="{{ old('features_title', $whyUs->features_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="features_description" rows="2" class="form-control">{{ old('features_description', $whyUs->features_description ?? '') }}</textarea>
                        </div>

                        <hr>
                        <label><strong>Feature Cards</strong></label>
                        <div id="featuresWrap">
                            @forelse($whyUsFeaturesList as $i => $feature)
                                <div class="row mb-2 repeater-row align-items-end">
                                    <div class="col-md-3">
                                        <label class="small">Icon Class</label>
                                        <input type="text" name="feature_icon[]" class="form-control"
                                            value="{{ $feature['icon'] }}" placeholder="fa-solid fa-palette">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small">Title</label>
                                        <input type="text" name="feature_title[]" class="form-control"
                                            value="{{ $feature['title'] }}">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="small">Description</label>
                                        <textarea name="feature_desc[]" rows="2" class="form-control">{{ $feature['desc'] }}</textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-danger remove-row"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" id="addFeature">
                            <i class="fa fa-plus"></i> Add Feature
                        </button>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>CTA Section</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Subtitle (e.g. "Next Steps")</label>
                            <input type="text" name="cta_subtitle" class="form-control"
                                value="{{ old('cta_subtitle', $whyUs->cta_subtitle ?? '') }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title (main text)</label>
                                    <input type="text" name="cta_title" class="form-control"
                                        value="{{ old('cta_title', $whyUs->cta_title ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title Highlight (gold italic word)</label>
                                    <input type="text" name="cta_title_highlight" class="form-control"
                                        value="{{ old('cta_title_highlight', $whyUs->cta_title_highlight ?? '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="cta_desc" rows="2" class="form-control">{{ old('cta_desc', $whyUs->cta_desc ?? '') }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Primary Button Text</label>
                                    <input type="text" name="cta_primary_button_text" class="form-control"
                                        value="{{ old('cta_primary_button_text', $whyUs->cta_primary_button_text ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Primary Button Link</label>
                                    <input type="text" name="cta_primary_button_link" class="form-control"
                                        value="{{ old('cta_primary_button_link', $whyUs->cta_primary_button_link ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Secondary Button Text</label>
                                    <input type="text" name="cta_secondary_button_text" class="form-control"
                                        value="{{ old('cta_secondary_button_text', $whyUs->cta_secondary_button_text ?? '') }}">
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Secondary button always opens the enquiry drawer — no link field needed.</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Changes
                </button>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')

<script>
    function repeaterRow(fields) {
        let cols = fields.map(f => {
            let input = f.type === 'textarea'
                ? `<textarea name="${f.name}" rows="2" class="form-control"></textarea>`
                : `<input type="text" name="${f.name}" class="form-control" placeholder="${f.placeholder || ''}">`;
            return `<div class="col-md-${f.col}"><label class="small">${f.label}</label>${input}</div>`;
        }).join('');

        return `<div class="row mb-2 repeater-row align-items-end">
            ${cols}
            <div class="col-md-1"><button type="button" class="btn btn-sm btn-danger remove-row"><i class="fa fa-trash"></i></button></div>
        </div>`;
    }

    document.getElementById('addFeature').addEventListener('click', function () {
        document.getElementById('featuresWrap').insertAdjacentHTML('beforeend', repeaterRow([
            { name: 'feature_icon[]', label: 'Icon Class', col: 3, placeholder: 'fa-solid fa-palette' },
            { name: 'feature_title[]', label: 'Title', col: 3 },
            { name: 'feature_desc[]', label: 'Description', col: 5, type: 'textarea' },
        ]));
    });

    document.addEventListener('click', function (e) {
        if (e.target.closest('.remove-row')) {
            e.target.closest('.repeater-row').remove();
        }
    });
</script>