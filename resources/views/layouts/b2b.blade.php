<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carspector | @yield('title', 'Partner Portal')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f6f9; }
        /* Sidebar — white */
        .main-sidebar { background: #ffffff !important; border-right: 1px solid #e9ecef; }
        .main-sidebar .brand-link { background: #fff; border-bottom: 1px solid #e9ecef !important; padding: 14px 16px; }
        .main-sidebar .brand-link img { max-height: 44px; max-width: 160px; object-fit: contain; }
        .main-sidebar .nav-sidebar .nav-link { color: #374151 !important; border-radius: 6px; margin: 2px 8px; }
        .main-sidebar .nav-sidebar .nav-link:hover { background: #f3f4f6 !important; color: #111827 !important; }
        .main-sidebar .nav-sidebar .nav-link.active { background: #0d6efd !important; color: #fff !important; }
        .main-sidebar .nav-icon { color: #6b7280 !important; }
        .main-sidebar .nav-link.active .nav-icon { color: #fff !important; }
        .main-sidebar .nav-link:hover .nav-icon { color: #111827 !important; }
        /* Partner logo in sidebar */
        .sidebar-partner-logo { text-align: center; padding: 16px 12px 8px; border-bottom: 1px solid #e9ecef; margin-bottom: 8px; }
        .sidebar-partner-logo img { max-height: 48px; max-width: 140px; object-fit: contain; }
        .sidebar-partner-name { color: #374151; font-size: 13px; font-weight: 600; text-align: center; padding: 0 12px 12px; }
        /* Top navbar */
        .main-header { background: #fff !important; border-bottom: 1px solid #e9ecef; }
        .main-header .navbar-nav .nav-link { color: #374151; }
        .navbar-company { font-weight: 600; color: #1a1a2e; font-size: 15px; }
        /* Content */
        .content-wrapper { background: #f4f6f9; }
        .card { border: none; box-shadow: 0 1px 4px rgba(0,0,0,0.10); border-radius: 8px; }
        /* Status badges */
        .badge-b2b    { background: #6f42c1; color: #fff; }
        .badge-active { background: #198754; color: #fff; }
        [data-widget="pushmenu"] { display: none !important; }

        @media (min-width: 992px) {
            .main-sidebar { box-shadow: none !important; }
        }
        @media (max-width: 767.98px) {
            [data-widget="pushmenu"] { display: inline-flex !important; }
        }
    </style>

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- TOP NAVBAR --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item me-3">
                <span class="navbar-company">
                    <i class="fas fa-building me-1 text-muted"></i>
                    {{ auth()->guard('b2b')->user()->company_name }}
                </span>
            </li>
            <li class="nav-item">
                <a href="{{ route('b2b.logout') }}" class="nav-link text-danger fw-semibold">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
    {{-- END TOP NAVBAR --}}

    {{-- SIDEBAR --}}
    <aside class="main-sidebar elevation-0">
        <a href="{{ route('b2b.dashboard') }}" class="brand-link">
            <img src="{{ asset('logo-pdf.png') }}" alt="Carspector">
        </a>

        <div class="sidebar">
            @php($b2bPartner = auth()->guard('b2b')->user())
            @if($b2bPartner && $b2bPartner->logo_path)
            <div class="sidebar-partner-logo">
                <img src="{{ Storage::url($b2bPartner->logo_path) }}" alt="{{ $b2bPartner->company_name }}">
            </div>
            @endif
            <div class="sidebar-partner-name">{{ $b2bPartner->company_name ?? '' }}</div>

            <nav class="mt-1">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    <li class="nav-item">
                        <a href="{{ route('b2b.dashboard') }}"
                           class="nav-link {{ request()->routeIs('b2b.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('b2b.orders.create') }}"
                           class="nav-link {{ request()->routeIs('b2b.orders.create') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>New Order</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('b2b.orders') }}"
                           class="nav-link {{ request()->routeIs('b2b.orders') || request()->routeIs('b2b.orders.show') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>My Orders</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>
    {{-- END SIDEBAR --}}

    {{-- CONTENT WRAPPER --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @yield('breadcrumb')
            </div>
        </div>
        <div class="content py-3">
            <div class="container-fluid">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
    {{-- END CONTENT WRAPPER --}}

    <footer class="main-footer text-center text-muted" style="font-size:12px;">
        &copy; {{ date('Y') }} Carspector GmbH
    </footer>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@yield('js')
</body>
</html>
