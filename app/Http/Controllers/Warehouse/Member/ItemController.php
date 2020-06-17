<?php

namespace App\Http\Controllers\Warehouse\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Facility;
use App\Model\Warehouse\Warehouse;
use App\Model\Warehouse\Category;
use App\Model\Warehouse\Item;
use Illuminate\Support\Facades\Auth;
use Cookie;

class ItemController extends Controller
{
  public function getList()
  {
    $item_code = Cookie::get('item_code');
    $item_name = Cookie::get('item_name');
    $item_part = Cookie::get('item_part');
    $query = Item::where('id', '>', 0);
    if (!empty($item_code)) {
      $query = $query->where('code', 'LIKE', '%'.$item_code.'%');
    }
    if (!empty($item_name)) {
      $query = $query->where('name', 'LIKE', '%'.$item_name . '%');
    }
    $items = $query->paginate(10);
    $oldData = ['item_name' => $item_name,
                'item_code' => $item_code,
                'item_part' => $item_part,
               ];
  	return view('v1.member.warehouse.item.list', compact('items', 'oldData'));
  }

  public function postList(Request $req)
  {
    $warehouse_code = $req->code; Cookie::queue('warehouse_code', $warehouse_code, 20);
    $warehouse_name = $req->name; Cookie::queue('warehouse_name', $warehouse_name, 20);
    $page = Cookie::get('page');

    $query = Item::where('id', '>', 0);
    if (!empty($warehouse_code)) {
      $query = $query->where('code', 'LIKE', '%'.$warehouse_code.'%');
    }
    if (!empty($warehouse_name)) {
      $query = $query->where('name', 'LIKE', '%'.$warehouse_name . '%');
    }
    $warehouses = $query->paginate(10);
    $oldData = ['warehouse_name' => $warehouse_name,
                'warehouse_code' => $warehouse_code,
               ];
    return view('v1.member.warehouse.item.list', compact('warehouses','oldData'));
  }

  public function getAdd()
  {
    $categories = Category::where('is_active', 1)->get();
  	return view('v1.member.warehouse.item.add', compact('categories'));
  }

  public function postAdd(Request $req)
	{
		$this->validate($req,[
          'name' => 'required',
      ],
      [
          'name.required'=>'Please input name',
      ]);

		$inst = new Item;
		$inst->name = $req->name;
		$inst->code = $req->code;
    $inst->description = $req->description;
    $inst->unit = $req->unit;
    $inst->partnumber = $req->partnumber;
    $inst->color = $req->color;
    $inst->weight = $req->weight;
    $inst->category_id = $req->category_id;
    $inst->user_id = Auth::id();
		$inst->save();

    $strNotify = 'Add item '.$req->name.' successfully';
		return redirect()->back()->with('notify', $strNotify);
	}

  public function getDisplay($id)
  {
    $categories = Category::where('is_active', 1)->get();
    $item = Item::find($id);
    $inst = $item;
    return view('v1.member.warehouse.item.display', compact('categories', 'inst'));
  }

  public function getEdit($id)
  {
    $categories = Category::where('is_active', 1)->get();
    $item = Item::find($id);
    $inst = $item;
    return view('v1.member.warehouse.item.edit', compact('categories', 'inst'));
  }

  public function postEdit($id, Request $req)
  {
    $this->validate($req,[
      'name' => 'required',
      'code' => 'required',
    ],
    [
      'name.required'=>'Please input name',
      'code.required'=>'Please input code',
    ]);

    $inst = Item::find($id);
    $inst->name = $req->name;
    $inst->code = $req->code;
    $inst->description = $req->description;
    $inst->unit = $req->unit;
    $inst->partnumber = $req->partnumber;
    $inst->color = $req->color;
    $inst->weight = $req->weight;
    $inst->category_id = $req->category_id;
    $inst->user_id = Auth::id();

    $inst->save();
    $strNotify = 'Edit item '.$req->name.' successfully';
    return redirect()->back()->with('notify',$strNotify);
  }

  public function getDelete($id)
  {
    $inst = Item::find($id);
    $inst->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
