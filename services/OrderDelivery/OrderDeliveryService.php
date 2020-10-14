<?php

namespace services\OrderDelivery;

use App\Models\OrderDelivery;

class OrderDeliveryService
{
    protected $order_delivery;

    public function __construct()
    {
        $this->order_delivery = new OrderDelivery();
    }

    public function get($id)
    {
        return $this->order_delivery->find($id);
    }

    public function getAll()
    {
        return $this->order_delivery->all();
    }

    public function create($data)
    {
        return $this->order_delivery->create($data);
    }

    /**
     * updateorder
     *
     * @param  mixed $order
     * @param  mixed $data
     * @return void
     */
    public function update(OrderDelivery $order_delivery, array $data)
    {
        return $order_delivery->update($this->edit($order_delivery, $data));
    }

    /**
     * editItem
     *
     * @param  mixed $item
     * @param  mixed $data
     */
    protected function edit(OrderDelivery $order_delivery, $data)
    {
        return array_merge($order_delivery->toArray(), $data);
    }

    public function deleteOrder($id)
    {
        $order_delivery = $this->get($id);
        return $order_delivery->delete();
    }

    public function storeOrderDelivery($data)
    {
        return $this->create($data);
    }

    public function updateOrderDelivery($data)
    {
        $order_delivery = $this->get($data['order_delivery_id']);

        return $this->update($order_delivery, $data);
    }
}
