@include('admin.top-header')

<style>
  .stats-card {
    transition: 0.3s ease;
    cursor: pointer;
  }

  .stats-card:hover {
    transform: translateY(-5px);
  }

  .icon-box {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }

  .card-link {
    text-decoration: none;
    color: inherit;
  }
</style>

<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">

    <!-- HEADER -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 p-4"
          style="background: linear-gradient(135deg, #e8f1ff, #f3e8ff, #fff1e6);">

          <h3 class="fw-bold mb-1 text-primary">
            Congratulations {{ auth()->user()->name }}
          </h3>

          <p class="text-muted mb-0">
            Here’s what’s happening with your business today 🚀
          </p>

        </div>
      </div>
    </div>

    <!-- ================= STATS ================= -->
    <div class="row">

      <!-- PRODUCTS -->
      <div class="col-md-3 mb-4">
        <a href="{{ route('admin.products.index') }}" class="card-link">
          <div class="card stats-card shadow-sm rounded-4 p-3">
            <div class="d-flex align-items-center">
              <div class="icon-box bg-primary text-white me-3">
                <i class="fa fa-box"></i>
              </div>
              <div style="margin-left:10px;">
                <h6 class="mb-1">Products</h6>
                <h4 class="fw-bold">{{ $data['products'] ?? 0 }}</h4>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- CATEGORIES -->
      <div class="col-md-3 mb-4">
        <a href="{{ route('admin.categories.index') }}" class="card-link">
          <div class="card stats-card shadow-sm rounded-4 p-3">
            <div class="d-flex align-items-center">
              <div class="icon-box bg-success text-white me-3">
                <i class="fa fa-folder"></i>
              </div>
              <div style="margin-left:10px;"> 
                <h6 class="mb-1">Categories</h6>
                <h4 class="fw-bold">{{ $data['categories'] ?? 0 }}</h4>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- PACKAGES -->
      <div class="col-md-3 mb-4">
        <a href="{{ route('admin.packages.index') }}" class="card-link">
          <div class="card stats-card shadow-sm rounded-4 p-3">
            <div class="d-flex align-items-center">
              <div class="icon-box bg-warning text-white me-3">
                <i class="fa fa-box-open"></i>
              </div>
              <div style="margin-left:10px;">
                <h6 class="mb-1">Packages</h6>
                <h4 class="fw-bold">{{ $data['packages'] ?? 0 }}</h4>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- TOTAL ENQUIRIES -->
      <div class="col-md-3 mb-4">
        <a href="{{ route('admin.enquiries.index') }}" class="card-link">
          <div class="card stats-card shadow-sm rounded-4 p-3">
            <div class="d-flex align-items-center">
              <div class="icon-box bg-danger text-white me-3">
                <i class="fa fa-envelope"></i>
              </div>
              <div style="margin-left:10px;">
                <h6 class="mb-1">Total Enquiries</h6>
                <h4 class="fw-bold">{{ $data['enquiries'] ?? 0 }}</h4>
              </div>
            </div>
          </div>
        </a>
      </div>

    </div>

    <!-- ================= EXTRA ================= -->
    <div class="row">

      <!-- TODAY -->
      <div class="col-md-4 mb-4">
        <div class="card stats-card shadow-sm rounded-4 p-3">
          <div class="d-flex align-items-center">
            <div class="icon-box bg-info text-white me-3">
              <i class="fa fa-calendar-day"></i>
            </div>
            <div style="margin-left:10px;">
              <h6 class="mb-1">Today's Enquiries</h6>
              <h4 class="fw-bold">{{ $data['todayEnquiries'] ?? 0 }}</h4>
            </div>
          </div>
        </div>
      </div>

      <!-- CONTACT -->
      <div class="col-md-4 mb-4">
        <a href="{{ route('admin.contact-enquiries.index') }}" class="card-link">
          <div class="card stats-card shadow-sm rounded-4 p-3">
            <div class="d-flex align-items-center">
              <div class="icon-box bg-secondary text-white me-3">
                <i class="fa fa-address-book"></i>
              </div>
              <div style="margin-left:10px;">
                <h6 class="mb-1">Contact Enquiries</h6>
                <h4 class="fw-bold">{{ $data['contactEnquiries'] ?? 0 }}</h4>
              </div>
            </div>
          </div>
        </a>
      </div>

    </div>

    <!-- ================= LATEST ENQUIRIES ================= -->
    <div class="card shadow-sm rounded-4 mt-4">
      <div class="card-body">

        <h5 class="mb-3">Latest Enquiries</h5>

        <div class="table-responsive">
          <table class="table table-striped table-hover">

            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
              </tr>
            </thead>

            <tbody>
              @forelse($latestEnquiries as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->created_at->format('d M Y') }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="text-center text-muted py-3">
                    No enquiries yet
                  </td>
                </tr>
              @endforelse
            </tbody>

          </table>
        </div>

      </div>
    </div>

    @include('admin.footer')
  </div>
</div>