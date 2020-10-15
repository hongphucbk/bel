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
use Carbon\Carbon;
use Mail;

class ApprovalController extends Controller
{
  public function getList($id, Request $req)
  {
    $appr = Approval::where('infor_id',$id);

    $insts = Attach::where('infor_id',$id)->get();
    $approve_inst = $appr->where('approval_id', Auth::id())->first();
    

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
    

    return view('v1.member.doc.infor.approval', compact('inst', 'insts', 'users', 'approvals', 'approvalList', 'approve_inst'));
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

  public function getSubmit($id)
  {
    
    
    $arrEmails = [];
    $_query = Approval::where('infor_id', $id)
                            ->where('level', 1)
                            ->where('is_submit', 0);
    $approvelList = $_query->get();

    $_query->update(['is_submit'=>'1']);

    foreach ($approvelList as $key => $val) {
      $temp = $val->user->email;
      array_push($arrEmails, $temp);
    }

    $infor = Infor::find($id);

    $data['title'] =  "BEL- LEVEL 1 APPROVE";
    $data['document_name'] = $infor->name;
    $data['document_link'] = url('/')."/v1/member/doc/infor/".$id."/approval";
    $data['total_file'] = get_total_attach_bel($id);
    $data['user_name'] = Auth::user()->name;
    $data['today'] = Carbon::now();

    $subject = "BEL - Document Approval";
    //dd($arrEmails);

    Mail::send('v1.member.doc.email.approval', $data, function($message) use ($subject, $arrEmails) {
        $message->from('industrial.iot.vn@gmail.com', 'Documents system - No-reply');
        $message->to($arrEmails)
                ->subject($subject);
        // $message->to('phuc.truong@bluescope.com')
        //         ->subject($subject);
    });
    $strNotify = 'Sent successfully';
    return redirect()->back()->with('notify', $strNotify);
  }

  public function getDelete($id, $approval_id)
  {
    $inst = Approval::find($approval_id);
    $inst->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

  public function postApproval($id, $approval_id, Request $req)
  {
    

    //dd();
    $inst = Approval::find($approval_id);
    //$inst->name = $req->name;
    $inst->infor_id = $id;
    $inst->comment = $req->comment;
    $inst->status = $req->isApproval; //20 la decline - 30 approve
    $inst->note = $req->note;
    $inst->user_id = Auth::id();
       
    $inst->save();

    $strNotify = 'Successfully';
    return redirect()->back()->with('notify', $strNotify);
  }

  public function getReset($id)
  {
    $_query = Approval::where('infor_id', $id)
                            ->delete();

    Infor::where('id', $id)->update(['status_id'=>'2']);

    return redirect()->back()->with('notify','Reset successfully');
  }
  
  //=====================

  // public function getEdit($id, $attach_id, Request $req)
  // {
  //   $inst = Infor::find($id);
  //   $insts = Attach::where('id','>',0)->get();

  //   $attach = Attach::find($attach_id);
  //   return view('v1.member.doc.infor.attach_edit', compact('inst', 'insts', 'attach'));
  // }

  

  

}
