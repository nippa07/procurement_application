@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">Edit Purchase Order</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteManager.orders.all') }}">Purchase
                                    Orders</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Edit Purchase Order</a></li>
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
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form id="order_form" action="{{ route('siteManager.orders.storeOrderFinal') }}" method="post">
                    @csrf
                    <div id="jquery-steps">
                        <h3>Order Details</h3>
                        <section>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="my-input" class="mb-4 mt-3">
                                            <b>Site :</b>
                                        </label>
                                        <select class="form-control" id="site_id" name="site_id" required>
                                            <option></option>
                                            @foreach($sites as $site)
                                            <option value="{{$site->id}}"
                                                {{ $order->site_id == $site->id ? 'selected' : '' }}>
                                                {{$site->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="my-input" class="mb-4 mt-3">
                                            <b>Supplier :</b>
                                        </label>
                                        <select class="form-control" id="user_id" name="user_id" required>
                                            <option></option>
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}"
                                                {{ $order->user_id == $supplier->id ? 'selected' : '' }}>
                                                {{$supplier->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="custom-control custom-checkbox">
                                        <input name="multiple" type="checkbox" class="custom-control-input"
                                            id="multiple" value="1" {{ $order->multiple ? 'checked' : '' }}>
                                        <label class="custom-control-label mb-4 mt-3" for="multiple">
                                            Let the delivery handle multiple depots
                                        </label>
                                        <input id="order_id" type="hidden" name="order_id" value="{{$order->id}}">
                                        <input id="order_delivery_id" type="hidden" name="order_delivery_id"
                                            value="{{$order->order_delivery->id}}">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3>Delivery Details</h3>
                        <section>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="name"><b>Contact Name </b> </label>
                                        <input id="name" class="form-control" type="text" name="name"
                                            value="{{$order->order_delivery?$order->order_delivery->name:''}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="address_1"><b>Address Line 1 </b> </label>
                                        <input id="address_1" class="form-control" type="text" name="address_1"
                                            value="{{$order->order_delivery?$order->order_delivery->address_1:''}}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="address_2"><b>Address Line 2 </b> </label>
                                        <input id="address_2" class="form-control" type="text" name="address_2"
                                            value="{{$order->order_delivery?$order->order_delivery->address_2:''}}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="delivery_date"><b>Date of delivery (required before) </b> </label>
                                        <input id="delivery_date" class="form-control" type="text" name="delivery_date"
                                            value="{{$order->order_delivery?$order->order_delivery->delivery_date:''}}"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3>Item Details</h3>
                        <section>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div id="items-table-data" class="table-responsive">
                                        <table id="items" class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($order->order_items as $key=> $order_item)
                                                <tr>
                                                    <td>{{ $order_item->item->name }}</td>
                                                    <td>
                                                        {{ $order_item->quantity }}&nbsp;
                                                        @switch($order_item->metric_type)
                                                        @case(\App\Models\OrderItem::METRIC_TYPE['LITRES'])
                                                        litres
                                                        @break
                                                        @case(\App\Models\OrderItem::METRIC_TYPE['KG'])
                                                        Kilograms
                                                        @break
                                                        @case(\App\Models\OrderItem::METRIC_TYPE['METERS'])
                                                        Meters
                                                        @break
                                                        @case(\App\Models\OrderItem::METRIC_TYPE['PIECES'])
                                                        Pieces
                                                        @break
                                                        @case(\App\Models\OrderItem::METRIC_TYPE['UNITS'])
                                                        Units
                                                        @break
                                                        @case(\App\Models\OrderItem::METRIC_TYPE['CUBES'])
                                                        Cubes
                                                        @break
                                                        @case(\App\Models\OrderItem::METRIC_TYPE['SQM'])
                                                        Sqm
                                                        @break
                                                        @default
                                                        @endswitch
                                                    </td>
                                                    <td>{{ $order_item->item->unit_price }}</td>
                                                    <td>
                                                        <a onclick="removeOrderItem({{$order_item->id}})"
                                                            href="javascript:void(0)" class="btn btn-sm
                                                            btn-danger">Remove</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <div class="col-lg-12">
                                    <h4>Add Item</h4>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="my-input" class="mb-4 mt-3">
                                            <b>Item :</b>
                                        </label>
                                        <select class="form-control" id="item_id" name="item_id">
                                            <option value="0"></option>
                                            @foreach($items as $item)
                                            <option value="{{$item->id}}"
                                                {{ old('item_id') == $item->id ? 'selected' : '' }}>
                                                {{$item->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="quantity" class="mb-4 mt-3"><b>Quantity </b> </label>
                                        <input id="quantity" class="form-control" type="number" step="any"
                                            name="quantity">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="metric_type" class="mb-4 mt-3">
                                            <b>Metric :</b>
                                        </label>
                                        <select class="form-control" id="metric_type" name="metric_type">
                                            <option value="0"></option>
                                            <option value="{{\App\Models\OrderItem::METRIC_TYPE['LITRES']}}">
                                                Litres
                                            </option>
                                            <option value="{{\App\Models\OrderItem::METRIC_TYPE['KG']}}">
                                                Kilograms
                                            </option>
                                            <option value="{{\App\Models\OrderItem::METRIC_TYPE['METERS']}}">
                                                Meters
                                            </option>
                                            <option value="{{\App\Models\OrderItem::METRIC_TYPE['PIECES']}}">
                                                Pieces
                                            </option>
                                            <option value="{{\App\Models\OrderItem::METRIC_TYPE['UNITS']}}">
                                                Units
                                            </option>
                                            <option value="{{\App\Models\OrderItem::METRIC_TYPE['CUBES']}}">
                                                Cubes
                                            </option>
                                            <option value="{{\App\Models\OrderItem::METRIC_TYPE['SQM']}}">
                                                Sqm
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <h6 class="text-center responsive-moblile">
                                            <button type="button" class="btn btn-primary" onclick="storeOrderItem()">
                                                Add Item
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <hr class="py-3">
                                <div class="col-lg-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="mark_incomplete" type="checkbox" class="custom-control-input"
                                            id="mark_incomplete" value="1"
                                            {{ $order->mark_incomplete == \App\Models\Order::STATUS['INCOMPLETE'] ? 'checked' : '' }}>
                                        <label class="custom-control-label mb-4 mt-3" for="mark_incomplete">
                                            Mark as incomplete order
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@include('SiteManagerArea.pages.orders.edit.assets.js')
@endsection

@section('css')
@include('SiteManagerArea.pages.orders.edit.assets.css')
@endsection
