@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">{{ $inspector->name }}</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.inspectors.index') }}">Gutachter</a></li>
            <li class="breadcrumb-item active">{{ $inspector->name }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    {{-- Inspector info --}}
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">Details</h5></div>
            <div class="card-body">
                <dl class="row mb-2">
                    <dt class="col-sm-5">Name</dt><dd class="col-sm-7">{{ $inspector->name }}</dd>
                    <dt class="col-sm-5">E-Mail</dt><dd class="col-sm-7">{{ $inspector->email }}</dd>
                    <dt class="col-sm-5">Telefon</dt><dd class="col-sm-7">{{ $inspector->phone ?: '—' }}</dd>
                    <dt class="col-sm-5">Status</dt>
                    <dd class="col-sm-7">
                        @if($inspector->status === 'active') <span class="badge badge-success">Aktiv</span>
                        @elseif($inspector->status === 'pending') <span class="badge badge-warning">Ausstehend</span>
                        @else <span class="badge badge-danger">Inaktiv</span>
                        @endif
                    </dd>
                    <dt class="col-sm-5">Eingeladen</dt><dd class="col-sm-7">{{ $inspector->invitation_sent_at ? $inspector->invitation_sent_at->format('d.m.Y') : '—' }}</dd>
                    <dt class="col-sm-5">Letzter Login</dt><dd class="col-sm-7">{{ $inspector->last_login_at ? $inspector->last_login_at->format('d.m.Y H:i') : '—' }}</dd>
                </dl>
                <div class="d-flex gap-2 mt-3">
                    @if($inspector->status !== 'active')
                    <form method="POST" action="{{ route('admin.inspectors.resend', $inspector->id) }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-paper-plane me-1"></i> Einladung erneut senden
                        </button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('admin.inspectors.toggle', $inspector->id) }}">
                        @csrf
                        <button class="btn btn-sm {{ $inspector->status === 'active' ? 'btn-outline-danger' : 'btn-outline-success' }}">
                            <i class="fas fa-{{ $inspector->status === 'active' ? 'ban' : 'check' }} me-1"></i>
                            {{ $inspector->status === 'active' ? 'Deaktivieren' : 'Aktivieren' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Service areas --}}
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0"><i class="fas fa-map me-2"></i> Servicegebiete</h5></div>
            <div class="card-body">

                @if($inspector->serviceAreas->isEmpty())
                    <p class="text-muted">Keine Gebiete konfiguriert.</p>
                @else
                <div class="table-responsive mb-3">
                    <table class="table table-sm">
                        <thead class="table-light"><tr><th>Typ</th><th>Gebiet</th><th></th></tr></thead>
                        <tbody>
                        @foreach($inspector->serviceAreas as $area)
                            <tr>
                                <td>
                                    @if($area->type === 'city') <span class="badge bg-primary">Stadt</span>
                                    @else <span class="badge bg-secondary">PLZ-Bereich</span>
                                    @endif
                                </td>
                                <td>{{ $area->display_label }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.inspectors.areas.delete', $area->id) }}"
                                          onsubmit="return confirm('Gebiet entfernen?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                {{-- Add city --}}
                <h6 class="fw-semibold">Stadt hinzufügen</h6>
                <form method="POST" action="{{ route('admin.inspectors.areas.add', $inspector->id) }}" class="mb-3">
                    @csrf
                    <input type="hidden" name="type" value="city">
                    <div class="input-group">
                        <input type="text" name="city_name" class="form-control" placeholder="z.B. Hamburg" required>
                        <button class="btn btn-primary">Hinzufügen</button>
                    </div>
                </form>

                {{-- Add PLZ range --}}
                <h6 class="fw-semibold">PLZ-Bereich hinzufügen</h6>
                <form method="POST" action="{{ route('admin.inspectors.areas.add', $inspector->id) }}">
                    @csrf
                    <input type="hidden" name="type" value="postal_range">
                    <div class="row g-2">
                        <div class="col-5">
                            <input type="text" name="postal_min" class="form-control" placeholder="Von PLZ" required maxlength="10">
                        </div>
                        <div class="col-5">
                            <input type="text" name="postal_max" class="form-control" placeholder="Bis PLZ" required maxlength="10">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary w-100">+</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Requests history --}}
<div class="card">
    <div class="card-header"><h5 class="card-title mb-0"><i class="fas fa-bell me-2"></i> Anfragen</h5></div>
    <div class="card-body p-0">
        @if($inspector->requests->isEmpty())
            <div class="p-4 text-muted">Noch keine Anfragen gesendet.</div>
        @else
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr><th>Auftrag</th><th>Status</th><th>Gesendet</th><th>Beantwortet</th></tr>
                </thead>
                <tbody>
                @foreach($inspector->requests as $req)
                    <tr>
                        <td>
                            <a href="{{ route('admin.bookings.show', $req->order_id) }}">
                                {{ $req->order->orderno ?? ('#'.$req->order_id) }}
                            </a>
                        </td>
                        <td>
                            @if($req->status === 'pending') <span class="badge badge-warning">Offen</span>
                            @elseif($req->status === 'accepted') <span class="badge badge-success">Angenommen</span>
                            @else <span class="badge badge-danger">Abgelehnt</span>
                            @endif
                        </td>
                        <td>{{ $req->sent_at ? $req->sent_at->format('d.m.Y') : '—' }}</td>
                        <td>{{ $req->responded_at ? $req->responded_at->format('d.m.Y') : '—' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

@endsection
