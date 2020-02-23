<?php

namespace App\Http\Controllers\News\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News\Category;

class CategoryController extends Controller
{
    public function getList()
    {
    	$categories = Category::all();
    	return view('v1.admin.news.category.list', compact('categories'));
    }

    public function getAdd()
    {
    	return view('v1.admin.news.category.add');
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

    public function getEdit($id)
    {
        $category = Category::find($id);
        return view('v1.admin.news.category.edit', compact('category'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required'=>'Please input name',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->note = $request->note;

        $category->save();
        return redirect()->back()->with('notification','Edit successfully');
    }

    public function getDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }

}
