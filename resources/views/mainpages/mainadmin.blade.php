<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Carspector - Admin Panel</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- DataTables Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
    <!-- DateRangePicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .main-sidebar { z-index: 1038; }
        .brand-link { border-bottom: 1px solid rgba(255,255,255,0.1); }
        .brand-link .brand-image-logo {
            width: 150px;
            max-height: 42px;
            object-fit: contain;
        }
        .nav-sidebar .nav-item > .nav-link { font-size: 0.9rem; }
        .content-wrapper { background-color: #f4f6f9; }
        .card { border: none; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2); }
        .main-header { border-bottom: 1px solid #dee2e6; }
        .navbar-user-link {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            color: #374151 !important;
            font-weight: 600;
        }
        .navbar-user-link.text-danger { color: #dc3545 !important; }

        /* ── DataTable global fixes ── */
        /* Constrain all images inside DataTables to avatar size */
        #kt_table_users img {
            width: 40px !important;
            height: 40px !important;
            object-fit: cover;
            border-radius: 50%;
            flex-shrink: 0;
        }
        /* Keentheme symbol compat — keep images round and small */
        .symbol { display: inline-flex; align-items: center; justify-content: center; }
        .symbol-circle { border-radius: 50%; overflow: hidden; }
        .symbol-50px, .symbol-45px { width: 40px; height: 40px; flex-shrink: 0; }
        .symbol-label { width: 100%; height: 100%; overflow: hidden; }
        .symbol-label img { width: 100% !important; height: 100% !important; object-fit: cover; }

        /* Prevent action buttons from stacking / wrapping */
        #kt_table_users td:last-child,
        #kt_table_users .action-cell {
            white-space: nowrap;
        }
        #kt_table_users th {
            white-space: nowrap;
        }
        /* Keep action buttons inline */
        #kt_table_users .btn { margin-bottom: 0; }

        /* Card header — allow filter+button toolbar to stay on one line */
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            min-height: auto;
        }
        .card-title { margin-bottom: 0; }
        .card-toolbar { flex-shrink: 0; }
        .card-header > .card-toolbar {
            margin-left: auto;
            display: flex;
            justify-content: flex-end;
        }

        /* DataTables wrapper — full width, no x-scroll */
        .dataTables_wrapper { width: 100%; }
        table.dataTable { width: 100% !important; }

        /* Fix: Bootstrap 5.3 generates d-flex AFTER d-none so d-flex wins.
           Re-declare d-none after all framework CSS so it always wins. */
        .d-none { display: none !important; }

        /* Keentheme btn-icon compat — keep icon buttons small and inline */
        .btn-icon {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            padding: 0 !important;
        }
        /* btn-sm.btn-icon */
        .btn-sm.btn-icon { width: 1.75rem; height: 1.75rem; }

        /* Keentheme btn-light-primary → outline-primary style */
        .btn-light-primary { background: #e8f0fe; color: #1877f2; border-color: #e8f0fe; }
        .btn-light-primary:hover { background: #1877f2; color: #fff; }
        .btn-active-light-primary:hover,
        .btn-active-light-primary:focus {
            background: #e8f0fe !important;
            color: #1877f2 !important;
            border-color: #e8f0fe !important;
        }
        .btn-active-icon-primary:hover i,
        .btn-active-icon-primary:focus i,
        .btn-active-color-primary:hover,
        .btn-active-color-primary:focus {
            color: #1877f2 !important;
        }
        .btn-flex { display: inline-flex; align-items: center; gap: .45rem; }

        .form-control-solid,
        .form-select-solid {
            background-color: #f8f9fa !important;
            border-color: #dee2e6 !important;
            box-shadow: none !important;
        }
        .form-control-solid:focus,
        .form-select-solid:focus {
            background-color: #fff !important;
            border-color: #86b7fe !important;
            box-shadow: 0 0 0 .2rem rgba(13,110,253,.15) !important;
        }

        .svg-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            vertical-align: middle;
        }
        .svg-icon svg {
            width: 1rem;
            height: 1rem;
        }
        .svg-icon-1 svg { width: 1.35rem; height: 1.35rem; }
        .svg-icon-2 svg { width: 1.1rem; height: 1.1rem; }
        .svg-icon-3 svg { width: 1rem; height: 1rem; }
        .svg-icon-5 svg { width: .85rem; height: .85rem; }
        .ki-duotone,
        [class^="ki-"],
        [class*=" ki-"] {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .ki-duotone.ki-cross::before,
        .ki-cross::before {
            content: "\f00d";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-style: normal;
        }
        .ki-duotone .path1,
        .ki-duotone .path2 {
            display: none;
        }

        [data-kt-user-table-toolbar="base"] {
            position: relative;
            display: flex;
            justify-content: flex-end;
            gap: .5rem;
            flex-wrap: wrap;
        }
        .menu-sub-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + .5rem);
            right: 0;
            z-index: 1050;
            min-width: 300px;
            max-width: min(325px, calc(100vw - 2rem));
            padding: 0;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: .375rem;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
        }
        .menu-sub-dropdown.show { display: block; }
        .menu-column { flex-direction: column; }
        .menu-rounded { border-radius: .375rem; }
        .menu-sub-dropdown .menu-item,
        .menu-sub-dropdown li {
            list-style: none;
        }
        .menu-sub-dropdown .menu-link {
            display: block;
            padding: .45rem .9rem;
            color: #212529;
            text-decoration: none;
            border-radius: .25rem;
        }
        .menu-sub-dropdown .menu-link:hover {
            background: #f1f3f5;
            color: #0d6efd;
        }
        .separator { border-top: 1px solid #e9ecef; }
        .w-250px { width: 250px !important; max-width: 100%; }
        .w-100px { width: 100px !important; }
        .w-125px { width: 125px !important; }
        .w-25px { width: 25px !important; }
        .h-25px { height: 25px !important; }
        .w-300px, .w-md-325px { width: 300px !important; }
        .ps-14 { padding-left: 2.75rem !important; }
        .px-6 { padding-left: 1.25rem !important; padding-right: 1.25rem !important; }
        .px-7 { padding-left: 1.5rem !important; padding-right: 1.5rem !important; }
        .py-4 { padding-top: 1rem !important; padding-bottom: 1rem !important; }
        .py-5 { padding-top: 1.25rem !important; padding-bottom: 1.25rem !important; }
        .ms-6 { margin-left: .85rem !important; }
        .me-n7 { margin-right: 0 !important; }
        .pe-7 { padding-right: 0 !important; }
        .rounded-4 { border-radius: .5rem !important; }
        .mb-10 { margin-bottom: 1rem !important; }
        .pt-15 { padding-top: 1.5rem !important; }
        .fw-semibold { font-weight: 600 !important; }
        .fs-7 { font-size: .875rem !important; }
        .text-gray-600 { color: #6c757d !important; }
        .text-gray-800 { color: #212529 !important; }
        .text-hover-primary:hover { color: #0d6efd !important; }

        .image-input {
            position: relative;
            display: flex;
            align-items: flex-end;
            gap: .75rem;
            width: fit-content;
        }
        .image-input-wrapper,
        .avatar-img {
            width: 96px !important;
            height: 96px !important;
            border-radius: 50%;
            background-color: #f1f3f5;
            background-position: center;
            background-size: cover;
            border: 1px solid #dee2e6;
        }
        .image-input [data-kt-image-input-action="change"] {
            width: 2.25rem !important;
            height: 2.25rem !important;
            border-radius: 50% !important;
            background: #0d6efd !important;
            color: #fff !important;
            border: 0 !important;
            box-shadow: 0 .25rem .75rem rgba(13,110,253,.25) !important;
        }
        .image-input [data-kt-image-input-action="change"]::before {
            content: "\f030";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: .9rem;
            line-height: 1;
        }
        .image-input [data-kt-image-input-action="change"] i,
        .image-input [data-kt-image-input-action="cancel"],
        .image-input [data-kt-image-input-action="remove"] {
            display: none !important;
        }
        .image-input [data-kt-image-input-action="change"] input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .modal-dialog.mw-650px { max-width: 650px; }
        .modal-content {
            border: 0;
            border-radius: .5rem;
            box-shadow: 0 1rem 3rem rgba(0,0,0,.25);
        }
        .modal-header {
            align-items: center;
            padding: 1.25rem 1.5rem;
        }
        .modal-header h2,
        .modal-header h3 {
            margin: 0;
            font-size: 1.75rem;
            line-height: 1.2;
        }
        .modal-header .btn-close-modal,
        .modal-header [data-bs-dismiss="modal"] {
            margin-left: auto;
            color: #495057;
            background: transparent;
            border: 0;
        }
        .modal-body.scroll-y {
            max-height: calc(100vh - 12rem);
            overflow-y: auto;
        }
        .modal-body {
            padding: 1.5rem !important;
        }
        .modal-body.mx-5,
        .modal-body.mx-xl-15 {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
        .modal-body.my-7 {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
        .fv-row { width: 100%; }
        .fv-row.mb-7,
        .mb-7 {
            margin-bottom: 1rem !important;
        }
        #kt_modal_add_user_scroll {
            gap: 0;
            max-height: none !important;
            overflow: visible !important;
            padding-right: 0 !important;
            margin-right: 0 !important;
        }
        #kt_modal_add_user_form .form-control,
        #kt_modal_add_user_form .form-select {
            min-height: 2.75rem;
        }
        #kt_modal_add_user_form .form-text {
            margin-top: .75rem;
        }
        .form-check-custom {
            display: flex;
            align-items: flex-start;
            gap: .5rem;
        }
        #kt_modal_add_user_form .separator {
            margin: .75rem 0 !important;
        }
        #kt_modal_add_user_form .text-center.pt-15 {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: .75rem;
            text-align: right !important;
        }
        #kt_modal_add_user_form .text-center.pt-15 .btn {
            margin: 0 !important;
        }
        .indicator-progress { display: none; }

        @media (max-width: 767.98px) {
            .card-header { align-items: stretch; }
            .card-title, .card-toolbar, [data-kt-user-table-toolbar="base"] { width: 100%; }
            [data-kt-user-table-toolbar="base"] .btn { flex: 1 1 auto; }
            .menu-sub-dropdown {
                left: 0;
                right: auto;
                width: 100% !important;
                max-width: 100%;
            }
        }
    </style>

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- ===== TOP NAVBAR ===== --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link navbar-user-link" href="{{ route('admin.profile.settings') }}">
                    <i class="fas fa-user-circle fa-lg"></i>
                    <span>{{ auth()->user()->name ?? auth()->user()->first_name }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar-user-link text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    {{-- ===== END TOP NAVBAR ===== --}}

    {{-- ===== SIDEBAR ===== --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('admin') }}" class="brand-link d-flex align-items-center px-3 py-3">
            <img src="{{ asset('logo-admin.png') }}" alt="Carspector" class="brand-image-logo">
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    {{-- Dashboard --}}
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.bookings') }}" class="nav-link {{ request()->routeIs('admin.bookings') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>All Bookings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.new-bookings.index') }}" class="nav-link {{ request()->routeIs('admin.new-bookings.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-plus"></i>
                            <p>New Bookings</p>
                        </a>
                    </li>

                    {{-- Examinations --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.examinations') }}" class="nav-link {{ request()->routeIs('admin.examinations') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-check"></i>
                            <p>Examinations</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.view') }}" class="nav-link {{ request()->routeIs('user.view') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>All Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('examiners.view') }}" class="nav-link {{ request()->routeIs('examiners.view') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>Examiners</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('partners.view') }}" class="nav-link {{ request()->routeIs('partners.view') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>Partners</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admins.view') }}" class="nav-link {{ request()->routeIs('admins.view') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.view') }}" class="nav-link {{ request()->routeIs('staff.view') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-id-badge"></i>
                            <p>Staff</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('unverified.view') }}" class="nav-link {{ request()->routeIs('unverified.view') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-clock"></i>
                            <p>Unverified</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.heard_about') }}" class="nav-link {{ request()->routeIs('users.heard_about') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>Heard About</p>
                        </a>
                    </li>

                    {{-- Partner Logos --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.partner-logos.index') }}" class="nav-link {{ request()->routeIs('admin.partner-logos.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-image"></i>
                            <p>Partner Logos</p>
                        </a>
                    </li>

                    {{-- Reviews --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.reviews') }}" class="nav-link {{ request()->routeIs('admin.reviews') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-star"></i>
                            <p>Reviews</p>
                        </a>
                    </li>

                    {{-- Withdraw Requests --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.withdraw-request') }}" class="nav-link {{ request()->routeIs('admin.withdraw-request') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>Withdraw Requests</p>
                        </a>
                    </li>

                    {{-- Profile Settings --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.profile.settings') }}" class="nav-link {{ request()->routeIs('admin.profile.settings') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Profile Settings</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>
    {{-- ===== END SIDEBAR ===== --}}

    {{-- ===== CONTENT WRAPPER ===== --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @yield('breadcrumb')
            </div>
        </div>
        <div class="content py-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- ===== END CONTENT WRAPPER ===== --}}

    {{-- ===== FOOTER ===== --}}
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} Carspector.</strong> All rights reserved.
    </footer>
    {{-- ===== END FOOTER ===== --}}

</div>

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- Bootstrap 5 JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
{{-- AdminLTE --}}
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
{{-- Moment.js --}}
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
{{-- DateRangePicker --}}
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
{{-- Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- Toastr --}}
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

{{-- KTUtil polyfill for custom JS files that use KTUtil.onDOMContentLoaded --}}
<script>
if (typeof KTUtil === 'undefined') {
    window.KTUtil = {
        onDOMContentLoaded: function(cb) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', cb);
            } else {
                cb();
            }
        }
    };
}
if (typeof hostUrl === 'undefined') {
    window.hostUrl = '{{ url('/') }}/';
}

document.addEventListener('click', function(event) {
    var trigger = event.target.closest('[data-kt-menu-trigger="click"]');
    document.querySelectorAll('.menu-sub-dropdown.show').forEach(function(menu) {
        if (!trigger && !menu.contains(event.target)) {
            menu.classList.remove('show');
            menu.removeAttribute('style');
        }
    });
    if (!trigger) {
        return;
    }
    event.preventDefault();
    var menu = trigger.nextElementSibling;
    if (menu && menu.classList.contains('menu-sub-dropdown')) {
        var rect = trigger.getBoundingClientRect();
        menu.style.position = 'fixed';
        menu.style.top = (rect.bottom + 8) + 'px';
        menu.style.right = Math.max(16, window.innerWidth - rect.right) + 'px';
        menu.style.left = 'auto';
        menu.classList.toggle('show');
    }
});

document.addEventListener('click', function(event) {
    if (event.target.closest('[data-kt-menu-dismiss="true"]')) {
        document.querySelectorAll('.menu-sub-dropdown.show').forEach(function(menu) {
            menu.classList.remove('show');
            menu.removeAttribute('style');
        });
    }
});
</script>

@yield('js')
</body>
</html>
