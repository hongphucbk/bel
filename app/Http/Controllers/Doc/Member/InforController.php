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
  public function getList()
  {
    $auth_user = Cookie::get('auth_user');
    $auth_role = Cookie::get('auth_role');
    $query = Infor::where('id', '>', 0);
    if (!empty($auth_user)) {
      $query = $query->whereHas('user', function($q) use ($auth_user){
              $q->where('name','LIKE', '%'.$auth_user.'%');
            });
    }

    if (!empty($auth_role)) {
      $query = $query->whereHas('role', function($q) use ($auth_role){
              $q->where('name','LIKE', '%'.$auth_role.'%');
            });
    }

    $insts = $query->paginate(10);
    $oldData = ['auth_user' => $auth_user,
                'auth_role' => $auth_role,
               ];
  	return view('v1.member.doc.infor.list', compact('insts', 'oldData'));
  }

  public function postList(Request $req)
  {
    $auth_user = $req->auth_user; Cookie::queue('auth_user', $auth_user, 20);
    $auth_role = $req->auth_role; Cookie::queue('auth_role', $auth_role, 20);
    $page = Cookie::get('page');

    $query = Infor::where('id', '>', 0);
    if (!empty($auth_user)) {
      $query = $query->whereHas('user', function($q) use ($auth_user){
              $q->where('name','LIKE', '%'.$auth_user.'%');
            });
    }

    if (!empty($auth_role)) {
      $query = $query->whereHas('role', function($q) use ($auth_role){
              $q->where('name','LIKE', '%'.$auth_role.'%');
            });
    }
    
    $insts = $query->paginate(10);
    $oldData = ['auth_user' => $auth_user,
                'auth_role' => $auth_role,
               ];
    return view('v1.member.doc.infor.list', compact('insts','oldData'));
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

}
