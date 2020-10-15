<?php

namespace services\Order;

use App\Mail\PlaceOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderService
{
    protected $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function get($id)
    {
        return $this->order->find($id);
    }

    public function getAll()
    {
        return $this->order->all();
    }

    public function getByStatus($status)
    {
        return $this->order->where('status', $status)->get();
    }

    public function create($data)
    {
        return $this->order->create($data);
    }

    /**
     * updateorder
     *
     * @param  mixed $order
     * @param  mixed $data
     * @return void
     */
    public function update(Order $order, array $data)
    {
        return $order->update($this->editOrder($order, $data));
    }

    /**
     * editItem
     *
     * @param  mixed $item
     * @param  mixed $data
     */
    protected function editOrder(Order $order, $data)
    {
        return array_merge($order->toArray(), $data);
    }

    public function deleteOrder($id)
    {
        $order = $this->get($id);
        return $order->delete();
    }

    public function storeOrder($data)
    {
        $data['order_ref'] = substr(sha1(time()), 0, 11);

        return $this->create($data);
    }

    public function storeOrderFinal($data)
    {
        $order = $this->get($data['order_id']);

        if (array_key_exists('mark_incomplete', $data)) {
            $order->status = Order::STATUS['INCOMPLETE'];
        } else {
            if ($order->order_delivery) {
                $order->status = Order::STATUS['PENDING'];
            }
        }

        $order->save();
    }

    public function updateOrder($data)
    {
        $order = $this->get($data['order_id']);

        $this->update($order, $data);
    }

    public function changeStatus($id, $status)
    {
        $order = $this->get($id);
        $order->status = $status;

        $order->save();

        switch ($order->status) {
            case Order::STATUS['PLACED']:
                Mail::to($order->user->email)->send(new PlaceOrder($order));
                break;

            default:
                break;
        }
    }
}
