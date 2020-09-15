<?php

namespace App\Http\Controllers\SeniorManagementArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    public function index()
    {
        return view('SeniorManagementArea.pages.dashboard.dashboard');
    }
}
