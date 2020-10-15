<?php

namespace App\Http\Controllers\AccountingStaffArea;

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

        return view('AccountingStaffArea.pages.orders.all')->with($response);
    }

    public function view($id)
    {
        $response['order'] = OrderFacade::get($id);

        return view('AccountingStaffArea.pages.orders.view.view')->with($response);
    }

    public function storeComments(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        OrderCommentFacade::create($data);

        return redirect()->back()->with('alert-success', 'Comment posted successfully');
    }
}
