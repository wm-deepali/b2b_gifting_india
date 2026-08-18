<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Krishna Chikan">
  <meta name="keywords" content="Krishna Chikan">
  <meta name="author" content="Webmingo">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Admin Dashboard</title>
  <!--  <title>Krishna Chikan | @yield('title')</title> -->
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- END VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/datatable.css') }}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- END Custom CSS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/header.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  </script>

  {{-- ==========================================================
  WM Theme override — top header only. No meta tag, link tag,
  or script above/below this block was touched. Colors/spacing
  only; no display/position/z-index rules, so any existing
  dropdown behaviour from header.css / header.js keeps working
  exactly as before.
  ========================================================== --}}
  <style>
    :root {
      --wm-primary: #123108;
      --wm-primary-hover: #1c4a0d;
      --wm-primary-light: #eef3ea;
      --wm-border: #e6e9e3;
      --wm-text: #23291f;
      --wm-muted: #6b7568;
      --wm-radius: 10px;
      --wm-danger: #b3261e;
      --wm-danger-light: #fbeceb;
    }

    /* Top bar shell — dark green */
    .top-header-sec {
      background-color: #0e2308 !important;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
      box-shadow: 0 2px 10px rgba(18, 49, 8, 0.18);
    }

    .admin-logo img {
      max-height: 42px;
      width: auto;
    }

    /* Admin dropdown trigger */
    .top-main-header .dropdown-toggle {
      color: var(--wm-primary) !important;
      font-weight: 600;
      font-size: 0.9rem;
      padding: 0.4rem 0.85rem !important;
      border-radius: 20px !important;
      background-color: #ffffff !important;
      border: 1px solid rgba(255, 255, 255, 0.5) !important;
      transition: background-color 0.15s ease, color 0.15s ease, border-color 0.15s ease;
    }

    .top-main-header .dropdown-toggle:hover,
    .top-main-header .dropdown-toggle:focus {
      background-color: var(--wm-primary-hover) !important;
      color: #ffffff !important;
      border-color: var(--wm-primary-hover) !important;
    }

    .top-main-header .dropdown-toggle i,
    .top-main-header .dropdown-toggle .fa-solid {
      margin-right: 6px;
    }

    .top-main-header .dropdown-toggle::after {
      margin-left: 8px;
      vertical-align: middle;
    }

    /* Admin dropdown menu */
    .header-dropdown {
      border: 1px solid var(--wm-border) !important;
      border-radius: var(--wm-radius) !important;
      box-shadow: 0 8px 24px rgba(18, 49, 8, 0.14) !important;
      padding: 0.4rem !important;
      margin-top: 8px !important;
    }

    .header-dropdown .dropdown-item {
      border-radius: 8px;
      font-size: 0.88rem;
      font-weight: 500;
      color: var(--wm-text) !important;
      padding: 0.55rem 0.75rem !important;
      transition: background-color 0.15s ease, color 0.15s ease;
    }

    .header-dropdown .dropdown-item:hover,
    .header-dropdown .dropdown-item:focus {
      background-color: var(--wm-primary-light) !important;
      color: var(--wm-primary) !important;
    }

    .header-dropdown .dropdown-item i {
      color: var(--wm-muted);
      width: 16px;
    }

    .header-dropdown .dropdown-item:hover i {
      color: var(--wm-primary);
    }

    /* Session alerts (kept .d-none as-is in header markup — this only
       styles them in case that class is ever removed elsewhere) */
    .top-header-sec .alert-info {
      background-color: var(--wm-primary-light) !important;
      border-color: var(--wm-border) !important;
      color: var(--wm-primary) !important;
      border-radius: 8px;
    }

    .top-header-sec .alert-danger {
      background-color: var(--wm-danger-light) !important;
      border-color: var(--wm-danger-light) !important;
      color: var(--wm-danger) !important;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="top-header-sec py-1 bg-light border-bottom mb-2">
    <div class="container-fluid">
      <div class="top-main-header d-flex align-items-center">
        <div class="admin-logo">
          <img src="{{ asset('images/B2B_logo.png') }}">
        </div>
        <div class="ml-auto">
          <div class="btn-group">
            <button class="btn bg-transparent p-0 dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-user-circle"></i> Admin
            </button>
            <div class="dropdown-menu keep-open header-dropdown">
              <a class="dropdown-item" href="{{ url('admin/profile-setting') }}">
                <i class="fa-solid fa-user mr-2"></i> Profile
              </a>
              <a class="dropdown-item" href="{{ url('admin/logout') }}">
                <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript">
    jQuery('.dropdown-menu.keep-open').on('click', function (e) {
      e.stopPropagation();
    });
    if (1) {
      $('body').attr('tabindex', '0');
    }
    else {
      alertify.confirm().set({ 'reverseButtons': true });
      alertify.prompt().set({ 'reverseButtons': true });
    }
  </script>