<?php

namespace App\Http\Controllers\SiteManagerArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use services\Facade\ItemFacade;
use services\Facade\UserFacade;

class ItemController extends ParentController
{
    public function all()
    {
        $response['items'] = ItemFacade::getAll();

        return view('SiteManagerArea.pages.items.all')->with($response);
    }

    public function add()
    {
        $response['suppliers'] = UserFacade::getAllSuppliers();

        return view('SiteManagerArea.pages.items.add')->with($response);
    }

    public function store(Request $request)
    {
        ItemFacade::create($request->all());

        return redirect(route('siteManager.items.all'))->with('alert-success', "Item Added Successfully");
    }

    public function edit($id)
    {
        $response['item'] = ItemFacade::get($id);

        $response['suppliers'] = UserFacade::getAllSuppliers();

        return view('SiteManagerArea.pages.items.edit')->with($response);
    }

    function update($id, Request $request)
    {
        $item = ItemFacade::get($id);

        ItemFacade::updateItem($item, $request->all());

        return redirect(route('siteManager.items.all'))->with('alert-success', "Item Updated Successfully");
    }

    public function delete($id)
    {
        ItemFacade::deleteItem($id);

        return redirect(route('siteManager.items.all'))->with('alert-success', "Item Deleted Successfully");
    }
}
