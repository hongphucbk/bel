<?php

namespace App\Http\Controllers\Course\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
	public function getLesson()
	{
		return view('v1.fontend.layout.index');
	}
    
}
