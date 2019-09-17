<?php

namespace App\Http\Controllers\Course\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Course\Info;

class InfoController extends Controller
{
    public function getList()
    {
    	$categories = Category::all();
    	$infos = Info::all();
    	return view('v1.admin.course.info.list', compact('infos','categories'));
    }

    public function getAdd()
    {
    	$categories = Category::all();
    	return view('v1.admin.course.info.add', compact('categories'));
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'course_category_id' => 'required',

        ],
        [
            'name.required'=>'Please input name',
            'course_category_id.required'=>'Please select category',

        ]);

		$info = new Info;
        $info->course_category_id = $request->course_category_id;
        $info->name = $request->name;
        $info->duration = $request->duration;
        $info->price = $request->price;
        $info->promote_price = $request->promote_price;
        $info->professor = $request->professor;
		$info->note = $request->note;

		$info->save();
		return redirect()->back()->with('notification','Add successfully');
	}

    public function getEdit($id)
    {
        $categories = Category::all();
        $info = Info::find($id);
        return view('v1.admin.course.info.edit', compact('info','categories'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'course_category_id' => 'required',

        ],
        [
            'name.required'=>'Please input name',
            'course_category_id.required'=>'Please select category',
        ]);

        $info = Info::find($id);
        $info->course_category_id = $request->course_category_id;
        $info->name = $request->name;
        $info->duration = $request->duration;
        $info->price = $request->price;
        $info->promote_price = $request->promote_price;
        $info->professor = $request->professor;
        $info->note = $request->note;
        $info->save();
        return redirect()->back()->with('notification','Edit successfully');
    }
    
    public function getDelete($id)
    {
        $info = Info::find($id);
        $info->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }
}
