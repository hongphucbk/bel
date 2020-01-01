@extends('v1.admin.layout.index')
@section('title')
	Add new user
@endsection
@section('css')
	<!-- Custom styles for this page -->
  	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">User</h1>
	<a href="v1/admin/user" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> User List</a>
</div>
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif

@if(session('notification'))
    <div class="alert alert-success">
        {{session('notification')}}                         
    </div>
@endif
<form action="v1/admin/user/add" method="post">
  @csrf
  <div class="form-row">
    <!-- <div class="col-md-4 mb-3">
      <label>Category</label>
      <select class="form-control" name="course_category_id">
        <option>--- Please select ---</option>
        @/foreach($ - categories as $key => $val)
          <option value=" 1$val->id ">s$val->name </option>
        @endf /oreach
      </select>
    </div> -->
    <div class="col-md-3 mb-3">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name...">
    </div>
    <div class="col-md-3 mb-3">
      <label>Email</label>
      <input type="text" class="form-control" name="email" placeholder="Email ...">
    </div>
    <div class="col-md-3 mb-3">
      <label>Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password ...">
    </div>
    <div class="col-md-3 mb-3">
      <label>Password Again</label>
      <input type="password" class="form-control" name="password" placeholder="Password again...">
    </div>
    <div class="col-md-3 mb-3">
      <label>Phone</label>
      <input type="text" class="form-control" name="phone" placeholder="Phone...">
    </div>
    <div class="col-md-3 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note">
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Add</button>
</form>
@endsection
@section('script')
<!-- Page level plugins -->
<script src="v1/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="v1/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="v1/admin/js/demo/datatables-demo.js"></script>

@endsection