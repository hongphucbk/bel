<?php

namespace App\Http\Controllers\Course\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Info;
use App\Model\Course\Lesson;
use App\Model\Course\Content;
use App\Model\Course\Like;
use App\Model\Course\Dislike;

use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
	public function getLesson($id, $lesson_id, $slug)
	{
		$info = Info::find($id);
		$lesson = Lesson::find($lesson_id);
		$contents = Content::where('course_lesson_id', $lesson_id)->orderby('id','asc')->get();

		$like = Like::where('course_lesson_id', $lesson_id)
								->where('user_id', Auth::id())
								->orderby('id', 'desc')
								->first();

		$dislike = Dislike::where('course_lesson_id', $lesson_id)
								->where('user_id', Auth::id())
								->orderby('id', 'desc')
								->first();
   
   	//dd(changeTitle($lesson->name)." ".$slug);

		if($lesson->course_info_id == $id && changeTitle($lesson->name) == $slug ){
			return view('v1.fontend.course.detail.detail', compact('info', 'lesson', 'contents', 'like', 'dislike'));
		}
		return redirect('/')->with('notify', 'Địa chỉ trang không đúng.');
	}
    
}
