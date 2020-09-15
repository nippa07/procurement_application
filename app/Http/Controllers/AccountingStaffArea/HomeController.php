<?php

namespace App\Http\Controllers\AccountingStaffArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    public function index()
    {
        return view('AccountingStaffArea.pages.dashboard.dashboard');
    }
}
