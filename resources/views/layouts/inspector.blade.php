<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carspector | @yield('title', 'Inspektor-Portal')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f6f9; }
        .main-sidebar { background: #ffffff !important; border-right: 1px solid #e9ecef; }
        .main-sidebar .brand-link { background: #fff; border-bottom: 1px solid #e9ecef !important; padding: 14px 16px; }
        .main-sidebar .brand-link img { max-height: 44px; max-width: 160px; object-fit: contain; }
        .main-sidebar .nav-sidebar .nav-link { color: #374151 !important; border-radius: 6px; margin: 2px 8px; }
        .main-sidebar .nav-sidebar .nav-link:hover { background: #f3f4f6 !important; color: #111827 !important; }
        .main-sidebar .nav-sidebar .nav-link.active { background: #0d6efd !important; color: #fff !important; }
        .main-sidebar .nav-icon { color: #6b7280 !important; }
        .main-sidebar .nav-link.active .nav-icon { color: #fff !important; }
        .main-header { background: #fff !important; border-bottom: 1px solid #e9ecef; }
        .content-wrapper { background: #f4f6f9; }
        .card { border: none; box-shadow: 0 1px 4px rgba(0,0,0,0.10); border-radius: 8px; }
        .badge-pending  { background:#ffc107;color:#212529; }
        .badge-accepted { background:#198754;color:#fff; }
        .badge-declined { background:#dc3545;color:#fff; }
        [data-widget="pushmenu"] { display: none !important; }
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
                <span class="fw-semibold" style="color:#374151;">
                    <i class="fas fa-user-circle me-1 text-muted"></i>
                    {{ auth()->guard('inspector')->user()->name }}
                </span>
            </li>
            <li class="nav-item">
                <a href="{{ route('inspector.logout') }}" class="nav-link text-danger fw-semibold">
                    <i class="fas fa-sign-out-alt me-1"></i> Abmelden
                </a>
            </li>
        </ul>
    </nav>
    {{-- END NAVBAR --}}

    {{-- SIDEBAR --}}
    <aside class="main-sidebar elevation-0">
        <a href="{{ route('inspector.requests') }}" class="brand-link">
            <img src="{{ asset('logo-pdf.png') }}" alt="Carspector">
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    <li class="nav-item">
                        <a href="{{ route('inspector.requests') }}"
                           class="nav-link {{ request()->routeIs('inspector.requests*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>Offene Anfragen</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('inspector.active-orders') }}"
                           class="nav-link {{ request()->routeIs('inspector.active-orders*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-check"></i>
                            <p>Aktive Aufträge</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('inspector.completed-orders') }}"
                           class="nav-link {{ request()->routeIs('inspector.completed-orders*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-check-double"></i>
                            <p>Abgeschlossene Aufträge</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('inspector.service-areas') }}"
                           class="nav-link {{ request()->routeIs('inspector.service-areas*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>Mein Servicegebiet</p>
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
