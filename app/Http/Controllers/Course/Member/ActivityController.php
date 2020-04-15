<?php

namespace App\Http\Controllers\Course\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Category;
use App\Model\Course\Info;
use App\Model\Course\Lesson;
use App\Model\Course\Activity;
use App\Model\Course\Like;
use App\Model\Course\Dislike;
use App\Model\Course\Comment;

use Illuminate\Support\Facades\Auth;


class ActivityController extends Controller
{
  public function getList()
  {
  	$likes = Like::where('user_id', Auth::id())->get();
    $dislikes = Dislike::where('user_id', Auth::id())->get();
    $comments = Comment::where('user_id', Auth::id())->get();
  	return view('v1.member.activity.list', compact('likes', 'dislikes', 'comments'));
  }

   


   


   
}
