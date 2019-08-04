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
        ],
        [
            'name.required'=>'Please input name',
        ]);

		$category = new Category;
		$category->name = $request->name;
		$category->note = $request->note;

		$category->save();
		return redirect()->back()->with('notification','Add successfully');
	}
}
