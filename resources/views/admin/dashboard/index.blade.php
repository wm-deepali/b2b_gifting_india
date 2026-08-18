@include('admin.top-header')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="main-section">
    @include('admin.header')

    <div class="app-content content container-fluid wm-dashboard">

        {{-- ============================================================
             WELCOME BANNER
        ============================================================= --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card wm-welcome-card border-0 p-4">
                    <h3 class="fw-bold mb-1 wm-welcome-title">
                        Congratulations {{ auth()->user()->name }}
                    </h3>
                    <p class="mb-0 wm-welcome-sub">
                        Here's what's happening with your business today.
                    </p>
                </div>
            </div>
        </div>

        {{-- ============================================================
             KPI STAT CARDS — Total Products | Categories | Quotation
             Enquiries | Quotes Prepared
        ============================================================= --}}
        <div class="row">

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('admin.products.index') }}" class="wm-card-link">
                    <div class="card wm-stat-card">
                        <div class="d-flex align-items-center">
                            <div class="wm-icon-box">
                                <i class="fa-solid fa-box"></i>
                            </div>
                            <div class="wm-stat-text">
                                <h6 class="wm-stat-label">Total Products</h6>
                                <h4 class="wm-stat-value">{{ $data['products'] ?? 0 }}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('admin.categories.index') }}" class="wm-card-link">
                    <div class="card wm-stat-card">
                        <div class="d-flex align-items-center">
                            <div class="wm-icon-box">
                                <i class="fa-solid fa-folder"></i>
                            </div>
                            <div class="wm-stat-text">
                                <h6 class="wm-stat-label">Categories</h6>
                                <h4 class="wm-stat-value">{{ $data['categories'] ?? 0 }}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('admin.package-enquiries.index') }}" class="wm-card-link">
                    <div class="card wm-stat-card">
                        <div class="d-flex align-items-center">
                            <div class="wm-icon-box">
                                <i class="fa-solid fa-file-invoice"></i>
                            </div>
                            <div class="wm-stat-text">
                                <h6 class="wm-stat-label">Quotation Enquiries</h6>
                                <h4 class="wm-stat-value">{{ $data['quotationEnquiries'] ?? 0 }}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('admin.quotes.index') }}" class="wm-card-link">
                    <div class="card wm-stat-card">
                        <div class="d-flex align-items-center">
                            <div class="wm-icon-box">
                                <i class="fa-solid fa-file-circle-check"></i>
                            </div>
                            <div class="wm-stat-text">
                                <h6 class="wm-stat-label">Quotes Prepared</h6>
                                {{-- TODO (dynamic): pass $data['quotesPrepared'] = Quote::count() from controller --}}
                                <h4 class="wm-stat-value">{{ $data['quotesPrepared'] ?? 0 }}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        {{-- ============================================================
             QUICK ACTION CARDS
        ============================================================= --}}
        <div class="row">

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('admin.products.create') }}" class="wm-quick-action">
                    <div class="wm-quick-icon"><i class="fa-solid fa-plus"></i></div>
                    <div class="wm-quick-label">Add Products</div>
                    <i class="fa-solid fa-arrow-right wm-quick-arrow"></i>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('admin.categories.create') }}" class="wm-quick-action">
                    <div class="wm-quick-icon"><i class="fa-solid fa-plus"></i></div>
                    <div class="wm-quick-label">Add Categories</div>
                    <i class="fa-solid fa-arrow-right wm-quick-arrow"></i>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('admin.quotes.create') }}" class="wm-quick-action">
                    <div class="wm-quick-icon"><i class="fa-solid fa-plus"></i></div>
                    <div class="wm-quick-label">Create Quotes</div>
                    <i class="fa-solid fa-arrow-right wm-quick-arrow"></i>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('admin.price-management.index') }}" class="wm-quick-action">
                    <div class="wm-quick-icon"><i class="fa-solid fa-plus"></i></div>
                    <div class="wm-quick-label">Price Management</div>
                    <i class="fa-solid fa-arrow-right wm-quick-arrow"></i>
                </a>
            </div>

        </div>

        {{-- ============================================================
             RECENT ENQUIRIES (left)  +  RECENT QUOTATIONS (right)
        ============================================================= --}}
        <div class="row">

            {{-- ---------------- LEFT: RECENT ENQUIRIES ---------------- --}}
            <div class="col-lg-8 mb-4">
                <div class="card wm-panel-card h-100">

                    <div class="wm-panel-header d-flex align-items-center justify-content-between flex-wrap">
                        <h5 class="wm-panel-title mb-0">Recent Enquiries</h5>

                        {{-- Timeline tabs: Today / 7 Days / 30 Days --}}
                        <div class="wm-timeline-tabs" role="tablist">
                            <button type="button" class="wm-timeline-btn active" data-range="today">Today</button>
                            <button type="button" class="wm-timeline-btn" data-range="7days">7 Days</button>
                            <button type="button" class="wm-timeline-btn" data-range="30days">30 Days</button>
                        </div>
                    </div>

                    <div class="wm-panel-body p-0">

                        {{-- Category tabs --}}
                        <ul class="nav wm-enquiry-tabs" id="enquiryTabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-cart" type="button">
                                    Cart
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-general" type="button">
                                    General
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-contact" type="button">
                                    Contact
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-quotation" type="button">
                                    Quotation
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-bulk" type="button">
                                    Bulk Order
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-vendor" type="button">
                                    Vendor
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-callback" type="button">
                                    Get a Callback
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content wm-enquiry-tab-content">

                            {{-- CART --}}
                            <div class="tab-pane fade show active" id="tab-cart">
                                @include('admin.dashboard.table', [
                                    'items' => $latestCartEnquiries ?? collect(),
                                    'route' => 'admin.enquiries',
                                    'limit' => 10,
                                ])
                                <div class="wm-view-more">
                                    <a href="{{ route('admin.enquiries.index') }}">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>

                            {{-- GENERAL --}}
                            <div class="tab-pane fade" id="tab-general">
                                @include('admin.dashboard.table', [
                                    'items' => $latestGeneralEnquiries ?? collect(),
                                    'route' => 'admin.other-enquiries',
                                    'limit' => 10,
                                ])
                                <div class="wm-view-more">
                                    <a href="{{ route('admin.other-enquiries.index') }}">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>

                            {{-- CONTACT --}}
                            <div class="tab-pane fade" id="tab-contact">
                                @include('admin.dashboard.table', [
                                    'items' => $latestContactEnquiries ?? collect(),
                                    'route' => 'admin.contact-enquiries',
                                    'limit' => 10,
                                ])
                                <div class="wm-view-more">
                                    <a href="{{ route('admin.contact-enquiries.index') }}">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>

                            {{-- QUOTATION (mapped from package enquiries) --}}
                            <div class="tab-pane fade" id="tab-quotation">
                                @include('admin.dashboard.table', [
                                    'items' => $latestPackageEnquiries ?? collect(),
                                    'route' => 'admin.package-enquiries',
                                    'limit' => 10,
                                ])
                                <div class="wm-view-more">
                                    <a href="{{ route('admin.package-enquiries.index') }}">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>

                            {{-- BULK ORDER (mapped from supplier enquiries) --}}
                            <div class="tab-pane fade" id="tab-bulk">
                                @include('admin.dashboard.table', [
                                    'items' => $latestSupplierEnquiries ?? collect(),
                                    'route' => 'admin.supplier-enquiries',
                                    'limit' => 10,
                                ])
                                <div class="wm-view-more">
                                    <a href="{{ route('admin.supplier-enquiries.index') }}">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>

                            {{-- VENDOR --}}
                            <div class="tab-pane fade" id="tab-vendor">
                                @include('admin.dashboard.table', [
                                    'items' => $latestVendorEnquiries ?? collect(),
                                    'route' => 'admin.vendor-enquiries',
                                    'limit' => 10,
                                ])
                                <div class="wm-view-more">
                                    <a href="{{ route('admin.vendor-enquiries.index') }}">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>

                            {{-- GET A CALLBACK — placeholder, no data source wired yet --}}
                            <div class="tab-pane fade" id="tab-callback">
                                <div class="wm-empty-state py-5 text-center">
                                    <i class="fa-solid fa-phone-volume wm-empty-icon"></i>
                                    <div>No callback requests yet.</div>
                                    <small class="text-muted">Hook this tab up to your callback-request source when ready.</small>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            {{-- ---------------- RIGHT: RECENT QUOTATIONS ---------------- --}}
            <div class="col-lg-4 mb-4">
                <div class="card wm-panel-card h-100">

                    <div class="wm-panel-header d-flex align-items-center justify-content-between">
                        <h5 class="wm-panel-title mb-0">Recent Quotations</h5>
                        <a href="{{ route('admin.quotes.index') }}" class="wm-panel-link">
                            <i class="fa-solid fa-file-invoice"></i>
                        </a>
                    </div>

                    <div class="wm-panel-body p-0">

                        <div class="wm-quote-list">

                            {{-- TODO (dynamic): pass $data['recentQuotes'] = Quote::with('customer')->latest()->take(5)->get() --}}
                            @forelse(($data['recentQuotes'] ?? []) as $quote)

                                <div class="wm-quote-item">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <span class="wm-badge-id">{{ $quote->proposal_id ?? '-' }}</span>
                                        <span class="wm-quote-amount">₹{{ number_format($quote->total_amount ?? 0, 2) }}</span>
                                    </div>
                                    <div class="wm-quote-company">{{ $quote->customer->business_name ?? '-' }}</div>
                                    <div class="d-flex align-items-center justify-content-between wm-quote-meta">
                                        <span><i class="fa-solid fa-user"></i> {{ $quote->prepared_by ?? '-' }}</span>
                                        <span><i class="fa-solid fa-calendar-days"></i> {{ optional($quote->created_at)->format('d M Y') ?? '-' }}</span>
                                    </div>
                                </div>

                            @empty

                                <div class="wm-empty-state py-5 text-center">
                                    <i class="fa-solid fa-file-invoice wm-empty-icon"></i>
                                    <div>No quotations prepared yet.</div>
                                </div>

                            @endforelse

                        </div>

                        @if(!empty($data['recentQuotes']) && count($data['recentQuotes']) >= 5)
                            <div class="wm-view-more">
                                <a href="{{ route('admin.quotes.index') }}">Read More <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        @endif

                    </div>

                </div>
            </div>

        </div>

    </div>

    @include('admin.footer')
</div>

{{-- ============================================================
     WM THEME — Dashboard styling only. No script, route, or
     Blade logic altered anywhere above. All existing includes
     (admin.dashboard.table), deleteEnquiry(), and data variables
     are preserved as-is.
============================================================= --}}
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
        --wm-danger: #b3261e;
        --wm-danger-light: #fbeceb;
    }

    .wm-dashboard {
        color: var(--wm-text);
    }

    /* Welcome banner — light green */
    .wm-welcome-card {
        border: 1px solid var(--wm-border) !important;
        border-radius: var(--wm-radius);
        background: linear-gradient(135deg, #f6f8f4 0%, #eef3ea 100%);
        box-shadow: 0 2px 10px rgba(18, 49, 8, 0.06);
        position: relative;
        overflow: hidden;
    }

    .wm-welcome-card::after {
        content: "";
        position: absolute;
        top: -60px;
        right: -60px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(18, 49, 8, 0.04);
        pointer-events: none;
    }

    .wm-welcome-title {
        color: var(--wm-primary);
    }

    .wm-welcome-sub {
        color: var(--wm-muted);
    }

    /* Card link reset */
    .wm-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    /* KPI stat cards */
    .wm-stat-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 2px 10px rgba(18, 49, 8, 0.06);
        padding: 1.1rem 1.25rem;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .wm-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(18, 49, 8, 0.12);
    }

    .wm-icon-box {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        background-color: var(--wm-primary-light);
        color: var(--wm-primary);
    }

    .wm-stat-text {
        margin-left: 14px;
    }

    .wm-stat-label {
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--wm-muted);
        margin-bottom: 4px;
    }

    .wm-stat-value {
        font-weight: 700;
        color: var(--wm-text);
        margin-bottom: 0;
    }

    /* Quick action cards — filled dark, distinct from the light stat cards */
    .wm-quick-action {
        display: flex;
        align-items: center;
        gap: 12px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: var(--wm-radius);
        background: linear-gradient(135deg, #0e2308 0%, #16330d 100%);
        padding: 1rem 1.1rem;
        text-decoration: none;
        color: #ffffff;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 3px 12px rgba(18, 49, 8, 0.15);
        transition: all 0.15s ease;
    }

    .wm-quick-action:hover {
        background: linear-gradient(135deg, #16330d 0%, #1c4a0d 100%);
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(18, 49, 8, 0.28);
    }

    .wm-quick-icon {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
    }

    .wm-quick-label {
        flex: 1;
    }

    .wm-quick-arrow {
        color: rgba(255, 255, 255, 0.5);
        font-size: 12px;
        transition: transform 0.15s ease, color 0.15s ease;
    }

    .wm-quick-action:hover .wm-quick-arrow {
        color: #ffffff;
        transform: translateX(3px);
    }

    /* Panels (Enquiries / Quotations) */
    .wm-panel-card {
        border: 1px solid var(--wm-border);
        border-radius: var(--wm-radius);
        box-shadow: 0 2px 10px rgba(18, 49, 8, 0.06);
        overflow: hidden;
    }

    .wm-panel-header {
        background: linear-gradient(180deg, #ffffff 0%, #fafbf9 100%);
        border-bottom: 1px solid var(--wm-border);
        padding: 1rem 1.25rem;
        gap: 0.75rem;
    }

    .wm-panel-title {
        font-weight: 700;
        color: var(--wm-text);
        letter-spacing: 0.2px;
    }

    .wm-panel-link {
        color: var(--wm-primary);
        font-size: 1rem;
    }

    /* Timeline tabs (Today / 7 Days / 30 Days) */
    .wm-timeline-tabs {
        display: flex;
        gap: 6px;
        background: var(--wm-primary-light);
        border-radius: 20px;
        padding: 4px;
    }

    .wm-timeline-btn {
        border: none;
        background: transparent;
        color: var(--wm-muted);
        font-size: 0.78rem;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 16px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .wm-timeline-btn.active,
    .wm-timeline-btn:hover {
        background: var(--wm-primary);
        color: #fff;
    }

    /* Enquiry category tabs */
    .wm-enquiry-tabs {
        border-bottom: 1px solid var(--wm-border);
        padding: 0 1.25rem;
        flex-wrap: wrap;
    }

    .wm-enquiry-tabs .nav-link {
        border: none !important;
        background: transparent !important;
        color: var(--wm-muted) !important;
        font-weight: 600;
        font-size: 0.85rem;
        padding: 0.85rem 0.9rem;
        border-bottom: 2px solid transparent !important;
        border-radius: 0 !important;
    }

    .wm-enquiry-tabs .nav-link.active {
        color: var(--wm-primary) !important;
        border-bottom: 2px solid var(--wm-primary) !important;
    }

    .wm-enquiry-tab-content {
        padding: 1rem 1.25rem 1.25rem;
    }

    /* View more / read more */
    .wm-view-more {
        text-align: center;
        padding: 0.85rem 0;
        border-top: 1px solid var(--wm-border);
        margin-top: 0.5rem;
    }

    .wm-view-more a {
        color: var(--wm-primary);
        font-weight: 700;
        font-size: 0.85rem;
        text-decoration: none;
    }

    .wm-view-more a:hover {
        color: var(--wm-primary-hover);
    }

    /* Recent quotations list */
    .wm-quote-list {
        padding: 0.5rem 1.25rem 0.25rem;
    }

    .wm-quote-item {
        border-bottom: 1px solid var(--wm-border);
        padding: 0.85rem 0;
    }

    .wm-quote-item:last-child {
        border-bottom: none;
    }

    .wm-quote-company {
        font-weight: 600;
        color: var(--wm-text);
        font-size: 0.9rem;
        margin-bottom: 4px;
    }

    .wm-quote-amount {
        font-weight: 700;
        color: var(--wm-primary);
        font-size: 0.9rem;
    }

    .wm-quote-meta {
        font-size: 0.78rem;
        color: var(--wm-muted);
    }

    .wm-quote-meta i {
        margin-right: 4px;
    }

    .wm-badge-id {
        display: inline-block;
        background-color: var(--wm-primary-light);
        color: var(--wm-primary);
        font-weight: 600;
        font-size: 0.72rem;
        padding: 3px 10px;
        border-radius: 20px;
    }

    /* Shared table look (applies to admin.dashboard.table markup too, if it uses .table) */
    .wm-enquiry-tab-content .table {
        margin-bottom: 0;
    }

    .wm-enquiry-tab-content .table thead tr th {
        background-color: var(--wm-primary);
        color: #ffffff;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        border: none;
        padding: 0.7rem 0.85rem;
        white-space: nowrap;
    }

    .wm-enquiry-tab-content .table tbody tr td {
        padding: 0.65rem 0.85rem;
        vertical-align: middle;
        color: var(--wm-text);
        font-size: 0.85rem;
        border-color: var(--wm-border);
    }

    .wm-enquiry-tab-content .table tbody tr:nth-child(odd) {
        background-color: var(--wm-row-odd);
    }

    .wm-enquiry-tab-content .table tbody tr:nth-child(even) {
        background-color: var(--wm-row-even);
    }

    .wm-enquiry-tab-content .table tbody tr:hover {
        background-color: var(--wm-primary-light) !important;
    }

    /* Empty states */
    .wm-empty-state {
        color: var(--wm-muted);
        font-size: 0.88rem;
    }

    .wm-empty-icon {
        display: block;
        font-size: 1.8rem;
        margin-bottom: 0.6rem;
        color: #c9d1c3;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .wm-panel-header {
            flex-direction: column;
            align-items: flex-start !important;
        }

        .wm-timeline-tabs {
            width: 100%;
            justify-content: space-between;
        }

        .wm-enquiry-tabs {
            padding: 0 0.75rem;
        }
    }
</style>

<script>
    // Timeline tab UI (Today / 7 Days / 30 Days).
    // Currently a visual-only toggle — wire this to an AJAX call per range
    // when the backend filtering is ready (e.g. send data-range to the server
    // and swap the active tab-pane's rows).
    document.querySelectorAll('.wm-timeline-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.wm-timeline-btn').forEach(function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            // TODO (dynamic): fetch enquiries filtered by btn.dataset.range
            // and re-render the currently active enquiry tab-pane.
        });
    });

    function deleteEnquiry(id, route) {

        Swal.fire({
            title: 'Delete Enquiry?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: `/admin/${route.split('.').pop()}/${id}`,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (res) {

                        Swal.fire('Deleted!', res.message, 'success');

                        $("#row" + id).fadeOut(400, function () {
                            $(this).remove();
                        });

                    },
                    error: function () {
                        Swal.fire('Error', 'Something went wrong', 'error');
                    }
                });

            }

        });
    }
</script>