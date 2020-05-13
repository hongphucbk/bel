<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer dumpautoload

use Carbon\Carbon;
use App\Model\Helpdesk\Category;
use App\Model\Helpdesk\Status;
use App\Model\Helpdesk\Ticket;
use App\Model\Helpdesk\Activity;

use Illuminate\Support\Facades\Auth;
use App\Model\User\User;

	function get_status_activity_helpdesk($id)
	{
		$activity = Activity::where('ticket_id', $id)->orderby('id', 'desc')->first();
		if (is_null($activity)) {
			return "";
		}
		return "<span class='badge badge-success'>".$activity->status->name."</span>";
	}

	//get all course user bought
	function get_total_ticket_of_user_helpdesk($id)
	{
		$counts = Ticket::where('user_id', Auth::id())->get();
		return count($counts);
	}




	


?>