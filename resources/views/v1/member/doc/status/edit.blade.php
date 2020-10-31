@extends('v1.member.layout.index')
@section('title')
	Facility
@endsection
@section('module-code')
  STF012
@endsection
@section('module-name')
  Edit facility
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
  @include('v1.member.doc.status.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/doc/status/edit/{{ $category->id }}">
        @csrf
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Code</label>
          <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" name="code" placeholder="Facility code" value="{{ $category->code }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Name</label>
          <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" name="name" placeholder="Facility name" value="{{ $category->name }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="description" placeholder="Facility description" value="{{ $category->description }}">
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Label</label>
          <div class="col-sm-1">
            <input type="text" class="form-control form-control-sm" name="label" placeholder="label" value="{{ $category->label }}">
          </div>

          <span style="margin-top: 12px;" class="badge badge-{{$category->label}}">{{$category->code}} - {{$category->name}}</span>
        </div>

        <!-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> -->
        <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</button>
      </form>
    </div> 
  </div>

  <hr>
  Note: Label = primary, secondary, success, danger, warning, info, light, dark

</div>


@endsection
@section('script')
<!-- Page level plugins -->



@endsection