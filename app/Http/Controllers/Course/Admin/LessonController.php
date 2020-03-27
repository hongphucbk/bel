<?php

namespace App\Http\Controllers\Course\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Course\Lesson;
use App\Model\Course\Info;

class LessonController extends Controller
{
    public function getList()
    {
    	$categories = Category::all();
    	$infos = Info::all();
        $lessons = Lesson::all();
    	return view('v1.admin.course.lesson.list', compact('infos','categories','lessons'));
    }

    public function getAdd()
    {
    	$infos = Info::all();
    	return view('v1.admin.course.lesson.add', compact('infos'));
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'course_info_id' => 'required',

        ],
        [
            'name.required'=>'Please input name',
            'course_info_id.required'=>'Please select course info',

        ]);

		$lesson = new Lesson;
        $lesson->course_info_id = $request->course_info_id;
        $lesson->name = $request->name;
        $lesson->content = $request->content;

		$lesson->note = $request->note;
		$lesson->save();
		return redirect()->back()->with('notification','Add successfully');
	}

    public function getEdit($id)
    {
        $infos = Info::all();
        $lesson = Lesson::find($id);
        return view('v1.admin.course.lesson.edit', compact('lesson','infos'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'course_info_id' => 'required',

        ],
        [
            'name.required'=>'Please input name',
            'course_info_id.required'=>'Please select course info',

        ]);

        $lesson = Lesson::find($id);
        $lesson->course_info_id = $request->course_info_id;
        $lesson->name = $request->name;
        $lesson->content = $request->content;
        $lesson->is_video = $request->is_video;
        $lesson->is_fee = $request->is_fee;
        $lesson->note = $request->note;
        $lesson->save();
        return redirect()->back()->with('notification','Edit successfully');
    }
    
    public function getDelete($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }
}
