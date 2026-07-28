@extends('layouts.inspector')
@section('title', 'Anfragen')

@section('styles')
<style>
    /* Mobile card layout for requests */
    .requests-cards { display: none; }
    @media (max-width: 576px) {
        .requests-table-wrapper { display: none !important; }
        .requests-cards { display: block !important; }
    }
    .request-card {
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.12);
        border: 1px solid #dee2e6;
    }
    .request-card .card-header-bar {
        padding: 10px 14px;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .request-card .card-header-bar.pending  { background: #fff3cd; color: #856404; }
    .request-card .card-header-bar.accepted { background: #d1e7dd; color: #0a3622; }
    .request-card .card-header-bar.declined { background: #f8d7da; color: #58151c; }
    .request-card .card-body-inner { padding: 12px 14px; font-size: 14px; background: #fff; }
    .request-card .detail-row { display: flex; justify-content: space-between; padding: 4px 0; border-bottom: 1px solid #f0f0f0; }
    .request-card .detail-row:last-child { border-bottom: none; }
    .request-card .detail-label { color: #6c757d; font-size: 12px; min-width: 90px; }
    .request-card .detail-value { font-weight: 500; text-align: right; }
    .request-card .action-row { padding: 10px 14px; background: #f8f9fa; display: flex; gap: 8px; }
    .badge-pending  { background: #ffc107; color: #212529; }
    .badge-accepted { background: #198754; color: #fff; }
    .badge-declined { background: #dc3545; color: #fff; }
</style>
@endsection

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Offene Anfragen</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Offene Anfragen</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

@if($requests->isEmpty())
    <div class="alert alert-info"><i class="fas fa-info-circle me-2"></i> Keine Anfragen vorhanden.</div>
@else

{{-- ── Desktop table ─────────────────────────────────────────────────────── --}}
<div class="card requests-table-wrapper">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Auftrag</th>
                        <th>Fahrzeug</th>
                        <th>Ort</th>
                        <th>Vergütung</th>
                        <th>Status</th>
                        <th>Anfrage vom</th>
                        <th>Aktion</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($requests as $req)
                    @php
                        $compensation = $req->order->price
                            ? number_format(max(0, (float)$req->order->price - ($req->order->commission ?? 20)), 0, ',', '.') . ',- €'
                            : '—';
                    @endphp
                    <tr>
                        <td><strong>CarCheck | {{ $req->order->orderno ?? ('#'.$req->order->id) }}</strong></td>
                        <td>{{ trim(($req->order->brand ?? '') . ' ' . ($req->order->vehicle_make_model ?? $req->order->vehicle_type ?? '')) ?: '—' }}</td>
                        <td>{{ implode(', ', array_filter([$req->order->postal_code ?? '', $req->order->city ?? ''])) ?: '—' }}</td>
                        <td>Standard, siehe E-Mail</strong></td>
                        <td>
                            @if($req->status === 'pending')
                                <span class="badge badge-pending">Offen</span>
                            @elseif($req->status === 'accepted')
                                <span class="badge badge-accepted">Angenommen</span>
                            @else
                                <span class="badge badge-declined">Abgelehnt</span>
                            @endif
                        </td>
                        <td>{{ $req->sent_at ? $req->sent_at->format('d.m.Y') : '—' }}</td>
                        <td>
                            @if($req->status === 'pending')
                            <form method="POST" action="{{ route('inspector.requests.respond', $req->id) }}" class="d-inline">
                                @csrf
                                <button name="action" value="accepted" class="btn btn-sm btn-success me-1">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button name="action" value="declined" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                            @else
                                <span class="text-muted" style="font-size:12px;">
                                    {{ $req->responded_at ? $req->responded_at->format('d.m.Y') : '' }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ── Mobile cards ──────────────────────────────────────────────────────── --}}
<div class="requests-cards">
@foreach($requests as $req)
    @php
        $statusClass = $req->status === 'accepted' ? 'accepted' : ($req->status === 'declined' ? 'declined' : 'pending');
        $statusLabel = $req->status === 'accepted' ? 'Angenommen' : ($req->status === 'declined' ? 'Abgelehnt' : 'Offen');
        $vehicle = trim(($req->order->brand ?? '') . ' ' . ($req->order->vehicle_make_model ?? $req->order->vehicle_type ?? '')) ?: '—';
        $location = implode(', ', array_filter([$req->order->postal_code ?? '', $req->order->city ?? ''])) ?: '—';
        $compensation = $req->order->price
            ? number_format(max(0, (float)$req->order->price - ($req->order->commission ?? 20)), 0, ',', '.') . ',- €'
            : '—';
    @endphp
    <div class="request-card">
        <div class="card-header-bar {{ $statusClass }}">
            <span>CarCheck | {{ $req->order->orderno ?? ('#'.$req->order->id) }}</span>
            <span class="badge badge-{{ $statusClass }}" style="font-size:11px;">{{ $statusLabel }}</span>
        </div>
        <div class="card-body-inner">
            <div class="detail-row">
                <span class="detail-label">Auftrags-Typ</span>
                <span class="detail-value">CarCheck</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Fahrzeug</span>
                <span class="detail-value">{{ $vehicle }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Ort</span>
                <span class="detail-value">{{ $location }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Vergütung</span>
                <span class="detail-value">Standard, siehe E-Mail</span>
            </div>
            <!-- <div class="detail-row">
                <span class="detail-label">Vergütung</span>
                <span class="detail-value text-success fw-bold">{{ $compensation }}</span>
            </div> -->
            <div class="detail-row">
                <span class="detail-label">Anfrage vom</span>
                <span class="detail-value">{{ $req->sent_at ? $req->sent_at->format('d.m.Y') : '—' }}</span>
            </div>
            @if($req->responded_at && $req->status !== 'pending')
            <div class="detail-row">
                <span class="detail-label">Beantwortet</span>
                <span class="detail-value">{{ $req->responded_at->format('d.m.Y') }}</span>
            </div>
            @endif
        </div>
        @if($req->status === 'pending')
        <div class="action-row">
            <form method="POST" action="{{ route('inspector.requests.respond', $req->id) }}" class="d-flex gap-2 w-100">
                @csrf
                <button name="action" value="accepted" class="btn btn-success btn-sm flex-fill">
                    <i class="fas fa-check me-1"></i> Annehmen
                </button>
                <button name="action" value="declined" class="btn btn-outline-danger btn-sm flex-fill">
                    <i class="fas fa-times me-1"></i> Ablehnen
                </button>
            </form>
        </div>
        @endif
    </div>
@endforeach
</div>

{{-- Email body preview accordion --}}
@foreach($requests as $req)
@if($req->email_body)
<div class="card mt-2" id="body-card-{{ $req->id }}" style="display:none;">
    <div class="card-body">
        <h6 class="fw-semibold mb-2">Nachrichteninhalt — Auftrag {{ $req->order->orderno ?? $req->order->id }}</h6>
        <pre style="white-space:pre-wrap;font-size:13px;background:#f8f9fa;padding:12px;border-radius:6px;">{{ $req->email_body }}</pre>
    </div>
</div>
@endif
@endforeach
@endif

@endsection
