<?php

namespace App\Http\Controllers\Product\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product\Attach;
use App\Model\Product\Info;
use App\Model\Product\Detail;

class DetailController extends Controller
{
    public function getList()
    {
    	$details = Detail::all();
    	return view('v1.admin.product.detail.list', compact('details'));
    }

    public function getAdd()
    {
        $infos = Info::all();
    	return view('v1.admin.product.detail.add', compact('infos'));
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'title' => 'required',
            'product_info_id' => 'required',
            
        ],
        [
            'title.required'=>'Please input title',
            'product_info_id.required'=>'Please chose product name',
        ]);

		$detail = new Detail;
        $detail->product_info_id = $request->product_info_id;
        $detail->title = $request->title;
        $detail->content = $request->content;
		$detail->note = $request->note;

		$detail->save();
		return redirect()->back()->with('notification','Add successfully');
	}

    public function getEdit($id)
    {
        $detail = Detail::find($id);
        return view('v1.admin.product.detail.edit', compact('detail'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',

        ],
        [
            'name.required'=>'Please input name',
        ]);

        $detail = Detail::find($id);
        $detail->rate = $request->rate;
        $detail->name = $request->name;
        $detail->price = $request->price;
        $detail->promote_price = $request->promote_price;
        $detail->note = $request->note;
        $detail->save();
        return redirect()->back()->with('notification','Edit successfully');
    }
    
    public function getDelete($id)
    {
        $detail = Detail::find($id);
        $detail->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }



}
