<?php

namespace App\Http\Controllers\Doc\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Doc\Role;
use App\Model\Doc\Status;
use App\Model\Doc\Auth as RoleAuth;
use App\Model\Doc\Infor;
use App\Model\Doc\Attach;
use App\Model\Doc\Approval;
use Illuminate\Support\Facades\Auth;
use App\Model\User\User;
use Cookie;

class DeactiveController extends Controller
{
  public function getList(Request $req)
  {
    $auth_code = Cookie::get('auth_code');
    $auth_name = Cookie::get('auth_name');

    $page =  $req->page > 0? $req->page : 1 ; Cookie::queue('page', $page, 20);

    
    $query = Infor::where('is_active', 0);
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
  	return view('v1.member.doc.deactive.list', compact('insts', 'oldData', 'page'));
  }

  public function postList(Request $req)
  {
    $auth_code = $req->auth_code; Cookie::queue('auth_code', $auth_code, 20);
    $auth_name = $req->auth_name; Cookie::queue('auth_name', $auth_name, 20);
    $page = Cookie::get('page');

    $query = Infor::where('is_active', 0);
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
    return view('v1.member.doc.deactive.list', compact('insts','oldData', 'page'));
  }


  public function getDelete($id)
  {
    $inst = Infor::find($id);
    $attachs = Attach::where('infor_id', $id)->get();
    foreach ($attachs as $key => $att) {
      $path = $att->path.'/'.$att->link;
      unlink($path);
      $att->delete();
    }

    $apprs = Approval::where('infor_id', $id);
    $apprs->delete();
    
    $inst->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

  

}
