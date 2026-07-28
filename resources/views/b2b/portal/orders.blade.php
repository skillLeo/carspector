@extends('layouts.b2b')
@section('title', 'My Orders')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">My Orders</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('b2b.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">My Orders</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="mb-0">All Orders</h5>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <form method="GET" action="{{ route('b2b.orders') }}" class="d-flex gap-2 flex-wrap">
                {{-- Search --}}
                <input type="text" name="search" class="form-control form-control-sm" style="min-width:180px;"
                       placeholder="Search vehicle, order ID…" value="{{ request('search') }}">
                {{-- Status filter: active & completed only --}}
                <select name="status" class="form-select form-select-sm" style="min-width:140px;">
                    <option value="">All</option>
                    <option value="active" {{ request('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="completed" {{ request('status', 'active') === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status', 'active') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
                @if(request('search') || request('status'))
                <a href="{{ route('b2b.orders') }}" class="btn btn-sm btn-outline-danger" title="Clear">
                    <i class="fas fa-times"></i>
                </a>
                @endif
            </form>
            <a href="{{ route('b2b.orders.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> New Order
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        @if($orders->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
            <p class="text-muted mb-3">No orders found.</p>
            <a href="{{ route('b2b.orders.create') }}" class="btn btn-primary">Place Your First Order</a>
        </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Vehicle</th>
                        <th>VIN</th>
                        <th>Type</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Appointment</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    @php
                        $isCancelled = ($order->admin_status === 'Storniert');
                        $statusColor = $order->status === 'completed' ? 'success' : ($isCancelled ? 'danger' : 'primary');
                        $statusLabel = $order->status === 'completed' ? 'Completed' : ($isCancelled ? 'Cancelled' : 'Active');
                    @endphp
                    <tr>
                        <td><strong>{{ $order->orderno ?? '#'.$order->id }}</strong></td>
                        <td>{{ $order->created_at->format('d.m.Y') }}</td>
                        <td>{{ $order->vehicle_make_model ?? '—' }}</td>
                        <td style="font-size:12px; color:#6c757d;">{{ $order->brand ?? '—' }}</td>
                        <td>{{ $order->desc ?? '—' }}{{ $order->soh_check ? ' &amp; SoH' : '' }}</td>
                        <td>{{ $order->b2b_vehicle_country ?? '—' }}</td>
                        <td><span class="badge bg-{{ $statusColor }}">{{ $statusLabel }}</span></td>
                        <td>
                            @if($order->appointment_date)
                                {{ \Carbon\Carbon::parse($order->appointment_date)->format('d.m.Y') }}
                            @else
                                <span class="text-muted" style="font-size:12px;">—</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('b2b.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye me-1"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    @if($orders->hasPages())
    <div class="card-footer">
        {{ $orders->links() }}
    </div>
    @endif
</div>

@endsection
