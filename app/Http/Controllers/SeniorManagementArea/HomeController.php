<?php

namespace App\Http\Controllers\SeniorManagementArea;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use services\Facade\OrderFacade;

class HomeController extends ParentController
{
    public function index()
    {
        $response['pending'] = OrderFacade::getByStatus(Order::STATUS['PENDING']);
        $response['approved'] = OrderFacade::getByStatus(Order::STATUS['APPROVED']);
        $response['declined'] = OrderFacade::getByStatus(Order::STATUS['DECLINED']);
        $response['placed'] = OrderFacade::getByStatus(Order::STATUS['PLACED']);

        return view('SeniorManagementArea.pages.dashboard.dashboard')->with($response);
    }
}
