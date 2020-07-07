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

    $wh_item_item = $req->wh_item_item; Cookie::queue('wh_item_item', $wh_item_item, 20);
    $wh_item_warehouse = $req->wh_item_warehouse; Cookie::queue('wh_item_warehouse', $wh_item_warehouse, 20);
    $page = Cookie::get('page');

    $query = WarehouseItem::where('id', '>', 0);
    if (!empty($wh_item_item)) {
      $query = $query->whereHas('item', function ( $q ) use ($wh_item_item) {
        $q->where('code', 'LIKE', '%'.$wh_item_item.'%');
      });
    }
    if (!empty($wh_item_warehouse)) {
      $query = $query->whereHas('warehouse', function ( $q ) use ($wh_item_warehouse){
        $q->where('code', 'LIKE', '%'.$wh_item_warehouse.'%');
      });
      //$query = $query->where('warehouse_id', 'LIKE', '%'.$wh_item_warehouse . '%');
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
    $warehouses = Warehouse::where('is_active', 1)->get();
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
    $warehouses = Category::where('is_active', 1)->get();
    $items = Item::get();
    $warehouse_item = WarehouseItem::find($id);
    $inst = $warehouse_item;
    return view('v1.member.warehouse.warehouse_item.display', compact('warehouses', 'items','inst'));
  }

  public function getEdit($id)
  {
    $warehouses = Category::where('is_active', 1)->get();
    $items = Item::get();
    $warehouse_item = WarehouseItem::find($id);
    $inst = $warehouse_item;
    return view('v1.member.warehouse.warehouse_item.edit', compact('warehouses', 'items', 'inst'));
  }

  public function postEdit($id, Request $req)
  {
    // $this->validate($req,[
    //   'name' => 'required',
    //   'code' => 'required',
    // ],
    // [
    //   'name.required'=>'Please input name',
    //   'code.required'=>'Please input code',
    // ]);

    $inst = WarehouseItem::find($id);
    // $inst->warehouse_id = $req->warehouse_id;
    // $inst->item_id = $req->item_id;
    $inst->user_id = Auth::id();
    $inst->min_stock = $req->min_stock;
    $inst->max_stock = $req->max_stock;
    $inst->start_quantity = $req->start_quantity;

    $inst->save();
    $strNotify = 'Edit item '.$req->name.' successfully';
    return redirect()->back()->with('notify',$strNotify);
  }

  public function getDelete($id)
  {
    $inst = WarehouseItem::find($id);
    $inst->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
