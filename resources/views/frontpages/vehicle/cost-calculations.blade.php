@extends('mainpages.examlayout')

@section('title', 'Cost Calculations')

@section('styles')
    <style>
        :root {
            --radius: 16px;
            --primary: #01449A;
            --muted: #6b7280;
        }

        .page-bg {
            background: #ffffff;
            min-height: 100dvh;
        }

        .panel {
            background: #f7f9fb;
            border: 1px solid #edf2f7;
            border-radius: 16px;
            padding: 24px;
        }

        .panel + .panel {
            margin-top: 22px;
        }

        .title-lg {
            font-size: 28px;
            font-weight: 800;
            color: #111827;
        }

        /* Radio segmented (Type) */
        .radio-group {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border: 1px solid #f3f6fb;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }

        .radio-pill {
            position: relative;
            height: 54px;
        }

        .radio-pill input {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            margin: 0;
            z-index: 2;
        }

        .radio-pill .rp-label {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0;
            margin: 0;
            background: #fff;
            color: #111827;
            font-weight: 600;
            user-select: none;
            transition: background .15s ease, color .15s ease, box-shadow .15s ease;
            font-size: 12px;
            letter-spacing: .1px;
            text-align: center;
            z-index: 1;
        }

        .radio-group .radio-pill + .radio-pill .rp-label {
            border-left: 1px solid #f6f8fb;
        }

        .radio-pill input:checked + .rp-label {
            background: linear-gradient(180deg, #f8fbff, #eff6ff);
            color: #01449A;
            box-shadow: inset 0 0 0 1px #e5efff;
        }

        .radio-pill input:focus-visible + .rp-label {
            outline: 2px solid #93c5fd;
            outline-offset: -2px;
        }

        .radio-pill:hover .rp-label {
            background: #fafcfe;
        }

        /* Type accent colors */
        :root {
            --up: #0ea5e9;
            --inf: #fb923c;
            --add: #10b981;
        }

        .radio-pill.type-up input:checked + .rp-label {
            background: linear-gradient(180deg, rgba(14, 165, 233, .10), rgba(14, 165, 233, .05));
            color: var(--up);
            box-shadow: inset 0 0 0 1px rgba(14, 165, 233, .22);
        }

        .radio-pill.type-inf input:checked + .rp-label {
            background: linear-gradient(180deg, rgba(251, 146, 60, .12), rgba(251, 146, 60, .06));
            color: var(--inf);
            box-shadow: inset 0 0 0 1px rgba(251, 146, 60, .24);
        }

        .radio-pill.type-add input:checked + .rp-label {
            background: linear-gradient(180deg, rgba(16, 185, 129, .12), rgba(16, 185, 129, .06));
            color: var(--add);
            box-shadow: inset 0 0 0 1px rgba(16, 185, 129, .24);
        }

        /* Hover accents by type (when not selected) */
        .radio-pill.type-up:hover .rp-label {
            background: linear-gradient(180deg, rgba(14, 165, 233, .06), rgba(14, 165, 233, .03));
            color: var(--up);
        }

        .radio-pill.type-inf:hover .rp-label {
            background: linear-gradient(180deg, rgba(251, 146, 60, .08), rgba(251, 146, 60, .04));
            color: var(--inf);
        }

        .radio-pill.type-add:hover .rp-label {
            background: linear-gradient(180deg, rgba(16, 185, 129, .08), rgba(16, 185, 129, .04));
            color: var(--add);
        }

        .field-label {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .currency-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .currency-prefix {
            font-weight: 800;
            color: #111827;
        }

        .control-lg {
            height: 54px;
            font-size: 16px;
        }

        .cc-card {
            border: 0;
            background: transparent;
        }

        .cc-footer {
            background: transparent;
            border: 0;
            padding: 16px 0 0 0;
        }

        .bar-wrap {
            margin-top: 18px;
        }

        .bar-label {
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
        }

        .bar {
            height: 12px;
            background: #e5e7eb;
            border-radius: 999px;
            overflow: hidden;
        }

        .bar .fill {
            height: 100%;
            width: 0%;
            background: #01449A;
            transition: width .25s ease;
        }

        /* Repeater damage cards */
        .dmg-card {
            background: #fff;
            border: 1px solid #e6e7eb;
            border-radius: 16px;
            padding: 16px;
            box-shadow: 0 8px 18px rgba(2, 6, 23, .06);
            margin-bottom: 12px;
        }

       .dmg-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .dmg-title {
            height: 54px;
            font-weight: 500;
        }

        .dmg-amount {
            height: 54px;
            font-weight: 700;
            font-size: 16px;
        }

        .dmg-remove {
            align-self: center;
            justify-self: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            padding: 0;
            line-height: 1;
            font-size: 14px;
            margin-top: 30px;
            color:#ef4444;
        }

        .invalid .form-control {
            border-color: #ef4444;
        }

        .invalid .help {
            color: #ef4444;
            font-size: 12px;
            margin-top: 6px;
        }

        @media (max-width: 992px) {
            .dmg-grid {
                grid-template-columns: 1fr;
            }

            .dmg-remove {
                justify-self: end;
            }

            .btn-icon {
                width: 34px;
                height: 34px;
            }
        }

        /* Summary + chart */
        .summary-card {
            background: #ffffff;
            border: 1px solid #e6e7eb;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 12px 24px rgba(2, 6, 23, .06);
            position: sticky;
            top: 18px;
        }

        .kpi {
            font-size: 30px;
            font-weight: 800;
            color: #111827;
        }

        .kpi-label {
            color: #64748b;
            font-weight: 600;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            background: #f1f5f9;
            border-radius: 999px;
            color: #0f172a;
            font-weight: 600;
        }

        .radio-group {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    border-radius: 12px;
    overflow: hidden;
    background: #f8fafc;
}

.radio-pill .rp-label {
    font-size: 13px;
    font-weight: 700;
}

/* Deutlicher aktive Auswahl */
.radio-pill input:checked + .rp-label {
    transform: scale(1.02);
}

/* Farben kräftiger */
.radio-pill.type-up input:checked + .rp-label {
    background: rgba(14,165,233,0.15);
    color: #0284c7;
}

.radio-pill.type-inf input:checked + .rp-label {
    background: rgba(251,146,60,0.18);
    color: #ea580c;
}

.radio-pill.type-add input:checked + .rp-label {
    background: rgba(16,185,129,0.18);
    color: #059669;
}
    </style>
@endsection

@section('content')
    <div class="container-fluid page-bg py-5 py-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11">
                <div class="cc-card card border-0">
                    <div class="card-body p-3 p-md-4">
                        <form id="cc-damages-form">
                            <input type="hidden" name="order_id" value="{{ $order->id }}">

                            <div class="row g-3 justify-content-center">
                                <div style="width: 800px">
                <div class="panel">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="title-lg mb-0">Kalkulation</div>
                  </div>
                                        <div id="damagesRepeater">
                                            <div data-repeater-list="damages">
                                                <div data-repeater-item class="dmg-card">
                                                    <div class="dmg-grid">

                                                        <!-- Typ -->
                                                        <div>
                                                            <label class="form-label">Typ</label>
                                                            <div class="radio-group" style="border: 1px solid #ccc; height:54px">
                                                                <div class="radio-pill type-inf">
                                                                    <input type="radio" name="cost_type" value="inferior value">
                                                                    <div class="rp-label">Minderwert</div>
                                                                </div>
                                                                <div class="radio-pill type-add">
                                                                    <input type="radio" name="cost_type" value="added value">
                                                                    <div class="rp-label">Mehrwert</div>
                                                                </div>
                                                                <div class="radio-pill type-up">
                                                                    <input type="radio" name="cost_type" value="upcoming costs" checked>
                                                                    <div class="rp-label">Kosten</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Bezeichnung -->
                                                        <div>
                                                            <label class="form-label">Bezeichnung</label>
                                                            <input type="text" name="title"
                                                                class="form-control control-lg dmg-title"
                                                                placeholder="Bezeichnung">
                                                        </div>

                                                        <!-- Beschreibung -->
                                                        <div>
                                                            <label class="form-label">Beschreibung</label>
                                                           <textarea name="remarks"
                                                            class="form-control"
                                                            style="height:100px; resize:none; line-height: 2; font-size: 18px"
                                                            placeholder="Details zum Schaden"></textarea>
                                                        </div>

                                                        <!-- Betrag + Löschen -->
                                                        <div class="d-flex gap-2 align-items-end">
                                                            <div style="flex:1;">
                                                                <label class="form-label">Betrag in €</label>
                                                                <div class="currency-wrap">
                                                                    <!-- <span class="currency-prefix">€</span> -->
                                                                    <input type="number" step="0.01" min="0"
                                                                        name="amount"
                                                                        class="form-control control-lg dmg-amount"
                                                                        placeholder="0.00">
                                                                </div>
                                                            </div>

                                                            <div class="dmg-remove">
                                                                <button type="button" data-repeater-delete
                                                                        class="btn btn-outline-danger btn-icon">✕</button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="mt-2 d-flex">
                                                <button type="button" data-repeater-create class="btn btn-primary">Hinzufügen
                                                </button>
                                            </div>
                                            <hr class="my-3">
                                            <div class="row g-3">
                                                <div class="col-12 col-md-4">
                                                    <div class="field-label mb-1">Kosten</div>
                                                    <div id="sum_upcoming" class="kpi" style="font-size:22px;">€ 0,00
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="field-label mb-1">Minderwerte</div>
                                                    <div id="sum_inferior" class="kpi" style="font-size:22px;">€ 0,00
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="field-label mb-1">Mehrwerte</div>
                                                    <div id="sum_added" class="kpi" style="font-size:22px;">€ 0,00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="width: 500px">
                                    <div class="summary-card">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="kpi-label">Total</span>
                                            <span class="chip"><i class="fa fa-coins"></i>Marktpreis</span>
                                        </div>
                                        <div class="kpi mb-3" id="kpi_total">€ 0,00</div>
                                        <div class="row g-2">
                                            <div class="col-12">
                                                <div class="field-label">Marktdurchschnitt</div>
                                                <div class="currency-wrap">
                                                    
                                                    <input type="number" step="0.01"
                                                           class="form-control control-lg" name="market_average"
                                                           id="market_average" value="0">
                                                    <span class="currency-prefix">€</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="field-label">DAT-Preis</div>
                                                <div class="currency-wrap">
                                                    <input type="number" step="0.01"
                                                           class="form-control control-lg" name="dat_value"
                                                           id="dat_value" value="0">
                                                    <span class="currency-prefix">€</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="field-label">Verkaufspreis</div>
                                                <div class="currency-wrap">
                                                    <input type="number" step="0.01"
                                                           class="form-control control-lg" name="selling_price"
                                                           id="selling_price" value="0">
                                                    <span class="currency-prefix">€</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="field-label">Marktanpassung</div>
                                                <div class="currency-wrap">
                                                    <input type="number" step="0.01"
                                                           class="form-control control-lg" name="market_average_cost"
                                                           id="market_average_cost" value="0">
                                                    <span class="currency-prefix">€</span>
                                                </div>
                                            </div>

                                             <div class="d-flex justify-content-between align-items-center pt-3">
                                                <div>
                                                    <div class="kpi-label">Kalkulierter Marktpreis</div>
                                                    <div id="simple_market_price" class="kpi" style="font-size:22px;">€ 0,00</div>
                                                </div>

                                                <div class="form-check form-switch m-0">
                                                    <input type="hidden" name="show_in_pdf" value="0">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="show_in_pdf" name="show_in_pdf" value="1">
                                                    <label class="form-check-label ms-2" for="show_in_pdf">
                                                        Kalk. anzeigen?
                                                    </label>
                                                </div>
                                            </div>
                                             
                                             <!-- <div class="col-12"> <div id="costChart" style="height:220px;"></div> </div> <div class="col-12"> <div class="field-label">Remarks</div> <textarea class="form-control" name="remarks" id="remarks" rows="3" placeholder="Optional notes for this section"></textarea> </div> </div>--> <!-- <div class="d-flex justify-content-end mt-3"> --> 
                                                
                                             <div class="d-flex mt-3"> 
                                                <a href="{{ route('examiner.order', $id) }}" class="btn btn-primary me-2">Zurück</a> 
                                                <button type="button" class="btn btn-secondary" id="cc-save">Speichern</button> 
                                             </div>

                                          <!--  <div class="col-12">
                                                <div id="costChart" style="height:220px;"></div>
                                                </div>
                                                 <div class="col-12">
                                                <div class="field-label">Remarks</div>
                                                <textarea class="form-control" name="remarks" id="remarks" rows="3" placeholder="Optional notes for this section"></textarea>
                                                </div> 
                                            </div>-->

                                        <!-- <div class="d-flex justify-content-end mt-3"> -->

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery Form Repeater -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.repeater@1.2.1/jquery.repeater.min.js"></script>
    <script>if (typeof jQuery.fn.repeater === 'undefined') {
            document.write('<script src="/asset/plugins/custom/formrepeater/formrepeater.bundle.js"><\/script>')
        }</script>
    <!-- ApexCharts for real-time chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.49.1"></script>
    <!-- SortableJS for drag-and-drop ordering -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    <script>
        (function ($) {
            const orderId = {{ (int)$order->id }};
            const isAdmin = @json(
                auth()->check() && (
                    (auth()->user()->type === 'admin') ||
                    ((auth()->user()->type === 'examiner') && ((int)$order->examiner_id === (int)auth()->id()))
                )
            );
            const $form = $('#cc-damages-form');

            function euroNum(v) {
                // Allow optional leading minus and decimal/comma; strip thousands separators
                var s = (v == null ? '' : String(v)).replace(/[^0-9,\.\-]/g, '');
                // keep only a leading minus if present
                if (s.indexOf('-') > 0) {
                    s = '-' + s.replace(/-/g, '');
                }
                // remove thousands dots, normalize comma to dot
                s = s.replace(/\.(?=\d{3}(\D|$))/g, '');
                s = s.replace(/,/g, '.');
                var n = parseFloat(s);
                return isNaN(n) ? 0 : n;
            }

            // No inline euro in inputs; euro symbol is outside visually

            function initRepeater() {
                const $wrap = $('#damagesRepeater');
                $wrap.repeater({
                    initEmpty: true,
                    show: function () {
                        $(this).slideDown(100);
                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(100, deleteElement);
                    },
                });
                // If empty, create one default row
                if ($wrap.find('[data-repeater-item]').length === 0) {
                    $wrap.find('[data-repeater-create]').trigger('click');
                }
                // Bind segmented for existing row
                // Drag and drop
                const listEl = document.querySelector('#damagesRepeater [data-repeater-list]');
                // if (listEl && window.Sortable) {
                //     Sortable.create(listEl, {animation: 120, handle: '.dmg-card', ghostClass: 'bg-light'});
                // }
            }

            function bind() { /* currency preview left as-is */
            }

            function load() {
                const $wrap = $('#damagesRepeater');
                $.get('{{ route('order-damages.fetch', ['orderId' => '__ID__']) }}'.replace('__ID__', orderId), function (res) {
                    var rows = Array.isArray(res.damages) ? res.damages : [];
                    if (typeof $wrap.setList === 'function') {
                        $wrap.setList(rows.map(function (r) {
                            return {
                                title: r.title || 'Hood Damage',
                                cost_type: r.cost_type || 'upcoming costs',
                                amount: (r.amount !== undefined && r.amount !== null ? r.amount : 299),
                                remarks: r.remarks || ''
                            };
                        }));
                        $wrap.find('[data-repeater-item]').each(function (i) {
                            var val = (rows[i] && rows[i].cost_type) ? rows[i].cost_type : 'upcoming costs';
                            $(this).find('input[type="radio"][name$="[cost_type]"]').prop('checked', false);
                            $(this).find('input[type="radio"][name$="[cost_type]"][value="' + val + '"]').prop('checked', true);
                            $(this).find('input[name$="[amount]"]').val((rows[i] && rows[i].amount !== undefined && rows[i].amount !== null) ? rows[i].amount : 299);
                            $(this).find('textarea[name$="[remarks]"]').val(rows[i] && rows[i].remarks ? rows[i].remarks : '');
                        });
                    } else {
                        // fallback: create rows manually
                        $wrap.find('[data-repeater-list]').empty();
                        if (rows.length === 0) {
                            $wrap.find('[data-repeater-create]').trigger('click');
                        } else {
                            rows.forEach(function () {
                                $wrap.find('[data-repeater-create]').trigger('click');
                            });
                            $wrap.find('[data-repeater-item]').each(function (i) {
                                var r = rows[i] || {};
                                $(this).find('input[name$="[title]"]').val(r.title || 'Hood Damage');
                                var val = (r.cost_type || 'upcoming costs');
                                $(this).find('input[type="radio"][name$="[cost_type]"]').prop('checked', false);
                                $(this).find('input[type="radio"][name$="[cost_type]"][value="' + val + '"]').prop('checked', true);
                                $(this).find('input[name$="[amount]"]').val((r.amount !== undefined && r.amount !== null) ? r.amount : 299);
                                $(this).find('textarea[name$="[remarks]"]').val(r.remarks || '');
                            });
                        }
                    }
        const s = res.summary || {};
        if (s.market_average !== undefined && s.market_average !== null) $('#market_average').val(s.market_average); else $('#market_average').val(0);
        if (s.dat_value !== undefined && s.dat_value !== null) $('#dat_value').val(s.dat_value); else $('#dat_value').val(0);
        if (s.selling_price !== undefined && s.selling_price !== null) $('#selling_price').val(s.selling_price); else $('#selling_price').val(0);
        if (s.market_average_cost !== undefined && s.market_average_cost !== null) $('#market_average_cost').val(s.market_average_cost); else $('#market_average_cost').val(0);
        if (s.remarks) { $('#remarks').val(s.remarks); } else { $('#remarks').val(''); }
        if (typeof s.show_in_pdf !== 'undefined') { $('#show_in_pdf').prop('checked', !!parseInt(s.show_in_pdf)); } else { $('#show_in_pdf').prop('checked', false); }
        updateTotals();
      });
            }

            function save() {
                if (!isAdmin) return;
                const $btn = $('#cc-save');
                const old = $btn.html();
                $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span>Saving…');
                // Sanitize all damage amounts and summary values
                $form.find('input[name$="[amount]"]').each(function () {
                    $(this).val(euroNum($(this).val()));
                });
                ['#market_average', '#dat_value', '#selling_price', '#market_average_cost'].forEach(function (sel) {
                    var $el = $(sel);
                    $el.val(euroNum($el.val()));
                });
                $.ajax({
                    url: '{{ route('order-damages.save') }}',
                    method: 'POST',
                    data: $form.serialize(),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function () {
                        toastr.success('', 'Gespeichert');
                        $btn.prop('disabled', false).html(old);
                        load();
                    },
                    error: function () {
                        toastr.error('', 'Fehler beim Speichern');
                        $btn.prop('disabled', false).html(old);
                    }
                });
            }

            function updateKpi() {
                var total = 0;
                var sumUpcoming = 0, sumInferior = 0, sumAdded = 0;
                $('#damagesRepeater').find('[data-repeater-item]').each(function () {
                    var v = euroNum($(this).find('input[name$="[amount]"]').val());
                    total += v;
                    var type = $(this).find('input[type="radio"][name$="[cost_type]"]:checked').val();
                    if (type === 'upcoming costs') sumUpcoming += v;
                    else if (type === 'inferior value') sumInferior += v;
                    else if (type === 'added value') sumAdded += v;
                });
                try {
                    $('#kpi_total').text(new Intl.NumberFormat('de-DE', {
                        style: 'currency',
                        currency: 'EUR'
                    }).format(total));
                } catch (e) {
                    $('#kpi_total').text('€ ' + total.toFixed(2));
                }
                try {
                    var fmt = new Intl.NumberFormat('de-DE', {style: 'currency', currency: 'EUR'});
                    $('#sum_upcoming').text(fmt.format(sumUpcoming));
                    $('#sum_inferior').text(fmt.format(sumInferior));
                    $('#sum_added').text(fmt.format(sumAdded));
                } catch (e) {
                    $('#sum_upcoming').text('€ ' + sumUpcoming.toFixed(2));
                    $('#sum_inferior').text('€ ' + sumInferior.toFixed(2));
                    $('#sum_added').text('€ ' + sumAdded.toFixed(2));
                }
            }

            var apexChart = null;

            function initChart() {
                var el = document.querySelector('#costChart');
                if (!el || !window.ApexCharts) return;
                var options = {
                    chart: {type: 'line', height: 220, toolbar: {show: false}},
                    stroke: {curve: 'smooth', width: 3},
                    dataLabels: {enabled: false},
                    colors: ['#0ea5e9'],
                    xaxis: {categories: ['Market Avg', 'DAT', 'Selling', 'Damages', 'Adj.']},
                    series: [{name: 'EUR', data: [299, 299, 299, 299, 299]}],
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                try {
                                    return new Intl.NumberFormat('de-DE', {
                                        style: 'currency',
                                        currency: 'EUR'
                                    }).format(val);
                                } catch (e) {
                                    return '€ ' + val;
                                }
                            }
                        }
                    }
                };
                apexChart = new ApexCharts(el, options);
                apexChart.render();
            }

            function updateChart() {
                if (!apexChart) return;
                var mv = euroNum($('#market_average').val());
                var dv = euroNum($('#dat_value').val());
                var sp = euroNum($('#selling_price').val());
                var mac = euroNum($('#market_average_cost').val());
                var total = 0;
                $('#damagesRepeater').find('input[name$="[amount]"]').each(function () {
                    total += euroNum($(this).val());
                });
                apexChart.updateSeries([{name: 'EUR', data: [mv, dv, sp, total, mac]}]);
            }

            function updateTotals() {
                updateKpi();
                updateChart();
                simpleCalc();
            }

            // inline validation and updates
            function validateRow($item) {
                var ok = true;
                var $title = $item.find('input[name$="[title]"]');
                var $amount = $item.find('input[name$="[amount]"]');
                var t = ($title.val() || '').trim();
                var a = euroNum($amount.val());
                if (t === '') {
                    $title.closest('div').addClass('invalid');
                    $title.siblings('.help').removeClass('d-none');
                    ok = false;
                } else {
                    $title.closest('div').removeClass('invalid');
                    $title.siblings('.help').addClass('d-none');
                }
                if (!(a > 0)) {
                    $amount.closest('div').addClass('invalid');
                    $amount.closest('div').siblings('.help').removeClass('d-none');
                    ok = false;
                } else {
                    $amount.closest('div').removeClass('invalid');
                    $amount.closest('div').siblings('.help').addClass('d-none');
                }
                return ok;
            }

            $(document).on('input blur change', '#damagesRepeater input[name$="[title]"], #damagesRepeater input[name$="[amount]"]', function () {
                var $row = $(this).closest('[data-repeater-item]');
                validateRow($row);
                updateTotals();
            });

            $(document).on('input change', '#market_average, #dat_value, #selling_price, #market_average_cost', updateTotals);
            $(document).on('click', '#damagesRepeater [data-repeater-create], #damagesRepeater [data-repeater-delete]', function () {
                setTimeout(updateTotals, 140);
            });

            $(function () {
                initRepeater();
                bind();
                load();
                if (!isAdmin) {
                    $('#cc-save').prop('disabled', true);
                    $('#damagesRepeater [data-repeater-create], #damagesRepeater [data-repeater-delete]').prop('disabled', true).addClass('disabled');
                    $form.find('input,select,button').prop('disabled', true);
                }
                $('#cc-save').on('click', function () {
                    var allOk = true;
                    $('#damagesRepeater [data-repeater-item]').each(function () {
                        if (!validateRow($(this))) allOk = false;
                    });
                    if (!allOk) {
                        toastr.error('', 'Please correct the highlighted fields');
                        return;
                    }
                    save();
                });
                initChart();
                updateTotals();
                // Enable tooltips for type radios
                if (window.bootstrap && bootstrap.Tooltip) {
                    var tipTrigger = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                    tipTrigger.forEach(function (el) {
                        new bootstrap.Tooltip(el);
                    });
                }
            });
        })(jQuery);

        function simpleCalc() {
    let selling = parseFloat($('#selling_price').val()) || 0;
    let dat = parseFloat($('#dat_value').val()) || 0;
    let adj = parseFloat($('#market_average_cost').val()) || 0;

    let kosten = parseFloat($('#sum_upcoming').text().replace(/[^\d,-]/g, '').replace(',', '.')) || 0;
    let minder = parseFloat($('#sum_inferior').text().replace(/[^\d,-]/g, '').replace(',', '.')) || 0;
    let mehr = parseFloat($('#sum_added').text().replace(/[^\d,-]/g, '').replace(',', '.')) || 0;

    let basis = selling > 0 ? selling : dat;

    let result = basis - kosten - minder + mehr + adj;

    $('#simple_market_price').text(
        new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(result)
    );
}
    </script>
@endsection
