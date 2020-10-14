@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-dark d-inline-block mb-0">View Purchase Order</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteManager.orders.all') }}">Purchase
                                    Orders</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">View Purchase Order</a></li>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h3>Order Details</h3>
                        <div class="my-4">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            Order ID:&nbsp;
                                        </td>
                                        <td>
                                            <span>{{$order->order_ref}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Status:&nbsp;
                                        </td>
                                        <td class="pt-2">
                                            @switch($order->status)
                                            @case(\App\Models\Order::STATUS['INCOMPLETE'])
                                            <span class="badge badge-warning">Incomplete</span>
                                            @break
                                            @case(\App\Models\Order::STATUS['PENDING'])
                                            <span class="badge badge-yellow">Pending</span>
                                            @break
                                            @case(\App\Models\Order::STATUS['APPROVED'])
                                            <span class="badge badge-success">Approved</span>
                                            @break
                                            @case(\App\Models\Order::STATUS['DECLINED'])
                                            <span class="badge badge-danger">Declined</span>
                                            @break
                                            @default
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Multiple Deliveries:&nbsp;
                                        </td>
                                        <td class="pt-2">
                                            @if ($order->multiple)
                                            <span class="badge badge-success">Yes</span>
                                            @else
                                            <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h3>Site Details</h3>
                        <div class="my-4">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            Site Name:&nbsp;
                                        </td>
                                        <td>
                                            <span>{{$order->site?$order->site->name:''}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address:&nbsp;
                                        </td>
                                        <td class="pt-2">
                                            <span>
                                                {{$order->site?$order->site->address_1:''}}
                                                <br>
                                                {{$order->site?$order->site->address_2:''}}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Phone:&nbsp;
                                        </td>
                                        <td class="pt-2">
                                            <span>
                                                {{$order->site?$order->site->phone:''}}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h3>Supplier Details</h3>
                        <div class="my-4">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            Supplier Name:&nbsp;
                                        </td>
                                        <td>
                                            <span>{{$order->user?$order->user->name:''}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address:&nbsp;
                                        </td>
                                        <td class="pt-2">
                                            <span>
                                                {{$order->user?$order->user->address_1:''}}
                                                <br>
                                                {{$order->user?$order->user->address_2:''}}
                                                <br>
                                                {{$order->user?$order->user->address_3:''}}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Phone:&nbsp;
                                        </td>
                                        <td class="pt-2">
                                            <span>
                                                {{$order->user?$order->user->phone:''}}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h3>Delivery Details</h3>
                        <div class="my-4">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            Contact Name:&nbsp;
                                        </td>
                                        <td>
                                            <span>{{$order->order_delivery?$order->order_delivery->name:''}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address:&nbsp;
                                        </td>
                                        <td class="pt-2">
                                            <span>
                                                {{$order->order_delivery?$order->order_delivery->address_1:''}}
                                                <br>
                                                {{$order->order_delivery?$order->order_delivery->address_2:''}}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Date:&nbsp;
                                        </td>
                                        <td class="pt-2">
                                            <span>
                                                {{$order->order_delivery?$order->order_delivery->delivery_date:''}}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <h3>Item Details</h3>
                        <div class="my-4 table-responsive">
                            <table id="items" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <h3>Comments</h3>
                        <div class="my-4">
                            <div class="card">
                                <div class="chat-card">
                                    <ul class="chat-list">
                                        @forelse ($order->order_comments as $order_comment)
                                        <li class="chat-item">
                                            <div class="row mr-4 mb-2">
                                                <div class="col-md-12">
                                                    <div class="chat-content mt-2">
                                                        <div class="card bg-light-success"
                                                            style="background-color: #EBEBEB;padding: 5px;">
                                                            <h5 class="font-medium" style="color: dimgray">
                                                                {{ $order_comment->user->name }}</h5>
                                                            <p class="font-light mb-0">
                                                                {!! $order_comment->comment !!}
                                                            </p>
                                                            <div class="chat-time">
                                                                <small>
                                                                    <abbr class="timeago"
                                                                        title="{{ $order_comment->created_at }}"></abbr>
                                                                </small>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @empty
                                        <center class="empty2 pt-4 mt-4 pb-4 mb-4">
                                            <h3 class="text-muted">No comments for this order yet</h3>
                                        </center>
                                        @endforelse
                                    </ul>
                                </div>

                                <div class="card-body border-top  bg-grey">
                                    <form id="send-message-form"
                                        action="{{ route('siteManager.comments.orders.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="input-field ">
                                                    <textarea placeholder="Enter comment" class="form-control border-0"
                                                        name="comment" id="comment" rows="5" minlength="2"
                                                        required></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$order->id}}" name="order_id">
                                            <div class="col-lg-2">
                                                <button type="submit"
                                                    class="btn-circle btn-sm btn btn-outline-dark float-right">
                                                    Post
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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

@section('js')
<script>
    $(document).ready(function () {
        $('#items').DataTable({
            language: {
                paginate: {
                    next: '<i class="ni ni-bold-right"></i>',
                    previous: '<i class="ni ni-bold-left"></i>'
                }
            }
        });
    });

</script>
@endsection

@section('css')
<style>
    .chat-list {
        overflow-y: scroll;
        height: 220px;
        margin-bottom: 20px;
        margin-left: -30px;
    }

    ul {
        list-style-type: none;
    }

    .bg-grey {
        background-color: #f3f3f3 !important;
    }

</style>
@endsection
