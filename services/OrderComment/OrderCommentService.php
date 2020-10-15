<?php

namespace services\OrderComment;


use App\Models\OrderComment;

class OrderCommentService
{
    protected $order_comment;

    public function __construct()
    {
        $this->order_comment = new OrderComment();
    }

    public function get($id)
    {
        return $this->order_comment->find($id);
    }

    public function getAll()
    {
        return $this->order_comment->all();
    }

    public function create($data)
    {
        return $this->order_comment->create($data);
    }

    /**
     * updateorder
     *
     * @param  mixed $order
     * @param  mixed $data
     * @return void
     */
    public function update(OrderComment $order_comment, array $data)
    {
        return $order_comment->update($this->edit($order_comment, $data));
    }

    /**
     * editItem
     *
     * @param  mixed $item
     * @param  mixed $data
     */
    protected function edit(OrderComment $order_comment, $data)
    {
        return array_merge($order_comment->toArray(), $data);
    }

    public function delete($id)
    {
        $order_comment = $this->get($id);
        return $order_comment->delete();
    }
}
