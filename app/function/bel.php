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

	function isReviewedApproval($id){
		$a = Approval::find($id);
		if ($a->status > 10) {
			return true;
		}
		return false;
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

	function updateInforStatusBel($infor_id){
		$_appr = Approval::where('infor_id', $infor_id);
		$_appr2 = Approval::where('infor_id', $infor_id);
		$_appr3 = Approval::where('infor_id', $infor_id);
		if (Infor::find($infor_id)->status->code < 80) {
			$total = count($_appr->get());
			$all_level1 = count($_appr->where('level',1)->get());
			
			$submited = count($_appr2->where('is_submit',1)->get());
			$lv1_approved = count($_appr3->where('status', 30)->where('level', 1)->get());
			//dd($all_level1);
			$all_approved = count($_appr2->where('status', 30)->get());
			$declined = count(Approval::where('infor_id', $infor_id)->where('status', 20)->get());

			if ($declined > 0) {
				return 10; //Không cho edit
			}
			if ($all_approved == $total && $total > 0) {
				return 80; //Không cho edit
			}
			if ($lv1_approved == $all_level1 && $all_level1 > 0) {
				return 50; //Không cho edit
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
		$code = updateInforStatusBel($infor_id);
		$sts_id = Status::where('code', $code)->first()->id;
		return $sts_id;
	}

	function displayInforStatus($status_id){
		$sts = Status::find($status_id);
		return '<span class="badge badge-success">'.$sts->code.' - '.$sts->name.'</span>';
	}



	


?>