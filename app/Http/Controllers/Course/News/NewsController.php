<?php

namespace App\Http\Controllers\Course\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Info;


class NewsController extends Controller
{
	public function getIndex()
	{
		$infos = Info::all();
		return view('v1.fontend.news.layout.index', compact('infos'));
	}
    
}
