<?php

namespace services\Item;

use App\Models\Item;

class ItemService
{
    protected $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function get($id)
    {
        return $this->item->find($id);
    }

    public function getAll()
    {
        return $this->item->all();
    }

    public function create($data)
    {
        return $this->item->create($data);
    }

    /**
     * updateItem
     *
     * @param  mixed $item
     * @param  mixed $data
     * @return void
     */
    public function updateItem(Item $item, array $data)
    {
        return $item->update($this->editItem($item, $data));
    }

    /**
     * editItem
     *
     * @param  mixed $item
     * @param  mixed $data
     */
    protected function editItem(Item $item, $data)
    {
        return array_merge($item->toArray(), $data);
    }

    public function deleteItem($id)
    {
        $item = $this->get($id);
        return $item->delete();
    }
}
