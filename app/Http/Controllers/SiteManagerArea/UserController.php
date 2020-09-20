<?php

namespace App\Http\Controllers\SiteManagerArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use services\Facade\UserFacade;

class UserController extends ParentController
{
    public function all()
    {
        $response['suppliers'] = UserFacade::getAllSuppliers();

        return view('SiteManagerArea.pages.users.all')->with($response);
    }

    public function add()
    {
        return view('SiteManagerArea.pages.users.add');
    }

    public function store(Request $request)
    {
        UserFacade::saveUser($request->all());

        return redirect(route('siteManager.suppliers.all'))->with('alert-success', "Supplier Added Successfully");
    }

    public function view($id)
    {
        $response['supplier'] = UserFacade::get($id);

        return view('SiteManagerArea.pages.users.view')->with($response);
    }

    public function edit($id)
    {
        $response['supplier'] = UserFacade::get($id);

        return view('SiteManagerArea.pages.users.edit')->with($response);
    }

    function update($id, Request $request)
    {
        $supplier = UserFacade::get($id);

        UserFacade::updateUser($supplier, $request->all());

        return redirect(route('siteManager.suppliers.all'))->with('alert-success', "Supplier Updated Successfully");
    }

    public function delete($id)
    {
        UserFacade::deleteUser($id);

        return redirect(route('siteManager.suppliers.all'))->with('alert-success', "Supplier Deleted Successfully");
    }
}
