@extends('auth.layouts.app')

@section('content')

<!-- Page content -->
<div class="container mt-5 pb-5">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5 col-md-7 mt-5">
            <div class="card bg-secondary border-0 mb-0 mt-5">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <small>Sign in with credentials</small>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
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
                                    autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-6 text-center">
                    <a href="{{route('register')}}" class="text-light"><small>Create new account</small></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
