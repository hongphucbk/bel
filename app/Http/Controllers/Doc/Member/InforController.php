<?php

namespace App\Http\Controllers\Doc\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Doc\Role;
use App\Model\Doc\Status;
use App\Model\Doc\Auth as RoleAuth;
use App\Model\Doc\Infor;

use Illuminate\Support\Facades\Auth;
use App\Model\User\User;
use Cookie;

class InforController extends Controller
{
  public function getList(Request $req)
  {
    $auth_code = Cookie::get('auth_code');
    $auth_name = Cookie::get('auth_name');

    $page =  $req->page > 0? $req->page : 1 ; Cookie::queue('page', $page, 20);

    
    $query = Infor::where('is_active', '>', 0);
    if (!empty($auth_code)) {
      $query = $query->where('code','LIKE', '%'.$auth_code.'%');
    }

    if (!empty($auth_name)) {
      $query = $query->where('name','LIKE', '%'.$auth_name.'%');
    }

    $insts = $query->orderby('created_at','desc')->paginate(10);
    $oldData = ['auth_code' => $auth_code,
                'auth_name' => $auth_name,
               ];
  	return view('v1.member.doc.infor.list', compact('insts', 'oldData', 'page'));
  }

  public function postList(Request $req)
  {
    $auth_code = $req->auth_code; Cookie::queue('auth_code', $auth_code, 20);
    $auth_name = $req->auth_name; Cookie::queue('auth_name', $auth_name, 20);
    $page = Cookie::get('page');

    $query = Infor::where('is_active', '>', 0);
    if (!empty($auth_code)) {
      $query = $query->where('code','LIKE', '%'.$auth_code.'%');
    }

    if (!empty($auth_name)) {
      $query = $query->where('name','LIKE', '%'.$auth_name.'%');
    }
    
    $insts = $query->orderby('created_at','desc')->paginate(10);
    $oldData = ['auth_code' => $auth_code,
                'auth_name' => $auth_name,
               ];
    return view('v1.member.doc.infor.list', compact('insts','oldData', 'page'));
  }

  public function getAdd()
  {
    $users = User::where('id','>=', 1)->get();
    $roles = Role::where('is_active', 1)->get();
  	return view('v1.member.doc.infor.add', compact('users', 'roles'));
  }

  public function postAdd(Request $req)
	{
		$this->validate($req,[
          'name' => 'required',
      ],
      [
          'name.required'=>'Please input name',
      ]);

		$inst = new Infor;
		$inst->name = $req->name;
		$inst->code = $req->code;
    $inst->description = $req->description;
    $inst->note = $req->note;
    $inst->user_id = Auth::id();
    $inst->status_id = 2;
		$inst->save();

    $strNotify = 'Add successfully';

    if ($req->add == 1) {
      return redirect('v1/member/doc/infor/'.$inst->id.'/attach')->with('notify', $strNotify);
    }
		return redirect()->back()->with('notify', $strNotify);
	}

  public function getDisplay($id)
  {
    $users = User::where('id','>=', 1)->get();
    $roles = Role::where('is_active', 1)->get();

    $inst = Infor::find($id);
    return view('v1.member.doc.infor.display', compact('users', 'roles', 'inst'));
  }

  public function getEdit($id)
  {
    $users = User::where('id','>=', 1)->get();
    $roles = Role::where('is_active', 1)->get();

    $inst = Infor::find($id);
    return view('v1.member.doc.infor.edit', compact('users', 'roles', 'inst'));
  }

  public function postEdit($id, Request $req)
  {
    $this->validate($req,[
          'name' => 'required',
      ],
      [
          'name.required'=>'Please input name',
      ]);
    $inst = Infor::find($id);
    $inst->name = $req->name;
    $inst->code = $req->code;
    $inst->description = $req->description;
    $inst->note = $req->note;
    $inst->user_id = Auth::id();
    $inst->save();
    $strNotify = 'Edit successfully';
    return redirect()->back()->with('notify',$strNotify);
  }

  public function getDelete($id)
  {
    $inst = Infor::find($id);
    $inst->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

  public function getDeactive($id)
  {
    $inst = Infor::find($id);
    $inst->is_active = 0;
    $inst->save();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
