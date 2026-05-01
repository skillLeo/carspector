@extends('mainpages.mainadmin')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
    </div>
</div>
@endsection

@section('content')

{{-- Stat boxes --}}
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $totalBookingAmount }}€</h3>
                <p>Booking Amount</p>
            </div>
            <div class="icon"><i class="fas fa-chart-bar"></i></div>
            <a href="{{ route('admin.bookings') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{ $total_users }}</h3>
                <p>Total Users</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
            <a href="{{ route('user.view') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ number_format($examiners, 0) }}</h3>
                <p>Total Examiners</p>
            </div>
            <div class="icon"><i class="fas fa-user-tie"></i></div>
            <a href="{{ route('examiners.view') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ number_format($reviews, 0) }}</h3>
                <p>Total Reviews</p>
            </div>
            <div class="icon"><i class="fas fa-star"></i></div>
            <a href="{{ route('admin.reviews') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

{{-- Top Examiners table --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="card-title mb-0">Top Examiners</h3>
                    <small class="text-muted">Top 10 examiners</small>
                </div>
                <div class="form-check form-switch mb-0">
                    <input {{ $settings->fake_examiners ? 'checked' : '' }} class="form-check-input" type="checkbox" id="fake_examiner" role="switch">
                    <label class="form-check-label" for="fake_examiner">Fake Examiners</label>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Examiner</th>
                                <th>Company</th>
                                <th>Bookings</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topExaminers as $examiner)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ $examiner->image }}" alt="{{ $examiner->name }}" class="rounded-circle" width="40" height="40" style="object-fit:cover;">
                                        <div>
                                            <div class="fw-bold">{{ $examiner->name }}</div>
                                            <small class="text-muted">{{ $examiner->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $examiner->company_name }}</td>
                                <td><span class="badge bg-secondary">{{ $examiner->total_bookings }}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('admin.profile', $examiner->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#fake_examiner').on('change', function () {
            var fake_examiners = $(this).is(':checked');
            $.ajax({
                url: "{{ route('fake.examiners') }}",
                type: "GET",
                data: { fake_examiners: fake_examiners }
            });
        });
    });
</script>
@endsection
