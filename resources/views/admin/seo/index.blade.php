@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        {{-- BREADCRUMB --}}
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Manage SEO
                    </li>
                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            {{-- SUCCESS --}}
            @if(session('success'))
                <div class="alert wm-alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- TABLE --}}
            <div class="card wm-quotes-card">
                <div class="card-header wm-quotes-header">
                    <h4 class="mb-0 wm-quotes-title">SEO Pages</h4>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0 wm-quotes-table">

                            <thead>
                                <tr>
                                    <th width="80">ID</th>
                                    <th>Page</th>
                                    <th>Meta Title</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($pages as $page)

                                    <tr>

                                        <td>{{ $page->id }}</td>

                                        <td>
                                            <strong>{{ $page->page_name }}</strong>
                                        </td>


                                        <td>{{ $page->meta_title }}</td>

                                        <td>

                                            <button class="btn btn-sm btn-outline-primary wm-btn-outline" onclick="openSeoModal(
                                                        {{ $page->id }},
                                                        '{{ $page->page_name }}',
                                                        '{{ $page->slug }}',
                                                        `{!! $page->meta_title !!}`,
                                                        `{!! $page->meta_description !!}`,
                                                        `{!! $page->scripts !!}`
                                                    )">
                                                <i class="fa fa-pencil"></i>
                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4 wm-empty-state">
                                            No SEO Pages Found
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@include('admin.footer')


{{-- ================= MODAL ================= --}}
<div class="modal fade" id="seoModal">
    <div class="modal-dialog">
        <div class="modal-content wm-modal-content">

            <form id="seoForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header wm-modal-header">
                    <h5 class="modal-title wm-modal-title">Edit SEO</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body wm-modal-body">

                    {{-- SLUG --}}
                    <input type="hidden" name="slug" id="seo_slug" class="form-control">

                    {{-- META TITLE --}}
                    <div class="mb-3 wm-form-group">
                        <label class="wm-label">Meta Title</label>
                        <input type="text" name="meta_title" id="seo_title" class="form-control wm-input">
                    </div>

                    {{-- META DESCRIPTION --}}
                    <div class="mb-3 wm-form-group">
                        <label class="wm-label">Meta Description</label>
                        <textarea name="meta_description" id="seo_desc" class="form-control wm-input" rows="3"></textarea>
                    </div>

                    {{-- SCRIPTS (ONLY HOME) --}}
                    <div class="mb-3 wm-form-group" id="scriptBox">
                        <label class="wm-label">Scripts (Only for Home Page)</label>
                        <textarea name="scripts" id="seo_scripts" class="form-control wm-input" rows="4"></textarea>
                    </div>

                </div>

                <div class="modal-footer wm-modal-footer">
                    <button class="btn btn-success wm-btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- ================= SCRIPT ================= --}}
<script>

    function openSeoModal(id, name, slug, title, desc, scripts) {

        $('#seo_slug').val(slug);
        $('#seo_title').val(title);
        $('#seo_desc').val(desc);
        $('#seo_scripts').val(scripts);

        // dynamic action
        $('#seoForm').attr('action', '/admin/seo/' + id);

        // show scripts only for home
        if (name === 'Home') {
            $('#scriptBox').show();
        } else {
            $('#scriptBox').hide();
        }

        $('#seoModal').modal('show');
    }

</script>

{{-- ==========================================================
     Scoped UI styling for Manage SEO page.
     Zero edits to the openSeoModal() function, its onclick
     bindings, ids (#seo_slug/#seo_title/#seo_desc/#seo_scripts/
     #seoForm/#scriptBox/#seoModal), the dynamic form action,
     the name === 'Home' check, @csrf/@method('PUT') — all
     copied verbatim. Only additive classes + CSS.
     ========================================================== --}}
<style>
    :root {
        --wm-primary: #123108;
        --wm-primary-hover: #1c4a0d;
        --wm-primary-light: #eef3ea;
        --wm-border: #e6e9e3;
        --wm-text: #23291f;
        --wm-muted: #6b7568;
        --wm-row-odd: #ffffff;
        --wm-row-even: #f6f8f4;
        --wm-radius: 10px;
    }

    .wm-alert-success {
        background-color: #e5f3e0;
        border: 1px solid #cfe6c4;
        color: var(--wm-primary);
        border-radius: 8px;
        font-weight: 500;
    }

    /* Card shell */
    .wm-quotes-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 2px 10px rgba(18, 49, 8, 0.06);
        overflow: hidden;
    }

    .wm-quotes-header {
        background: linear-gradient(180deg, #ffffff 0%, #fafbf9 100%);
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
    }

    .wm-quotes-title {
        font-weight: 700;
        color: var(--wm-text);
        letter-spacing: 0.2px;
    }

    /* Table */
    .wm-quotes-table {
        margin-bottom: 0;
    }

    .wm-quotes-table thead tr th {
        background-color: var(--wm-primary);
        color: #ffffff;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        border: none;
        padding: 0.85rem 1rem;
    }

    .wm-quotes-table tbody tr td {
        padding: 0.8rem 1rem;
        vertical-align: middle;
        color: var(--wm-text);
        font-size: 0.88rem;
        border-color: var(--wm-border);
    }

    .wm-quotes-table tbody tr:nth-child(odd) {
        background-color: var(--wm-row-odd);
    }

    .wm-quotes-table tbody tr:nth-child(even) {
        background-color: var(--wm-row-even);
    }

    .wm-quotes-table tbody tr:hover {
        background-color: var(--wm-primary-light) !important;
    }

    .wm-empty-state {
        color: var(--wm-muted) !important;
        font-size: 0.9rem;
    }

    /* Edit button */
    .wm-btn-outline {
        border-radius: 6px !important;
        border-color: var(--wm-primary) !important;
        color: var(--wm-primary) !important;
        background-color: #fff !important;
        transition: all 0.15s ease;
    }

    .wm-btn-outline:hover {
        background-color: var(--wm-primary) !important;
        color: #fff !important;
    }

    /* Modal */
    .wm-modal-content {
        border-radius: var(--wm-radius);
        border: none;
        overflow: hidden;
    }

    .wm-modal-header {
        background: linear-gradient(180deg, #ffffff 0%, #fafbf9 100%);
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
    }

    .wm-modal-title {
        font-weight: 700;
        color: var(--wm-text);
    }

    .wm-modal-body {
        padding: 1.5rem 1.25rem;
    }

    .wm-modal-footer {
        background: #fafbf9;
        border-top: 1px solid var(--wm-border);
        padding: 0.85rem 1.25rem;
    }

    .wm-form-group {
        margin-bottom: 1.1rem;
    }

    .wm-label {
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--wm-muted);
        margin-bottom: 6px;
        display: block;
    }

    .wm-input {
        border: 1px solid var(--wm-border) !important;
        border-radius: 8px !important;
        padding: 0.55rem 0.8rem !important;
        font-size: 0.9rem;
        color: var(--wm-text);
        background-color: #fbfcfa;
        transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
    }

    .wm-input:focus {
        border-color: var(--wm-primary) !important;
        box-shadow: 0 0 0 3px rgba(18, 49, 8, 0.12) !important;
        background-color: #ffffff;
        outline: none;
    }

    .wm-btn-primary {
        background-color: var(--wm-primary) !important;
        border-color: var(--wm-primary) !important;
        color: #ffffff !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        padding: 0.5rem 1.1rem !important;
        transition: all 0.15s ease;
    }

    .wm-btn-primary:hover {
        background-color: var(--wm-primary-hover) !important;
        border-color: var(--wm-primary-hover) !important;
    }
</style>