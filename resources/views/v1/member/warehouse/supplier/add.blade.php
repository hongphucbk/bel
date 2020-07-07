@extends('v1.member.layout.index')
@section('title')
	Facility
@endsection
@section('module-code')
  STC011
@endsection
@section('module-name')
  Add new category
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
      <form method="post" action="v1/member/warehouse/supplier/add">
        @csrf
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Code *</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="code" placeholder="Supplier code">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Name *</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="name" placeholder="Supplier name">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Tax ID</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="tax_id_number" placeholder="Tax ID">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="description" placeholder="Description">
          </div>

        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Phone</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Email</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="email" placeholder="Email">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Address</label>
          <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" name="address" placeholder="Address">
          </div>


        </div>

        

        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Contact name</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="contact_name" placeholder="Contact name">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Account No.</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="account_number" placeholder="Acount Number">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Bank name.</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="bank" placeholder="Bank">
          </div>
        </div>

        <div class="form-group row">
          <label class="form-check-label col-sm-1" for="gridCheck">
                Is Alarm
          </label>
          <div class="form-check col-sm-1">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="is_alarm">
          </div>

          <label class="form-check-label col-sm-1" for="gridCheck">
                Is Active
          </label>
          <div class="form-check col-sm-1">
            <input class="form-check-input" type="checkbox" checked="" id="gridCheck" name="is_active">
            
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