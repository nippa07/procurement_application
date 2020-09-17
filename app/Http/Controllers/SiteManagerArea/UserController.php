<?php

namespace App\Http\Controllers\SiteManagerArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use services\Facade\UserFacade;

class UserController extends ParentController
{
    public function all()
    {
        $response['users'] = UserFacade::getAll();

        return view('SiteManagerArea.pages.users.all')->with($response);
    }

    public function add()
    {
        return view('SiteManagerArea.pages.users.add');
    }

    public function store(Request $request)
    {
        UserFacade::saveUser($request->all());

        return redirect(route('siteManager.users.all'))->with('alert-success', "User Added Successfully");
    }

    public function view($id)
    {
        $response['user'] = UserFacade::get($id);

        return view('SiteManagerArea.pages.users.view')->with($response);
    }

    public function edit($id)
    {
        $response['user'] = UserFacade::get($id);

        return view('SiteManagerArea.pages.users.edit')->with($response);
    }

    function update($id, Request $request)
    {
        $user = UserFacade::get($id);

        UserFacade::updateUser($user, $request->all());

        return redirect(route('siteManager.users.all'))->with('alert-success', "User Updated Successfully");
    }

    public function delete($id)
    {
        UserFacade::deleteUser($id);

        return redirect(route('siteManager.users.all'))->with('alert-success', "User Deleted Successfully");
    }
}
