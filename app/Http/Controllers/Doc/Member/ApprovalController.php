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

class ApprovalController extends Controller
{
  public function getList($id, Request $req)
  {
    
    $insts = Attach::where('infor_id',$id)->get();

    $inst = Infor::find($id);
    $users = RoleAuth::where('role_id','>=', 2)
                      ->get();
    $approvals = Approval::where('infor_id',$id)
                          ->orderby('level', 'asc')
                          ->get();

    $approvalList = collect([]);
    foreach ($users as $key => $user) {
      $count = 0;
      foreach ($approvals as $key => $appr) {
        if ($user->user_id == $appr->approval_id) {
          $count = $count + 1;
        }
      }

      if ($count == 0) {
        $approvalList->push($user);
      }
    }

    //dd($offers);

    //$approvalList =             
    // $users = RoleAuth::whereHas('user', function($q) use ($auth_user){
    //         $q->where('name','LIKE', '%'.$auth_user.'%');
    //       });
    

    return view('v1.member.doc.infor.approval', compact('inst', 'insts', 'users', 'approvals', 'approvalList'));
  }

  public function postList(Request $req)
  {
    
    $insts = Attach::where('id','>',0)->get();
    $inst = Infor::find($id);
    return view('v1.member.doc.infor.attach', compact('inst', 'insts'));
  }

  // public function getAdd()
  // {
  //   $users = User::where('id','>=', 1)->get();
  //   $roles = Role::where('is_active', 1)->get();
  // 	return view('v1.member.doc.infor.add', compact('users', 'roles'));
  // }

  public function postAdd($id, Request $req)
	{
    $this->validate($req,[
        'approval_id' => 'required',
        //'filelink' => 'required',
    ],
    [
        'approval_id.required'=>'Vui lòng nhập tên approval',
        //'filelink.required'=>'Vui lòng chọn file',
    ]);

    $lv2 = Approval::where('infor_id', $id)
                  ->where('level', 2)->get();

    if (count($lv2) >= 1 && $req->level == 2) {
      $strNotify = 'Please input only 1 level 2';
      return redirect()->back()->with('notify', $strNotify);
    }

    $inst = new Approval;
    //$inst->name = $req->name;
    $inst->infor_id = $id;
    $inst->approval_id = $req->approval_id; 
    $inst->level = $req->level;
    $inst->status = 10;
    $inst->note = $req->note;
    $inst->user_id = Auth::id();
		$inst->save();

    $strNotify = 'Add approval successfully';
		return redirect()->back()->with('notify', $strNotify);
	}

  public function getDisplay($id)
  {
    $inst = Infor::find($id);
    return view('v1.member.doc.infor.display', compact('users', 'roles', 'inst'));
  }

  public function getEdit($id, $attach_id, Request $req)
  {
    $inst = Infor::find($id);
    $insts = Attach::where('id','>',0)->get();

    $attach = Attach::find($attach_id);
    return view('v1.member.doc.infor.attach_edit', compact('inst', 'insts', 'attach'));
  }

  public function postEdit($id, $attach_id, Request $req)
  {
    $this->validate($req,[
        'name' => 'required',
    ],
    [
        'name.required'=>'Vui lòng nhập tên file',
    ]);

    $inst = Attach::find($attach_id);
    $inst->name = $req->name;
    $inst->infor_id = $id;
    $inst->description = $req->description;
    $inst->note = $req->note;
    $inst->user_id = Auth::id();
    //Kiểm tra file
    if ($req->hasFile('filelink')) {
      $oldPath = $inst->path.'/'.$inst->link;
      unlink($oldPath);


        $file = $req->filelink;

        $inst->extend = $file->getClientOriginalExtension();
        $inst->size = formatSizeUnits($file->getSize());

        //Lấy Tên files
            // echo 'Tên Files: ' . $file->getClientOriginalName();
            // echo '<br/>';
            //Lấy Đuôi File
        
            // echo '<br/>';

            // //Lấy đường dẫn tạm thời của file
            // echo 'Đường dẫn tạm: ' . $file->getRealPath();
            // echo '<br/>';

            // //Lấy kích cỡ của file đơn vị tính theo bytes
            // echo 'Kích cỡ file: ' . $file->getSize();
            // echo '<br/>';

            // //Lấy kiểu file
            // echo 'Kiểu files: ' . $file->getMimeType();

        $fullName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $fullNameLenght = strlen($fullName);
        $extensionLenght = strlen($extension);
        $nameLength = $fullNameLenght - ($extensionLenght + 1);
        $onlyName = substr($fullName, 0, $nameLength);

        $fileNewName = date('Ymd.His').'.'.$id.'_'.$onlyName.'.'.$file->getClientOriginalExtension();
        $fileNewName = getFilterName($fileNewName);

        $strBasePath = 'upload/bel/document/';
        $path = $strBasePath.date('Y_m');
        if (!file_exists($path)) {
          mkdir($strBasePath.date('Y_m'), 0700);
        }        
        

        $file->move($path,$fileNewName);
        $inst->link = $fileNewName;
        
        $inst->path = $path;
    }

    
    $inst->save();

    $strNotify = 'Edit successfully';
    return redirect()->back()->with('notify', $strNotify);
  }

  public function getDelete($id, $attach_id)
  {
    $inst = Attach::find($attach_id);
    $oldPath = $inst->path.'/'.$inst->link;
    unlink($oldPath);
    $inst->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
