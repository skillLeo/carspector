@extends('layouts.inspector')
@section('title', 'Servicegebiet')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Mein Servicegebiet</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Servicegebiet</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    {{-- Current areas --}}
    <div class="col-lg-7 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-map me-2 text-primary"></i> Konfigurierte Gebiete</h5>
            </div>
            <div class="card-body">
                @if($areas->isEmpty())
                    <p class="text-muted">Noch keine Gebiete hinzugefügt.</p>
                @else
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Typ</th>
                                <th>Gebiet</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($areas as $area)
                            <tr>
                                <td>
                                    @if($area->type === 'city')
                                        <span class="badge bg-primary">Stadt</span>
                                    @else
                                        <span class="badge bg-secondary">PLZ-Bereich</span>
                                    @endif
                                </td>
                                <td>{{ $area->display_label }}</td>
                                <td>
                                    <form method="POST" action="{{ route('inspector.service-areas.delete', $area->id) }}"
                                          onsubmit="return confirm('Gebiet entfernen?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
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
    </div>

    {{-- Add area --}}
    <div class="col-lg-5 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-plus me-2 text-success"></i> Gebiet hinzufügen</h5>
            </div>
            <div class="card-body">

                {{-- Add city --}}
                <h6 class="fw-semibold mb-2">Stadt hinzufügen</h6>
                <form method="POST" action="{{ route('inspector.service-areas.add') }}" class="mb-4">
                    @csrf
                    <input type="hidden" name="type" value="city">
                    <div class="input-group">
                        <input type="text" name="city_name" class="form-control @error('city_name') is-invalid @enderror"
                               placeholder="z.B. Köln" required>
                        <button class="btn btn-primary">Hinzufügen</button>
                    </div>
                    @error('city_name')<div class="text-danger mt-1" style="font-size:13px;">{{ $message }}</div>@enderror
                </form>

                <hr>

                {{-- Add postal range --}}
                <h6 class="fw-semibold mb-2">PLZ-Bereich hinzufügen</h6>
                <form method="POST" action="{{ route('inspector.service-areas.add') }}">
                    @csrf
                    <input type="hidden" name="type" value="postal_range">
                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <input type="text" name="postal_min" class="form-control @error('postal_min') is-invalid @enderror"
                                   placeholder="Von PLZ" required maxlength="10">
                            @error('postal_min')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-6">
                            <input type="text" name="postal_max" class="form-control @error('postal_max') is-invalid @enderror"
                                   placeholder="Bis PLZ" required maxlength="10">
                            @error('postal_max')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <button class="btn btn-primary w-100">PLZ-Bereich hinzufügen</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
