@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Add B2B Partner</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">B2B Partners</a></li>
            <li class="breadcrumb-item active">Add Partner</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New B2B Partner</h3>
            </div>
            <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                               value="{{ old('company_name') }}" required>
                        @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="logo">Company Logo <small class="text-muted">(JPEG, PNG, SVG — max 2MB)</small></label>
                        <div class="mb-2">
                            <img id="logo-preview" src="" alt="" style="max-height:60px;display:none;border:1px solid #dee2e6;border-radius:4px;padding:4px;">
                        </div>
                        <input type="file" name="logo" id="logo"
                               class="form-control-file @error('logo') is-invalid @enderror"
                               accept="image/*">
                        @error('logo')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="alert alert-info mb-0">
                        <i class="fas fa-info-circle me-1"></i>
                        An invitation email will be sent to the partner automatically when you save.
                        The link expires in {{ env('B2B_INVITE_TOKEN_HOURS', 48) }} hours.
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-1"></i> Add Partner &amp; Send Invite
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
