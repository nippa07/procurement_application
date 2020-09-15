<?php

namespace App\Http\Controllers\SiteManagerArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    public function index()
    {
        return view('SiteManagerArea.pages.dashboard.dashboard');
    }
}
