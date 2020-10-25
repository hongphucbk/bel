<?php

namespace App\Http\Controllers\Doc\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Facility;
use App\Model\Doc\Status;
use Illuminate\Support\Facades\Auth;
use Cookie;

class StatusController extends Controller
{
  public function getList()
  {
    $category_code = Cookie::get('category_code');
    $category_name = Cookie::get('category_name');
    $query = Status::where('id', '>', 0);
    if (!empty($category_code)) {
      $query = $query->where('code', 'LIKE', '%'.$category_code.'%');
    }
    if (!empty($category_name)) {
      $query = $query->where('name', 'LIKE', '%'.$category_name . '%');
    }
    $categories = $query->orderby('code')->paginate(10);
    $oldData = ['category_name' => $category_name,
                'category_code' => $category_code,
               ];
  	return view('v1.member.doc.status.list', compact('categories', 'oldData'));
  }

  public function postList(Request $req)
  {
    $category_code = $req->code; Cookie::queue('category_code', $category_code, 20);
    $category_name = $req->name; Cookie::queue('category_name', $category_name, 20);
    $page = Cookie::get('page');

    $query = Status::where('id', '>', 0);
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
    return view('v1.member.doc.status.list', compact('categories','oldData'));
  }

  public function getAdd()
  {
  	return view('v1.member.doc.status.add');
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

		$inst = new Status;
		$inst->name = trim($request->name);
		$inst->code = trim($request->code);
    //$inst->user_id = Auth::id();
    $inst->description = $request->description;

		$inst->save();
		return redirect()->back()->with('notify','Add 1 status successfully');
	}

  public function getDisplay($id)
  {
    $category = Status::find($id);
    return view('v1.member.doc.status.display', compact('category'));
  }

  public function getEdit($id)
  {
    $category = Status::find($id);
    return view('v1.member.doc.status.edit', compact('category'));
  }

  public function postEdit($id, Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
    ],
    [
      'name.required'=>'Please input name',
    ]);

    $category = Status::find($id);
    $category->name = $request->name;
    $category->code = $request->code;
    $category->description = $request->description;
    //$category->note = $request->note;

    $category->save();
    return redirect()->back()->with('notify','Edit successfully');
  }

  public function getDelete($id)
  {
    $category = Status::find($id);
    $category->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
