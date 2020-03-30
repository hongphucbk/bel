<?php

namespace App\Http\Controllers\Course\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Course\Info;
use App\Model\Course\Lesson;
use App\Model\Course\Activity;
use App\Model\User\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ActivityController extends Controller
{
  public function getList()
  {
  	$activities = Activity::all();
  	return view('v1.admin.course.activity.list', compact('activities'));
  }

  public function getAdd()
  {
  	$infos = Info::all();
    $users = User::all();
  	return view('v1.admin.course.activity.add', compact('infos', 'users'));
  }

  public function postAdd(Request $request)
  {
    $this->validate($request,[
      'user_id' => 'required',
      'course_info_id' => 'required',
    ],
    [
      'user_id.required'=>'Please input name',
      'course_info_id.required'=>'Please select course',
    ]);

    $activity = new Activity;
    $activity->course_info_id = $request->course_info_id;
    $activity->user_id = $request->user_id;
    $activity->paid = $request->paid;
    $activity->price = $request->price;
    $activity->deadline = Carbon::createFromFormat('d-m-Y H:i:s', $request->deadline." 23:59:59");
    $activity->note = $request->note;
    $activity->save();
    return redirect()->back()->with('notification','Add successfully');
  }

  public function getEdit($id)
  {
    $infos = Info::all();
    $users = User::all();
    $activity = Activity::find($id);
    return view('v1.admin.course.activity.edit', compact('activity','infos', 'users'));
  }

  public function postEdit($id, Request $request)
  {
    $this->validate($request,[
      'user_id' => 'required',
      'course_info_id' => 'required',
    ],
    [
      'user_id.required'=>'Please input name',
      'course_info_id.required'=>'Please select course',
    ]);

    $activity = Activity::find($id);
    $activity->course_info_id = $request->course_info_id;
    $activity->user_id = $request->user_id;
    $activity->paid = $request->paid;
    $activity->price = $request->price;
    $activity->deadline = Carbon::createFromFormat('d-m-Y H:i:s', $request->deadline." 23:59:59");
    $activity->note = $request->note;
    
    $activity->save();
    return redirect()->back()->with('notification','Edit successfully');
  }
    
  public function getDelete($id)
  {
    $activity = Activity::find($id);
    $activity->delete();
    return redirect()->back()->with('notification','Delete successfully');
  }

   // public function getDetail($id)
   // {
   //    $categories = Category::all();
   //    $infos = Info::all();
   //    $info = Info::find($id);
   //    $lessons = Lesson::where('course_info_id', $id)
   //                      ->orderBy('priority')
   //                      ->get();
   //    return view('v1.admin.course.info.detail.list', compact('infos','categories','lessons', 'info'));
   // }

   // public function getDetailAdd($id)
   // {
   //    $infos = Info::all();
   //    $info = Info::find($id);
   //    return view('v1.admin.course.lesson.add', compact('infos', 'info'));
   // }

   
}
