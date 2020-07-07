@extends('v1.member.layout.index')
@section('title')
	Warehouse
@endsection
@section('module-code')
  STW012
@endsection
@section('module-name')
  Item Edit 
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

    .input-50{
      width: 160px !important;
    }
  </style>
@endsection

@section('menu2')
  @include('v1.member.warehouse.warehouse_item.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/warehouse/warehouse_item/edit/{{ $inst->id }}">
        @csrf
        @include('v1.member.warehouse.warehouse_item.common.infor')

        <!-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> -->
        <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</button>
        <a href="v1/member/warehouse/warehouse_item">
          <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-home"></i> Home</button>
        </a>
      </form>

      <div class="form-group">
        <div class="col-sm-5">
          
        </div>
      </div>
    </div>
    
    
  </div>
  <hr>
  

</div>


@endsection
@section('script')
<!-- Page level plugins -->



@endsection