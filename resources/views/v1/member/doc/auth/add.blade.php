@extends('v1.member.layout.index')
@section('title')
	Role
@endsection
@section('module-code')
  DMS022
@endsection
@section('module-name')
  Connect new role
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
  @include('v1.member.doc.auth.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/doc/auth/add">
        @csrf
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">User</label>
          <div class="col-sm-3">
            <select class="form-control form-control-sm" name="user_id">
              @foreach($users as $key => $val)
              <option value="{{ $val->id }}">{{ $val->id }} - {{ $val->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Role</label>
          <div class="col-sm-3">
            <select class="form-control form-control-sm" name="role_id">
              @foreach($roles as $key => $val)
              <option value="{{ $val->id }}">{{ $val->id }} - {{ $val->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Note</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="note" placeholder="note">
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