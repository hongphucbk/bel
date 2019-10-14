<?php

namespace App\Http\Controllers\Course\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Info;
use App\Model\Course\Lesson;
use App\Model\Course\Content;

class LessonController extends Controller
{
	public function getLesson($id, $lesson_id)
	{
		$info = Info::find($id);
		$lesson = Lesson::find($lesson_id);
		$contents = Content::where('course_lesson_id', $lesson_id)->orderby('id','asc')->get();

		return view('v1.fontend.course.detail.detail', compact('info', 'lesson', 'contents'));
	}
    
}
