<?php

namespace App\Http\Controllers\Warehouse\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Warehouse\Facility;
use Illuminate\Support\Facades\Auth;
use Cookie;

class FacilityController extends Controller
{
  public function getList()
  {
    $facility_code = Cookie::get('facility_code');
    $facility_name = Cookie::get('facility_name');
    $query = Facility::where('id', '>', 0);
    if (!empty($facility_code)) {
      $query = $query->where('code', 'LIKE', '%'.$facility_code.'%');
    }
    if (!empty($facility_name)) {
      $query = $query->where('name', 'LIKE', '%'.$facility_name . '%');
    }
    $facilities = $query->paginate(10);
    $oldData = ['facility_name' => $facility_name,
                'facility_code' => $facility_code,
               ];
  	return view('v1.member.warehouse.facility.list', compact('facilities', 'oldData'));
  }

  public function postList(Request $req)
  {
    $facility_code = $req->code; Cookie::queue('facility_code', $facility_code, 20);
    $facility_name = $req->name; Cookie::queue('facility_name', $facility_name, 20);
    $page = Cookie::get('page');

    $query = Facility::where('id', '>', 0);
    if (!empty($facility_code)) {
      $query = $query->where('code', 'LIKE', '%'.$facility_code.'%');
    }
    if (!empty($facility_name)) {
      $query = $query->where('name', 'LIKE', '%'.$facility_name . '%');
    }
    $facilities = $query->paginate(10);
    $oldData = ['facility_name' => $facility_name,
                'facility_code' => $facility_code,
               ];
    return view('v1.member.warehouse.facility.list', compact('facilities','oldData'));
  }

  public function getAdd()
  {
  	return view('v1.member.warehouse.facility.add');
  }

  public function postAdd(Request $request)
	{
		$this->validate($request,[
          'name' => 'required',
          'code' => 'required',
      ],
      [
          'name.required'=>'Please input name',
          'code.required'=>'Please input code',
      ]);

		$facility = new Facility;
		$facility->name = $request->name;
		$facility->code = $request->code;
    $facility->description = $request->description;

		$facility->save();
		return redirect()->back()->with('notify','Add 1 facility successfully');
	}

  public function getDisplay($id)
  {
    $facility = Facility::find($id);
    return view('v1.member.warehouse.facility.display', compact('facility'));
  }

  public function getEdit($id)
  {
    $facility = Facility::find($id);
    return view('v1.member.warehouse.facility.edit', compact('facility'));
  }

  public function postEdit($id, Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
    ],
    [
      'name.required'=>'Please input name',
    ]);

    $facility = Facility::find($id);
    $facility->name = $request->name;
    $facility->code = $request->code;
    $facility->description = $request->description;
    $facility->note = $request->note;

    $facility->save();
    return redirect()->back()->with('notify','Edit successfully');
  }

  public function getDelete($id)
  {
    $facility = Facility::find($id);
    $facility->delete();
    return redirect()->back()->with('notify','Deleted successfully');
  }

}
