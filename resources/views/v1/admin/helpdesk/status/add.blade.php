@extends('v1.admin.layout.index')
@section('title')
	Status add
@endsection
@section('css')
	<!-- Custom styles for this page -->
  	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Helpdesk</h1>
	<a href="v1/admin/helpdesk/status" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Status List</a>
</div>
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($error->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif

@if(session('notify'))
    <div class="alert alert-success">
        {{session('notify')}}                         
    </div>
@endif
<form action="v1/admin/helpdesk/status/add" method="post">
  @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name...">
    </div>
    <div class="col-md-2 mb-3">
      <label>Code</label>
      <input type="text" class="form-control" name="code" placeholder="Code...">
    </div>
    <div class="col-md-4 mb-3">
      <label>Label</label>
      <input type="text" class="form-control" name="label" placeholder="Label...">
    </div>
    <div class="col-md-4 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note...">
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