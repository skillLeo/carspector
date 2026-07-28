@extends('mainpages.mainadmin')

@section('styles')
<style>
    .billing-scope-tabs .btn { border-radius: 0; border: 1px solid #dee2e6; margin-right: -1px; font-weight: 600; font-size: 13px; }
    .billing-scope-tabs .btn:first-child { border-radius: 6px 0 0 6px; }
    .billing-scope-tabs .btn:last-child { border-radius: 0 6px 6px 0; margin-right: 0; }
    .billing-scope-tabs .btn.active { color: #fff; }
    .billing-scope-tabs .btn[data-billing-tab="payed"].active { background: #198754; border-color: #198754; }
    .billing-scope-tabs .btn[data-billing-tab="open_recent"].active { background: #fd7e14; border-color: #fd7e14; }
    .billing-scope-tabs .btn[data-billing-tab="open_old"].active { background: #dc3545; border-color: #dc3545; }
    .billing-scope-tabs .btn[data-billing-tab="error"].active { background: #dc3545; border-color: #dc3545; }
    .billing-scope-tabs .btn[data-billing-tab="missing"].active { background: #6c757d; border-color: #6c757d; }
    #kt_billing_table_wrapper .dataTables_filter { display: none; }

    .billing-btn {
    width: 150px;
}
</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Abrechnung</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Abrechnung</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                {{-- Tabs --}}
                <div class="d-flex billing-scope-tabs mb-3 gap-2" role="group">
                    <button type="button" class="btn btn-outline billing-btn" data-billing-tab="payed">
                        Bezahlt
                    </button>

                    <button type="button" class="btn btn-outline billing-btn" data-billing-tab="open_recent">
                        Offen
                    </button>

                    <button type="button" class="btn btn-outline billing-btn" data-billing-tab="open_old">
                        Offen (> 3 Wochen)
                    </button>

                    <button type="button" class="btn btn-outline billing-btn" data-billing-tab="error">
                        Fehler
                    </button>

                    <button type="button" class="btn btn-outline billing-btn" data-billing-tab="missing">
                        Nicht vorhanden
                    </button>
                </div>

                {{-- Table --}}
                <div class="table-responsive">
                    <table id="kt_billing_table" class="table table-bordered table-hover align-middle" style="width:100%;">
                        <thead>
                            <tr>
                                <th style="width:110px;">Datum</th>
                                <th style="width:100px;">ID</th>
                                <th style="width:200px;">Fahrzeug</th>
                                <th style="width:200px;">Kunde</th>
                                <th style="width:170px;">Gutachter</th>
                                <th style="width:145px;">Abschluss am</th>
                                <th style="width:210px;">Bezahlt am</th>
                                <th style="width:70px;">Aktion</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
(function(){
    var table;
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var inlineUrl  = '{{ route('admin.booking.inline-update') }}';

    function saveField(id, field, value) {
        $.ajax({
            url: inlineUrl,
            headers: { 'X-CSRF-TOKEN': csrfToken },
            type: 'POST',
            data: { id: id, field: field, value: value },
            success: function(r) { toastr.success('', r.message || 'Gespeichert.'); table.ajax.reload(null, false); },
            error: function()    { toastr.error('', 'Fehler beim Speichern.'); }
        });
    }

    function initTable(tab) {
        if (table) { table.destroy(); }

        table = $('#kt_billing_table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 25,
            lengthMenu: [[15,25,50,100,-1],[15,25,50,100,'All']],
            order: [[5,'desc']],
            ajax: {
                url: '{{ route('admin.billing.fetch') }}',
                type: 'GET',
                data: function(d) {
                    d.billing_tab = tab;
                    return d;
                }
            },
            columns: [
                { data: 'datum_display',        name: 'admin_order_date',   width: '85px' },
                { data: 'order_number_display',  name: 'orders.id',          width: '85px' },
                { data: 'vehicle_display',       name: 'vehicle_make_model', width: '160px', orderable: false },
                { data: 'customer_display',      name: 'customer_name',      width: '160px', orderable: false },
                { data: 'examiner_display',      name: 'examiner_name',      width: '220px', orderable: false },
                { data: 'completed_at_display',  name: 'completed_at',       width: '135px', orderable: false },
                { data: 'paid_at_display',       name: 'paid_at',            width: '160px', orderable: false },
                { data: 'actions',               name: 'actions',            width: '70px',  orderable: false, searchable: false },
            ],
            responsive: false,
            scrollX: true,
        }).on('draw', function(){

            // Inline paid_at date save
            $(document).off('change.billingPaid', '.js-inline-booking-field')
                       .on('change.billingPaid', '.js-inline-booking-field', function(){
                var $f = $(this);
                saveField($f.data('id'), $f.data('field'), $f.val());
            });

            // Set Error / Missing status
            $(document).off('click.billingSetStatus', '.js-billing-set-status')
                       .on('click.billingSetStatus', '.js-billing-set-status', function(){
                var $btn = $(this);
                saveField($btn.data('id'), 'paid_at_status', $btn.data('status'));
            });

            // Clear Error / Missing status
            $(document).off('click.billingClearStatus', '.js-billing-clear-status')
                       .on('click.billingClearStatus', '.js-billing-clear-status', function(){
                var $btn = $(this);
                saveField($btn.data('id'), 'paid_at_status', '');
            });
        });
    }

    $(document).ready(function(){
        var currentTab = 'open_recent';
        initTable(currentTab);

        $(document).on('click', '.billing-scope-tabs [data-billing-tab]', function(){
            $('.billing-scope-tabs [data-billing-tab]').removeClass('active');
            $(this).addClass('active');
            currentTab = $(this).data('billingTab');
            initTable(currentTab);
        });
    });
})();
</script>
@endsection
