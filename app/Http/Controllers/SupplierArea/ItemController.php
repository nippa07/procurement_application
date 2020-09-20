<?php

namespace App\Http\Controllers\SupplierArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use services\Facade\ItemFacade;
use services\Facade\UserFacade;

class ItemController extends ParentController
{
    public function all()
    {
        $response['items'] = ItemFacade::getAll();

        return view('SupplierArea.pages.items.all')->with($response);
    }

    public function add()
    {
        $response['suppliers'] = UserFacade::getAllSuppliers();

        return view('SupplierArea.pages.items.add')->with($response);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        ItemFacade::create($data);

        return redirect(route('supplier.items.all'))->with('alert-success', "Item Added Successfully");
    }

    public function edit($id)
    {
        $response['item'] = ItemFacade::get($id);

        $response['suppliers'] = UserFacade::getAllSuppliers();

        return view('SupplierArea.pages.items.edit')->with($response);
    }

    function update($id, Request $request)
    {
        $item = ItemFacade::get($id);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        ItemFacade::updateItem($item, $data);

        return redirect(route('supplier.items.all'))->with('alert-success', "Item Updated Successfully");
    }

    public function delete($id)
    {
        ItemFacade::deleteItem($id);

        return redirect(route('supplier.items.all'))->with('alert-success', "Item Deleted Successfully");
    }
}
