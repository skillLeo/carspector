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
    <div class="col-sm-6"><h1 class="m-0">B2B Partners</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">B2B Partners</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">All B2B Partners</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Add Partner
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover table-striped mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Orders</th>
                    <th>Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            @if($partner->logo_path)
                                <img src="{{ Storage::url($partner->logo_path) }}" alt="" style="height:32px;max-width:70px;object-fit:contain;">
                            @endif
                            <strong>{{ $partner->company_name }}</strong>
                        </div>
                    </td>
                    <td>{{ $partner->email }}</td>
                    <td>
                        <span class="badge badge-{{ $partner->status }}">{{ ucfirst($partner->status) }}</span>
                    </td>
                    <td>{{ $partner->orders_count }}</td>
                    <td>{{ $partner->created_at->format('d.m.Y') }}</td>
                    <td style="white-space:nowrap;">
                        <a href="{{ route('admin.partners.show', $partner->id) }}" class="btn btn-sm btn-info" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-sm btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        @if($partner->status !== 'active')
                        <form action="{{ route('admin.partners.resend', $partner->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-secondary" title="Resend Invite" onclick="return confirm('Resend invite to {{ $partner->company_name }}?')">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('admin.partners.toggle', $partner->id) }}" method="POST" class="d-inline">
                            @csrf
                            @if($partner->status === 'active')
                                <button class="btn btn-sm btn-danger" title="Deactivate" onclick="return confirm('Deactivate {{ $partner->company_name }}?')">
                                    <i class="fas fa-ban"></i>
                                </button>
                            @else
                                <button class="btn btn-sm btn-success" title="Activate">
                                    <i class="fas fa-check"></i>
                                </button>
                            @endif
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No B2B partners yet. <a href="{{ route('admin.partners.create') }}">Add the first one.</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($partners->hasPages())
    <div class="card-footer">
        {{ $partners->links() }}
    </div>
    @endif
</div>

@endsection
