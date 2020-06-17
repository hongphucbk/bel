<?php

namespace App\Http\Controllers\Warehouse\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Facility;
use App\Model\Warehouse\Category;
use Illuminate\Support\Facades\Auth;
use Cookie;

class CategoryController extends Controller
{
  public function getList()
  {
    $category_code = Cookie::get('category_code');
    $category_name = Cookie::get('category_name');
    $query = Category::where('id', '>', 0);
    if (!empty($category_code)) {
      $query = $query->where('code', 'LIKE', '%'.$category_code.'%');
    }
    if (!empty($category_name)) {
      $query = $query->where('name', 'LIKE', '%'.$category_name . '%');
    }
    $categories = $query->paginate(10);
    $oldData = ['category_name' => $category_name,
                'category_code' => $category_code,
               ];
  	return view('v1.member.warehouse.category.list', compact('categories', 'oldData'));
  }

  public function postList(Request $req)
  {
    $category_code = $req->code; Cookie::queue('category_code', $category_code, 20);
    $category_name = $req->name; Cookie::queue('category_name', $category_name, 20);
    $page = Cookie::get('page');

    $query = Category::where('id', '>', 0);
    if (!empty($category_code)) {
      $query = $query->where('code', 'LIKE', '%'.$category_code.'%');
    }
    if (!empty($category_name)) {
      $query = $query->where('name', 'LIKE', '%'.$category_name . '%');
    }
    $categories = $query->paginate(10);
    $oldData = ['category_name' => $category_name,
                'category_code' => $category_code,
               ];
    return view('v1.member.warehouse.category.list', compact('categories','oldData'));
  }

  public function getAdd()
  {
  	return view('v1.member.warehouse.category.add');
    //h
  }

  public function postAdd(Request $request)
	{
		$this->validate($request,[
          'name' => 'required',
          'code' => 'required',
      ],
      [
          'name.required'=>'Please input name',
          'code.required'=>'Please input code',
      ]);

		$category = new Category;
		$category->name = $request->name;
		$category->code = $request->code;
    $category->user_id = Auth::id();
    $category->description = $request->description;

		$category->save();
		return redirect()->back()->with('notify','Add 1 category successfully');
	}

  public function getDisplay($id)
  {
    $category = Category::find($id);
    return view('v1.member.warehouse.category.display', compact('category'));
  }

  public function getEdit($id)
  {
    $category = Category::find($id);
    return view('v1.member.warehouse.category.edit', compact('category'));
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
    $category->code = $request->code;
    $category->description = $request->description;
    $category->note = $request->note;

    $category->save();
    return redirect()->back()->with('notify','Edit successfully');
  }

  public function getDelete($id)
  {
    $category = Category::find($id);
    $category->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
