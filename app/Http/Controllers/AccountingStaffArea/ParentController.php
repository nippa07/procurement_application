<?php

namespace App\Http\Controllers\AccountingStaffArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\AccountStaffValidate');
    }
}
