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
  @include('v1.member.warehouse.supplier.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/warehouse/supplier/edit/{{ $supplier->id }}">
        @csrf
        
        @include('v1.member.warehouse.supplier.common.infor')

        <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</button>
      </form>
    </div> 
  </div>

  <hr>
  

</div>


@endsection
@section('script')
<!-- Page level plugins -->



@endsection