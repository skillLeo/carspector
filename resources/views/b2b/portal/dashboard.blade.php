@extends('layouts.b2b')
@section('title', 'Dashboard')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Dashboard</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="mb-3">
    <h4 class="fw-bold text-dark mb-0">Welcome back, {{ $partner->company_name }}!</h4>
    <p class="text-muted mb-0">Here's an overview of your inspection orders.</p>
</div>

{{-- Stat Cards --}}
<div class="row mb-4">
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:52px;height:52px;background:#e8f4fd;">
                        <i class="fas fa-clipboard-list fa-lg" style="color:#0d6efd;"></i>
                    </div>
                </div>
                <div>
                    <div style="font-size:28px;font-weight:700;color:#1a1a2e;">{{ $totalOrders }}</div>
                    <div class="text-muted" style="font-size:13px;">Total Orders</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:52px;height:52px;background:#fff3cd;">
                        <i class="fas fa-spinner fa-lg" style="color:#ffc107;"></i>
                    </div>
                </div>
                <div>
                    <div style="font-size:28px;font-weight:700;color:#1a1a2e;">{{ $inProgressCount }}</div>
                    <div class="text-muted" style="font-size:13px;">In Progress</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-3">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:52px;height:52px;background:#d1f0e0;">
                        <i class="fas fa-check-circle fa-lg" style="color:#198754;"></i>
                    </div>
                </div>
                <div>
                    <div style="font-size:28px;font-weight:700;color:#1a1a2e;">{{ $completedCount }}</div>
                    <div class="text-muted" style="font-size:13px;">Completed</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Place Order CTA --}}
<div class="mb-4">
    <a href="{{ route('b2b.orders.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus-circle me-2"></i> Place New Inspection Order
    </a>
</div>

{{-- Recent Orders --}}
<!-- <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Recent Orders</h5>
        <a href="{{ route('b2b.orders') }}" class="btn btn-sm btn-outline-primary">View All</a>
    </div>
    <div class="card-body p-0">
        @if($recentOrders->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-clipboard fa-3x text-muted mb-3"></i>
            <p class="text-muted mb-3">No orders yet. Place your first inspection order to get started.</p>
            <a href="{{ route('b2b.orders.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Place First Order
            </a>
        </div>
        @else
        <table class="table table-hover mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr>
                    <td><strong>{{ $order->orderno ?? '#'.$order->id }}</strong></td>
                    <td>{{ $order->created_at->format('d.m.Y') }}</td>
                    <td>{{ $order->vehicle_make_model ?? '—' }}</td>
                    <td>
                        @php
                            $statusColor = match($order->status) {
                                'completed'  => 'success',
                                'inspecting', 'processing', 'visited' => 'warning',
                                default      => 'primary',
                            };
                        @endphp
                        <span class="badge bg-{{ $statusColor }}">{{ ucfirst($order->status ?? 'submitted') }}</span>
                    </td>
                    <td>
                        <a href="{{ route('b2b.orders.show', $order->id) }}" class="btn btn-xs btn-outline-secondary btn-sm">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div> -->

@endsection
