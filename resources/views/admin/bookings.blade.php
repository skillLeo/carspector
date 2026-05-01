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
            min-width: 2200px;
            table-layout: fixed;
        }
        #kt_table_users th,
        #kt_table_users td {
            vertical-align: middle;
            padding: .75rem .85rem;
            line-height: 1.25;
        }
        #kt_table_users th {
            white-space: nowrap;
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
            font-size: .875rem;
            overflow-wrap: anywhere;
        }
        #kt_table_users .text-column {
            white-space: normal;
            overflow-wrap: anywhere;
        }
        #kt_table_users .badge {
            white-space: nowrap;
        }
        #kt_table_users .source-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 46px;
            padding: .25rem .55rem;
            border-radius: 999px;
            font-size: .72rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: 0;
        }
        #kt_table_users .source-badge-b2c {
            background: #eef2f6;
            color: #344054;
            border: 1px solid #d0d5dd;
        }
        #kt_table_users .source-badge-b2b {
            background: #e7f5ff;
            color: #075985;
            border: 1px solid #bae6fd;
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
    </style>
@endsection
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">All Bookings</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Bookings</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <div class="d-flex align-items-center my-1">
                                <input type="text" data-admin-table-filter="search" class="form-control w-250px" placeholder="Search..." />
                            </div>
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
                                                    <option value="Zuweisung">Zuweisung</option>
                                                    <option value="Prüfung">Prüfung</option>
                                                    <option value="Fertigstellung">Fertigstellung</option>
                                                    <option value="Abgeschlossen">Abgeschlossen</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Order source</label>
                                                <select class="form-select" id="filter_order_type">
                                                    <option value="">Any</option>
                                                    <option value="B2C">B2C customer orders</option>
                                                    <option value="B2B">B2B partner orders</option>
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
                                    <i class="fas fa-plus me-1"></i> Create Booking
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

                                <th style="width: 130px;">Datum</th>
                                <th style="width: 150px;">ID</th>
                                <th style="width: 130px;">Kosten in €</th>
                                <th style="width: 170px;">Quelle</th>
                                <th style="width: 155px;">Fahrzeugtyp</th>
                                <th style="width: 150px;">Status</th>
                                <th style="width: 220px;">Fahrzeug</th>
                                <th style="width: 240px;">Kunde</th>
                                <th style="width: 190px;">Gutachter</th>
                                <th style="width: 150px;">Abschluss am</th>
                                <th style="width: 150px;">Bezahlt am</th>
                                <th class="text-end" style="width: 430px;">Actions</th>
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
    <div class="modal fade" tabindex="-1" id="assign_examiner">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Assign Examiner</h3>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                   <div class="row mb-3">
                       <div class="col-md-12 form-group">
{{--                           <select class="form-select form-select-solid" id="select-examiner" data-placeholder="Select an option">--}}
{{--                               <option></option>--}}

{{--                           </select>--}}
                       </div>
                   </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                           <input type="email" placeholder="Examiner Emmail" name="email" id="examiner_email" class="form-control form-control-solid">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-assign-examiner-now">Assign Examiner</button>
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
                    <h2 class="fw-bold" id="booking-modal-title">Create Booking</h2>
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
                                            <div class="admin-sheet-section">
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
                                                                <option value="">Select status</option>
                                                                @foreach(['Zuweisung', 'Prüfung', 'Fertigstellung', 'Abgeschlossen'] as $sheetStatus)
                                                                    <option value="{{ $sheetStatus }}" {{ old('admin_status') === $sheetStatus ? 'selected' : '' }}>{{ $sheetStatus }}</option>
                                                                @endforeach
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
                                                        <div class="input-box">
                                                            <input name="paid_at" type="date" value="{{ old('paid_at') }}" class="form-control form-control-sm shadow">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            @if(request('id'))
                                                <div class="row mb-5 mb-md-4">
                                                    <div class="col-12">
                                                        <h5>Details zum Fahrzeug</h5>
                                                    </div>
                                                    <div style="padding-top: 15px" class="">
                                                        <div class="mb-3  mb-lg-4">
                                                            <p class="mb-0 text-black fs-6">Marke & Modell<sup class="text-primary">*</sup></p>
                                                            <div class="input-box">
                                                                <input name="vehicle_make_model" type="text" value="{{old('vehicle_make_model')}}" class="form-control form-control-solid mb-3 mb-lg-0">
                                                                @error('vehicle_make_model')
                                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="mb-3">
                                                            <p class="mb-0 text-black fs-6">Link zum Inserat - z.B. mobile.de</p>
                                                            <div class="input-box">
                                                                <input name="advertisement_link"  value="{{old('advertisement_link')}}" type="text" class="form-control form-control-sm shadow">
                                                                @error('advertisement_link')
                                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @else


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
                                                        'sonstiges' => [
                                                            1 => 'Sonstiges-Check',
                                                            2 => 'Sonstiges-Check'
                                                        ],
                                                        'kaufbegleitung' => [
                                                            1 => 'Kaufbegleitung XL',
                                                            2 => 'Kaufbegleitung XXL'
                                                        ]
                                                    ];
                                                    ?>
                                                <div class="row mb-5 mb-md-4">
                                                    <div class="">
                                                        <div class="mb-3  mb-lg-4">
                                                            <p class="mb-0 text-black fs-6">Fahrzeugtyp<sup class="text-primary">*</sup></p>
                                                            <div class="input-box">
{{--                                                                <input name="vehicle_type" placeholder="Vehicle type" type="text" value="{{old('vehicle_type')}}" class="form-control form-control-sm shadow">--}}
                                                                <select class="form-select " name="vehicle_type">
                                                                    @foreach($vehicle_types as $key=>$types)
                                                                        <optgroup label="{{$key}}">
                                                                            @foreach($types as $mytype)
                                                                                <option value="{{$mytype}}">{{$mytype}}</option>
                                                                            @endforeach

                                                                        </optgroup>

                                                                    @endforeach
                                                                </select>
                                                                @error('vehicle_type')
                                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="mb-3  mb-lg-4">
                                                            <p class="mb-0 text-black fs-6">E-Mail<sup class="text-primary">*</sup></p>
                                                            <div class="input-box">
                                                                <input name="email" placeholder="User Email" type="text" value="{{old('email')}}" class="form-control form-control-sm shadow">
                                                                @error('email')
                                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="mb-3  mb-lg-4">
                                                            <p class="mb-0 text-black fs-6">Fahrzeug<sup class="text-primary">*</sup></p>
                                                            <div class="input-box">
                                                                <input name="vehicle_make_model" type="text" value="{{old('vehicle_make_model')}}" class="form-control form-control-sm shadow">
                                                                @error('vehicle_make_model')
                                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="mb-3 mb-lg-4">
                                                            <p class="mb-0 text-black fs-6">Verkäufer Tel<sup class="text-primary">*</sup></p>
                                                            <div class="input-box">
                                                                <input name="phone" type="text" value="{{old('phone')}}" class="form-control form-control-sm shadow">
                                                                @error('phone')
                                                                <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="text-black fs-6 m-0">Inserat-Link</p>
                                                        <div class="input-box">
                                                            <input name="advertisement_link"  value="{{old('advertisement_link')}}" type="text" class="form-control form-control-sm shadow">
                                                            @error('advertisement_link')
                                                            <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            <div class="row">
                                                <div class="">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Adresse<sup class="text-primary">*</sup></p>
                                                        <div class="input-box">
                                                            <input name="address" value="{{old('address')}}" type="text" class="form-control form-control-sm shadow">
                                                            @error('address')
                                                            <div class="invalid-feedback d-block">Dies ist ein Pflichtfeld.</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Stadt<sup class="text-primary">*</sup></p>
                                                        <div class="input-box">
                                                            <input name="city" value="{{request('city')}}" style="text-transform: capitalize"  type="text" class="form-control form-control-sm shadow">
                                                            @error('city')
                                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="mb-3">
                                                        <p class="mb-0 text-black fs-6">Price<sup class="text-primary">*</sup></p>
                                                        <div class="input-box">
                                                            <input name="price" value="{{request('price')}}" style="text-transform: capitalize"  type="text" class="form-control form-control-sm shadow">
                                                            @error('price')
                                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-3 col-md-12">
                                                    <div class="mb-3 mb-lg-4">
                                                    <div class="form-check form-check-custom form-check-sm form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" name="negotiation_checklist" id="negotiation_checklist" />
                                                        <label class="form-check-label" for="negotiation_checklist">
                                                            Verhandlungs-Checkliste (+19 €)
                                                        </label>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3 mb-lg-4">
                                                        <div class="form-check form-check-custom form-check-sm  form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="1" name="document_in_english" id="document_in_english"  />
                                                            <label class="form-check-label" for="document_in_english">
                                                                Dokumente auf Englisch (+9 €)
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3 mb-lg-4">
                                                        <div class="form-check form-check-custom form-check-sm  form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="1" name="pdf_with_partner_logo" id="pdf_with_partner_logo" {{ old('pdf_with_partner_logo') ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="pdf_with_partner_logo">
                                                                PDF with partner logo
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12 partner-logo-field d-none" id="partner_logo_wrapper">
                                                    <div class="mb-3 mb-lg-4">
                                                        <label class="form-label mb-1">Select partner logo</label>
                                                        @if(($partnerLogos ?? collect())->isEmpty())
                                                            <div class="text-muted">
                                                                No partner logos available yet.
                                                                @if(auth()->check() && auth()->user()->type === 'admin')
                                                                    <a href="{{ route('admin.partner-logos.index') }}" target="_blank">Add one here</a>.
                                                                @endif
                                                            </div>
                                                        @else
                                                            <select name="partner_logo_id" id="partner_logo_id" class="form-select form-select-sm shadow">
                                                                <option value="">Choose partner</option>
                                                                @foreach($partnerLogos as $logo)
                                                                    <option value="{{ $logo->id }}" {{ (string)old('partner_logo_id') === (string)$logo->id ? 'selected' : '' }}>{{ $logo->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('partner_logo_id')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="pt-3 col-md-12">
                                                    <div class="mb-3 mb-lg-4">
                                                        <p class="mb-0 text-black fs-6">Wünsche</p>
                                                        <div class="input-box">
                                                            <textarea name="desc" style="height: 150px; font-size:15px" class="form-control shadow" id="" cols="30" rows="20">{{old('desc')}}</textarea>
                                                            @error('desc')
                                                            <div class="invalid-feedback d-block">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div style="padding-top: 25px" class="col-md-12">
                                                    <div class="mb-0">

                                                        <div class="form-check">
                                                            <input required style="margin-top: 2px; border-color: #01449A" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label mb-0 text-black fs-6" for="flexCheckDefault">
                                                                Ich bestätige, dass der Autoverkäufer mit der Prüfung einverstanden ist.<sup class="text-primary">*</sup>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" href="" class="btn-next btn btn-primary btn-further px-5 py-2 fs-5 shadow-1">save</button>



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
@endsection
