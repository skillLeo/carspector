@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Gutachter</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Gutachter</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="row mb-3">
    {{-- Manual create --}}
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-header"><h5 class="card-title mb-0"><i class="fas fa-user-plus me-2"></i> Gutachter manuell anlegen</h5></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.inspectors.create') }}">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               placeholder="z.B. Max Müller" value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">E-Mail <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="z.B. max@beispiel.de" value="{{ old('email') }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button class="btn btn-success w-100">
                        <i class="fas fa-paper-plane me-1"></i> Anlegen &amp; Einladung senden
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- CSV import --}}
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-header"><h5 class="card-title mb-0"><i class="fas fa-file-csv me-2"></i> Gutachter importieren (CSV)</h5></div>
            <div class="card-body">
                <p class="text-muted mb-2" style="font-size:13px;">
                    CSV-Datei mit den Spalten: <strong>Name, E-Mail</strong> (erste Zeile optional als Kopfzeile).<br>
                    Jeder Gutachter erhält automatisch eine Einladungs-E-Mail.
                </p>
                <p class="text-muted mb-3" style="font-size:12px;background:#f8f9fa;padding:8px;border-radius:4px;font-family:monospace;">
                    Name,Email<br>
                    Max Müller,max@beispiel.de<br>
                    Sarah Schmidt,sarah@beispiel.de
                </p>
                <form method="POST" action="{{ route('admin.inspectors.import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="file" name="csv_file" class="form-control @error('csv_file') is-invalid @enderror"
                               accept=".csv,.txt" required>
                        <button class="btn btn-primary">
                            <i class="fas fa-upload me-1"></i> Importieren
                        </button>
                    </div>
                    @error('csv_file')<div class="text-danger mt-1" style="font-size:13px;">{{ $message }}</div>@enderror
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Alle Gutachter ({{ $inspectors->count() }})</h5>
    </div>
    <div class="card-body p-0">
        @if($inspectors->isEmpty())
            <div class="p-4 text-muted">Noch keine Gutachter importiert.</div>
        @else
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Status</th>
                        <th>Gebiete</th>
                        <th>Anfragen</th>
                        <th>Eingeladen am</th>
                        <th>Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inspectors as $inspector)
                    <tr>
                        <td><a href="{{ route('admin.inspectors.show', $inspector->id) }}">{{ $inspector->name }}</a></td>
                        <td>{{ $inspector->email }}</td>
                        <td>
                            @if($inspector->status === 'active')
                                <span class="badge badge-success">Aktiv</span>
                            @elseif($inspector->status === 'pending')
                                <span class="badge badge-warning">Ausstehend</span>
                            @else
                                <span class="badge badge-danger">Inaktiv</span>
                            @endif
                        </td>
                        <td>{{ $inspector->service_areas_count }}</td>
                        <td>{{ $inspector->requests_count }}</td>
                        <td>{{ $inspector->invitation_sent_at ? $inspector->invitation_sent_at->format('d.m.Y') : '—' }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('admin.inspectors.show', $inspector->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($inspector->status === 'pending' || $inspector->status === 'inactive')
                            <form method="POST" action="{{ route('admin.inspectors.resend', $inspector->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary" title="Einladung erneut senden">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                            @endif
                            <form method="POST" action="{{ route('admin.inspectors.toggle', $inspector->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-sm {{ $inspector->status === 'active' ? 'btn-outline-danger' : 'btn-outline-success' }}"
                                        title="{{ $inspector->status === 'active' ? 'Deaktivieren' : 'Aktivieren' }}">
                                    <i class="fas fa-{{ $inspector->status === 'active' ? 'ban' : 'check' }}"></i>
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.inspectors.destroy', $inspector->id) }}" class="d-inline" onsubmit="return confirm('Gutachter {{ $inspector->name }} dauerhaft löschen? Dies kann nicht rückgängig gemacht werden.');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Dauerhaft löschen">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

@endsection
