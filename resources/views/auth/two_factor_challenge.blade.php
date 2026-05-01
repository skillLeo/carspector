@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Two-Factor Authentication</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p class="mb-3">Enter the 6-digit code from your Authenticator app to continue.</p>
                    <form method="post" action="{{ route('two-factor.verify') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="code" class="form-control" placeholder="123456" autofocus required>
                        </div>
                        <button class="btn btn-primary w-100">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-6 text-center">
            <a href="{{ route('login') }}">Back to login</a>
        </div>
    </div>
</div>
@endsection

