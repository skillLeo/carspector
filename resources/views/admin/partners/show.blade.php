@extends('mainpages.mainadmin')

@section('styles')
<style>
    .badge-pending  { background: #ffc107; color: #000; }
    .badge-active   { background: #198754; color: #fff; }
    .badge-inactive { background: #dc3545; color: #fff; }
</style>
@endsection

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">{{ $partner->company_name }}</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">B2B Partners</a></li>
            <li class="breadcrumb-item active">{{ $partner->company_name }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>
@endif

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                @if($partner->logo_path)
                    <img src="{{ Storage::url($partner->logo_path) }}" alt="{{ $partner->company_name }}"
                         style="max-height:80px;max-width:100%;object-fit:contain;margin-bottom:16px;">
                @endif
                <h4 class="mb-1">{{ $partner->company_name }}</h4>
                <p class="text-muted mb-2">{{ $partner->email }}</p>
                <span class="badge badge-{{ $partner->status }} mb-3">{{ ucfirst($partner->status) }}</span>

                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createOrderModal">
                        <i class="fas fa-plus me-1"></i> Create Order
                    </button>
                    <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                    @if($partner->status !== 'active')
                    <form action="{{ route('admin.partners.resend', $partner->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-secondary btn-sm" onclick="return confirm('Resend invite?')">
                            <i class="fas fa-paper-plane me-1"></i> Resend Invite
                        </button>
                    </form>
                    @endif
                    <form action="{{ route('admin.partners.toggle', $partner->id) }}" method="POST" class="d-inline">
                        @csrf
                        @if($partner->status === 'active')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deactivate this partner?')">
                                <i class="fas fa-ban me-1"></i> Deactivate
                            </button>
                        @else
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-check me-1"></i> Activate
                            </button>
                        @endif
                    </form>
                </div>
            </div>
            <div class="card-footer text-muted text-center" style="font-size:13px;">
                Added {{ $partner->created_at->format('d.m.Y') }}
                @if($partner->last_login_at)
                    &bull; Last login {{ $partner->last_login_at->diffForHumans() }}
                @endif
            </div>
        </div>

        {{-- Pricing --}}
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center py-2">
                <h6 class="card-title mb-0">Service Prices</h6>
                <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-xs btn-outline-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <thead class="thead-light"><tr><th>Service</th><th>Price</th></tr></thead>
                    <tbody>
                        @foreach($serviceTypes as $stype)
                        @php $p = $partner->prices->firstWhere('service_type', $stype); @endphp
                        <tr>
                            <td>{{ $stype }}</td>
                            <td>{!! $p ? number_format($p->price, 2).' €' : '<span class="text-muted">—</span>' !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Recent Orders ({{ $partner->orders_count }})</h3>
                <a href="{{ route('admin.partners.export', $partner->id) }}" class="btn btn-sm btn-outline-success">
                    <i class="fas fa-file-csv me-1"></i> Export CSV
                </a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Vehicle</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td><strong>{{ $order->orderno ?? '#'.$order->id }}</strong></td>
                            <td>{{ $order->vehicle_make_model ?? '—' }}</td>
                            <td>
                                @if($order->admin_status === 'Storniert')
                                    <span class="badge badge-danger">Cancelled</span>
                                @elseif($order->status === 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @else
                                    <span class="badge badge-secondary">{{ ucfirst($order->admin_status ?? $order->status ?? '—') }}</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('d.m.Y') }}</td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $order) }}" class="btn btn-xs btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-3 text-muted">No orders placed yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@if($monthlyStats->isNotEmpty())
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Monthly Order Statistics (last 12 months)</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Month</th>
                            <th class="text-center">Total Orders</th>
                            <th class="text-center">Completed</th>
                            <th class="text-center">In Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monthlyStats as $stat)
                        <tr>
                            <td><strong>{{ \Carbon\Carbon::createFromDate($stat->year, $stat->month, 1)->format('F Y') }}</strong></td>
                            <td class="text-center">{{ $stat->total }}</td>
                            <td class="text-center"><span class="badge badge-success">{{ $stat->completed }}</span></td>
                            <td class="text-center"><span class="badge badge-secondary">{{ $stat->total - $stat->completed }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

{{-- Create Order Modal --}}
<div class="modal fade" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="createOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.partners.store-order', $partner->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createOrderModalLabel">Create Order for {{ $partner->company_name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Vehicle Make &amp; Model <span class="text-danger">*</span></label>
                            <input type="text" name="vehicle_make_model" class="form-control" required placeholder="e.g. BMW 3 Series 2021">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">VIN / Chassis No.</label>
                            <input type="text" name="vin_number" class="form-control" placeholder="Optional">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">First Registration (MM.YYYY)</label>
                            <input type="text" name="make_year" class="form-control" placeholder="e.g. 03.2021">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Mileage (km)</label>
                            <input type="text" name="mileage" class="form-control" placeholder="e.g. 85000">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="font-weight-bold">Inspection Location <span class="text-danger">*</span></label>
                            <textarea name="vehicle_location" class="form-control" rows="2" required placeholder="Full address"></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Country <span class="text-danger">*</span></label>
                            <select name="vehicle_country" id="adminOrderCountry" class="form-control" required>
                                <option value="Germany">Germany</option>
                                <option value="Austria">Austria</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Belgium">Belgium</option>
                                <option value="France">France</option>
                                <option value="Italy">Italy</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Contact Person <span class="text-danger">*</span></label>
                            <input type="text" name="contact_person" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Contact Phone <span class="text-danger">*</span></label>
                            <input type="text" name="contact_phone" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Inspection Type <span class="text-danger">*</span></label>
                            <select name="inspection_type" class="form-control" required>
                                <option value="Check XL">Check XL</option>
                                <option value="Check XXL">Check XXL</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 align-self-end" id="adminSohRow">
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" name="soh_check" value="1" id="adminSohCheck">
                                <label class="form-check-label" for="adminSohCheck">SoH Check (+€59)</label>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="font-weight-bold">Special Notes</label>
                            <textarea name="special_notes" class="form-control" rows="2" placeholder="Optional"></textarea>
                        </div>
                        <div class="col-12 mb-2" id="adminSendTeamEmailRow">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="send_team_email" value="1" id="adminSendTeamEmail" checked>
                                <label class="form-check-label" for="adminSendTeamEmail">Send notification email to inspection team</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Create Order</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
(function(){
    var countrySelect = document.getElementById('adminOrderCountry');
    var sohRow = document.getElementById('adminSohRow');
    var teamEmailRow = document.getElementById('adminSendTeamEmailRow');
    function updateFields(){
        var isGermany = countrySelect.value === 'Germany';
        sohRow.style.display = isGermany ? '' : 'none';
        teamEmailRow.style.display = isGermany ? '' : 'none';
    }
    if(countrySelect){ countrySelect.addEventListener('change', updateFields); updateFields(); }
})();
</script>
@endsection
