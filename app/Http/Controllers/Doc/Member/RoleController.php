<?php

namespace App\Http\Controllers\Doc\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Doc\Role;
use App\Model\Doc\Status;
use Illuminate\Support\Facades\Auth;
use Cookie;

class RoleController extends Controller
{
  public function getList()
  {
    $category_code = Cookie::get('category_code');
    $category_name = Cookie::get('category_name');
    $query = Role::where('id', '>', 0);
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
  	return view('v1.member.doc.role.list', compact('categories', 'oldData'));
  }

  public function postList(Request $req)
  {
    $category_code = $req->code; Cookie::queue('category_code', $category_code, 20);
    $category_name = $req->name; Cookie::queue('category_name', $category_name, 20);
    $page = Cookie::get('page');

    $query = Role::where('id', '>', 0);
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
    return view('v1.member.doc.role.list', compact('categories','oldData'));
  }

  public function getAdd()
  {
  	return view('v1.member.doc.role.add');
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

		$inst = new Role;
		$inst->name = trim($request->name);
		$inst->code = trim($request->code);
    //$inst->user_id = Auth::id();
    $inst->description = $request->description;

		$inst->save();
		return redirect()->back()->with('notify','Add 1 role successfully');
	}

  public function getDisplay($id)
  {
    $category = Role::find($id);
    return view('v1.member.doc.role.display', compact('category'));
  }

  public function getEdit($id)
  {
    $category = Role::find($id);
    return view('v1.member.doc.role.edit', compact('category'));
  }

  public function postEdit($id, Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
    ],
    [
      'name.required'=>'Please input name',
    ]);

    $category = Role::find($id);
    $category->name = $request->name;
    $category->code = $request->code;
    $category->description = $request->description;
    //$category->note = $request->note;

    $category->save();
    return redirect()->back()->with('notify','Edit successfully');
  }

  public function getDelete($id)
  {
    $inst = Role::find($id);
    $inst->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
