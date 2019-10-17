<?php

namespace App\Http\Controllers\Product\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product\Attach;
use App\Model\Product\Info;
use App\Model\Product\Detail;

class AttachController extends Controller
{
    public function getList()
    {
    	$attachs = Attach::all();
    	return view('v1.admin.product.attach.list', compact('attachs'));
    }

    public function getAdd()
    {
        $infos = Info::all();
    	return view('v1.admin.product.attach.add', compact('infos'));
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'product_info_id' => 'required',
            
        ],
        [
            'name.required'=>'Please input title',
            'product_info_id.required'=>'Please chose product name',
        ]);

		$attach = new Attach;
        $attach->product_info_id = $request->product_info_id;
        $attach->name = $request->name;
        $attach->link = $request->link;
		$attach->note = $request->note;

		$attach->save();
		return redirect()->back()->with('notification','Add successfully');
	}

    public function getEdit($id)
    {
        $infos = Info::all();
        $attach = Attach::find($id);
        return view('v1.admin.product.attach.edit', compact('attach','infos'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',

        ],
        [
            'name.required'=>'Please input name',
        ]);

        $attach = Attach::find($id);
        $attach->product_info_id = $request->product_info_id;
        $attach->name = $request->name;
        $attach->link = $request->link;
        $attach->note = $request->note;
        $attach->save();
        return redirect()->back()->with('notification','Edit successfully');
    }
    
    public function getDelete($id)
    {
        $attach = Attach::find($id);
        $attach->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }



}
