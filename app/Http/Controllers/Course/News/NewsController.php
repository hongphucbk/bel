<?php

namespace App\Http\Controllers\Course\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Info;
use App\Model\Setting\Service;

class NewsController extends Controller
{
	public function getIndex()
	{
		$services = Service::all();
		$infos = Info::all();
		return view('v1.fontend.news.index', compact('infos', 'services'));
	}
    
}
