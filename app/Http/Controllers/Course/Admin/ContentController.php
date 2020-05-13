<?php

namespace App\Http\Controllers\Course\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Course\Lesson;
use App\Model\Course\Content;
use App\Model\Course\Info;
use App\Model\Course\ContentType;

use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function getList()
    {
        $contents = Content::all();
    	return view('v1.admin.course.content.list', compact('contents'));
    }

  public function getAdd()
  {
    $types = ContentType::where('is_active', 1)->get();
  	$lessons = Lesson::all();
  	return view('v1.admin.course.content.add', compact('lessons', 'types'));
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
    $content->user_id = Auth::id(); //$request->content;
    $content->type_id = $request->type_id;
		$content->note = $request->note;
		$content->save();
		return redirect()->back()->with('notification','Add successfully');
	}

    public function getEdit($id)
    {
        $types = ContentType::where('is_active', 1)->get();
        $lessons = Lesson::all();
        $content = Content::find($id);
        return view('v1.admin.course.content.edit', compact('content','lessons', 'types'));
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
      $content->type_id = $request->type_id;
      $content->user_id = Auth::id();
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
