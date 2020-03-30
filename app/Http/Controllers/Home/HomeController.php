<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course\Info;
use App\Model\Setting\Service;
use App\Model\Product\Attach;
use App\Model\Product\Info as ProdInfo;
use App\Model\Soft\Info as SoftInfo;
use App\Model\News\Info as NewsInfo;


class HomeController extends Controller
{
	public function getIndex()
	{
		$services = Service::all();
		$infos = Info::where('is_display', 1)->get();
		$products = ProdInfo::all();
		$softs = SoftInfo::all();
		$news = NewsInfo::all();
		return view('v1.fontend.home.index', compact('infos', 'services','products', 'softs', 'news'));
	}
    
}
