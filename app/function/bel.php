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




	


?>