@extends('mainpages.mainadmin')

@section('styles')
    <style>
        #kt_table_new_bookings_wrapper { width: 100%; overflow-x: auto; }
        #kt_table_new_bookings { width: 100% !important; }
        #kt_table_new_bookings th, #kt_table_new_bookings td {
            white-space: nowrap;
            vertical-align: middle;
            padding: .55rem .65rem;
        }
        #kt_table_new_bookings thead th { border-bottom: 2px solid var(--bs-gray-300); }
        #kt_table_new_bookings tbody td { border-top: 1px solid var(--bs-gray-200); }
    </style>
@endsection

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">New Bookings</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">New Bookings</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
    <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <div>
                                <label class="form-label fw-semibold text-muted">Zeitraum</label>
                                <input type="text" class="form-control form-control-solid w-250px date_range" id="new_booking_daterange" placeholder="Zeitraum wählen" autocomplete="off" />
                            </div>
                            <div class="pt-7">
                                <button type="button" class="btn btn-light btn-sm" id="btn_new_booking_reset">Filter zurücksetzen</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle w-100" id="kt_table_new_bookings">
                            <thead>
                            <tr class="text-start fw-bold text-uppercase table-light">
                                <th>#</th>
                                <th>Kunde</th>
                                <th>Adresse</th>
                                <th>Kennzeichen</th>
                                <th>Saison</th>
                                <th>Stripe Status</th>
                                <th>Erstellt</th>
                                <th class="text-end">Aktionen</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
    </div>

    <div class="modal fade" id="newBookingDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="newBookingDetailContent">
                <div class="p-10 text-center">
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
        </div>
    </div>

    @php($months = $months ?? [])
    @php($statuses = $statuses ?? ['active','processing','inspecting','completed'])
    <div class="modal fade" id="newBookingEditModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="newBookingEditForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Neue Buchung bearbeiten</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="order_id" id="edit_order_id">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Vorname</label>
                                <input type="text" class="form-control" name="nb_first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nachname</label>
                                <input type="text" class="form-control" name="nb_last_name" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Straße</label>
                                <input type="text" class="form-control" name="nb_street" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Hausnummer</label>
                                <input type="text" class="form-control" name="nb_house_number" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">PLZ</label>
                                <input type="text" class="form-control" name="nb_postal_code" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Stadt</label>
                                <input type="text" class="form-control" name="nb_city" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kennzeichenart</label>
                                <select class="form-select" name="nb_license_plate_type" id="nb_license_plate_type" required>
                                    <option value="desired">Wunschkennzeichen</option>
                                    <option value="assigned">StVA</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Spezialkennzeichen</label>
                                <input type="text" class="form-control" name="nb_special_plate">
                            </div>
                            <div class="col-12 js-desired-fields d-none">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Kennzeichen</label>
                                        <input type="text" class="form-control" name="nb_desired_license_plate">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Reservierungs-PIN</label>
                                        <input type="text" class="form-control" name="nb_reservation_pin">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="edit_nb_is_seasonal" name="nb_is_seasonal" value="1">
                                    <label class="form-check-label" for="edit_nb_is_seasonal">Saisonkennzeichen aktiv</label>
                                </div>
                            </div>
                            <div class="col-12 js-seasonal-fields d-none">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Saison von</label>
                                        <select class="form-select" name="nb_season_from_month">
                                            <option value="">Monat wählen</option>
                                            @foreach($months as $key => $label)
                                                <option value="{{ $key }}">{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Saison bis</label>
                                        <select class="form-select" name="nb_season_to_month">
                                            <option value="">Monat wählen</option>
                                            @foreach($months as $key => $label)
                                                <option value="{{ $key }}">{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Stripe Status</label>
                                <input type="text" class="form-control" name="nb_checkout_status">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Systemstatus</label>
                                <select class="form-select" name="status">
                                    <option value="">–</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" class="btn btn-primary">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const baseUrl = @json(url('admin/new-bookings'));
            const table = $('#kt_table_new_bookings').DataTable({
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                ajax: {
                    url: '{{ route('admin.new-bookings.fetch') }}',
                    data: function (d) {
                        d.date_range = $('#new_booking_daterange').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'customer', name: 'last_name', orderable: false, searchable: false},
                    {data: 'address', name: 'city', orderable: false, searchable: false},
                    {data: 'license_info', name: 'license_plate_type', orderable: false, searchable: false},
                    {data: 'season_window', name: 'season_from_month', orderable: false, searchable: false},
                    {data: 'stripe_status', name: 'checkout_status', orderable: false, searchable: false},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', orderable: false, searchable: false, className: 'text-end'}
                ],
                columnDefs: [
                    {targets: [1,2,3,4,5,7], render: function(data){ return data; }}
                ]
            });

            const start = moment().subtract(7, 'days');
            const end = moment();
            function updateLabel(s, e) {
                $('#new_booking_daterange').val(s.format('DD.MM.YYYY') + ' - ' + e.format('DD.MM.YYYY'));
            }
            $('#new_booking_daterange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Heute': [moment(), moment()],
                    'Gestern': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Letzte 7 Tage': [moment().subtract(6, 'days'), moment()],
                    'Letzte 30 Tage': [moment().subtract(29, 'days'), moment()],
                    'Dieser Monat': [moment().startOf('month'), moment().endOf('month')],
                    'Letzter Monat': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, updateLabel);
            updateLabel(start, end);

            $('#new_booking_daterange').on('apply.daterangepicker', function () {
                table.ajax.reload();
            });

            $('#btn_new_booking_reset').on('click', function () {
                $('#new_booking_daterange').val('');
                table.ajax.reload();
            });

            $(document).on('click', '.btn-new-booking-detail', function () {
                const id = $(this).data('id');
                $('#newBookingDetailContent').html('<div class="p-10 text-center"><div class="spinner-border" role="status"></div></div>');
                $('#newBookingDetailModal').modal('show');
                $.get(baseUrl + '/' + id, function (html) {
                    $('#newBookingDetailContent').html(html);
                }).fail(function () {
                    $('#newBookingDetailContent').html('<div class="p-10 text-center text-danger">Details konnten nicht geladen werden.</div>');
                });
            });

            $(document).on('click', '.btn-new-booking-edit', function () {
                const id = $(this).data('id');
                $('#newBookingEditForm')[0].reset();
                $('#edit_order_id').val(id);
                $.get(baseUrl + '/' + id + '/data', function (data) {
                    Object.keys(data).forEach(function (key) {
                        const field = $('#newBookingEditForm').find('[name="' + key + '"]');
                        if (!field.length) {
                            return;
                        }
                        if (field.attr('type') === 'checkbox') {
                            field.prop('checked', Boolean(Number(data[key])));
                        } else {
                            field.val(data[key]);
                        }
                    });
                    toggleDesiredFields();
                    toggleSeasonalFields();
                    $('#newBookingEditModal').modal('show');
                }).fail(function () {
                    toastr.error('Buchungsdaten konnten nicht geladen werden');
                });
            });

            $(document).on('submit', '#newBookingEditForm', function (e) {
                e.preventDefault();
                const id = $('#edit_order_id').val();
                $.ajax({
                    url: baseUrl + '/' + id,
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function () {
                        $('#newBookingEditModal').modal('hide');
                        table.ajax.reload();
                        toastr.success('Buchung aktualisiert');
                    },
                    error: function () {
                        toastr.error('Speichern fehlgeschlagen');
                    }
                });
            });

            $(document).on('click', '.btn-new-booking-delete', function () {
                if (!confirm('Buchung wirklich löschen?')) {
                    return;
                }
                const id = $(this).data('id');
                $.ajax({
                    url: baseUrl + '/' + id,
                    type: 'POST',
                    data: {_method: 'DELETE', _token: '{{ csrf_token() }}'},
                    success: function () {
                        table.ajax.reload();
                        toastr.success('Buchung gelöscht');
                    },
                    error: function () {
                        toastr.error('Löschen fehlgeschlagen');
                    }
                });
            });
            const form = $('#newBookingEditForm');
            const desiredWrapper = form.find('.js-desired-fields');
            const seasonalWrapper = form.find('.js-seasonal-fields');
            const licenseSelect = form.find('#nb_license_plate_type');
            const seasonalToggle = $('#edit_nb_is_seasonal');

            function toggleDesiredFields() {
                const show = licenseSelect.val() === 'desired';
                desiredWrapper.toggleClass('d-none', !show);
            }

            function toggleSeasonalFields() {
                const show = seasonalToggle.is(':checked');
                seasonalWrapper.toggleClass('d-none', !show);
            }

            licenseSelect.on('change', toggleDesiredFields);
            seasonalToggle.on('change', toggleSeasonalFields);
            toggleDesiredFields();
            toggleSeasonalFields();
        });
    </script>
@endsection
