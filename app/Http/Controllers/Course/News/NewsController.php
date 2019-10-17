<?php

namespace App\Http\Controllers\Course\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Info;
use App\Model\Setting\Service;
use App\Model\Product\Attach;
use App\Model\Product\Info as ProdInfo;

class NewsController extends Controller
{
	public function getIndex()
	{
		$services = Service::all();
		$infos = Info::all();
		$products = ProdInfo::all();
		return view('v1.fontend.news.index', compact('infos', 'services','products'));
	}
    
}
