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
                    <li class="breadcrumb-item active">Manage About Us Page</li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.about-settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Hero --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Hero Section</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Hero Title</label>
                            <input type="text" name="hero_title" class="form-control"
                                value="{{ old('hero_title', $about->hero_title ?? '') }}">
                        </div>
                    </div>
                </div>

                {{-- Discover --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Discover Section</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" name="discover_subtitle" class="form-control"
                                value="{{ old('discover_subtitle', $about->discover_subtitle ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="discover_title" class="form-control"
                                value="{{ old('discover_title', $about->discover_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Paragraph 1</label>
                            <textarea name="discover_para1" rows="3" class="form-control">{{ old('discover_para1', $about->discover_para1 ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Paragraph 2</label>
                            <textarea name="discover_para2" rows="3" class="form-control">{{ old('discover_para2', $about->discover_para2 ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Button Text</label>
                            <input type="text" name="discover_button_text" class="form-control"
                                value="{{ old('discover_button_text', $about->discover_button_text ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Image</label><br>
                            @if(!empty($about->discover_image))
                                <img src="{{ str_starts_with($about->discover_image, 'about/') ? asset('storage/' . $about->discover_image) : asset($about->discover_image) }}"
                                    style="max-height:80px" class="mb-2 d-block">
                            @endif
                            <input type="file" name="discover_image" class="form-control-file">
                        </div>
                    </div>
                </div>

                {{-- Tech / Philosophy --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Tech / Philosophy Section</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" name="tech_subtitle" class="form-control"
                                value="{{ old('tech_subtitle', $about->tech_subtitle ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="tech_title" class="form-control"
                                value="{{ old('tech_title', $about->tech_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="tech_description" rows="2" class="form-control">{{ old('tech_description', $about->tech_description ?? '') }}</textarea>
                        </div>

                        <hr>
                        <label><strong>Feature Cards</strong></label>
                        <div id="techFeaturesWrap">
                            @forelse(($about->tech_features ?? []) as $i => $feature)
                                <div class="row mb-2 repeater-row align-items-end">
                                    <div class="col-md-3">
                                        <label class="small">Icon Class</label>
                                        <input type="text" name="tech_icon[]" class="form-control"
                                            value="{{ $feature['icon'] }}" placeholder="fa-solid fa-microchip">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small">Title</label>
                                        <input type="text" name="tech_feature_title[]" class="form-control"
                                            value="{{ $feature['title'] }}">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="small">Description</label>
                                        <textarea name="tech_feature_desc[]" rows="2" class="form-control">{{ $feature['desc'] }}</textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-danger remove-row"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" id="addTechFeature">
                            <i class="fa fa-plus"></i> Add Feature
                        </button>
                    </div>
                </div>

                {{-- CTA banner --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>CTA Banner (inside Tech section)</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="cta_title" class="form-control"
                                value="{{ old('cta_title', $about->cta_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="cta_desc" class="form-control"
                                value="{{ old('cta_desc', $about->cta_desc ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Button Text</label>
                            <input type="text" name="cta_button_text" class="form-control"
                                value="{{ old('cta_button_text', $about->cta_button_text ?? '') }}">
                        </div>
                    </div>
                </div>

                {{-- Brand Promise --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Brand Promise Section</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" name="promise_subtitle" class="form-control"
                                value="{{ old('promise_subtitle', $about->promise_subtitle ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="promise_title" class="form-control"
                                value="{{ old('promise_title', $about->promise_title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="promise_description" rows="2" class="form-control">{{ old('promise_description', $about->promise_description ?? '') }}</textarea>
                        </div>

                        <hr>
                        <label><strong>Promise Cards</strong></label>
                        <div id="promiseCardsWrap">
                            @forelse(($about->promise_cards ?? []) as $i => $card)
                                <div class="row mb-2 repeater-row align-items-end">
                                    <div class="col-md-3">
                                        <label class="small">Icon Class</label>
                                        <input type="text" name="promise_icon[]" class="form-control"
                                            value="{{ $card['icon'] }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small">Title</label>
                                        <input type="text" name="promise_card_title[]" class="form-control"
                                            value="{{ $card['title'] }}">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="small">Description</label>
                                        <textarea name="promise_card_desc[]" rows="2" class="form-control">{{ $card['desc'] }}</textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-danger remove-row"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" id="addPromiseCard">
                            <i class="fa fa-plus"></i> Add Card
                        </button>
                    </div>
                </div>

                {{-- Stats --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Stats Strip</strong></div>
                    <div class="card-body">
                        <div id="statsWrap">
                            @forelse(($about->stats ?? []) as $i => $stat)
                                <div class="row mb-2 repeater-row align-items-end">
                                    <div class="col-md-3">
                                        <label class="small">Icon Class</label>
                                        <input type="text" name="stat_icon[]" class="form-control"
                                            value="{{ $stat['icon'] }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="small">Number</label>
                                        <input type="text" name="stat_number[]" class="form-control"
                                            value="{{ $stat['number'] }}">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="small">Label</label>
                                        <input type="text" name="stat_label[]" class="form-control"
                                            value="{{ $stat['label'] }}">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-danger remove-row"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" id="addStat">
                            <i class="fa fa-plus"></i> Add Stat
                        </button>
                    </div>
                </div>

                {{-- Vision / Mission --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Vision & Mission</strong></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Vision Badge</label>
                                <input type="text" name="vision_badge" class="form-control mb-2"
                                    value="{{ old('vision_badge', $about->vision_badge ?? '') }}">
                                <label>Vision Title</label>
                                <input type="text" name="vision_title" class="form-control mb-2"
                                    value="{{ old('vision_title', $about->vision_title ?? '') }}">
                                <label>Vision Description</label>
                                <textarea name="vision_desc" rows="3" class="form-control">{{ old('vision_desc', $about->vision_desc ?? '') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Mission Badge</label>
                                <input type="text" name="mission_badge" class="form-control mb-2"
                                    value="{{ old('mission_badge', $about->mission_badge ?? '') }}">
                                <label>Mission Title</label>
                                <input type="text" name="mission_title" class="form-control mb-2"
                                    value="{{ old('mission_title', $about->mission_title ?? '') }}">
                                <label>Mission Description</label>
                                <textarea name="mission_desc" rows="3" class="form-control">{{ old('mission_desc', $about->mission_desc ?? '') }}</textarea>
                            </div>
                        </div>
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
        // fields: [{name, type, cols, placeholder}]
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

    document.getElementById('addTechFeature').addEventListener('click', function () {
        document.getElementById('techFeaturesWrap').insertAdjacentHTML('beforeend', repeaterRow([
            { name: 'tech_icon[]', label: 'Icon Class', col: 3, placeholder: 'fa-solid fa-microchip' },
            { name: 'tech_feature_title[]', label: 'Title', col: 3 },
            { name: 'tech_feature_desc[]', label: 'Description', col: 5, type: 'textarea' },
        ]));
    });

    document.getElementById('addPromiseCard').addEventListener('click', function () {
        document.getElementById('promiseCardsWrap').insertAdjacentHTML('beforeend', repeaterRow([
            { name: 'promise_icon[]', label: 'Icon Class', col: 3 },
            { name: 'promise_card_title[]', label: 'Title', col: 3 },
            { name: 'promise_card_desc[]', label: 'Description', col: 5, type: 'textarea' },
        ]));
    });

    document.getElementById('addStat').addEventListener('click', function () {
        document.getElementById('statsWrap').insertAdjacentHTML('beforeend', repeaterRow([
            { name: 'stat_icon[]', label: 'Icon Class', col: 3 },
            { name: 'stat_number[]', label: 'Number', col: 3 },
            { name: 'stat_label[]', label: 'Label', col: 5 },
        ]));
    });

    document.addEventListener('click', function (e) {
        if (e.target.closest('.remove-row')) {
            e.target.closest('.repeater-row').remove();
        }
    });
</script>