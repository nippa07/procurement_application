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
                <a onclick="removeOrderItem({{$order_item->id}})" href="javascript:void(0)"
                    class="btn btn-sm btn-danger">Remove</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#items').DataTable({
            language: {
                paginate: {
                    next: '<i class="ni ni-bold-right"></i>',
                    previous: '<i class="ni ni-bold-left"></i>'
                }
            },
            "bPaginate": false,
            "info": false,
            "searching": false
        });
    });

</script>
