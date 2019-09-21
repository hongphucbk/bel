<?php

namespace App\Http\Controllers\Course\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Course\Lesson;
use App\Model\Course\Content;
use App\Model\Course\Info;

class ContentController extends Controller
{
    public function getList()
    {
        $contents = Content::all();
    	return view('v1.admin.course.content.list', compact('contents'));
    }

    public function getAdd()
    {
    	$lessons = Lesson::all();
    	return view('v1.admin.course.content.add', compact('lessons'));
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'title' => 'required',
            'course_lesson_id' => 'required',
        ],
        [
            'title.required'=>'Please input name',
            'course_lesson_id.required'=>'Please select course info',
        ]);

		$content = new Content;
        $content->course_lesson_id = $request->course_lesson_id;
        $content->title = $request->title;
        $content->content = $request->content;
        $content->user_id = 1; //$request->content;
		$content->note = $request->note;
		$content->save();
		return redirect()->back()->with('notification','Add successfully');
	}

    public function getEdit($id)
    {
        $lessons = Lesson::all();
        $content = Content::find($id);
        return view('v1.admin.course.content.edit', compact('content','lessons'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'course_lesson_id' => 'required',
        ],
        [
            'title.required'=>'Please input name',
            'course_lesson_id.required'=>'Please select course info',
        ]);

        $content = Content::find($id);
        $content->course_lesson_id = $request->course_lesson_id;
        $content->title = $request->title;
        $content->content = $request->content;
        $content->user_id = 1; //$request->content;
        $content->note = $request->note;
        $content->save();
        return redirect()->back()->with('notification','Edit successfully');
    }
    
    public function getDelete($id)
    {
        $content = Content::find($id);
        $content->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }
}
