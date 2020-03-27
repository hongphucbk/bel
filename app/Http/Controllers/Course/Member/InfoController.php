<?php

namespace App\Http\Controllers\Course\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Course\Info;
use App\Model\Course\Lesson;
use App\Model\Course\Activity;
use Illuminate\Support\Facades\Auth;


class InfoController extends Controller
{
  public function getList()
  {
  	$acties = Activity::where('user_id', Auth::id())->get();
  	return view('v1.member.course.list', compact('acties'));
  }

   public function getAdd()
   {
    	$categories = Category::all();
    	return view('v1.admin.course.info.add', compact('categories'));
   }

   public function postAdd(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'course_category_id' => 'required',
        ],
        [
            'name.required'=>'Please input name',
            'course_category_id.required'=>'Please select category',
        ]);

		$info = new Info;
    $info->course_category_id = $request->course_category_id;
    $info->name = $request->name;
    $info->duration = $request->duration;
    $info->price = $request->price;
    $info->promote_price = $request->promote_price;
    $info->professor = $request->professor;
		$info->note = $request->note;
    
    //Kiểm tra file
    if ($request->hasFile('filelink')) {
        $file = $request->filelink;

        $fullName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $fullNameLenght = strlen($fullName);
        $extensionLenght = strlen($extension);
        $nameLength = $fullNameLenght - ($extensionLenght + 1);
        $onlyName = substr($fullName, 0, $nameLength);

        $fileNewName = $onlyName.'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
        $fileNewName =getFilterName($fileNewName);
        $file->move('upload/course_info/img',$fileNewName);
        $info->linkpicture = $fileNewName;
    }
		$info->save();
		return redirect()->back()->with('notification','Add successfully');
	}

   public function getEdit($id)
   {
        $categories = Category::all();
        $info = Info::find($id);
        return view('v1.admin.course.info.edit', compact('info','categories'));
   }

   public function postEdit($id, Request $request)
   {
      $this->validate($request,[
         'name' => 'required',
         'course_category_id' => 'required',
      ],
      [
         'name.required'=>'Please input name',
         'course_category_id.required'=>'Please select category',
      ]);

      $info = Info::find($id);
      $info->course_category_id = $request->course_category_id;
      $info->name = $request->name;
      $info->duration = $request->duration;
      $info->price = $request->price;
      $info->promote_price = $request->promote_price;
      $info->professor = $request->professor;
      $info->note = $request->note;
      $info->priority = $request->priority;
      //Kiểm tra file
      if ($request->hasFile('filelink')) {
         $file = $request->filelink;

         $fullName = $file->getClientOriginalName();
         $extension = $file->getClientOriginalExtension();

         $fullNameLenght = strlen($fullName);
         $extensionLenght = strlen($extension);
         $nameLength = $fullNameLenght - ($extensionLenght + 1);
         $onlyName = substr($fullName, 0, $nameLength);

         $fileNewName = $onlyName.'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
         $fileNewName =getFilterName($fileNewName);
         $file->move('upload/course_info/img',$fileNewName);
         $info->linkpicture = $fileNewName;
      }
      $info->save();
      return redirect()->back()->with('notification','Edit successfully');
   }
    
    public function getDelete($id)
    {
        $info = Info::find($id);
        $info->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }

   public function getDetail($id)
   {
      $categories = Category::all();
      $infos = Info::all();
      $info = Info::find($id);
      $lessons = Lesson::where('course_info_id', $id)
                        ->orderBy('priority')
                        ->get();
      return view('v1.admin.course.info.detail.list', compact('infos','categories','lessons', 'info'));
   }

   public function getDetailAdd($id)
   {
      $infos = Info::all();
      $info = Info::find($id);
      return view('v1.admin.course.lesson.add', compact('infos', 'info'));
   }

   
}
