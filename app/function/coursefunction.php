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
use App\Model\Course\Count;
use App\Model\Course\Comment;
use App\Model\Course\Like;
use App\Model\Course\Dislike;

use Illuminate\Support\Facades\Auth;

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

	function is_admin_view_count_course_lesson($user)
	{	
		if( ! is_null($user) ){
			if (Auth::user()->role >= 4) {
				return 1;
			}
		}
		return 0;
	}

	function count_viewer_lesson_course($lesson_id)
	{
		$counts = Count::where('course_lesson_id', $lesson_id)->get();
		if (count($counts) == 0) {
			return "";
		}
		return count($counts);
	}

	function is_user_delete_comment_in_lesson($cmt_id)
	{
		if (Auth::check()) {
			$beforeTime = Carbon::now()->subMinutes(15);
			$cmt = Comment::where('user_id', Auth::id())
										->where('created_at', '>', $beforeTime)
										->where('id', $cmt_id)
										->get();
			if(count($cmt) > 0){
				return 1;
			}
		}
		return 0;
	}
	

	//where('course_lesson_id', $lesson_id)
	// function check_auth_course_user($user_id, $course_id){
	// 	$result = Activity::where('user_id', $user_id)
	// 										->where('course_info_id', $course_id)
	// 										->get()
	// 										->count();
	// 	return $result;
	// }


	


?>