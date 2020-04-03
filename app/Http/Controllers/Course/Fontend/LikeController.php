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

class LikeController extends Controller
{
	public function getLike($id, $lesson_id)
	{
		//$info = Info::find($id);
		//$lesson = Lesson::find($lesson_id);

		$like = new Like;
		$like->course_lesson_id = $lesson_id;
		$like->user_id = Auth::id();
		$like->save();
		//$contents = Content::where('course_lesson_id', $lesson_id)->orderby('id','asc')->get();
    $name = Auth::user()->name;
    $strThankyou = "Cảm ơn ".$name." đã like bài này.";
		return redirect()->back()->with('notify', $strThankyou);
	}

	public function getDislike($id, $lesson_id)
	{

		$dislike = new Dislike;
		$dislike->course_lesson_id = $lesson_id;
		$dislike->user_id = Auth::id();
		$dislike->save();
		//$contents = Content::where('course_lesson_id', $lesson_id)->orderby('id','asc')->get();
    $name = Auth::user()->name;
    $strThankyou = "Bạn ".$name." đã dislike bài này.";
		return redirect()->back()->with('notify', $strThankyou);
	}


	
    
}
