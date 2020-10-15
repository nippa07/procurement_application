@extends('SeniorManagementArea.layouts.app')

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

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        Pending
                                    </h5>
                                    <div class="h5 mt-2 mb-0 font-weight-bold text-gray-800">
                                        {{count($pending)}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div
                                        class="icon icon-shape bg-gradient-gray text-info rounded-circle shadow font-weight-bold">
                                        <i class="fas fa-spinner"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        Approved
                                    </h5>
                                    <div class="h5 mt-2 mb-0 font-weight-bold text-gray-800">
                                        {{count($approved)}}
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div
                                        class="icon icon-shape bg-gradient-gray text-info rounded-circle shadow font-weight-bold">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        Declined
                                    </h5>
                                    <div class="h5 mt-2 mb-0 font-weight-bold text-gray-800">
                                        {{count($declined)}}
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div
                                        class="icon icon-shape bg-gradient-gray text-info rounded-circle shadow font-weight-bold">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        Placed
                                    </h5>
                                    <div class="h5 mt-2 mb-0 font-weight-bold text-gray-800">
                                        {{count($placed)}}
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div
                                        class="icon icon-shape bg-gradient-gray text-info rounded-circle shadow font-weight-bold">
                                        <i class="fas fa-location-arrow"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
