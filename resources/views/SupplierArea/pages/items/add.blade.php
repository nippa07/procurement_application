@extends('SupplierArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">Add Item</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('supplier.items.all') }}">Items</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Add Item</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('supplier.items.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name"><b>Name </b> </label>
                                <input id="name" class="form-control" type="text" name="name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="unit_price"><b>Unit Price</b> </label>
                                <input id="unit_price" class="form-control" type="number" step="any" name="unit_price"
                                    required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <h6 class="text-center responsive-moblile">
                                    <button type="submit" class="btn btn-primary di">
                                        Add Item
                                    </button>
                                </h6>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
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
