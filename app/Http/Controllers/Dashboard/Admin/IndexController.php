<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Course\Info;
use App\Model\Course\Lesson;
use App\Model\Course\Activity;
use App\Model\User\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
  public function getIndex()
  {
  	$users = User::all();
    $infos = Info::where('is_display', 1)->get();
  	return view('v1.admin.dashboard.index', compact('users', 'infos'));
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
