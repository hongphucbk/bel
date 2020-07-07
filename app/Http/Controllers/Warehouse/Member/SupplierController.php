<?php

namespace App\Http\Controllers\Warehouse\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Facility;
use App\Model\Warehouse\Category;
use App\Model\Warehouse\Warehouse;
use App\Model\Warehouse\Item;
use App\Model\Warehouse\WarehouseItem;
use App\Model\Warehouse\Supplier;

use Illuminate\Support\Facades\Auth;
use Cookie;

class SupplierController extends Controller
{
  public function getList()
  {
    $category_code = Cookie::get('category_code');
    $category_name = Cookie::get('category_name');
    $query = Supplier::where('id', '>', 0);
    if (!empty($category_code)) {
      $query = $query->where('code', 'LIKE', '%'.$category_code.'%');
    }
    if (!empty($category_name)) {
      $query = $query->where('name', 'LIKE', '%'.$category_name . '%');
    }
    $suppliers = $query->paginate(10);
    $oldData = ['category_name' => $category_name,
                'category_code' => $category_code,
               ];
  	return view('v1.member.warehouse.supplier.list', compact('suppliers', 'oldData'));
  }

  public function postList(Request $req)
  {
    $category_code = $req->code; Cookie::queue('category_code', $category_code, 20);
    $category_name = $req->name; Cookie::queue('category_name', $category_name, 20);
    $page = Cookie::get('page');

    $query = Supplier::where('id', '>', 0);
    if (!empty($category_code)) {
      $query = $query->where('code', 'LIKE', '%'.$category_code.'%');
    }
    if (!empty($category_name)) {
      $query = $query->where('name', 'LIKE', '%'.$category_name . '%');
    }
    $suppliers = $query->paginate(10);
    $oldData = ['category_name' => $category_name,
                'category_code' => $category_code,
               ];
    return view('v1.member.warehouse.supplier.list', compact('suppliers','oldData'));
  }

  public function getAdd()
  {
  	return view('v1.member.warehouse.supplier.add');
    //h
  }

  public function postAdd(Request $req)
	{
		$this->validate($req,[
        'name' => 'required',
        'code' => 'required',
    ],
    [
        'name.required'=>'Please input name',
        'code.required'=>'Please input code',
    ]);

		$inst = new Supplier;
    $inst->code = $req->code;
    $inst->name = $req->name;
    $inst->user_id = Auth::id();
    $inst->description = $req->description;
    $inst->email = $req->email;
    $inst->address = $req->address;
    $inst->tax_id_number = $req->tax_id_number;
    $inst->account_number = $req->account_number;
    $inst->contact_name = $req->contact_name;
    $inst->is_active = $req->is_active == 'on'?1:0;

		$inst->save();
		return redirect()->back()->with('notify','Add 1 supplier successfully');
	}

  public function getDisplay($id)
  {
    $supplier = Supplier::find($id);
    return view('v1.member.warehouse.supplier.display', compact('supplier'));
  }

  public function getEdit($id)
  {
    $supplier = Supplier::find($id);
    return view('v1.member.warehouse.supplier.edit', compact('supplier'));
  }

  public function postEdit($id, Request $req)
  {
    $this->validate($req,[
      'name' => 'required',
    ],
    [
      'name.required'=>'Please input name',
    ]);

    $inst = Supplier::find($id);
    $inst->code = $req->code;
    $inst->name = $req->name;
    $inst->user_id = Auth::id();
    $inst->description = $req->description;
    $inst->email = $req->email;
    $inst->address = $req->address;
    $inst->tax_id_number = $req->tax_id_number;
    $inst->account_number = $req->account_number;
    $inst->contact_name = $req->contact_name;
    $inst->is_active = $req->is_active == 'on'?1:0;

    $inst->save();
    return redirect()->back()->with('notify','Edit successfully');
  }

  public function getDelete($id)
  {
    $category = Category::find($id);
    $category->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
