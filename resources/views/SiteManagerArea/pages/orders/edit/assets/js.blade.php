<script>
    $(document).ready(function () {
        var delivery_date =
            "{{$order->order_delivery?\carbon\carbon::parse($order->order_delivery->delivery_date)->format('m/d/yy'):\carbon\carbon::now()->format('m/d/yy')}}";
        $('#site_id').select2({
            placeholder: 'Select a Site',
            theme: "bootstrap"
        });

        $('#user_id').select2({
            placeholder: 'Select a Supplier',
            theme: "bootstrap"
        });

        $('#item_id').select2({
            placeholder: 'Select an Item',
            theme: "bootstrap"
        });

        $('#metric_type').select2({
            placeholder: 'Select a Metric Type',
            theme: "bootstrap"
        });

        $("#delivery_date").datepicker().datepicker("setDate", delivery_date)
            .datepicker('setStartDate', "{{ \carbon\carbon::now()->format('m/d/yy') }}");

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

    var form = $("#order_form");

    $('#jquery-steps').steps({
        headerTag: "h3",
        bodyTag: "section",
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex < currentIndex) {
                return true;
            }
            if (currentIndex == 0) {
                updateOrder();
            }
            if (currentIndex == 1) {
                updateOrderDelivery();
            }
            if (form.length == 1) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            }
            return true;
        },
        onFinishing: function (event, currentIndex) {
            if (form.length == 1) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            }
            return true;
        },
        onFinished: function (event, currentIndex) {
            $('#loader').show();
            $("#order_form").submit();
        }
    });

    function updateOrder() {
        var order_id = $('#order_id').val();
        var site_id = $('#site_id').val();
        var user_id = $('#user_id').val();
        var multiple = $('#multiple').prop("checked") ? 1 : 0;

        if (site_id && user_id) {
            $.ajax({
                url: "{{ route('siteManager.orders.updateOrder') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                data: {
                    'order_id': order_id,
                    'site_id': site_id,
                    'user_id': user_id,
                    'multiple': multiple
                },
                success: function (response) {}
            });
        }
    }

    function updateOrderDelivery() {
        var order_id = $('#order_id').val();
        var order_delivery_id = $('#order_delivery_id').val();
        var name = $('#name').val();
        var address_1 = $('#address_1').val();
        var address_2 = $('#address_2').val();
        var delivery_date = $('#delivery_date').val();

        if (order_delivery_id) {
            var url = "{{ route('siteManager.orders.updateOrderDelivery') }}";
        } else {
            var url = "{{ route('siteManager.orders.storeOrderDelivery') }}";
        }

        if (order_id && name && address_1 && address_2 && delivery_date) {
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                data: {
                    'order_id': order_id,
                    'order_delivery_id': order_delivery_id,
                    'name': name,
                    'address_1': address_1,
                    'address_2': address_2,
                    'delivery_date': delivery_date
                },
                success: function (response) {
                    if (!order_delivery_id) {
                        $('#order_delivery_id').val(response.id);
                    }
                }
            });
        }
    }

    function storeOrderItem() {
        var order_id = $('#order_id').val();
        var item_id = $('#item_id').val();
        var quantity = $('#quantity').val();
        var metric_type = $('#metric_type').val();

        if (order_id && item_id && quantity && metric_type) {
            $.ajax({
                url: "{{ route('siteManager.orders.storeOrderItem') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                data: {
                    'order_id': order_id,
                    'item_id': item_id,
                    'quantity': quantity,
                    'metric_type': metric_type
                },
                success: function (response) {
                    if (response) {
                        $('#items-table-data').html(response);

                        $('#item_id').val(0);
                        $('#quantity').val('');
                        $('#metric_type').val(0);
                    }
                }
            });
        }
    }

    function removeOrderItem(order_item_id) {
        var order_id = $('#order_id').val();

        $.ajax({
            url: "{{ route('siteManager.orders.removeOrderItem') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            data: {
                'order_id': order_id,
                'order_item_id': order_item_id
            },
            success: function (response) {
                if (response) {
                    $('#items-table-data').html(response);
                }
            }
        });
    }

</script>
