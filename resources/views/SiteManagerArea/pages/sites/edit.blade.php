@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">Edit Site</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteManager.sites.all') }}">Sites</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Edit Site</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow bg-secondary">
            <div class="card-body bg-transparent">
                <form class="tab-wizard wizard-circle wizard clearfix"
                    action="{{ route('siteManager.sites.update', $site->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $site->name }}"
                                    class="form-control  form-control-alternative">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone"><b>Phone</b> </label>
                                <input id="phone" class="form-control" type="text" name="phone"
                                    value="{{ $site->phone }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_1"><b>Address Line 1 </b> </label>
                                <input id="address_1" class="form-control" type="text" name="address_1"
                                    value="{{ $site->address_1 }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_2"><b>Address Line 2 </b> </label>
                                <input id="address_2" class="form-control" type="text" name="address_2"
                                    value="{{ $site->address_2 }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <h6 class="text-center">
                                <button class="btn btn-info" id="submit-btn" type="submit">Update</button>
                            </h6>
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
