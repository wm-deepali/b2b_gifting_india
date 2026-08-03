@include('admin.top-header')
<div class="main-section">
    @include('admin.header')

    <style>
        .main-section { display: flex !important; flex-direction: row !important; align-items: stretch !important; min-height: 100vh !important; overflow: hidden !important; }
        .main-section #cssmenu { flex-shrink: 0 !important; flex-grow: 0 !important; width: 280px !important; min-width: 280px !important; max-width: 280px !important; overflow-y: auto !important; overflow-x: hidden !important; position: sticky !important; top: 0 !important; height: 100vh !important; align-self: flex-start !important; }
        .main-section .app-content, .main-section .app-content.content.container-fluid { flex: 1 1 0% !important; min-width: 0 !important; max-width: 100% !important; overflow-x: auto !important; box-sizing: border-box !important; }

        :root {
            --bg: #f6f8f4; --surface: #ffffff; --border: #e6e9e3; --text-primary: #23291f;
            --text-secondary: #6b7568; --text-hint: #8c9583; --accent: #123108; --accent-hover: #1c4a0d;
            --accent-light: #eef3ea; --green: #123108; --green-bg: #eef3ea;
            --red: #b3261e; --red-bg: #fbeceb; --amber: #8a6300; --amber-bg: #fff8e1;
            --radius-sm: 8px; --radius-md: 10px;
            --shadow-card: 0 2px 10px rgba(18, 49, 8, 0.06);
            --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .stock-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); }
        .stock-page * { box-sizing: border-box; }

        .page-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
        .page-header h1 { font-size: 20px; font-weight: 700; color: var(--text-primary); margin: 0; }
        .crumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
        .crumb a { color: var(--accent); text-decoration: none; }
        .crumb a:hover { text-decoration: underline; }
        .crumb span { margin: 0 5px; }

        .kpi-strip { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 20px; }
        @media(max-width:900px) { .kpi-strip { grid-template-columns: repeat(1, 1fr); } }
        .kpi-tile { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 18px 20px; box-shadow: var(--shadow-card); display: flex; align-items: center; gap: 14px; }
        .kpi-icon { width: 42px; height: 42px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .kpi-icon.green { background: var(--green-bg); color: var(--green); }
        .kpi-icon.amber { background: var(--amber-bg); color: var(--amber); }
        .kpi-icon.red { background: var(--red-bg); color: var(--red); }
        .kpi-label { font-size: 11.5px; font-weight: 700; color: var(--text-hint); text-transform: uppercase; letter-spacing: .04em; }
        .kpi-value { font-size: 24px; font-weight: 750; color: var(--text-primary); line-height: 1.1; margin-top: 3px; }
        .kpi-sub { font-size: 11.5px; color: var(--text-hint); margin-top: 4px; }

        .stock-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }

        .filter-bar { padding: 14px 20px; border-bottom: 1px solid var(--border); }
        .filter-row { display: flex; flex-wrap: wrap; gap: 10px; align-items: flex-end; }
        .filter-group { display: flex; flex-direction: column; gap: 5px; }
        .filter-group label { font-size: 11.5px; font-weight: 700; color: var(--text-secondary); letter-spacing: .03em; text-transform: uppercase; }
        .filter-control { height: 36px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 11px; font-size: 13px; color: var(--text-primary); background: #fbfcfa; outline: none; transition: border-color .15s; font-family: var(--font); min-width: 160px; }
        .filter-control:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(18,49,8,.12); background: #fff; }
        .btn-filter { height: 36px; display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff; border: none; border-radius: var(--radius-sm); padding: 0 16px; font-size: 13px; font-weight: 600; cursor: pointer; font-family: var(--font); transition: background .15s; }
        .btn-filter:hover { background: var(--accent-hover); }
        .btn-filter-reset { height: 36px; display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary); border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 14px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none; font-family: var(--font); transition: background .15s; }
        .btn-filter-reset:hover { background: var(--bg); }

        .table-wrap { overflow-x: auto; }
        .stock-table { width: 100%; border-collapse: collapse; font-size: 13px; font-family: var(--font); }
        .stock-table thead th { font-size: 11px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: #ffffff; padding: 10px 16px; border: none; background: var(--accent); text-align: left; white-space: nowrap; }
        .stock-table tbody tr { border-bottom: 1px solid var(--border); transition: background .1s; }
        .stock-table tbody tr:last-child { border-bottom: none; }
        .stock-table tbody tr:nth-child(odd) { background-color: #ffffff; }
        .stock-table tbody tr:nth-child(even) { background-color: #f6f8f4; }
        .stock-table tbody tr:hover { background: var(--accent-light) !important; }
        .stock-table tbody td { padding: 13px 16px; vertical-align: middle; }

        .prod-thumb { width: 48px; height: 48px; border-radius: var(--radius-sm); object-fit: cover; border: 1px solid var(--border); flex-shrink: 0; }
        .prod-name { font-weight: 600; font-size: 13px; color: var(--text-primary); }
        .prod-sub { font-size: 11.5px; color: var(--text-hint); margin-top: 2px; }

        .price-input { width: 100px; height: 32px; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 0 10px; font-size: 13px; font-weight: 600; color: var(--text-primary); background: #fbfcfa; outline: none; font-family: var(--font); text-align: right; transition: border-color .15s, box-shadow .15s, background .2s; }
        .price-input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(18,49,8,.12); background: #fff; }
        .price-input.saved { border-color: var(--green); background: var(--green-bg); }
        .price-input.error { border-color: var(--red); background: var(--red-bg); }

        .discount-type-select { height: 32px; border: 1px solid var(--border); border-radius: var(--radius-sm); font-size: 12px; padding: 0 6px; font-family: var(--font); background: #fbfcfa; outline: none; margin-top: 4px; width: 100px; }

        .save-indicator { display: inline-flex; align-items: center; gap: 4px; font-size: 10.5px; font-weight: 600; margin-top: 3px; height: 14px; }
        .save-indicator.saving { color: var(--amber); }
        .save-indicator.saved { color: var(--green); }
        .save-indicator.error { color: var(--red); }

        .pag-row { padding: 14px 20px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; background: #fafbf9; }
        .pag-info { font-size: 12.5px; color: var(--text-hint); }

        @media(max-width:768px) {
            .stock-page { padding: 16px; }
            .filter-row { flex-direction: column; }
            .filter-control { min-width: 100%; }
        }
    </style>

    <div class="app-content content container-fluid">
        <div class="stock-page">

            <div class="page-header">
                <div>
                    <h1>Price Management</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Price Management
                    </div>
                </div>
            </div>

            <div class="kpi-strip">
                <div class="kpi-tile">
                    <div class="kpi-icon green"><i class="fa fa-cubes"></i></div>
                    <div>
                        <div class="kpi-label">Total Products</div>
                        <div class="kpi-value">{{ number_format($stats['total']) }}</div>
                        <div class="kpi-sub">In catalogue</div>
                    </div>
                </div>
                <div class="kpi-tile">
                    <div class="kpi-icon amber"><i class="fa fa-tag"></i></div>
                    <div>
                        <div class="kpi-label">No Discount Set</div>
                        <div class="kpi-value">{{ number_format($stats['no_discount']) }}</div>
                        <div class="kpi-sub">Products without a discount</div>
                    </div>
                </div>
                <div class="kpi-tile">
                    <div class="kpi-icon red"><i class="fa fa-exclamation-triangle"></i></div>
                    <div>
                        <div class="kpi-label">Missing Landing Price</div>
                        <div class="kpi-value">{{ number_format($stats['no_landing_price']) }}</div>
                        <div class="kpi-sub">Margin can't be tracked</div>
                    </div>
                </div>
            </div>

            <div class="stock-card">

                <form method="GET" action="{{ route('admin.price-management.index') }}" class="filter-bar">
                    <div class="filter-row">
                        <div class="filter-group" style="flex:1">
                            <label>Search</label>
                            <input type="text" name="search" class="filter-control" style="min-width:220px"
                                placeholder="Product name, SKU, or code…" value="{{ request('search') }}">
                        </div>
                        <div class="filter-group">
                            <label>Category</label>
                            <select name="category_id" class="filter-control">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (string) request('category_id') === (string) $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Sub Category</label>
                            <select name="subcategory_id" class="filter-control">
                                <option value="">All Sub Categories</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ (string) request('subcategory_id') === (string) $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div style="display:flex;gap:8px;align-items:flex-end">
                            <button type="submit" class="btn-filter"><i class="fa fa-search"></i> Search</button>
                            <a href="{{ route('admin.price-management.index') }}" class="btn-filter-reset"><i class="fa fa-refresh"></i> Reset</a>
                        </div>
                    </div>
                </form>

                <div class="table-wrap">
                    <table class="stock-table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>MRP</th>
                                <th>Discount</th>
                                <th>Offer Price</th>
                                <th>Landing Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr data-product-id="{{ $product->id }}">
                                    <td>
                                        <div style="display:flex;align-items:center;gap:10px">
                                            <img src="{{ $product->display_image ? asset('storage/' . $product->display_image) : 'https://placehold.co/48x48/eef3ea/123108?text=P' }}"
                                                class="prod-thumb" alt="">
                                            <div>
                                                <div class="prod-name">{{ $product->name }}</div>
                                                <div class="prod-sub">
                                                    @if($product->subcategory_names)
                                                        {{ $product->subcategory_names }}
                                                    @elseif($product->category_names)
                                                        {{ $product->category_names }}
                                                    @else
                                                        Uncategorized
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0" class="price-input price-field"
                                            data-field="mrp" value="{{ $product->mrp }}">
                                        <div class="save-indicator"></div>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0" class="price-input price-field"
                                            data-field="discount" value="{{ $product->discount }}">
                                        <select class="discount-type-select price-field" data-field="discount_type">
                                            <option value="flat" {{ $product->discount_type == 'flat' ? 'selected' : '' }}>₹ Flat</option>
                                            <option value="percentage" {{ $product->discount_type == 'percentage' ? 'selected' : '' }}>% Percent</option>
                                        </select>
                                        <div class="save-indicator"></div>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0" class="price-input price-field"
                                            data-field="price" value="{{ $product->price }}">
                                        <div class="save-indicator"></div>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" min="0" class="price-input price-field"
                                            data-field="landing_price" value="{{ $product->landing_price }}">
                                        <div class="save-indicator"></div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center;padding:40px;color:var(--text-hint)">
                                        No products match these filters.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pag-row">
                    <div class="pag-info">
                        Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of
                        {{ number_format($products->total()) }} products
                    </div>
                    <nav>
                        {{ $products->onEachSide(1)->links() }}
                    </nav>
                </div>

            </div>

        </div>
    </div>

</div>

@include('admin.footer')

<script>
    const PRICE_UPDATE_URL_TEMPLATE = "{{ route('admin.price-management.update', ['product' => '__ID__']) }}";
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    let debounceTimers = {};

    document.querySelectorAll('tr[data-product-id]').forEach(row => {
        const productId = row.dataset.productId;

        row.querySelectorAll('.price-field').forEach(field => {
            const eventType = field.tagName === 'SELECT' ? 'change' : 'input';

            field.addEventListener(eventType, function () {
                clearTimeout(debounceTimers[productId]);
                debounceTimers[productId] = setTimeout(() => saveRow(row, productId), 600);
            });
        });
    });

    async function saveRow(row, productId) {
        const indicators = row.querySelectorAll('.save-indicator');
        const inputs = row.querySelectorAll('.price-field');

        indicators.forEach(ind => {
            ind.className = 'save-indicator saving';
            ind.innerHTML = '<i class="fa fa-circle-o-notch fa-spin"></i> Saving…';
        });

        const payload = {};
        inputs.forEach(inp => {
            payload[inp.dataset.field] = inp.value;
        });

        try {
            const url = PRICE_UPDATE_URL_TEMPLATE.replace('__ID__', productId);
            const res = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(payload),
            });

            if (!res.ok) throw new Error('Request failed');
            await res.json();

            inputs.forEach(inp => {
                if (inp.tagName !== 'SELECT') {
                    inp.classList.add('saved');
                    setTimeout(() => inp.classList.remove('saved'), 1200);
                }
            });

            indicators.forEach(ind => {
                ind.className = 'save-indicator saved';
                ind.innerHTML = '<i class="fa fa-check"></i> Saved';
                setTimeout(() => { ind.innerHTML = ''; ind.className = 'save-indicator'; }, 1500);
            });
        } catch (err) {
            inputs.forEach(inp => {
                if (inp.tagName !== 'SELECT') inp.classList.add('error');
            });
            indicators.forEach(ind => {
                ind.className = 'save-indicator error';
                ind.innerHTML = '<i class="fa fa-times"></i> Failed';
            });
        }
    }
</script>