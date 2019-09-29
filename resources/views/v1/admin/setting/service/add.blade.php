@extends('v1.admin.layout.index')
@section('title')
	Category List
@endsection
@section('css')
	<!-- Custom styles for this page -->
  	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Setting Service</h1>
	<a href="v1/admin/setting/service" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Home</a>
</div>
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($error->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif

@if(session('notification'))
    <div class="alert alert-success">
        {{session('notification')}}                         
    </div>
@endif
<form action="v1/admin/setting/service/add" method="post">
  @csrf
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name...">
    </div>
    <div class="col-md-9 mb-3">
      <label>Description</label>
      <input type="text" class="form-control" name="description" placeholder="Description">
    </div>
    <div class="col-md-2 mb-3">
      <label>Icon</label>
      <input type="text" class="form-control" name="icon" placeholder="fas fa-gem">
    </div>
    <div class="col-md-4 mb-3">
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