<?php

namespace App\Http\Controllers\SupplierArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    public function index()
    {
        return view('SupplierArea.pages.dashboard.dashboard');
    }
}
