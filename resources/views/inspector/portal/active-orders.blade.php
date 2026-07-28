@extends('layouts.inspector')
@section('title', 'Aktive Aufträge')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Aktive Aufträge</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Aktive Aufträge</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

@if($assignedRequests->isEmpty())
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i> Aktuell sind Ihnen keine Aufträge zugewiesen.
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
                        <th>Vergütung</th>
                        <th>Termin</th> -->
                        <th>Aktion</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($assignedRequests as $req)
                    @php
                        $comp = $req->order->price
                            ? number_format(max(0, (float)$req->order->price - ($req->order->commission ?? 20)), 0, ',', '.') . ',- €'
                            : '—';
                    @endphp
                    <tr>
                        <td><strong>{{ $req->order->orderno ?? ('#'.$req->order->id) }}</strong></td>
                        <td>{{ trim(($req->order->brand ?? '') . ' ' . ($req->order->vehicle_make_model ?? $req->order->vehicle_type ?? '')) ?: '—' }}</td>
                        <!-- <td>{{ implode(', ', array_filter([$req->order->postal_code ?? '', $req->order->city ?? ''])) ?: '—' }}</td>
                        <td><strong class="text-success">{{ $comp }}</strong></td>
                        <td>
                            <form method="POST" action="{{ route('inspector.active-orders.appointment', $req->order->id) }}" class="d-flex gap-1 align-items-center">
                                @csrf
                                <input type="date" name="appointment_date" class="form-control form-control-sm" style="width:130px;"
                                       value="{{ $req->order->appointment_date ? \Carbon\Carbon::parse($req->order->appointment_date)->format('Y-m-d') : '' }}">
                                <input type="time" name="appointment_time" class="form-control form-control-sm" style="width:100px;"
                                       value="{{ $req->order->appointment_time ? \Carbon\Carbon::parse($req->order->appointment_time)->format('H:i') : '' }}">
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-save"></i>
                                </button>
                            </form>
                        </td> -->
                        <td>
                            @if(isset($examUrls[$req->order->id]))
                            <a href="{{ $examUrls[$req->order->id] }}"  target="_blank" class="btn btn-sm btn-success">
                                <i class="fas fa-play me-1"></i> Prüfung starten
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@endsection
