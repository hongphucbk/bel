@extends('v1.member.layout.index')
@section('title')
	Facility
@endsection
@section('module-code')
  STW012
@endsection
@section('module-name')
  Add new Warehouse 
@endsection

@section('css')
	<!-- Custom styles for this page -->
	<!-- <link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <style type="text/css">
    td, .btn{
      padding-top: 1px !important;
      padding-bottom: 1px !important;
      padding-left: 5px !important;
      padding-right: 5px !important;
    }
  </style>
@endsection

@section('menu2')
  @include('v1.member.warehouse.warehouse.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/warehouse/warehouse/add">
        @csrf
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Facility</label>
          <div class="col-sm-2">
            <select name="facility_id" class="form-control form-control-sm">
              @foreach($facilities as $key => $val)
              <option value="{{ $val->id }}">{{ $val->name }}</option>
              @endforeach
            </select>
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Code</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="code" placeholder="Warehouse code">
          </div>

          <label class="col-sm-1 col-form-label  text-right col-form-label-sm">Name</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="name" placeholder="Warehouse name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
          <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" name="description" placeholder="Warehouse description">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Address</label>
          <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" name="address" placeholder="Address">
          </div>

        </div>
        
        <!-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> -->
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div> 
  </div>

  <hr>
  

</div>


@endsection
@section('script')
<!-- Page level plugins -->



@endsection