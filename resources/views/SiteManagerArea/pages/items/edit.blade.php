@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">Edit Item</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteManager.items.all') }}">Items</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Edit Item</a></li>
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
    <div class="col-lg-6">
        <div class="card shadow bg-secondary">
            <div class="card-body bg-transparent">
                <form class="tab-wizard wizard-circle wizard clearfix"
                    action="{{ route('siteManager.items.update', $item->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $item->name }}"
                                    class="form-control  form-control-alternative" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone"><b>Supplier</b> </label>
                                <select class="form-control" name="user_id" id="user_id" required>
                                    <option></option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}"
                                        {{$supplier->id == $item->user_id ? 'selected':''}}>
                                        {{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="unit_price"><b>Unit Price</b> </label>
                                <input id="unit_price" class="form-control" type="number" step="any" name="unit_price"
                                    value="{{ $item->unit_price }}" required>
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
        $('#user_id').select2({
            theme: 'bootstrap',
            placeholder: 'Select Supplier'
        });
    });

</script>
@endsection
