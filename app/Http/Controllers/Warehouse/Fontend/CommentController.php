<?php

namespace App\Http\Controllers\Course\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Info;
use App\Model\Course\Lesson;
use App\Model\Course\Content;
use App\Model\Course\Like;
use App\Model\Course\Dislike;
use App\Model\Course\Comment;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	public function postComment($id, $lesson_id, Request $req)
	{
		$this->validate($req,[
        'content' => 'required',
    ],
    [
        'content.required'=>'Bạn chưa nhập nội dung.',
    ]);

		$comment = new Comment;
		$comment->course_lesson_id = $lesson_id;
		$comment->user_id = Auth::id();
		$comment->comment = $req->content;
		$comment->save();
		//$contents = Content::where('course_lesson_id', $lesson_id)->orderby('id','asc')->get();
    $name = Auth::user()->name;
    $strThankyou = "Cảm ơn ".$name." đã comment bài này.";
		return redirect()->back()->with('notify', $strThankyou);
	}

	public function getDelComment($id, $lesson_id, $lesson_content, $cmt_id, Request $req)
	{

		$comment = Comment::find($cmt_id);
		$comment->delete();

		return redirect()->back();
	}






	
    
}
