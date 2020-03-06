<?php

namespace App\Http\Controllers\Product\Fontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product\Attach;
use App\Model\Product\Info;
use App\Model\Product\Detail;


class ProductController extends Controller
{
	public function getList($id)
	{
		$info = Info::find($id);
		$details = Detail::where('product_info_id', $id)->orderby('id','asc')->get();
		$attach = Attach::where('product_info_id', $id)->get()->random();
		return view('v1.fontend.product.detail', compact('info', 'details','attach'));
	}
    
}
