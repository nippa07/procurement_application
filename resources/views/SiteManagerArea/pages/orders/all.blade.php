@extends('SiteManagerArea.layouts.app')

@section('header-content')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6">
                    <h6 class="h2 text-dark d-inline-block mb-0">Purchase Orders</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Purchase Orders</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="">
                        <a href="{{route('siteManager.orders.add')}}" class="btn btn-sm btn-neutral float-right">
                            <i class="fa fa-plus-circle"></i> Add Purchase Order
                        </a>
                    </div>
                    <div>
                        <a href="{{route('siteManager.draft.orders.all')}}"
                            class="btn btn-sm btn-danger float-right mr-3">
                            Draft Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card border-0 shadow">
    <div class="table-responsive py-4">
        <table id="suppliers" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>Order ID</th>
                    <th>Supplier</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($orders as $key=> $order)
                @if ($order->status == \App\Models\Order::STATUS['INCOMPLETE'])
                @continue
                @endif
                <tr>
                    <td>{{ $order->order_ref }}</td>
                    <td>
                        {{ $order->user->name }}
                        <br>
                        <span class="badge badge-dark text-white">
                            {{ $order->user->email }}
                        </span>
                    </td>
                    <td>
                        @switch($order->status)
                        @case(\App\Models\Order::STATUS['INCOMPLETE'])
                        <span class="badge badge-warning">Incomplete</span>
                        @break
                        @case(\App\Models\Order::STATUS['PENDING'])
                        <span class="badge badge-yellow">Pending</span>
                        @break
                        @case(\App\Models\Order::STATUS['APPROVED'])
                        <span class="badge badge-green">Approved</span>
                        @break
                        @case(\App\Models\Order::STATUS['DECLINED'])
                        <span class="badge badge-danger">Declined</span>
                        @break
                        @case(\App\Models\Order::STATUS['PLACED'])
                        <span class="badge badge-primary">Placed</span>
                        @break
                        @case(\App\Models\Order::STATUS['DELIVERED'])
                        <span class="badge badge-success">Delivered</span>
                        @break
                        @case(\App\Models\Order::STATUS['PARTIALLY_DELIVERED'])
                        <span class="badge badge-info">Partially Delivered</span>
                        @break
                        @default
                        @endswitch
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td class="text-left">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{route('siteManager.orders.view', $order->id)}}">
                                    <i class="fas fa-eye text-primary"></i>&nbsp;View
                                </a>
                                <div class="dropdown-divider responsive-moblile"></div>
                                <a class="dropdown-item" href="{{route('siteManager.orders.edit', $order->id)}}">
                                    <i class="fas fa-edit text-info"></i>&nbsp;Edit
                                </a>
                                <div class="dropdown-divider responsive-moblile"></div>
                                @if ($order->status == \App\Models\Order::STATUS['APPROVED'])
                                <a class="dropdown-item" href="{{route('siteManager.orders.place', $order->id)}}">
                                    <i class="fas fa-paper-plane text-success"></i>&nbsp;Place
                                    Order
                                </a>
                                <div class="dropdown-divider responsive-moblile"></div>
                                @endif
                                @if ($order->status == \App\Models\Order::STATUS['PLACED'])
                                <a class="dropdown-item"
                                    href="{{route('siteManager.orders.delivered.partially', $order->id)}}">
                                    <i class="fas fa-check text-default"></i>&nbsp;Mark Partially Delivered
                                </a>
                                <div class="dropdown-divider responsive-moblile"></div>
                                @endif
                                @if ($order->status == \App\Models\Order::STATUS['PLACED'] || $order->status ==
                                \App\Models\Order::STATUS['PARTIALLY_DELIVERED'])
                                <a class="dropdown-item" href="{{route('siteManager.orders.delivered', $order->id)}}">
                                    <i class="fas fa-check-double text-success"></i>&nbsp;Mark Delivered
                                </a>
                                <div class="dropdown-divider responsive-moblile"></div>
                                @endif
                                @if ($order->status == \App\Models\Order::STATUS['DECLINED'])
                                <a class="dropdown-item delete-order" data-id="{{$order->id}}"
                                    href="javascript:void(0)">
                                    <i class="fas fa-user-times text-danger"></i>&nbsp;Delete
                                </a>
                                <div class="dropdown-divider responsive-moblile"></div>
                                @endif
                            </div>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#suppliers').DataTable({
            language: {
                paginate: {
                    next: '<i class="ni ni-bold-right"></i>',
                    previous: '<i class="ni ni-bold-left"></i>'
                }
            }
        });

        $('[data-toggle="tooltip"]').tooltip()
    });

    $(".delete-order").on('click', function () {
        var id = $(this).attr('data-id');
        $.confirm({
            title: 'Are you sure?',
            content: 'This will delete this order permanently',
            buttons: {
                confirm: function () {
                    window.location.href = '{{ url("siteManager/orders/delete") }}/' + id;
                },
                cancel: function () {

                },
            }
        });

    });

</script>
@endsection
