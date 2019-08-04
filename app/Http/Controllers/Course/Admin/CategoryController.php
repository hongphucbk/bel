<?php

namespace App\Http\Controllers\Course\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;

class CategoryController extends Controller
{
    public function getList()
    {
    	$categories = Category::all();
    	return view('v1.admin.course.category.list', compact('categories'));
    }

    public function getAdd()
    {
    	return view('v1.admin.course.category.add');
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
