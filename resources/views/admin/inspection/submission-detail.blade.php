@extends('mainpages.mainadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Übertragung #{{ $submission->id }}</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.inspection.submissions') }}">Protokoll</a></li>
                    <li class="breadcrumb-item active">#{{ $submission->id }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Übersicht</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.inspection.submissions') }}" class="btn btn-sm btn-light">← Zurück</a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">ID</dt>
                    <dd class="col-sm-9">{{ $submission->id }}</dd>

                    <dt class="col-sm-3">Zeitpunkt</dt>
                    <dd class="col-sm-9">{{ $submission->created_at ? $submission->created_at->format('d.m.Y H:i:s') : '—' }}</dd>

                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9">
                        @php
                            $badgeClass = match($submission->status) {
                                'success'          => 'badge-success',
                                'failed'           => 'badge-danger',
                                'validation_error' => 'badge-warning',
                                'invalid_auth'     => 'badge-danger',
                                default            => 'badge-secondary',
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $submission->status }}</span>
                    </dd>

                    <dt class="col-sm-3">Auftrags-Ref. (Partner)</dt>
                    <dd class="col-sm-9"><code>{{ $submission->raw_order_ref ?? '—' }}</code></dd>

                    <dt class="col-sm-3">Auftrags-ID (intern)</dt>
                    <dd class="col-sm-9">
                        @if($submission->order)
                            <a href="{{ route('admin.bookings.show', $submission->order_id) }}">
                                {{ $submission->order->display_order_number }}
                            </a>
                        @else
                            —
                        @endif
                    </dd>

                    <dt class="col-sm-3">IP-Adresse</dt>
                    <dd class="col-sm-9"><code>{{ $submission->ip_address ?? '—' }}</code></dd>

                    @if($submission->error_message)
                    <dt class="col-sm-3">Fehlermeldung</dt>
                    <dd class="col-sm-9">
                        <div class="alert alert-danger mb-0 py-2">{{ $submission->error_message }}</div>
                    </dd>
                    @endif
                </dl>
            </div>
        </div>

        @if(count($submission->documents_received ?? []) > 0)
        <div class="card mb-4">
            <div class="card-header"><h3 class="card-title">Empfangene Dokumente</h3></div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Typ</th>
                            <th>Dateiname</th>
                            <th>Größe</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submission->documents_received as $i => $doc)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $doc['type'] ?? '—' }}</td>
                            <td>{{ $doc['filename'] ?? '—' }}</td>
                            <td>{{ isset($doc['size_bytes']) ? number_format($doc['size_bytes'] / 1024, 1) . ' KB' : '—' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if(count($submission->files_saved ?? []) > 0)
        <div class="card">
            <div class="card-header"><h3 class="card-title">Gespeicherte Dateien</h3></div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Typ</th>
                            <th>Pfad</th>
                            <th>Disk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submission->files_saved as $i => $file)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $file['type'] ?? '—' }}</td>
                            <td><code style="font-size:12px;">{{ $file['path'] ?? '—' }}</code></td>
                            <td>{{ $file['disk'] ?? '—' }}</td>
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
