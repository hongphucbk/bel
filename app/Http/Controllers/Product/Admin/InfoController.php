<?php

namespace App\Http\Controllers\Product\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product\Attach;
use App\Model\Product\Info;


class InfoController extends Controller
{
    public function getList()
    {
    	$infos = Info::all();
    	return view('v1.admin.product.info.list', compact('infos'));
    }

    public function getAdd()
    {
    	return view('v1.admin.product.info.add');
    }

    public function postAdd(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',

        ],
        [
            'name.required'=>'Please input name',

        ]);

		$info = new Info;
        $info->rate = $request->rate;
        $info->name = $request->name;
        $info->price = $request->price;
        $info->promote_price = $request->promote_price;
		$info->note = $request->note;
        //Kiểm tra file
        if ($request->hasFile('filelink')) {
            $file = $request->filelink;

            $fullName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $fullNameLenght = strlen($fullName);
            $extensionLenght = strlen($extension);
            $nameLength = $fullNameLenght - ($extensionLenght + 1);
            $onlyName = substr($fullName, 0, $nameLength);

            $fileNewName = $onlyName.'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
            $fileNewName =getFilterName($fileNewName);
            $file->move('upload/product_info/img',$fileNewName);
            $info->linkpicture = $fileNewName;
        }
		$info->save();
		return redirect()->back()->with('notification','Add successfully');
	}

    public function getEdit($id)
    {
        $info = Info::find($id);
        return view('v1.admin.product.info.edit', compact('info'));
    }

    public function postEdit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',

        ],
        [
            'name.required'=>'Please input name',
        ]);

        $info = Info::find($id);
        $info->rate = $request->rate;
        $info->name = $request->name;
        $info->price = $request->price;
        $info->promote_price = $request->promote_price;
        $info->note = $request->note;
        //Kiểm tra file
        if ($request->hasFile('filelink')) {
            $file = $request->filelink;

            $fullName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $fullNameLenght = strlen($fullName);
            $extensionLenght = strlen($extension);
            $nameLength = $fullNameLenght - ($extensionLenght + 1);
            $onlyName = substr($fullName, 0, $nameLength);

            $fileNewName = $onlyName.'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
            $fileNewName =getFilterName($fileNewName);
            $file->move('upload/product_info/img',$fileNewName);
            $info->linkpicture = $fileNewName;
        }
        $info->save();
        return redirect()->back()->with('notification','Edit successfully');
    }
    
    public function getDelete($id)
    {
        $info = Info::find($id);
        $info->delete();
        return redirect()->back()->with('notification','Delete successfully');
    }


    
}
