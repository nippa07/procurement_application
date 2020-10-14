<?php

namespace App\Http\Controllers\SiteManagerArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use services\Facade\ItemFacade;
use services\Facade\OrderCommentFacade;
use services\Facade\OrderDeliveryFacade;
use services\Facade\OrderFacade;
use services\Facade\OrderItemFacade;
use services\Facade\SiteFacade;
use services\Facade\UserFacade;

class OrderController extends ParentController
{
    public function all()
    {
        $response['orders'] = OrderFacade::getAll();

        return view('SiteManagerArea.pages.orders.all')->with($response);
    }

    public function add()
    {
        $response['sites'] = SiteFacade::getAll();
        $response['suppliers'] = UserFacade::getAllSuppliers();
        $response['items'] = ItemFacade::getAll();

        return view('SiteManagerArea.pages.orders.add.add')->with($response);
    }

    public function storeOrder(Request $request)
    {
        return OrderFacade::storeOrder($request->all());
    }

    public function storeOrderDelivery(Request $request)
    {
        return OrderDeliveryFacade::storeOrderDelivery($request->all());
    }

    public function storeOrderItem(Request $request)
    {
        $data = $request->all();

        OrderItemFacade::storeOrderItem($data);

        $response['order'] = OrderFacade::get($data['order_id']);

        return view('SiteManagerArea.pages.orders.add.table-data')->with($response);
    }

    public function removeOrderItem(Request $request)
    {
        $data = $request->all();
        OrderItemFacade::delete($data['order_item_id']);

        $response['order'] = OrderFacade::get($data['order_id']);

        return view('SiteManagerArea.pages.orders.add.table-data')->with($response);
    }

    public function storeOrderFinal(Request $request)
    {
        OrderFacade::storeOrderFinal($request->all());

        return redirect(route('siteManager.orders.all'));
    }

    public function draftAll()
    {
        $response['orders'] = OrderFacade::getAll();

        return view('SiteManagerArea.pages.orders.draft.all')->with($response);
    }

    public function edit($id)
    {
        $response['order'] = OrderFacade::get($id);
        $response['sites'] = SiteFacade::getAll();
        $response['suppliers'] = UserFacade::getAllSuppliers();
        $response['items'] = ItemFacade::getAll();

        return view('SiteManagerArea.pages.orders.edit.edit')->with($response);
    }

    public function updateOrder(Request $request)
    {
        return OrderFacade::updateOrder($request->all());
    }

    public function updateOrderDelivery(Request $request)
    {
        return OrderDeliveryFacade::updateOrderDelivery($request->all());
    }

    public function view($id)
    {
        $response['order'] = OrderFacade::get($id);

        return view('SiteManagerArea.pages.orders.view.view')->with($response);
    }

    public function storeComments(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        OrderCommentFacade::create($data);

        return redirect()->back()->with('alert-success', 'Comment posted successfully');
    }
}
