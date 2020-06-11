<?php

namespace App\Http\Controllers\Warehouse\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Facility;
use App\Model\Warehouse\Warehouse;
use Illuminate\Support\Facades\Auth;
use Cookie;

class WarehouseController extends Controller
{
  public function getList()
  {
    $warehouse_code = Cookie::get('warehouse_code');
    $warehouse_name = Cookie::get('warehouse_name');
    $query = Warehouse::where('id', '>', 0);
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
  	return view('v1.member.warehouse.warehouse.list', compact('warehouses', 'oldData'));
  }

  public function postList(Request $req)
  {
    $warehouse_code = $req->code; Cookie::queue('warehouse_code', $warehouse_code, 20);
    $warehouse_name = $req->name; Cookie::queue('warehouse_name', $warehouse_name, 20);
    $page = Cookie::get('page');

    $query = Warehouse::where('id', '>', 0);
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
    return view('v1.member.warehouse.warehouse.list', compact('warehouses','oldData'));
  }

  public function getAdd()
  {
    $facilities = Facility::where('is_active', 1)->get();
  	return view('v1.member.warehouse.warehouse.add', compact('facilities'));
  }

  public function postAdd(Request $req)
	{
		$this->validate($req,[
          'name' => 'required',
      ],
      [
          'name.required'=>'Please input name',
      ]);

		$warehouse = new Warehouse;
		$warehouse->name = $req->name;
		$warehouse->code = $req->code;
    $warehouse->address = $req->address;
    $warehouse->facility_id = $req->facility_id;
    $warehouse->description = $req->description;

		$warehouse->save();
		return redirect()->back()->with('notify','Add 1 warehouse successfully');
	}

  public function getDisplay($id)
  {
    $facilities = Facility::where('is_active', 1)->get();
    $warehouse = Warehouse::find($id);
    return view('v1.member.warehouse.warehouse.display', compact('facilities', 'warehouse'));
  }

  public function getEdit($id)
  {
    $facilities = Facility::where('is_active', 1)->get();
    $warehouse = Warehouse::find($id);
    return view('v1.member.warehouse.warehouse.edit', compact('facilities', 'warehouse'));
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

    $warehouse = Warehouse::find($id);
    $warehouse->name = $req->name;
    $warehouse->code = $req->code;
    $warehouse->address = $req->address;
    $warehouse->facility_id = $req->facility_id;
    $warehouse->description = $req->description;

    $warehouse->save();
    return redirect()->back()->with('notify','Edit successfully');
  }

  public function getDelete($id)
  {
    $warehouse = Warehouse::find($id);
    $warehouse->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
