@extends('auth.layouts.app')

@section('content')
<div class="container mt-5 pb-5">
    <!-- Table -->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-8 mt-5">
            <div class="card bg-secondary border-0 mt-5">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <small>Sign up with credentials</small>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input id="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" type="text" name="name" value="{{ old('name') }}" required
                                    autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password" type="password" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="password-confirm" class="form-control" placeholder="Confirm Password"
                                    type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="text-muted font-italic">
                            <small>password strength:
                                <span class="text-success font-weight-700">strong</span>
                            </small>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary mt-4">Create account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
