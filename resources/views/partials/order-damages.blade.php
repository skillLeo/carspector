@php
    $isAdmin = auth()->check() && auth()->user()->type === 'admin';
@endphp

<div class="card mt-4 shadow-sm border-0" style="border-radius: 16px;">
    <div class="card-header d-flex justify-content-between align-items-center" style="background:#0d6efd; color:#fff; border-top-left-radius:16px;border-top-right-radius:16px;">
        <h5 class="mb-0">Schadenskalkulation</h5>
        @if($isAdmin)
            <a href="{{ route('examiner.order', $order->id) }}" class="btn btn-sm btn-light">In Prüferansicht bearbeiten</a>
        @endif
    </div>
    <div class="card-body p-4">
        <form id="order-damages-form" class="order-damages-form">
            <input type="hidden" name="order_id" value="{{ $order->id }}">

            <div class="table-responsive mb-3">
                <table class="table align-middle mb-0" id="damages-table">
                    <thead class="table-light">
                        <tr>
                            <th style="width:32%">Schaden / Position</th>
                            <th style="width:20%">Kategorie</th>
                            <th style="width:28%">Bemerkung</th>
                            <th style="width:12%">Betrag (€)</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody id="damages-rows"></tbody>
                </table>
            </div>

            @if($isAdmin)
            <div class="d-flex gap-2 mb-4">
                <button type="button" class="btn btn-outline-primary" id="add-damage-row">+ Position hinzufügen</button>
                <button type="button" class="btn btn-outline-danger d-none" id="clear-damages">Alle entfernen</button>
            </div>
            @endif

            <div class="row g-3 pt-2 border-top">
                <div class="col-md-4">
                    <label class="form-label">Market Average (€)</label>
                    <input type="number" step="0.01" class="form-control" name="market_average" id="market_average" {{ $isAdmin? '' : 'readonly' }}>
                </div>
                <div class="col-md-4">
                    <label class="form-label">DAT Value (€)</label>
                    <input type="number" step="0.01" class="form-control" name="dat_value" id="dat_value" {{ $isAdmin? '' : 'readonly' }}>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Selling Price (€)</label>
                    <input type="number" step="0.01" class="form-control" name="selling_price" id="selling_price" {{ $isAdmin? '' : 'readonly' }}>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Market Average Cost (€)</label>
                    <input type="number" step="0.01" class="form-control" name="market_average_cost" id="market_average_cost" {{ $isAdmin? '' : 'readonly' }}>
                </div>
            </div>

            @if($isAdmin)
            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Speichern</button>
            </div>
            @endif
        </form>
    </div>
</div>

<template id="damage-row-template">
    <tr class="damage-row">
        <td>
            <input type="text" class="form-control" name="damages[INDEX][title]" placeholder="z.B. Stoßstange vorne" {{ $isAdmin? '' : 'readonly' }}>
        </td>
        <td>
            <select class="form-select" name="damages[INDEX][category]" {{ $isAdmin? '' : 'disabled' }}>
                <option value="upc">Anstehende Kosten</option>
                <option value="dep">Abzug (Wertminderung)</option>
                <option value="add">Zugewinn (Wertsteigerung)</option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="damages[INDEX][cost_type]" placeholder="Bemerkung (z.B. Teile/Lack/Arbeit)" {{ $isAdmin? '' : 'readonly' }}>
        </td>
        <td>
            <input type="number" step="0.01" class="form-control" name="damages[INDEX][amount]" placeholder="0.00" {{ $isAdmin? '' : 'readonly' }}>
        </td>
        <td class="text-end">
            @if($isAdmin)
            <button type="button" class="btn btn-sm btn-light text-danger remove-row">Entfernen</button>
            @endif
        </td>
    </tr>
    </template>

<script>
    (function($){
        const orderId = {{ $order->id }};
        const isAdmin = {{ $isAdmin ? 'true' : 'false' }};
        const rowsEl = $('#damages-rows');
        const rowTpl = document.getElementById('damage-row-template').innerHTML;

        function addRow(row, index){
            let html = rowTpl.replaceAll('INDEX', index);
            const $row = $(html);
            if(row){
                $row.find('[name$="[title]"]').val(row.title || '');
                $row.find('[name$="[category]"]').val((row.category || 'upc'));
                $row.find('[name$="[cost_type]"]').val(row.cost_type || '');
                $row.find('[name$="[amount]"]').val(row.amount || '');
            }
            rowsEl.append($row);
            toggleClear();
        }

        function toggleClear(){
            const has = rowsEl.children().length > 0;
            $('#clear-damages').toggleClass('d-none', !has);
        }

        function reindex(){
            rowsEl.children().each(function(i){
                $(this).find('input').each(function(){
                    this.name = this.name.replace(/damages\[[0-9]+\]\[/, 'damages['+i+'][');
                });
            });
        }

        function load(){
            $.get('{{ route('order-damages.fetch', ['orderId' => '__ID__']) }}'.replace('__ID__', orderId), function(res){
                rowsEl.empty();
                (res.damages || []).forEach((r, i) => addRow(r, i));
                $('#market_average').val(res.summary?.market_average || '');
                $('#dat_value').val(res.summary?.dat_value || '');
                $('#selling_price').val(res.summary?.selling_price || '');
                $('#market_average_cost').val(res.summary?.market_average_cost || '');
                if(isAdmin && rowsEl.children().length === 0){
                    addRow(null, 0);
                }
            });
        }

        $(document).on('click', '#add-damage-row', function(){
            const i = rowsEl.children().length;
            addRow(null, i);
        });
        $(document).on('click', '.remove-row', function(){
            $(this).closest('tr').remove();
            reindex();
            toggleClear();
        });
        $(document).on('click', '#clear-damages', function(){
            rowsEl.empty();
            toggleClear();
        });

        $('#order-damages-form').on('submit', function(e){
            e.preventDefault();
            if(!isAdmin){ return; }
            const form = $(this);
            $.ajax({
                url: '{{ route('order-damages.save') }}',
                method: 'POST',
                data: form.serialize(),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(){
                    load();
                }
            });
        });

        load();
    })(jQuery);
</script>
