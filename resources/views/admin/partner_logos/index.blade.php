@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6"><h1 class="m-0">Partner Logos</h1></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Partner Logos</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mb-10">
                <div class="card-header border-0 pt-6">
                    <h3 class="card-title fw-bold">Add Partner Logo</h3>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ route('admin.partner-logos.store') }}" method="POST" enctype="multipart/form-data" class="row g-6">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label required">Partner Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-solid" placeholder="e.g. Autohaus Krause">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required">Logo (PNG/JPG)</label>
                            <input type="file" name="logo" class="form-control form-control-solid" accept="image/*">
                            <small class="text-muted">Recommended: transparent background, min. 200px width.</small>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary px-10">Save Partner</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-0 pt-6">
                    <h3 class="card-title fw-bold">Saved Partner Logos</h3>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th>Name</th>
                                    <th>Preview</th>
                                    <th>Created</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse($logos as $logo)
                                    <tr>
                                        <td>{{ $logo->name }}</td>
                                        <td>
                                            @if($logo->logo_path && file_exists(public_path($logo->logo_path)))
                                                <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->name }} logo" style="max-height:50px;">
                                            @else
                                                <span class="text-muted">Missing file</span>
                                            @endif
                                        </td>
                                        <td>{{ optional($logo->created_at)->format('d M Y H:i') }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.partner-logos.destroy', $logo) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-light-danger" onclick="return confirm('Delete this partner logo?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No partner logos added yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
