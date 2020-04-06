<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer dumpautoload

use Carbon\Carbon;
use App\Model\Course\Info;
use App\Model\Course\Lesson;
use App\Model\Course\Content;
use App\Model\Course\Activity;

	function get_Total_Content($id)
	{
		$contents = Info::where('course_info_id', $id)->get();
		return count($contents);
	}

	function is_admin_edit_course_info($info_id)
	{
		// If supper admin -> return 1 any case
		// If admin -> return 1 only they create
		$user = Auth::user();
		$info = Info::find($info_id);
		if( $user->role >= 4){
			return 1;
		}
		if( $user->role <= 3 && $user->id == $info->user_id ){
			return 1;
		}
		return 0;

	}

	function is_admin_delete_course_info($info_id)
	{
		// If supper admin -> return 1 any case
		// If admin -> return 1 only they create
		if(get_Total_Lesson($info_id) < 1 && is_admin_edit_course_info($info_id) ){
			return 1;
		}
		return 0;
	}

	// function check_auth_course_user($user_id, $course_id){
	// 	$result = Activity::where('user_id', $user_id)
	// 										->where('course_info_id', $course_id)
	// 										->get()
	// 										->count();
	// 	return $result;
	// }


	


?>