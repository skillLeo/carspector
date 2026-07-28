@extends('layouts.inspector')
@section('title', 'Abgeschlossene Prüfungen')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Abgeschlossene Aufträge</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Abgeschlossene Aufträge</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

@if($completedRequests->isEmpty())
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i> Noch keine abgeschlossenen Aufträge vorhanden.
    </div>
@else
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Auftrag</th>
                        <th>Fahrzeug</th>
                        <!-- <th>Ort</th>
                        <th>Vergütung</th> -->
                        <th>Abgeschlossen am</th>
                        <!-- <th>Status</th> -->
                    </tr>
                </thead>
                <tbody>
                @foreach($completedRequests as $req)
                    @php
                        $comp = $req->order->price
                            ? number_format(max(0, (float)$req->order->price - ($req->order->commission ?? 20)), 0, ',', '.') . ',- €'
                            : '—';
                    @endphp
                    <tr>
                        <td><strong>{{ $req->order->orderno ?? ('#'.$req->order->id) }}</strong></td>
                        <td>{{ trim(($req->order->brand ?? '') . ' ' . ($req->order->vehicle_make_model ?? $req->order->vehicle_type ?? '')) ?: '—' }}</td>
                        <!-- <td>{{ implode(', ', array_filter([$req->order->postal_code ?? '', $req->order->city ?? ''])) ?: '—' }}</td>
                        <td><strong class="text-success">{{ $comp }}</strong></td> -->
                        <td>{{ $req->order->completed_at ? \Carbon\Carbon::parse($req->order->completed_at)->format('d.m.Y') : '—' }}</td>
                        <!-- <td><span class="badge badge-accepted">Geprüft</span></td> -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@endsection
