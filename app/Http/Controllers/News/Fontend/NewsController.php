<?php

namespace App\Http\Controllers\News\Fontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\News\Info;
use App\Model\News\Content;


class NewsController extends Controller
{
	public function getDetail($id)
	{
		$info = Info::find($id);
		$contents = Content::where('info_id', $id)->orderby('id','asc')->get();
		return view('v1.fontend.news.detail', compact('info', 'contents'));
	}
    
}
