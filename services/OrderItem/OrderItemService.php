<?php

namespace services\OrderItem;

use App\Models\OrderItem;

class OrderItemService
{
    protected $order_item;

    public function __construct()
    {
        $this->order_item = new OrderItem();
    }

    public function get($id)
    {
        return $this->order_item->find($id);
    }

    public function getAll()
    {
        return $this->order_item->all();
    }

    public function create($data)
    {
        return $this->order_item->create($data);
    }

    /**
     * updateorder
     *
     * @param  mixed $order
     * @param  mixed $data
     * @return void
     */
    public function updateOrderItem(OrderItem $order_item, array $data)
    {
        return $order_item->update($this->editOrderItem($order_item, $data));
    }

    /**
     * editItem
     *
     * @param  mixed $item
     * @param  mixed $data
     */
    protected function editOrderItem(OrderItem $order_item, $data)
    {
        return array_merge($order_item->toArray(), $data);
    }

    public function delete($id)
    {
        $order_item = $this->get($id);
        return $order_item->delete();
    }

    public function storeOrderItem($data)
    {
        return $this->create($data);
    }
}
