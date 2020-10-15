<?php

namespace App\Http\Controllers\SeniorManagementArea;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use services\Facade\OrderCommentFacade;
use services\Facade\OrderFacade;

class OrderController extends ParentController
{
    public function all()
    {
        $response['orders'] = OrderFacade::getAll();

        return view('SeniorManagementArea.pages.orders.all')->with($response);
    }

    public function view($id)
    {
        $response['order'] = OrderFacade::get($id);

        return view('SeniorManagementArea.pages.orders.view.view')->with($response);
    }

    public function storeComments(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        OrderCommentFacade::create($data);

        return redirect()->back()->with('alert-success', 'Comment posted successfully');
    }

    public function delete($id)
    {
        OrderFacade::deleteOrder($id);

        return redirect()->back()->with('alert-success', 'Order Deleted successfully');
    }

    public function approve($id)
    {
        OrderFacade::changeStatus($id, Order::STATUS['APPROVED']);

        return redirect()->back()->with('alert-success', 'Order Approved successfully');
    }

    public function decline($id)
    {
        OrderFacade::changeStatus($id, Order::STATUS['DECLINED']);

        return redirect()->back()->with('alert-success', 'Order Declined successfully');
    }
}
