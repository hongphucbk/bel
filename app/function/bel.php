<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer dumpautoload

use Carbon\Carbon;

use App\Model\Doc\Infor;
use App\Model\Doc\Attach;
use App\Model\Doc\Approval;
use App\Model\Doc\Status;
use App\Model\Doc\Auth as RoleAuth;
use App\Model\Doc\Role;

use Illuminate\Support\Facades\Auth;
use App\Model\User\User;

	function get_total_attach_bel($id)
	{
		$counts = Attach::where('infor_id', $id)->get();
		return count($counts);
	}

	function get_total_approval_bel($id)
	{
		$counts = Approval::where('infor_id', $id)->get();
		return count($counts);
	}

	function get_status_approval_id($id){
		$a = Approval::find($id);
		if ($a->status == 30) {
			return '<span class="badge badge-success">Approved</span>';
		}
		if ($a->status == 20) {
			return '<span class="badge badge-danger">Declined</span>';
		}
		return "";
	}

	function isReviewedApproval($id){ //Da approved hay chua
		$a = Approval::find($id);
		if ($a->status > 10 && $a->level > 0) {
			return true;
		}
		return false;
	}

	function isCanAddApprovalUser($infor_id){
		if (getInforStatusBel($infor_id) >= 80) {
			return false;
		}
		return true;
	}

	function isCanAttachFile($infor_id){
		$_appr = Approval::where('infor_id', $infor_id)
						 ->where('status','>', 10)
						 ->get();
		if (count($_appr) > 0) {
			return false; //Không cho edit
		}else{
			return true;
		}
	}

	function isCanDeleteApproval($id){
		$_appr = Approval::find($id);
		if ($_appr->is_submit > 0) {
			return false; //Không cho edit
		}else{
			return true;
		}
	}

	function getInforStatusBel($infor_id){
		$_appr = Approval::where('infor_id', $infor_id)->where('level','>',0);
		$_appr2 = $_appr;
		$_appr3 = $_appr;

		if (Infor::find($infor_id)->status->code <= 80) {
			$total = count(Approval::where('infor_id', $infor_id)
															->where('level','>',0)
															->get());
			$all_level1 = count($_appr->where('level',1)->get());
			
			$submited = count($_appr2->where('is_submit',1)->get());
			$lv1_approved = count(Approval::where('infor_id', $infor_id)
																		->where('status', 30)
																		->where('level', 1)
																		->get());
			//dd($all_level1);
			$lv2_approved = count(Approval::where('infor_id', $infor_id)
																		->where('level',2)
																		->where('status', 30)
																		->get());
			$declined = count(Approval::where('infor_id', $infor_id)
																->where('is_submit', 1)
																->where('status', 20)
																->where('level',2)
																->get());

			$half_all_level1 = floor($all_level1/2);
			//dd($all_level1, $lv1_approved, floor($all_level1/2));
			if ($lv1_approved < $half_all_level1 || $declined > 0) {
				return 10; //Không cho edit
			}
			if ($lv2_approved && $total > 0) {
				return 80; //Level 2 đã approved
			}
			if ($lv1_approved == $all_level1 && $all_level1 > 0) {
				return 60; // Tất cả level 1 đã approve
			}
			if ($lv1_approved < $all_level1 && $lv1_approved > 0) {
				return 50; // Partial > 1/2 Tất cả level 1 đã approve
			}
			if ($lv1_approved < $all_level1 && $lv1_approved > 0) {
				return 40; //Partial
			}
			if ($submited > 0) {
				return 30; //Submit
			}
			
			return 20;
		}
		return 90;
		
	}

	function getIdStatusInfor($infor_id){
		$code = getInforStatusBel($infor_id);
		$sts_id = Status::where('code', $code)->first()->id;
		return $sts_id;
	}

	function displayInforStatus($status_id){
		$sts = Status::find($status_id);
		if (is_null($sts->label)) {
			$label = 'light';
		}
		$label = $sts->label;
		return '<span class="badge badge-'.$label.'">'.$sts->code.' - '.$sts->name.'</span>';
	}


	function checkLevel2Approve($infor_id){
		$id = $infor_id;
		$code = getInforStatusBel($infor_id);
		if ($code >= 50 && $code <= 60) {
			$arrEmails = [];
			$_query = Approval::where('infor_id', $id)
                        ->where('level', 2)
                        ->where('is_submit', 0);
    	$approvelList = $_query->get();

	    //dd($approvelList);
	    $_query->update(['is_submit'=>'1']);

	    foreach ($approvelList as $key => $val) {
	      $temp = $val->approval->email;
	      array_push($arrEmails, $temp);
	    }
	    
	    $infor = Infor::find($infor_id);
	    $data['title'] =  "BEL- LEVEL 2 APPROVAL";
	    $data['document_name'] = $infor->name;
	    $data['document_link'] = url('/')."/v1/member/doc/infor/".$id."/approval";
	    $data['total_file'] = get_total_attach_bel($id);
	    $data['user_name'] = $infor->user->name;
	    $data['today'] = $infor->created_at;

	    $subject = "BEL - Document Approval";
	    //dd($arrEmails);

	    Mail::send('v1.member.doc.email.approval', $data, function($message) use ($subject, $arrEmails) {
	        $message->from('industrial.iot.vn@gmail.com', 'Documents system - No-reply');
	        $message->to($arrEmails)
	                ->subject($subject);
	        // $message->to('phuc.truong@bluescope.com')
	        //         ->subject($subject);
	    });
		}
	}

	// function isCanCompleteInfor($infor_id){
	// 	$code = getInforStatusBel($infor_id);
	// 	if ($code >= 80 && $code < 90) {
	// 		return true;
	// 	}
	// 	return false;
	// }

	function getIdStatus($code){
		//$code = getInforStatusBel($infor_id);
		$sts_id = Status::where('code', $code)->first()->id;
		return $sts_id;
	}

	function getIdRole($code){
		//$code = getInforStatusBel($infor_id);
		$sts_id = Role::where('code', $code)->first()->id;
		return $sts_id;
	}

	function isAdminDoc(){
		$role_id = getIdRole(4);

		$rs = count(RoleAuth::where('role_id', $role_id)
					->where('user_id', Auth::id())
					->get());
		if ($rs > 0) {
			return true;
		}
		return false;
	}

	function backupUserId($user_id){
		//dd($user_id);
		$backup_id = RoleAuth::where('user_id', $user_id)
						//->where('is_submit',1)
						->orderby('role_id','desc')
						->first()->backup_id;
		
		if (isset($backup_id)) {
			$user = User::find($backup_id);
			//dd($user->id);
			return $user->id;
		}
		return print_r('User không setting Backup');
		
	}

	function isCanApprovalBackup($id, $user_id){
		
		$approvals = Approval::where('infor_id',$id)
                    		->where('is_backup',1)
                    		->where('status', 10)
                    		->where('is_submit', 1)
                    		->get();
        //dd($id, $user_id, $approvals);
        foreach ($approvals as $key => $val) {
        	if ($val->backup_id == Auth::id()) {
			return true;
		}

        }
		return false;
	}

	function updateInforStatus($infor_id)
	{
		$code = getInforStatusBel($infor_id);
		$sts_id = getIdStatus($code);
		Infor::where('id', $infor_id)->update(['status_id'=>$sts_id]);
	}

	function isCanCompleteInfor($id){
		$infor = Infor::find($id);
		if ($infor->status->code == 80 && $infor->user_id == Auth::id()) {
			return true;
		}
		return false;
	}


	


?>