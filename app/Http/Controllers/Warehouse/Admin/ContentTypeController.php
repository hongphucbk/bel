<?php

namespace App\Http\Controllers\Course\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\ContentType;
use Illuminate\Support\Facades\Auth;

class ContentTypeController extends Controller
{
    public function getList()
    {
    	$types = ContentType::all();
    	return view('v1.admin.course.content_type.list', compact('types'));
    }

    public function getAdd()
    {
    	return view('v1.admin.course.content_type.add');
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Please input name',
        ]);

		$type = new ContentType;
		$type->name = $request->name;
        $type->user_id = Auth::id();
        $type->code = $request->code;
        $type->label = $request->label;
		$type->note = $request->note;

		$type->save();
		return redirect()->back()->with('notify','Add successfully');
	}

    public function getEdit($id)
    {
        $type = ContentType::find($id);
        return view('v1.admin.course.content_type.edit', compact('type'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Please input name',
        ]);

        $type = ContentType::find($id);
        $type->name = $request->name;
        $type->user_id = Auth::id();
        $type->code = $request->code;
        $type->label = $request->label;
        $type->note = $request->note;

        $type->save();
        return redirect()->back()->with('notify','Edit successfully');
    }

    public function getDelete($id)
    {
        $type = ContentType::find($id);
        $type->delete();
        return redirect()->back()->with('notify','Delete successfully');
    }

}
