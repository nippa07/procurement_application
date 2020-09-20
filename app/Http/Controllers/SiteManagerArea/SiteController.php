<?php

namespace App\Http\Controllers\SiteManagerArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use services\Facade\SiteFacade;

class SiteController extends ParentController
{
    public function all()
    {
        $response['sites'] = SiteFacade::getAll();

        return view('SiteManagerArea.pages.sites.all')->with($response);
    }

    public function add()
    {
        return view('SiteManagerArea.pages.sites.add');
    }

    public function store(Request $request)
    {
        SiteFacade::create($request->all());

        return redirect(route('siteManager.sites.all'))->with('alert-success', "Site Added Successfully");
    }

    public function edit($id)
    {
        $response['site'] = SiteFacade::get($id);

        return view('SiteManagerArea.pages.sites.edit')->with($response);
    }

    function update($id, Request $request)
    {
        $site = SiteFacade::get($id);

        SiteFacade::updateSite($site, $request->all());

        return redirect(route('siteManager.sites.all'))->with('alert-success', "Site Updated Successfully");
    }

    public function delete($id)
    {
        SiteFacade::deleteSite($id);

        return redirect(route('siteManager.sites.all'))->with('alert-success', "Site Deleted Successfully");
    }
}
