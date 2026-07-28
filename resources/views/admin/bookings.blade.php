@extends('mainpages.mainadmin')
@php($partnerLogos = $partnerLogos ?? collect())
@section('styles')
    <style>


        .bg-primary {
            background-color: #1877F2 !important;
        }
        .card-bill-body ul li {
            color: white;
            font-size: 16px;
        }
        .profile-content-wrapper{
            padding: 24px 19px 18px 15px;
        }


        .profile-reviews{
            flex: 0 0 auto;
            width: 343px;
        }
        .profile-reviews h6{
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            margin-bottom: 6px;
        }
        .profile-review-item{
            background: #FFFFFF;
            border-radius: 15px;
            margin-bottom: 8px;
            padding: 12px 11px;
        }
        .profile-review-header{
            display: flex;
            align-items: center;
        }
        .profile-review-header h6{
            font-weight: 500;
            font-size: 17px;
            line-height: 21px;
            margin-bottom: 0px;
        }
        .profile-review-star{
            display: flex;
            align-items: center;

        }
        .profile-review-star img{
            max-width: 16px;
            width: 16px;
        }
        .profile-review-star p{
            font-weight: 400;
            font-size: 15px;
            line-height: 18px;
            margin-bottom: 0px;
        }
        .profile-review-desc {
            margin-top: 10px;
        }
        .profile-review-desc p{
            font-weight: 400;
            font-size: 15px;
            line-height: 18px;
            margin-bottom: 0px;
        }

        .profile-service {
            display: flex;
            align-items: stretch;
            flex-direction: column;
            justify-content: space-between;
            padding: 17px 8px;
            border-radius: 15px;
            background-color: var(--primary);
            flex: 0 0 auto;
            max-width: 350px;
            width: 100%;
        }
        /* Keep all Google Sheet fields readable in a controlled horizontal table. */
        .card .table-responsive,
        #kt_table_users_wrapper,
        .dataTables_scrollBody {
            overflow-x: auto;
        }
        #kt_table_users {
            min-width: 1270px;
        }
        #kt_table_users th,
        #kt_table_users td {
            vertical-align: middle;
            padding: .75rem .85rem;
            line-height: 1.25;
            font-size: .86rem;
        }
        #kt_table_users th {
            white-space: nowrap;
            font-size: .9rem !important;
            letter-spacing: 0;
        }
        #kt_table_users .booking-actions {
            display: inline-flex;
            justify-content: flex-end;
            flex-wrap: nowrap;
            gap: .35rem;
            min-width: max-content;
        }
        #kt_table_users .booking-actions .btn {
            white-space: nowrap;
        }
        /* B2B indicator dot next to order ID */
        .b2b-indicator {
            display: inline-block;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #6f42c1;
            margin-right: 5px;
            vertical-align: middle;
            flex-shrink: 0;
        }

        #kt_table_users .compact-cell {
            display: flex;
            flex-direction: column;
            gap: .15rem;
            min-width: 0;
        }
        #kt_table_users .compact-cell .primary {
            color: #111827;
            font-weight: 600;
        }
        #kt_table_users .compact-cell .secondary {
            color: #6c757d;
            font-size: .8rem;
            max-width: 175px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        #kt_table_users .text-column {
            white-space: normal;
            word-break: break-word;
        }
        #kt_table_users .badge {
            white-space: nowrap;
        }
        .booking-scope-tabs {
            gap: .3rem;
            flex-wrap: wrap;
        }
        .booking-scope-tabs .btn {
            min-width: 88px;
            padding: .38rem .75rem;
            border-radius: .35rem !important;
            font-size: .85rem;
            line-height: 1.2;
            white-space: nowrap;
        }
        .booking-scope-tabs .btn.active {
            background: var(--bs-primary);
            border-color: var(--bs-primary);
            color: #fff;
        }
        #kt_table_users .inline-admin-field {
            min-width: 128px;
            height: 36px;
            border-radius: .5rem;
            border-color: #d0d5dd;
            font-size: .82rem;
            font-weight: 600;
            background-color: #fff;
        }
        #kt_table_users .inline-admin-field.is-saving {
            opacity: .65;
            pointer-events: none;
        }
        #kt_table_users .inline-date-field {
            min-width: 136px;
        }
        /* Professional, slightly thicker dividers */
        #kt_table_users thead th { border-bottom: 2px solid var(--bs-gray-400); }
        #kt_table_users tbody td { border-top: 1.5px solid var(--bs-gray-300); }
        #kt_table_users tbody tr:first-child td { border-top: 0; }

        .btn.btn-icon:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush){
            margin-bottom: 4px;
        }
        #kt_add_booking .modal-dialog {
            max-width: 760px;
        }
        #kt_add_booking .modal-content {
            max-height: calc(100vh - 2rem);
            overflow: hidden;
        }
        #kt_add_booking .form-wrapper {
            display: block;
            width: 100%;
            margin: 0;
        }
        #kt_add_booking .modal-body {
            max-height: calc(100vh - 11rem);
            overflow-y: auto;
            padding: 2rem 2.25rem !important;
            scrollbar-gutter: stable;
        }
        #kt_add_booking .bg-white.shadow-1,
        #kt_add_booking .shadow,
        #kt_add_booking .shadow-1 {
            box-shadow: none !important;
        }
        #kt_add_booking .bg-white.rounded-1 {
            background: transparent !important;
            border-radius: 0 !important;
        }
        #kt_add_booking .row {
            --bs-gutter-x: 1rem;
            --bs-gutter-y: .9rem;
        }
        #kt_add_booking .mb-3,
        #kt_add_booking .mb-lg-4 {
            margin-bottom: .85rem !important;
        }
        #kt_add_booking p.fs-6,
        #kt_add_booking .form-label {
            display: block;
            margin-bottom: .4rem !important;
            color: #212529 !important;
            font-size: .95rem !important;
            font-weight: 600;
            line-height: 1.25;
        }
        #kt_add_booking .form-control,
        #kt_add_booking .form-select {
            min-height: 44px;
            padding: .6rem .8rem;
            border: 1px solid #ced4da;
            border-radius: .375rem;
            background-color: #fff;
            color: #212529;
            font-size: .95rem;
            box-shadow: none !important;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        #kt_add_booking .form-control:focus,
        #kt_add_booking .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 .2rem rgba(13,110,253,.15) !important;
        }
        #kt_add_booking textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        #kt_add_booking .form-check {
            display: flex;
            align-items: center;
            gap: .55rem;
            padding: .8rem 1rem;
            margin-bottom: 0;
            border: 1px solid #e9ecef;
            border-radius: .375rem;
            background: #f8f9fa;
        }
        #kt_add_booking .form-check-input {
            flex: 0 0 auto;
            float: none !important;
            position: static !important;
            margin: 0 !important;
        }
        #kt_add_booking .form-check-label {
            display: block;
            min-width: 0;
            margin-bottom: 0;
            font-weight: 500;
            line-height: 1.35;
        }
        #kt_add_booking .modal-footer {
            flex-shrink: 0;
            justify-content: flex-end;
            gap: .75rem;
            padding: 1rem 2rem;
            background: #fff;
        }
        #kt_add_booking .btn-further {
            min-width: 130px;
            padding: .6rem 1.2rem !important;
            font-size: 1rem !important;
            text-transform: capitalize;
        }
        #kt_add_booking .admin-sheet-section {
            padding: 1rem;
            margin-bottom: 1.25rem;
            border: 1px solid #e9ecef;
            border-radius: .5rem;
            background: #f8f9fa;
        }
        #kt_add_booking .admin-sheet-section h5 {
            margin-bottom: 1rem;
            font-size: 1rem;
            font-weight: 700;
        }
       .dataTables_scrollBody #kt_table_users tbody td:nth-child(3) {
    padding-left: 20px !important;
}
.dataTables_scrollBody #kt_table_users tbody td:nth-child(4) {
    padding-left: 28px !important;
}

/* Status */
.dataTables_scrollBody #kt_table_users tbody td:nth-child(5) {
    padding-left: 35px !important;
}

/* Fahrzeug */
.dataTables_scrollBody #kt_table_users tbody td:nth-child(6) {
    padding-left: 40px !important;
}

/* Kunde */
.dataTables_scrollBody #kt_table_users tbody td:nth-child(7) {
    padding-left: 35px !important;
}

/* Gutachter */
.dataTables_scrollBody #kt_table_users tbody td:nth-child(8) {
    padding-left: 20px !important;
}
@media (min-width: 992px) {
    #assign_examiner .modal-content{
        max-height: 85vh;
    }
}

    </style>
@endsection
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Alle Aufträge</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Alle Aufträge</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-5">
                        <!--begin::Card title: scope tabs + search-->
                        <div class="card-title d-flex flex-column align-items-start gap-0">
                            <div class="d-flex booking-scope-tabs mb-3" role="group" aria-label="Booking filters">
                                <button type="button" class="btn btn-sm btn-outline-primary active" data-booking-scope="all">Alle ({{ $tabCounts['all'] }})</button>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-booking-scope="new">Neu ({{ $tabCounts['new'] }})</button>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-booking-scope="active">Aktive Aufträge ({{ $tabCounts['active'] }})</button>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-booking-scope="ready">Fertigstellung ({{ $tabCounts['ready'] }})</button>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-booking-scope="storno">Problem ({{ $tabCounts['storno'] }})</button>
                            </div>
                            <input type="text" data-admin-table-filter="search" class="form-control w-200px" placeholder="Search..." />
                        </div>
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end gap-2" data-admin-table-toolbar="base">
                                {{-- Filter dropdown --}}
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        <i class="fas fa-filter me-1"></i> Filter
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width:325px;">
                                        <h6 class="fw-bold mb-3">Filter Options</h6>
                                        <div data-admin-table-filter="form">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Date range</label>
                                                <input class="form-control date_range" placeholder="Pick date range" id="kt_daterangepicker_4"/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">User</label>
                                                <select class="form-select" id="filter_user_select" data-placeholder="Search user by name or email"></select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Examiner email</label>
                                                <input type="text" class="form-control" id="filter_examiner_email" placeholder="examiner@example.com"/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select class="form-select" id="filter_status">
                                                    <option value="">Any</option>
                                                    <option value="New">New</option>
                                                    <option value="Zuweisung">Zuweisung</option>
                                                    <option value="Pruefung">Pr&uuml;fung</option>
                                                    <option value="Fertigstellung">Fertigstellung</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Problem">Problem</option>
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end gap-2 mt-3">
                                                <button type="reset" class="btn btn-light" data-admin-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary" data-admin-table-filter="filter">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Create Booking --}}
                                <button type="button" data-bs-target="#kt_add_booking" data-bs-toggle="modal" class="btn btn-primary" id="add-user">
                                    <i class="fas fa-plus me-1"></i> Auftrag erstellen
                                </button>
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-admin-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-admin-table-select="selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger" data-admin-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->

                            <!--end::Modal - New Card-->
                            <!--begin::Modal - Add task-->

                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Table-->
                        <div class="table-responsive">
                        <table class="table table-hover align-middle w-100" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start fw-bold text-uppercase table-light">
{{--                                <th class="w-10px pe-2">--}}
{{--                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="1" />--}}
{{--                                    </div>--}}
{{--                                </th>--}}

                                <th>Datum</th>
                                <th>ID</th>
                                <th>Detail</th>
                                <th>Fahrzeugtyp</th>
                                <th>Status</th>
                                <th>Fahrzeug</th>
                                <th>Kunde</th>
                                <th>Gutachter</th>
                                <th>Termin</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

    <div class="modal all-info-popup fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-sm-down">
            <div class="modal-content" id="booking_detail">

            </div>
        </div>
    </div>
    {{-- ─── Combined: Inspector Request + Manual Assignment ─── --}}
    <div class="modal fade" tabindex="-1" id="assign_examiner">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-search-location me-2 text-warning"></i> Gutachter anfragen & zuweisen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- Section 1: Inspector requests --}}
                    <!-- <p class="fw-semibold text-muted mb-2" style="font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Gutachter anfragen</p> -->
                    <div id="ae-loading" class="text-center py-3">
                        <span class="spinner-border spinner-border-sm text-primary"></span>
                        <span class="text-muted ms-2" style="font-size:13px;">Wird geladen…</span>
                    </div>
                    <div id="ae-content" style="display:none;">
                        {{-- Previous statuses --}}
                        <div id="ae-status-panel" class="mb-3" style="display:none;">
                            <label class="form-label fw-semibold text-muted" style="font-size:12px;">Bisherige Anfragen</label>
                            <div id="ae-status-list"></div>
                            <hr class="my-2">
                        </div>
                        {{-- Inspector recipient list --}}
                        <div class="mb-2">
                            <label class="form-label fw-semibold mb-1" style="font-size:13px;">Anfrage senden an</label>
                            <div id="ae-list" class="border rounded p-2 mb-2" style="min-height:38px;max-height:140px;overflow-y:auto;"></div>
                            {{-- Select from DB --}}
                            <div class="d-flex gap-2 mb-2">
                                <select id="ae-extra-select" class="form-select form-select-sm" style="flex:1;"></select>
                                <button class="btn btn-sm btn-outline-secondary" id="ae-extra-add" title="Aus Liste hinzufügen"><i class="fas fa-plus"></i></button>
                            </div>
                            {{-- Free email input --}}
                            <div class="d-flex gap-2">
                                <input type="email" id="ae-custom-email" class="form-control form-control-sm" placeholder="Beliebige E-Mail eingeben…" style="flex:1;">
                                <button class="btn btn-sm btn-outline-primary" id="ae-custom-add" title="E-Mail hinzufügen"><i class="fas fa-envelope-plus"></i> Hinzufügen</button>
                            </div>
                        </div>
                        {{-- Email body --}}
                        <div class="pt-3 mb-2">
                            <label class="form-label fw-semibold mb-1" style="font-size:13px;">E-Mail-Text</label>
                            <textarea id="ae-email-body" class="form-control" rows="15" style="font-size:13px;"></textarea>
                        </div>
                    </div>
                    <div id="ae-error" class="alert alert-danger py-2" style="display:none;font-size:13px;"></div>

                    <hr class="my-3">

                    {{-- Section 2: Direct manual assignment --}}
                    <p class="fw-semibold text-muted mb-2" style="font-size:12px;text-transform:uppercase;letter-spacing:.05em;">Direkt zuweisen</p>
                    <div class="pb-3 row g-1">
                        <div class="col-md-7">
                            <label class="form-label fw-semibold mb-1" style="font-size:13px;">E-Mail-Adresse</label>
                            <input type="email" name="email" id="examiner_email" class="form-control form-control-solid form-control-sm" placeholder="name@example.com">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-semibold mb-1" style="font-size:13px;">Name</label>
                            <input type="text" id="examiner_name_assign" class="form-control form-control-solid form-control-sm" placeholder="Max Müller">
                        </div>
                    </div>
                    <button type="button" style="width: 200px; height: 37px" class="btn btn-primary btn-sm btn-assign-examiner-now float-end">
                        <i class="fas fa-user-check me-1"></i> Direkt zuweisen
                    </button>
                </div>
                <div class="modal-footer gap-2">
                    <button type="button" style="width: 200px; height: 37px" class="btn btn-light btn-sm" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="button" style="width: 200px; height: 37px" class="btn btn-warning btn-sm fw-semibold" id="ae-send-btn" style="display:none;">
                        <i class="fas fa-paper-plane me-1"></i> Anfrage senden
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Assignment Email Preview Modal --}}
    <div class="modal fade" id="assignEmailPreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-envelope-open-text me-2 text-success"></i> Vorschau: Zuteilungs-E-Mail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="assign-preview-loading" class="text-center py-4">
                        <span class="spinner-border text-primary"></span>
                    </div>
                    <iframe id="assign-preview-frame" style="width:100%;height:60vh;border:0;display:none;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="email_examiner" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Auftragsvergabe</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="examiner_email_order_id" value="">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">E-Mail</label>
                        <input
                            type="email"
                            class="form-control form-control-solid js-select-on-focus"
                            id="email_examiner_email"
                            placeholder="name@example.com"
                        >
                        </div>

                        <div class="mb-4 form-check">
                        <input class="form-check-input" type="checkbox" id="use_tuv_email">
                        <label class="form-check-label fw-semibold" for="use_tuv_email">
                            TÜV (tsw@de.tuv.com)
                        </label>
                        </div>

                    <div class="mb-4">
                    <label class="form-label fw-semibold">Betreff</label>
                    <input type="text"
                            class="form-control form-control-solid js-select-on-focus"
                            id="email_examiner_subject"
                            placeholder="CarCheck | ">
                    </div>

                    <div class="mb-4 pt-2 border-top">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                            <!-- <label class="form-label fw-semibold mb-0">Inspektionsdetails</label>
                            <span class="form-text">Beim Fokussieren wird der Text markiert.</span> -->
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kunde</label>
                                <input type="text" class="form-control form-control-solid js-manual-mail-field js-select-on-focus" id="email_examiner_customer_name" placeholder="">
                            </div>
                            <div class="col-md-6">
                            <label class="form-label fw-semibold">Auftrags-Nr.</label>
                            <input type="text"
                                    class="form-control form-control-solid js-manual-mail-field js-select-on-focus"
                                    id="email_examiner_booking_code"
                                    placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Fahrzeug</label>
                                <input type="text" class="form-control form-control-solid js-manual-mail-field js-select-on-focus" id="email_examiner_car_model" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Verkäufer (Name)</label>
                                <input type="text" class="form-control form-control-solid js-manual-mail-field js-select-on-focus" id="email_examiner_seller_name" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Verkäufer Adresse</label>
                                <input type="text" class="form-control form-control-solid js-manual-mail-field js-select-on-focus" id="email_examiner_seller_address" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Verkäufer Tel.</label>
                                <input type="text" class="form-control form-control-solid js-manual-mail-field js-select-on-focus" id="email_examiner_seller_phone" placeholder="">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Inserat-Link</label>
                                <input type="text" class="form-control form-control-solid js-manual-mail-field js-select-on-focus" id="email_examiner_listing_link" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fw-semibold">E-Mail</label>
                        <textarea class="form-control form-control-solid js-select-on-focus" id="examiner_email_message" rows="6" placeholder="Dieser Text wird an die E-Mail angehängt."></textarea>
                        <!-- <div class="form-text">Der Text wird automatisch aus den Feldern oben befüllt und kann frei angepasst werden.</div> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="button" class="btn btn-primary btn-send-examiner-email">
                        <span class="btn-label">E-Mail senden</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="status_confirm_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" id="statusConfirmForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Status ändern</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label fw-semibold">Status</label>
                    <select class="form-select" name="admin_status" id="status_confirm_select">
                        <option value="New">New</option>
                        <option value="Zuweisung">Zuweisung</option>
                        <option value="Pruefung">Pr&uuml;fung</option>
                        <option value="Fertigstellung">Fertigstellung</option>
                        <option value="Completed">Abgeschlossen</option>
                        <option value="Problem">Problem</option>
                    </select>
                    <!-- <div class="form-text mt-3">
                        Confirming specific statuses can send the same customer emails used by the existing status workflow.
                    </div> -->
                </div>
                <div class="mt-3 modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </div>
            </form>
        </div>
    </div>

    <script>
                        (function () {
                            const emailInput = document.getElementById("email_examiner_email");
                            const checkbox = document.getElementById("use_tuv_email");

                            const TUV_EMAIL = "tsw@de.tuv.com";
                            let previousValue = "";

                            checkbox.addEventListener("change", function () {
                            if (this.checked) {
                                previousValue = emailInput.value;     // merken
                                emailInput.value = TUV_EMAIL;         // setzen
                                emailInput.dispatchEvent(new Event("input", { bubbles: true })); // falls Listener existieren
                            } else {
                                emailInput.value = previousValue;     // zurücksetzen
                                emailInput.dispatchEvent(new Event("input", { bubbles: true }));
                            }
                            });
                        })();

                        (function () {
                            const PREFIX = "CarCheck | ";

                            const subjectInput = document.getElementById("email_examiner_subject");
                            const bookingInput = document.getElementById("email_examiner_booking_code");

                            // Initial: Prefix setzen, wenn leer oder falscher Start
                            function ensurePrefix() {
                            if (!subjectInput.value.startsWith(PREFIX)) {
                                const cleaned = subjectInput.value.replace(/^CarCheck\s*\|\s*/i, "");
                                subjectInput.value = PREFIX + cleaned;
                            }
                            }

                            // Auftragsnr in Betreff einfügen: "CarCheck | <Auftragsnr>" + (optional Rest)
                            function updateSubjectFromBooking() {
                            ensurePrefix();

                            const booking = (bookingInput.value || "").trim();

                            // Alles nach Prefix holen und aufteilen:
                            // wir nehmen als "Rest" alles nach dem ersten " | " nach PREFIX (falls du später mehr anhängen willst)
                            const afterPrefix = subjectInput.value.slice(PREFIX.length);
                            const parts = afterPrefix.split(" | ");
                            const rest = parts.length > 1 ? " | " + parts.slice(1).join(" | ") : "";

                            subjectInput.value = PREFIX + booking + rest;
                            subjectInput.dispatchEvent(new Event("input", { bubbles: true }));
                            }

                            // Prefix beim Laden sichern
                            ensurePrefix();

                            // Live-Update beim Tippen in Auftragsnr
                            bookingInput.addEventListener("input", updateSubjectFromBooking);

                            // Prefix im Betreff "schützen": wenn User ihn löscht/ändert, wiederherstellen
                            subjectInput.addEventListener("input", ensurePrefix);

                            // Optional: Cursor nie in den Prefix lassen (UX niceness)
                            subjectInput.addEventListener("focus", function () {
                            ensurePrefix();
                            // Cursor ans Ende setzen
                            const end = subjectInput.value.length;
                            subjectInput.setSelectionRange(end, end);
                            });
                        })();
                        </script>

    <div class="modal fade" id="kt_add_booking" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <form action="{{route('admin.booking.store')}}" class="row form-wrapper mx-auto" method="POST">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold" id="booking-modal-title">Auftrag erstellen</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
               <div class="modal-body scroll-y">

                        @csrf
                        <input type="hidden" name="id" value="{{request('id')}}">
                        <div class="">

                            <div class="row ">
                                <div class="col-lg-12 ">
                                    <div class="bg-white rounded-1 shadow-1 position-relative">
                                        <div>
                                            <div style="display:none;" class="admin-sheet-section">
                                            <h5>Order Management</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Datum</p>
                                                        <div class="input-box">
                                                            <input name="admin_order_date" type="date" value="{{ old('admin_order_date') }}" class="form-control form-control-sm shadow">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Kunde</p>
                                                        <div class="input-box">
                                                            <input name="customer_name" type="text" value="{{ old('customer_name') }}" class="form-control form-control-sm shadow" placeholder="Customer name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Gutachter</p>
                                                        <div class="input-box">
                                                            <input name="examiner_name" type="text" value="{{ old('examiner_name') }}" class="form-control form-control-sm shadow" placeholder="TÜV / Examiner name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Status</p>
                                                        <div class="input-box">
                                                            <select class="form-select" name="admin_status">
                                                                <option value="">Status wählen</option>
                                                                <option value="New" {{ old('admin_status') === 'New' ? 'selected' : '' }}>New</option>
                                                                <option value="Zuweisung" {{ old('admin_status') === 'Zuweisung' ? 'selected' : '' }}>Zuweisung</option>
                                                                <option value="Pruefung" {{ old('admin_status') === 'Pruefung' ? 'selected' : '' }}>Pr&uuml;fung</option>
                                                                <option value="Fertigstellung" {{ old('admin_status') === 'Fertigstellung' ? 'selected' : '' }}>Fertigstellung</option>
                                                                <option value="Completed" {{ old('admin_status') === 'Completed' ? 'selected' : '' }}>Completed</option>
                                                                <option value="Problem" {{ old('admin_status') === 'Problem' ? 'selected' : '' }}>Problem</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Abschluss am</p>
                                                        <div class="input-box">
                                                            <input name="completed_at" type="date" value="{{ old('completed_at') }}" class="form-control form-control-sm shadow">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Bezahlt am</p>
                                                        <input type="hidden" name="paid_at_status" id="cb_paid_at_status" value="">
                                                        <div class="input-group">
                                                            <input name="paid_at" type="date" id="cb_paid_at_input" value="{{ old('paid_at') }}" class="form-control form-control-sm shadow">
                                                            <span id="cb_paid_at_text" class="form-control form-control-sm d-none" style="background:#f8f9fa; text-transform:capitalize;"></span>
                                                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item cb-paid-mode" href="#" data-mode="">Datum</a></li>
                                                                <li><a class="dropdown-item cb-paid-mode" href="#" data-mode="error">Error</a></li>
                                                                <li><a class="dropdown-item cb-paid-mode" href="#" data-mode="missing">Missing</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>


                                                <?php

                                                    $vehicle_types = [
                                                        'default' => [
                                                            1 => 'Auto/ PKW XL',
                                                            2 => 'Auto/ PKW XXL'
                                                        ],
                                                        'transporter' => [
                                                            1 => 'Transporter XL',
                                                            2 => 'Transporter XXL'
                                                        ],
                                                        'oldtimer' => [
                                                            1 => 'Oldtimer XL',
                                                            2 => 'Oldtimer XXL'
                                                        ],
                                                        'sportwagen' => [
                                                            1 => 'Sportwagen XL',
                                                            2 => 'Sportwagen XXL'
                                                        ],
                                                        'elektro' => [
                                                            1 => 'Elektro XL',
                                                            2 => 'Elektro XXL'
                                                        ],
                                                        'wohnmobil' => [
                                                            1 => 'Wohnmobil XL',
                                                            2 => 'Wohnmobil XXL'
                                                        ],
                                                        // 'sonstiges' => [
                                                        //     1 => 'Sonstiges-Check',
                                                        //     2 => 'Sonstiges-Check'
                                                        // ],
                                                        'kaufbegleitung' => [
                                                            1 => 'Kaufbegleitung XL',
                                                            2 => 'Kaufbegleitung XXL'
                                                        ]
                                                    ];
                                                    ?>

                                               <div class="row g-3 mb-4">

    <!-- Status -->
    <div class="col-md-6">
        <p class="mb-1 text-black fs-6">Status</p>
        <div class="input-box">
            <select class="form-select" name="admin_status">
                <option value="">Status wählen</option>
                <option value="New" {{ old('admin_status') === 'New' ? 'selected' : '' }}>Neu</option>
                <option value="Zuweisung" {{ old('admin_status') === 'Zuweisung' ? 'selected' : '' }}>Zuweisung</option>
                <option value="Pruefung" {{ old('admin_status') === 'Pruefung' ? 'selected' : '' }}>Pr&uuml;fung</option>
                <option value="Fertigstellung" {{ old('admin_status') === 'Fertigstellung' ? 'selected' : '' }}>Fertigstellung</option>
                <option value="Completed" {{ old('admin_status') === 'Completed' ? 'selected' : '' }}>Abgeschlossen</option>
                <option value="Problem" {{ old('admin_status') === 'Problem' ? 'selected' : '' }}>Problem</option>
            </select>
        </div>
    </div>

    <!-- Fahrzeugtyp -->
    <div class="col-md-6">
        <p class="mb-1 text-black fs-6">
            Fahrzeugtyp<sup class="text-primary">*</sup>
        </p>

        <div class="input-box">
            <select class="form-select" name="vehicle_type">
                @foreach($vehicle_types as $key=>$types)
                    <optgroup label="{{$key}}">
                        @foreach($types as $mytype)
                            <option value="{{$mytype}}">
                                {{$mytype}}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>

            @error('vehicle_type')
            <div class="invalid-feedback d-block">
                Dies ist ein Pflichtfeld.
            </div>
            @enderror
        </div>
    </div>

    <!-- E-Mail -->
    <div class="col-md-6">
        <p class="mb-1 text-black fs-6">
            E-Mail<sup class="text-primary">*</sup>
        </p>

        <div class="input-box">
            <input
                name="email"
                placeholder=""
                type="text"
                value="{{old('email')}}"
                class="form-control form-control-sm shadow"
            >

            @error('email')
            <div class="invalid-feedback d-block">
                Dies ist ein Pflichtfeld.
            </div>
            @enderror
        </div>
    </div>

    <!-- Fahrzeug -->
    <div class="col-md-6">
        <p class="mb-1 text-black fs-6">
            Fahrzeug<sup class="text-primary">*</sup>
        </p>

        <div class="input-box">
            <input
                name="vehicle_make_model"
                type="text"
                value="{{old('vehicle_make_model')}}"
                class="form-control form-control-sm shadow"
            >

            @error('vehicle_make_model')
            <div class="invalid-feedback d-block">
                Dies ist ein Pflichtfeld.
            </div>
            @enderror
        </div>
    </div>

    <!-- Verkäufer Tel -->
    <!-- <div class="col-md-6">
        <p class="mb-1 text-black fs-6">
            Verkäufer Tel<sup class="text-primary">*</sup>
        </p>

        <div class="input-box">
            <input
                name="phone"
                type="text"
                value="{{old('phone')}}"
                class="form-control form-control-sm shadow"
            >

            @error('phone')
            <div class="invalid-feedback d-block">
                Dies ist ein Pflichtfeld.
            </div>
            @enderror
        </div>
    </div> -->

    <!-- Inserat-Link -->
    <div class="col-md-6">
        <p class="mb-1 text-black fs-6">Inserat-Link</p>

        <div class="input-box">
            <input
                name="advertisement_link"
                value="{{old('advertisement_link')}}"
                type="text"
                class="form-control form-control-sm shadow"
            >

            @error('advertisement_link')
            <div class="invalid-feedback d-block">
                Dies ist ein Pflichtfeld.
            </div>
            @enderror
        </div>
    </div>

    <!-- Adresse -->
    <!-- <div class="col-md-6">
        <p class="mb-1 text-black fs-6">
            Adresse<sup class="text-primary">*</sup>
        </p>

        <div class="input-box">
            <input
                name="address"
                value="{{old('address')}}"
                type="text"
                class="form-control form-control-sm shadow"
            >

            @error('address')
            <div class="invalid-feedback d-block">
                Dies ist ein Pflichtfeld.
            </div>
            @enderror
        </div>
    </div> -->

    <!-- Stadt -->
    <!-- <div class="col-md-6">
        <p class="mb-1 text-black fs-6">
            Stadt<sup class="text-primary">*</sup>
        </p>

        <div class="input-box">
            <input
                name="city"
                value="{{request('city')}}"
                type="text"
                class="form-control form-control-sm shadow"
            >

            @error('city')
            <div class="invalid-feedback d-block">
                {{$message}}
            </div>
            @enderror
        </div>
    </div> -->

    <!-- Price -->
    <!-- <div class="col-md-6">
        <p class="mb-1 text-black fs-6">
            Price<sup class="text-primary">*</sup>
        </p>

        <div class="input-box">
            <input
                name="price"
                value="{{request('price')}}"
                type="text"
                class="form-control form-control-sm shadow"
            >

            @error('price')
            <div class="invalid-feedback d-block">
                {{$message}}
            </div>
            @enderror
        </div>
    </div> -->

    <!-- Checkboxes -->
    <div class="col-12 pt-2">
<!-- 
        <div class="form-check form-check-custom form-check-sm form-check-solid mb-3">
            <input class="form-check-input" type="checkbox" value="1"
                   name="negotiation_checklist"
                   id="negotiation_checklist" />

            <label class="form-check-label" for="negotiation_checklist">
                Verhandlungs-Checkliste (+19 €)
            </label>
        </div> -->

        <div class="form-check form-check-custom form-check-sm form-check-solid mb-3">
            <input class="form-check-input"
                   type="checkbox"
                   value="1"
                   name="document_in_english"
                   id="document_in_english" />

            <label class="form-check-label" for="document_in_english">
                Dokumente auf Englisch
            </label>
        </div>

        <div class="form-check form-check-custom form-check-sm form-check-solid mb-3">
            <input class="form-check-input"
                   type="checkbox"
                   value="1"
                   name="pdf_with_partner_logo"
                   id="pdf_with_partner_logo"
                   {{ old('pdf_with_partner_logo') ? 'checked' : '' }} />

            <label class="form-check-label" for="pdf_with_partner_logo">
                Partner Logo
            </label>
        </div>

    </div>

    <!-- Partner Logo -->
    <div class="col-12 partner-logo-field d-none" id="partner_logo_wrapper">
        <label class="form-label mb-1">
            Partner wählen
        </label>

        @if(($partnerLogos ?? collect())->isEmpty())
            <div class="text-muted">
                No partner logos available yet.

                @if(auth()->check() && auth()->user()->type === 'admin')
                    <a href="{{ route('admin.partner-logos.index') }}" target="_blank">
                        Add one here
                    </a>.
                @endif
            </div>
        @else
            <select name="partner_logo_id"
                    id="partner_logo_id"
                    class="form-select form-select-sm shadow">

                <option value="">Partner wählen</option>

                @foreach($partnerLogos as $logo)
                    <option value="{{ $logo->id }}"
                        {{ (string)old('partner_logo_id') === (string)$logo->id ? 'selected' : '' }}>
                        {{ $logo->name }}
                    </option>
                @endforeach
            </select>

            @error('partner_logo_id')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        @endif
    </div>

    <!-- Wünsche -->
    <div class="col-12">
        <p class="mb-1 text-black fs-6">Wünsche an die Prüfung</p>

        <div class="input-box">
            <textarea
                name="desc"
                style="height:75px; font-size:15px"
                class="form-control shadow"
                cols="230"
                rows="20"
            >{{old('desc')}}</textarea>

            @error('desc')
            <div class="invalid-feedback d-block">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

</div>

<!-- Footer -->
<div class="modal-footer pt-2">
    <button
        type="submit"
        class="btn-next btn btn-primary btn-further px-5 py-2 fs-6 shadow-1"
    >
        Speichern
    </button>
</div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
            </form>
        </div>

        <!--end::Modal dialog-->
    </div>
@endsection


@section('js')
    <script>
        var examinerAssign='{{route('examiners.assign')}}';
        var examinerEmailRoute='{{ route('admin.examiner.email') }}';
        var bookingInlineUpdateRoute='{{ route('admin.booking.inline-update') }}';
        var bookingStatusConfirmBase='{{ url('admin/bookings') }}';
    </script>

    @if (session()->has('errors'))
    <script>
        setTimeout(function (){
            $('#kt_add_booking').modal('show');
        },300)
    </script>
    @endif
    <script src="{{ asset('custom/bookings.js') }}"></script>

    <script>
        // Bezahlt am mode switcher (create modal)
        document.querySelectorAll('.cb-paid-mode').forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                var mode = this.dataset.mode;
                var dateInput   = document.getElementById('cb_paid_at_input');
                var textSpan    = document.getElementById('cb_paid_at_text');
                var statusInput = document.getElementById('cb_paid_at_status');
                if (mode === 'error' || mode === 'missing') {
                    dateInput.classList.add('d-none');
                    textSpan.textContent = mode.charAt(0).toUpperCase() + mode.slice(1);
                    textSpan.classList.remove('d-none');
                    statusInput.value = mode;
                    dateInput.value = '';
                } else {
                    textSpan.classList.add('d-none');
                    dateInput.classList.remove('d-none');
                    statusInput.value = '';
                }
            });
        });

        window.togglePartnerLogoField = function () {
            var checkbox = document.getElementById('pdf_with_partner_logo');
            var wrapper = document.getElementById('partner_logo_wrapper');
            if (!checkbox || !wrapper) {
                return;
            }
            if (checkbox.checked) {
                wrapper.classList.remove('d-none');
            } else {
                wrapper.classList.add('d-none');
            }
        };

        document.addEventListener('DOMContentLoaded', function () {
            var checkbox = document.getElementById('pdf_with_partner_logo');
            if (checkbox) {
                checkbox.addEventListener('change', window.togglePartnerLogoField);
                window.togglePartnerLogoField();
            }
        });
    </script>


    <script>
        var start = moment().subtract(2000, "days");
        var end = moment();

        function cb(start, end) {
            $("#kt_daterangepicker_4").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
        }

        $("#kt_daterangepicker_4").daterangepicker({
            startDate: start,
            endDate: end.add(30,"days"),
            ranges: {
                "Today": [moment(), moment()],
                "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            }
        }, cb);


        $(document).on('click','.btn-close-modal',function (){
            $('#kt_modal_add_user').modal('hide');
        })
        $(document).on('click','.btn-order-details',function(e){
            e.preventDefault();
            var id=$(this).attr('data-id');
            $.ajax({
                url:"{{url('order')}}/"+id,
                type:"GET",
                data:{},
                success:function(data){
                    $('#booking_detail').html(data);
                },
                error:function(erorr){

                }
            })
        });
    </script>

    <script>
        // Initialize Select2 for user filter (search by name/email)
        if ($('#filter_user_select').length) {
            $('#filter_user_select').select2({
                placeholder: 'Search user…',
                allowClear: true,
                ajax: {
                    url: '{{ route('admin.users.search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) { return { term: params.term }; },
                    processResults: function (data) { return { results: data }; }
                },
                minimumInputLength: 1,
                width: '100%'
            }).on('change', function(){
                // Trigger the DataTable redraw (the table script listens to this change too)
                try { $('#kt_table_users').DataTable().draw(); } catch (e) {}
            });
        }

        $("#select-examiner").select2({
            dropdownParent: $('#assign_examiner'),
            ajax: {
                url: '{{route('examiners.fetch')}}',
                dataType: "json",
                type: "GET",
                data: function (params) {

                    var queryParameters = {
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });


    </script>
    {{--    <script src="{{ asset('asset/js/custom/apps/user-management/users/list/add.js') }}"></script>--}}

    <script>
    // Inspector Request section inside #assign_examiner modal
    (function () {
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        var currentOrderId = null;
        var selectedInspectors = [];
        var allInspectors = [];
        var badgesMap = { accepted: 'bg-success', pending: 'bg-warning text-dark', declined: 'bg-danger' };
        var labelsMap = { accepted: '✓', pending: '◴', declined: 'X' };

        function previewUrl(id) { return '/admin/orders/' + id + '/inspector-request-preview'; }
        function sendUrl(id)    { return '/admin/orders/' + id + '/inspector-request-send'; }
        function assignUrl(id)  { return '/admin/orders/' + id + '/inspector-assign'; }
        function assignPreviewUrl(id) { return '/admin/orders/' + id + '/inspector-assign-preview'; }

        function makeAssignEmailPreviewButton(payload) {
            var btn = document.createElement('button');
            btn.className = 'btn btn-sm btn-outline-secondary py-0 px-2';
            btn.innerHTML = '<i class="fas fa-eye"></i>';
            btn.addEventListener('click', function () {
                var modal = new bootstrap.Modal(document.getElementById('assignEmailPreviewModal'));
                var loading = document.getElementById('assign-preview-loading');
                var frame   = document.getElementById('assign-preview-frame');
                loading.style.display = '';
                frame.style.display   = 'none';
                modal.show();

                var qs = Object.keys(payload).map(function(k){ return k + '=' + encodeURIComponent(payload[k]); }).join('&');
                fetch(assignPreviewUrl(currentOrderId) + '?' + qs, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(function(r){ return r.json(); })
                    .then(function(data) {
                        frame.srcdoc = data.html;
                        loading.style.display = 'none';
                        frame.style.display   = '';
                    })
                    .catch(function() {
                        loading.style.display = 'none';
                        if (window.toastr) toastr.error('Vorschau konnte nicht geladen werden.');
                    });
            });
            return btn;
        }

        function makeBadge(status) {
            var b = document.createElement('span');
            b.className = 'badge ms-1 ' + (badgesMap[status] || 'bg-secondary');
            b.textContent = labelsMap[status] || status;
            return b;
        }

        function renderList() {
            var c = document.getElementById('ae-list');
            while (c.firstChild) { c.removeChild(c.firstChild); }
            if (selectedInspectors.length === 0) {
                var msg = document.createElement('span');
                msg.className = 'text-muted'; msg.style.fontSize = '13px';
                msg.textContent = 'Keine Inspektoren ausgewählt.';
                c.appendChild(msg); return;
            }
            selectedInspectors.forEach(function (insp) {
                var row = document.createElement('div');
                row.className = 'd-flex align-items-center justify-content-between py-1 border-bottom';
                var lbl = document.createElement('span');
                var ic = document.createElement('i'); ic.className = 'fas fa-user-circle me-2 text-muted';
                var nm = document.createElement('strong'); nm.textContent = insp.name || insp.email;
                var em = document.createElement('span'); em.className = 'text-muted ms-1'; em.style.fontSize = '12px';
                em.textContent = insp.name ? '<' + insp.email + '>' : '';
                lbl.appendChild(ic); lbl.appendChild(nm); lbl.appendChild(em);
                if (insp.status) { lbl.appendChild(makeBadge(insp.status)); }
                var rm = document.createElement('button');
                rm.className = 'btn btn-sm btn-outline-danger py-0 px-1';
                rm.appendChild(Object.assign(document.createElement('i'), { className: 'fas fa-times' }));
                (function(key){ rm.addEventListener('click', function () {
                    selectedInspectors = selectedInspectors.filter(function(x){ return (x.id || x.email) !== key; });
                    renderList(); updateSelect();
                }); })(insp.id || insp.email);
                row.appendChild(lbl); row.appendChild(rm);
                c.appendChild(row);
            });
        }

        function updateSelect() {
            var sel = document.getElementById('ae-extra-select');
            while (sel.firstChild) { sel.removeChild(sel.firstChild); }
            var def = document.createElement('option'); def.value = ''; def.textContent = '— Inspektor aus Liste wählen —';
            sel.appendChild(def);
            var ids = selectedInspectors.map(function(x){ return x.id; });
            allInspectors.forEach(function (i) {
                if (ids.indexOf(i.id) === -1) {
                    var opt = document.createElement('option');
                    opt.value = i.id; opt.dataset.name = i.name; opt.dataset.email = i.email; opt.dataset.status = i.status || '';
                    opt.textContent = i.name + ' <' + i.email + '>';
                    sel.appendChild(opt);
                }
            });
        }

        function renderStatusPanel(withStatus, externalReqs) {
            externalReqs = externalReqs || [];
            var panel = document.getElementById('ae-status-panel');
            var list  = document.getElementById('ae-status-list');
            while (list.firstChild) { list.removeChild(list.firstChild); }
            if (!withStatus.length && !externalReqs.length) { panel.style.display = 'none'; return; }
            // Render external (free-email) requests first
            externalReqs.forEach(function(r) {
                var row = document.createElement('div');
                row.className = 'd-flex align-items-center gap-2 py-1 border-bottom';
                var nw = document.createElement('span'); nw.className = 'flex-grow-1';
                var ic = document.createElement('i'); ic.className = 'fas fa-envelope me-2 text-muted';
                var em = document.createElement('strong'); em.textContent = r.email;
                var tag = document.createElement('small'); tag.className = 'text-muted ms-1'; tag.textContent = '(extern)';
                nw.appendChild(ic); nw.appendChild(em); nw.appendChild(tag);
                row.appendChild(nw); row.appendChild(makeBadge(r.status));
                var aeb = document.createElement('button');
                aeb.className = 'btn btn-sm btn-success py-0 px-2';
                aeb.textContent = 'Zuweisen';
                var extCheckboxDiv = document.createElement('div');
                extCheckboxDiv.className = 'form-check form-check-inline ms-2';
                var extCheckbox = document.createElement('input');
                extCheckbox.type = 'checkbox';
                extCheckbox.className = 'form-check-input';
                extCheckbox.id = 'auto_assign_ext_' + r.email.replace(/[^a-z0-9]/gi, '_');
                if (r.mark_for_auto_assign) extCheckbox.checked = true;
                var extCheckboxLabel = document.createElement('label');
                extCheckboxLabel.className = 'form-check-label';
                extCheckboxLabel.setAttribute('for', 'auto_assign_ext_' + r.email.replace(/[^a-z0-9]/gi, '_'));
                extCheckboxLabel.style.fontSize = '12px';
                extCheckboxLabel.textContent = 'Auto';
                extCheckboxDiv.appendChild(extCheckbox);
                extCheckboxDiv.appendChild(extCheckboxLabel);
                (function(email){
                    extCheckbox.addEventListener('change', function() {
                        fetch('/admin/orders/' + currentOrderId + '/inspector-auto-assign-update', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                            body: JSON.stringify({ external_email: email, mark_for_auto_assign: this.checked }),
                        })
                        .then(function(r){ return r.json(); })
                        .then(function(d){ if(window.toastr) toastr.success('Auto-assign updated'); })
                        .catch(function(){ if(window.toastr) toastr.error('Fehler beim Aktualisieren'); });
                    });
                    aeb.addEventListener('click', function() {
                    if (!confirm('Externen Prüfer ' + email + ' zuweisen und Zuteilungs-E-Mail senden?')) return;
                    aeb.disabled = true; aeb.textContent = '…';
                    var markAuto = extCheckbox && extCheckbox.checked ? true : false;
                    fetch(assignUrl(currentOrderId), {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                        body: JSON.stringify({ external_email: email, mark_for_auto_assign: markAuto }),
                    })
                    .then(function(r){ return r.json(); })
                    .then(function(d){ bootstrap.Modal.getOrCreateInstance(document.getElementById('assign_examiner')).hide(); if(window.toastr) toastr.success(d.message||'Zugewiesen!'); setTimeout(function(){ window.location.reload(); }, 500); })
                    .catch(function(){ if(window.toastr) toastr.error('Fehler beim Zuweisen.'); })
                    .finally(function(){ aeb.disabled=false; aeb.textContent='Zuweisen'; });
                }); })(r.email);
                row.appendChild(extCheckboxDiv);
                row.appendChild(makeAssignEmailPreviewButton({ external_email: r.email }));
                row.appendChild(aeb);
                list.appendChild(row);
            });
            withStatus.forEach(function(i) {
                var row = document.createElement('div');
                row.className = 'd-flex align-items-center gap-2 py-1 border-bottom';
                var nw = document.createElement('span'); nw.className = 'flex-grow-1';
                var ic = document.createElement('i'); ic.className = 'fas fa-user-circle me-2 text-muted';
                var nm = document.createElement('strong'); nm.textContent = i.name;
                var em = document.createElement('small'); em.className = 'text-muted ms-1'; em.textContent = '<' + i.email + '>';
                nw.appendChild(ic); nw.appendChild(nm); nw.appendChild(em);
                row.appendChild(nw); row.appendChild(makeBadge(i.status));
                var ab = document.createElement('button');
                ab.className = 'btn btn-sm btn-success py-0 px-2';
                ab.textContent = 'Zuweisen';
                var intCheckboxDiv = document.createElement('div');
                intCheckboxDiv.className = 'form-check form-check-inline ms-2';
                var intCheckbox = document.createElement('input');
                intCheckbox.type = 'checkbox';
                intCheckbox.className = 'form-check-input';
                intCheckbox.id = 'auto_assign_' + i.id;
                if (i.mark_for_auto_assign) intCheckbox.checked = true;
                var intCheckboxLabel = document.createElement('label');
                intCheckboxLabel.className = 'form-check-label';
                intCheckboxLabel.setAttribute('for', 'auto_assign_' + i.id);
                intCheckboxLabel.style.fontSize = '12px';
                intCheckboxLabel.textContent = 'Auto';
                intCheckboxDiv.appendChild(intCheckbox);
                intCheckboxDiv.appendChild(intCheckboxLabel);
                (function(iid, iname){
                    intCheckbox.addEventListener('change', function() {
                        fetch('/admin/orders/' + currentOrderId + '/inspector-auto-assign-update', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                            body: JSON.stringify({ inspector_id: iid, mark_for_auto_assign: this.checked }),
                        })
                        .then(function(r){ return r.json(); })
                        .then(function(d){ if(window.toastr) toastr.success('Auto-assign updated'); })
                        .catch(function(){ if(window.toastr) toastr.error('Fehler beim Aktualisieren'); });
                    });
                    ab.addEventListener('click', function() {
                    if (!confirm('Inspector ' + iname + ' zuweisen und Zuteilungs-E-Mail senden?')) return;
                    ab.disabled = true; ab.textContent = '…';
                    var markAuto = intCheckbox && intCheckbox.checked ? true : false;
                    fetch(assignUrl(currentOrderId), {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                        body: JSON.stringify({ inspector_id: iid, mark_for_auto_assign: markAuto }),
                    })
                    .then(function(r){ return r.json(); })
                    .then(function(d){ bootstrap.Modal.getOrCreateInstance(document.getElementById('assign_examiner')).hide(); if(window.toastr) toastr.success(d.message||'Zugewiesen!'); setTimeout(function(){ window.location.reload(); }, 500); })
                    .catch(function(){ if(window.toastr) toastr.error('Fehler beim Zuweisen.'); })
                    .finally(function(){ ab.disabled=false; ab.textContent='Zuweisen'; });
                }); })(i.id, i.name);
                row.appendChild(intCheckboxDiv);
                row.appendChild(makeAssignEmailPreviewButton({ inspector_id: i.id }));
                row.appendChild(ab);
                list.appendChild(row);
            });
            panel.style.display = '';
        }

        function loadInspectorPreview(orderId) {
            document.getElementById('ae-loading').style.display = '';
            document.getElementById('ae-content').style.display = 'none';
            document.getElementById('ae-error').style.display   = 'none';
            document.getElementById('ae-send-btn').style.display = 'none';
            selectedInspectors = []; allInspectors = [];
            fetch(previewUrl(orderId), { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function(r){ return r.json(); })
                .then(function(data) {
                    allInspectors      = data.all_inspectors || [];
                    selectedInspectors = (data.matched_inspectors || []).slice();
                    // Combine DB inspector statuses + external request statuses for the panel
                    var withStatus = allInspectors.filter(function(i){ return i.status; });
                    var external   = (data.external_requests || []);
                    renderStatusPanel(withStatus, external);
                    document.getElementById('ae-email-body').value = data.email_body || '';
                    renderList(); updateSelect();
                    document.getElementById('ae-loading').style.display  = 'none';
                    document.getElementById('ae-content').style.display  = '';
                    document.getElementById('ae-send-btn').style.display = '';
                })
                .catch(function() {
                    document.getElementById('ae-loading').style.display = 'none';
                    var err = document.getElementById('ae-error');
                    err.style.display = ''; err.textContent = 'Fehler beim Laden der Inspektoren.';
                });
        }

        // Capture order ID when assign-examiner button is clicked (fallback)
        $(document).on('click', '.btn-assign-examiner', function () {
            window._currentOrderId = $(this).data('id') || $(this).attr('data-id');
        });

        // Load inspector preview when modal opens — relatedTarget is most reliable
        document.getElementById('assign_examiner').addEventListener('show.bs.modal', function (event) {
            var trigger = event.relatedTarget;
            currentOrderId = (trigger ? (trigger.getAttribute('data-id') || null) : null)
                             || window._currentOrderId
                             || null;
            if (currentOrderId) { loadInspectorPreview(currentOrderId); }
        });

        // Add from DB dropdown
        document.getElementById('ae-extra-add').addEventListener('click', function () {
            var sel = document.getElementById('ae-extra-select');
            var opt = sel.options[sel.selectedIndex];
            if (!opt || !opt.value) return;
            selectedInspectors.push({ id: parseInt(opt.value, 10), name: opt.dataset.name, email: opt.dataset.email, status: opt.dataset.status || null });
            renderList(); updateSelect();
        });

        // Add custom email
        document.getElementById('ae-custom-add').addEventListener('click', function () {
            var input = document.getElementById('ae-custom-email');
            var email = input.value.trim();
            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                if (window.toastr) toastr.warning('Bitte eine gültige E-Mail eingeben.');
                return;
            }
            var alreadyIn = selectedInspectors.some(function(x){ return x.email === email; });
            if (alreadyIn) { if(window.toastr) toastr.info('Diese E-Mail ist bereits in der Liste.'); return; }
            selectedInspectors.push({ id: null, name: null, email: email, status: null });
            input.value = '';
            renderList();
        });

        // Send request
        document.getElementById('ae-send-btn').addEventListener('click', function () {
            var dbIds    = selectedInspectors.filter(function(i){ return i.id; }).map(function(i){ return i.id; });
            var extEmails= selectedInspectors.filter(function(i){ return !i.id; }).map(function(i){ return i.email; });
            var body     = document.getElementById('ae-email-body').value.trim();
            if (dbIds.length === 0 && extEmails.length === 0) { if(window.toastr) toastr.warning('Bitte mindestens einen Empfänger auswählen.'); return; }
            if (!body) { if(window.toastr) toastr.warning('E-Mail-Text darf nicht leer sein.'); return; }
            var btn = this; btn.disabled = true; btn.textContent = 'Wird gesendet…';
            fetch(sendUrl(currentOrderId), {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                body: JSON.stringify({ inspector_ids: dbIds, extra_emails: extEmails, email_body: body }),
            })
            .then(function(r){ return r.json(); })
            .then(function(data) {
                bootstrap.Modal.getOrCreateInstance(document.getElementById('assign_examiner')).hide();
                if(window.toastr) toastr.success(data.message || 'Anfrage gesendet.');
            })
            .catch(function() { if(window.toastr) toastr.error('Fehler beim Senden.'); })
            .finally(function() { btn.disabled = false; btn.textContent = 'Anfrage senden'; });
        });
    })();
    </script>

    <script>
    // Appointment reminder button in TERMIN column
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.js-appt-reminder');
        if (!btn) return;
        e.preventDefault();
        if (btn.disabled) return;
        if (!confirm('Termin-Anfrage per E-Mail an den Prüfer senden?')) return;
        btn.disabled = true;
        var orig = btn.textContent;
        btn.textContent = '…';
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        fetch('/admin/bookings/' + btn.dataset.id + '/appointment-reminder', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrf }
        })
        .then(function (r) { return r.json(); })
        .then(function (data) {
            if (data.success) {
                if (window.toastr) toastr.success(data.message || 'Erinnerung gesendet.');
            } else {
                if (window.toastr) toastr.error(data.message || 'Fehler.');
            }
        })
        .catch(function () { if (window.toastr) toastr.error('Fehler beim Senden.'); })
        .finally(function () { btn.disabled = false; btn.textContent = orig; });
    });
    </script>
@endsection
