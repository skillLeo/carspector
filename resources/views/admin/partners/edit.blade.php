@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Edit Partner</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">B2B Partners</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.partners.show', $partner->id) }}">{{ $partner->company_name }}</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit: {{ $partner->company_name }}</h3>
            </div>
            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="company_name">Company Name <span class="text-danger">*</span></label>
                        <input type="text" name="company_name" id="company_name"
                               class="form-control @error('company_name') is-invalid @enderror"
                               value="{{ old('company_name', $partner->company_name) }}" required>
                        @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" value="{{ $partner->email }}" disabled>
                        <small class="text-muted">Email cannot be changed after registration.</small>
                    </div>

                    {{-- Pricing per service type --}}
                    <div class="form-group">
                        <label class="fw-semibold">Pricing per Service Type (€)</label>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr><th>Service Type</th><th style="width:160px;">Price (€)</th></tr>
                                </thead>
                                <tbody>
                                    @foreach($serviceTypes as $stype)
                                    @php $existingPrice = $partner->prices->firstWhere('service_type', $stype)?->price; @endphp
                                    <tr>
                                        <td class="align-middle">{{ $stype }}</td>
                                        <td>
                                            <input type="number" name="prices[{{ $stype }}]"
                                                   class="form-control form-control-sm"
                                                   value="{{ old('prices.'.$stype, $existingPrice) }}"
                                                   min="0" step="0.01" placeholder="—">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <small class="text-muted">Leave blank to remove price for that service type.</small>
                    </div>

                    <div class="form-group">
                        <label>Current Logo</label>
                        @if($partner->logo_path)
                            <div class="mb-2">
                                <img src="{{ Storage::url($partner->logo_path) }}" alt="" style="max-height:60px;border:1px solid #dee2e6;border-radius:4px;padding:4px;">
                            </div>
                        @else
                            <p class="text-muted">No logo uploaded.</p>
                        @endif
                        <label for="logo">Replace Logo <small class="text-muted">(JPEG, PNG, SVG — max 2MB)</small></label>
                        <div class="mb-2">
                            <img id="logo-preview" src="" alt="" style="max-height:60px;display:none;border:1px solid #dee2e6;border-radius:4px;padding:4px;">
                        </div>
                        <input type="file" name="logo" id="logo"
                               class="form-control-file @error('logo') is-invalid @enderror"
                               accept="image/*">
                        @error('logo')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.partners.show', $partner->id) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
document.getElementById('logo').addEventListener('change', function() {
    const preview = document.getElementById('logo-preview');
    if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
        reader.readAsDataURL(this.files[0]);
    }
});
</script>
@endsection
