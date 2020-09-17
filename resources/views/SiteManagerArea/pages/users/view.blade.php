@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">View User</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteManager.users.all') }}">Users</a></li>
                            <li class="breadcrumb-item"><a href="">View User</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-4">
        <div class="card card-profile">
            <img src="{{ asset('assets/img/user_bg.jpg') }}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="{{ asset('assets/img/avatar.png')  }}" alt="Progile Image" class="rounded-circle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-5 mt-5">
                <div class="text-center">
                    <h5>
                        {{ $user->name }}
                        <span class="font-weight-light"></span>
                    </h5>
                    <h6>
                        {{ $user->email }}
                        <span class="font-weight-light"></span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow bg-secondary">
            <div class="card-body bg-transparent">
                <form class="tab-wizard wizard-circle wizard clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="first_name">Name</label>
                                <input type="text" value="{{ $user->name }}"
                                    class="form-control  form-control-alternative" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="first_name">Email</label>
                                <input type="email" value="{{ $user->email }}"
                                    class="form-control  form-control-alternative" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {

        $('[data-toggle="tooltip"]').tooltip()
    });

</script>
@endsection
