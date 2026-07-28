@extends('mainpages.mainadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">API-Key Verwaltung</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">API-Key</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
        @endif

        {{-- One-time key display --}}
        @if(session('new_api_key'))
        <div class="alert alert-warning" style="border: 2px solid #f59e0b;">
            <h5><i class="fas fa-exclamation-triangle"></i> Neuer API-Key — nur einmal sichtbar!</h5>
            <p class="mb-2">Dieser Key wird <strong>nicht erneut angezeigt</strong>. Bitte jetzt kopieren und sicher an den Partner weitergeben.</p>
            <div class="d-flex align-items-center gap-2">
                <code id="raw-key-display" style="font-size:16px; background:#fff; padding:10px 16px; border-radius:6px; border:1px solid #ddd; word-break:break-all; flex:1;">{{ session('new_api_key') }}</code>
                <button class="btn btn-sm btn-outline-secondary ml-2" onclick="copyKey()"><i class="fas fa-copy"></i> Kopieren</button>
            </div>
            <small class="text-muted mt-2 d-block">Letzten 8 Zeichen (Hinweis): <strong>{{ session('new_api_hint') }}</strong></small>
        </div>
        @endif

        {{-- Current active key card --}}
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Aktiver API-Key</h3>
            </div>
            <div class="card-body">
                @if($currentKey)
                <dl class="row mb-3">
                    <dt class="col-sm-3">Label</dt>
                    <dd class="col-sm-9">{{ $currentKey->label ?? '—' }}</dd>
                    <dt class="col-sm-3">Hinweis (letzte 8)</dt>
                    <dd class="col-sm-9"><code>…{{ $currentKey->hint }}</code></dd>
                    <dt class="col-sm-3">Erstellt</dt>
                    <dd class="col-sm-9">{{ $currentKey->created_at->format('d.m.Y H:i') }}</dd>
                    <dt class="col-sm-3">Zuletzt verwendet</dt>
                    <dd class="col-sm-9">{{ $currentKey->last_used_at ? $currentKey->last_used_at->format('d.m.Y H:i') : '—' }}</dd>
                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9"><span class="badge badge-success">Aktiv</span></dd>
                </dl>
                <form method="POST" action="{{ route('admin.inspection.api-keys.deactivate', $currentKey->id) }}"
                      onsubmit="return confirm('Aktuellen Key wirklich deaktivieren? Er funktioniert dann sofort nicht mehr.')">
                    @csrf @method('POST')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-ban"></i> Key deaktivieren
                    </button>
                </form>
                @else
                <p class="text-muted mb-0">Kein aktiver API-Key vorhanden. Bitte neuen Key generieren.</p>
                @endif
            </div>
        </div>

        {{-- Generate new key --}}
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Neuen API-Key generieren</h3>
            </div>
            <div class="card-body">
                <p class="text-muted">Beim Generieren wird der bisherige Key <strong>sofort deaktiviert</strong>. Den neuen Key nur einmal anzeigen — danach nicht mehr abrufbar.</p>
                <form method="POST" action="{{ route('admin.inspection.api-keys.generate') }}"
                      onsubmit="return confirm('Neuen API-Key generieren? Der aktuelle Key wird sofort deaktiviert.')">
                    @csrf
                    <div class="form-group" style="max-width:360px;">
                        <label for="label">Label (optional)</label>
                        <input type="text" name="label" id="label" class="form-control"
                               value="TÜV Rheinland" placeholder="z.B. TÜV Rheinland">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-key"></i> Neuen Key generieren
                    </button>
                </form>
            </div>
        </div>

        {{-- All keys history --}}
        @if($allKeys->count() > 0)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Key-Verlauf</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Hinweis</th>
                            <th>Status</th>
                            <th>Erstellt</th>
                            <th>Zuletzt verwendet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allKeys as $key)
                        <tr>
                            <td>{{ $key->id }}</td>
                            <td>{{ $key->label ?? '—' }}</td>
                            <td><code>…{{ $key->hint }}</code></td>
                            <td>
                                @if($key->is_active)
                                    <span class="badge badge-success">Aktiv</span>
                                @else
                                    <span class="badge badge-secondary">Inaktiv</span>
                                @endif
                            </td>
                            <td>{{ $key->created_at->format('d.m.Y H:i') }}</td>
                            <td>{{ $key->last_used_at ? $key->last_used_at->format('d.m.Y H:i') : '—' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>
</section>
@endsection

@section('js')
<script>
function copyKey() {
    var el = document.getElementById('raw-key-display');
    if (!el) return;
    navigator.clipboard.writeText(el.textContent.trim()).then(function() {
        toastr.success('API-Key kopiert!');
    });
}
</script>
@endsection
