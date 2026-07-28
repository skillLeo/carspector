@extends('mainpages.mainadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    Zu prüfende Aufträge
                    @if($orders->total() > 0)
                        <span class="badge badge-warning ml-2" style="font-size:14px;">{{ $orders->total() }}</span>
                    @endif
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Zu prüfen</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        @if($orders->isEmpty())
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-check-circle text-success" style="font-size:48px;"></i>
                <h4 class="mt-3 text-muted">Keine Aufträge zur Prüfung</h4>
                <p class="text-muted">Alle Ergebnisse wurden bereits bearbeitet.</p>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Aufträge mit Status <span class="badge badge-warning">Fertigstellung</span> — Prüfungsergebnis eingegangen</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Auftrags-Nr.</th>
                            <th>Fahrzeug</th>
                            <th>Kunde</th>
                            <th>Gutachter</th>
                            <th>Datum</th>
                            <th>Aktualisiert</th>
                            <th style="width:80px;">Aktion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>
                                <a href="{{ route('admin.bookings.show', $order->id) }}" class="fw-semibold">
                                    {{ $order->display_order_number }}
                                </a>
                                @if($order->isB2b())
                                    <span class="badge badge-info ml-1" style="font-size:10px;">B2B</span>
                                @endif
                            </td>
                            <td>{{ $order->vehicle_make_model ?: $order->vehicle_type ?: '—' }}</td>
                            <td>{{ $order->customer_name ?: optional($order->user)->name ?: '—' }}</td>
                            <td>{{ $order->examiner_name ?: optional($order->examiner)->name ?: '—' }}</td>
                            <td>{{ $order->admin_order_date ? $order->admin_order_date->format('d.m.Y') : optional($order->created_at)->format('d.m.Y') }}</td>
                            <td>{{ optional($order->updated_at)->format('d.m.Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $order->id) }}"
                                   class="btn btn-sm btn-light-primary px-3 py-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($orders->hasPages())
            <div class="card-footer">
                {{ $orders->links() }}
            </div>
            @endif
        </div>
        @endif

    </div>
</section>
@endsection
