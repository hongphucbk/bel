<?php

namespace App\Http\Controllers\Helpdesk\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Helpdesk\Status;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function getList()
    {
    	$statuses = Status::all();
    	return view('v1.admin.helpdesk.status.list', compact('statuses'));
    }

    public function getAdd()
    {
    	return view('v1.admin.helpdesk.status.add');
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Please input name',
        ]);

		$status = new Status;
		$status->name = $request->name;
        $status->code = $request->code;
        $status->label = $request->label;
		$status->note = $request->note;

		$status->save();
		return redirect()->back()->with('notify','Add successfully');
	}

    public function getEdit($id)
    {
        $status = Status::find($id);
        return view('v1.admin.helpdesk.status.edit', compact('status'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Please input name',
        ]);

        $status = Status::find($id);
        $status->name = $request->name;
        $status->note = $request->note;

        $status->save();
        return redirect()->back()->with('notify','Edit successfully');
    }

    public function getDelete($id)
    {
        $status = Status::find($id);
        $status->delete();
        return redirect()->back()->with('notify','Delete successfully');
    }

}
