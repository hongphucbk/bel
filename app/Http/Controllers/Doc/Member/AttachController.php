<?php

namespace App\Http\Controllers\Doc\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Doc\Role;
use App\Model\Doc\Status;
use App\Model\Doc\Auth as RoleAuth;
use App\Model\Doc\Infor;
use App\Model\Doc\Attach;

use Illuminate\Support\Facades\Auth;
use App\Model\User\User;
use Cookie;

class AttachController extends Controller
{
  public function getList($id, Request $req)
  {
    
    $insts = Attach::where('infor_id',$id)->get();

    $inst = Infor::find($id);
    return view('v1.member.doc.infor.attach', compact('inst', 'insts'));
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
        'name' => 'required',
        'filelink' => 'required',
    ],
    [
        'name.required'=>'Vui lòng nhập tên file',
        'filelink.required'=>'Vui lòng chọn file',
    ]);

    $inst = new Attach;
    $inst->name = $req->name;
    $inst->infor_id = $id;
    $inst->description = $req->description;
    $inst->note = $req->note;
    $inst->user_id = Auth::id();
    //Kiểm tra file
    if ($req->hasFile('filelink')) {
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

    $strNotify = 'Add attach successfully';
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
