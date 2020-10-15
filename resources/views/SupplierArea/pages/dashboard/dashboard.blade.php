@extends('SupplierArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 mb-4 mt-6">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <img src="{{ asset('assets/img/avatar.png')  }}" alt="Profile Image"
                                    class="rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 mt-6">
                        <div class="text-center" style="margin-top: 20%;">
                            <h3 class="text-center">
                                Hey! <strong>{{ Auth::user()->name }}</strong>
                            </h3>
                            <h5 class="text-center">Welcome to Procurement Application</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
