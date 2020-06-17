<?php

namespace App\Http\Controllers\Warehouse\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Facility;
use App\Model\Warehouse\Warehouse;
use App\Model\Warehouse\Category;
use App\Model\Warehouse\Item;
use App\Model\Warehouse\WarehouseItem;

use Illuminate\Support\Facades\Auth;
use Cookie;

class WarehouseItemController extends Controller
{
  public function getList()
  {
    $warehouses = Category::where('is_active', 1)->get();
    $items = Item::all();

    $wh_item_item = Cookie::get('wh_item_item');
    $wh_item_warehouse = Cookie::get('wh_item_warehouse');
    //$item_part = Cookie::get('item_part');
    $query = WarehouseItem::where('id', '>', 0);
    if (!empty($wh_item_item)) {
      $query = $query->where('item_id', 'LIKE', '%'.$wh_item_item.'%');
    }
    if (!empty($wh_item_warehouse)) {
      $query = $query->where('warehouse_id', 'LIKE', '%'.$wh_item_warehouse . '%');
    }
    $wh_items = $query->paginate(10);
    $oldData = ['wh_item_warehouse' => $wh_item_warehouse,
                'wh_item_item' => $wh_item_item,
                // 'item_part' => $item_part,
               ];
  	return view('v1.member.warehouse.warehouse_item.list', compact('wh_items', 'oldData', 'warehouses', 'items'));
  }

  public function postList(Request $req)
  {
    $warehouses = Category::where('is_active', 1)->get();
    $items = Item::all();

    $wh_item_item = $req->item_id; Cookie::queue('wh_item_item', $wh_item_item, 20);
    $wh_item_warehouse = $req->warehouse_id; Cookie::queue('wh_item_warehouse', $wh_item_warehouse, 20);
    $page = Cookie::get('page');

    $query = WarehouseItem::where('id', '>', 0);
    if (!empty($wh_item_item)) {
      $query = $query->where('item_id', 'LIKE', '%'.$wh_item_item.'%');
    }
    if (!empty($wh_item_warehouse)) {
      $query = $query->where('warehouse_id', 'LIKE', '%'.$wh_item_warehouse . '%');
    }
    $wh_items = $query->paginate(10);
    $oldData = ['wh_item_warehouse' => $wh_item_warehouse,
                'wh_item_item' => $wh_item_item,
                // 'item_part' => $item_part,
               ];
    return view('v1.member.warehouse.warehouse_item.list', compact('wh_items', 'oldData', 'warehouses', 'items'));
  }

  public function getAdd()
  {
    $warehouses = Category::where('is_active', 1)->get();
    //$items = Item::where('is_active', 1)->get();
    $items = Item::all();
  	return view('v1.member.warehouse.warehouse_item.add', compact('warehouses', 'items'));
  }

  public function postAdd(Request $req)
	{
		$this->validate($req,[
          'warehouse_id' => 'required',
      ],
      [
          'warehouse_id.required'=>'Please input warehouse name',
      ]);

		$inst = new WarehouseItem;
		$inst->warehouse_id = $req->warehouse_id;
		$inst->item_id = $req->item_id;
    $inst->user_id = Auth::id();
    $inst->min_stock = $req->min_stock;
    $inst->max_stock = $req->max_stock;
    $inst->start_quantity = $req->start_quantity;
    
		$inst->save();

    $strNotify = 'Connect item to warehouse successfully';
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
