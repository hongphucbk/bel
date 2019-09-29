<?php

namespace App\Http\Controllers\Setting\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Setting\Service;

class ServiceController extends Controller
{
    public function getList()
    {
    	$services = Service::all();
    	return view('v1.admin.setting.service.list', compact('services'));
    }

    public function getAdd()
    {
    	return view('v1.admin.setting.service.add');
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Please input name',
        ]);

		$service = new Service;
		$service->name = $request->name;
		$service->note = $request->note;
        $service->description = $request->description;
        $service->icon = $request->icon;

		$service->save();
		return redirect()->back()->with('notification','Add successfully');
	}

    public function getEdit($id)
    {
        $service = Service::find($id);
        return view('v1.admin.setting.service.edit', compact('service'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Please input name',
        ]);

        $service = Service::find($id);
        $service->name = $request->name;
        $service->note = $request->note;
        $service->description = $request->description;
        $service->icon = $request->icon;

        $service->save();
        return redirect()->back()->with('notification','Edit successfully');
    }

    public function getDelete($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }

}
