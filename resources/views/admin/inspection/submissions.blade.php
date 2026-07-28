@extends('mainpages.mainadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">API Übertragungsprotokoll</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Protokoll</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        {{-- Filters --}}
        <div class="card mb-3">
            <div class="card-body py-2">
                <form method="GET" class="d-flex gap-2 flex-wrap align-items-end">
                    <div>
                        <label class="form-label mb-1" style="font-size:12px;">Status</label>
                        <select name="status" class="form-control form-control-sm" style="width:160px;">
                            <option value="">Alle</option>
                            <option value="success"          {{ request('status') === 'success'          ? 'selected' : '' }}>Erfolgreich</option>
                            <option value="failed"           {{ request('status') === 'failed'           ? 'selected' : '' }}>Fehlgeschlagen</option>
                            <option value="validation_error" {{ request('status') === 'validation_error' ? 'selected' : '' }}>Validierungsfehler</option>
                            <option value="invalid_auth"     {{ request('status') === 'invalid_auth'     ? 'selected' : '' }}>Ungültige Auth</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label mb-1" style="font-size:12px;">Auftrags-Ref.</label>
                        <input type="text" name="order_ref" class="form-control form-control-sm" style="width:160px;"
                               value="{{ request('order_ref') }}" placeholder="Auftrags-Nr. suchen">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Filtern</button>
                    <a href="{{ route('admin.inspection.submissions') }}" class="btn btn-sm btn-outline-secondary">Zurücksetzen</a>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:60px;">ID</th>
                            <th style="width:160px;">Zeitpunkt</th>
                            <th>Auftrags-Ref.</th>
                            <th>Status</th>
                            <th>Dokumente</th>
                            <th style="width:120px;">IP-Adresse</th>
                            <th style="width:80px;">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($submissions as $sub)
                        @php
                            $badgeClass = match($sub->status) {
                                'success'          => 'badge-success',
                                'failed'           => 'badge-danger',
                                'validation_error' => 'badge-warning',
                                'invalid_auth'     => 'badge-danger',
                                default            => 'badge-secondary',
                            };
                            $badgeLabel = match($sub->status) {
                                'success'          => 'Erfolgreich',
                                'failed'           => 'Fehler',
                                'validation_error' => 'Validierung',
                                'invalid_auth'     => 'Unauth.',
                                default            => $sub->status,
                            };
                        @endphp
                        <tr>
                            <td>{{ $sub->id }}</td>
                            <td style="white-space:nowrap;">{{ $sub->created_at ? $sub->created_at->format('d.m.Y H:i:s') : '—' }}</td>
                            <td>
                                {{ $sub->raw_order_ref ?? '—' }}
                                @if($sub->order)
                                    <br><small class="text-muted">→ <a href="{{ route('admin.bookings.show', $sub->order_id) }}">{{ $sub->order->display_order_number }}</a></small>
                                @endif
                            </td>
                            <td><span class="badge {{ $badgeClass }}">{{ $badgeLabel }}</span></td>
                            <td>
                                @php $docs = $sub->documents_received ?? []; @endphp
                                {{ count($docs) }} Dok.
                                @if(count($docs) > 0)
                                    <small class="text-muted d-block">
                                        {{ collect($docs)->pluck('type')->implode(', ') }}
                                    </small>
                                @endif
                            </td>
                            <td style="font-family:monospace; font-size:12px;">{{ $sub->ip_address ?? '—' }}</td>
                            <td>
                                <a href="{{ route('admin.inspection.submissions.show', $sub->id) }}"
                                   class="btn btn-sm btn-light-primary px-3 py-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Keine Einträge gefunden.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($submissions->hasPages())
            <div class="card-footer">
                {{ $submissions->links() }}
            </div>
            @endif
        </div>

    </div>
</section>
@endsection
