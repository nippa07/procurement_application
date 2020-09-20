@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">View Supplier</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteManager.suppliers.all') }}">Suppliers</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">View Supplier</a></li>
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
                        {{ $supplier->name }}
                        <span class="font-weight-light"></span>
                    </h5>
                    <h6>
                        {{ $supplier->email }}
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
                                <input type="text" value="{{ $supplier->name }}"
                                    class="form-control  form-control-alternative" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="first_name">Email</label>
                                <input type="email" value="{{ $supplier->email }}"
                                    class="form-control  form-control-alternative" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="company_name"><b>Company</b> </label>
                                <input id="company_name" class="form-control" type="text" name="company_name"
                                    value="{{ $supplier->company_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone"><b>Phone</b> </label>
                                <input id="phone" class="form-control" type="text" name="phone"
                                    value="{{ $supplier->phone }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_1"><b>Address Line 1 </b> </label>
                                <input id="address_1" class="form-control" type="text" name="address_1"
                                    value="{{ $supplier->address_1 }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_2"><b>Address Line 2 </b> </label>
                                <input id="address_2" class="form-control" type="text" name="address_2"
                                    value="{{ $supplier->address_2 }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_3"><b>Address Line 3</b> </label>
                                <input id="address_3" class="form-control" type="text" name="address_3"
                                    value="{{ $supplier->address_3 }}" readonly>
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
