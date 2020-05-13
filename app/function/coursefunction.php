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
	
	function is_admin_edit_content_course($user)
	{	
		if( ! is_null($user) ){
			if (Auth::user()->role >= 3) {
				return 1;
			}
		}
		return 0;
	}

	function get_total_view_lesson_course($lesson_id)
	{
		$counts = Count::where('course_lesson_id', $lesson_id)->get();
		return count($counts);
	}

	function get_member_view_lesson_course($lesson_id)
	{
		$counts = Count::where('course_lesson_id', $lesson_id)
									 ->where('user_id','>', 0)
									 ->get();
		return count($counts);
	}

	function get_total_contents_in_one_lesson_course($lesson_id)
	{
		$counts = Content::where('course_lesson_id', $lesson_id)->get();
		return count($counts);
	}

	//get all course user bought
	function get_total_infor_of_user_course($id)
	{
		$counts = Activity::where('user_id', Auth::id())->get();
		return count($counts);
	}

	function get_total_contents_demo_in_one_lesson_course($lesson_id)
	{
		$counts = Content::where('course_lesson_id', $lesson_id)
											->where('type_id', 2) //2 is demo funtion
											->get();
		return count($counts);
	}

	function is_display_demo_course($lesson_id){
		return get_total_contents_demo_in_one_lesson_course($lesson_id);
	}

	function get_total_contents_exercise_in_one_lesson_course($lesson_id)
	{
		$counts = Content::where('course_lesson_id', $lesson_id)
											->where('type_id', 3) //2 is demo funtion
											->get();
		return count($counts);
	}

	function is_display_exercise_course($lesson_id){
		if (get_total_contents_exercise_in_one_lesson_course($lesson_id) > 0) {
			if (Auth::check()) {
				$lesson = Lesson::find($lesson_id);
				$counts = Activity::where('user_id', Auth::id())
													->where('course_info_id', $lesson->course_info->id)
													->get();
				if (count($counts) > 0) {
					return 1;
				}
			}
		}	
		return 0;
	}



	
	


?>