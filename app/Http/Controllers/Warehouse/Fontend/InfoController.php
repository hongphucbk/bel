<?php

namespace App\Http\Controllers\Course\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Info;
use App\Model\Course\Lesson;


class InfoController extends Controller
{
	public function getList($id)
	{
		$info = Info::find($id);
		$lessons = Lesson::where('course_info_id', $id)->orderby('id','asc')->get();
		return view('v1.fontend.course.list.list', compact('info', 'lessons'));
	}
    
}
