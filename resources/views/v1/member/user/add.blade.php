@extends('v1.member.layout.index')
@section('title')
	User
@endsection
@section('module-code')
  CSU012
@endsection
@section('module-name')
  Add new user
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
  @include('v1.member.user.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/user/add">
        @csrf
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Name *</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="name" placeholder="name">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm">Email *</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="email" placeholder="email">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm">Phone</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="phone" placeholder="phone">
          </div>


        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Password *</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="password" placeholder="password">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm">Password Again *</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="password" placeholder="password">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm">Role</label>
          <div class="col-sm-2">
            <select class="form-control form-control-sm" name="role">
              <option value="1" selected="">Member (default)</option>
              <option value="4">Admin</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="description" placeholder="description">
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
  <p>Role: Chỉ role để đăng nhập cho toàn hệ thống (Có 2 quyền User và Admin). User muốn phân quyền vào ứng dụng nào vui lòng Chọn function 'Connect role' cho user với quyền tương ứng của mỗi module.</p>

</div>


@endsection
@section('script')
<!-- Page level plugins -->



@endsection