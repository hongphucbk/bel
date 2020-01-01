<?php

namespace App\Http\Controllers\Soft\Fontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Soft\Attach;
use App\Model\Soft\Info;
use App\Model\Soft\Content;


class SoftController extends Controller
{
	public function getDetail($id)
	{
		$info = Info::find($id);
		$contents = Content::where('info_id', $id)->orderby('id','asc')->get();
		$attachs = Attach::where('info_id', $id)->orderby('id','asc')->get();
		return view('v1.fontend.soft.detail.detail', compact('info', 'contents','attachs'));
	}
    
}
