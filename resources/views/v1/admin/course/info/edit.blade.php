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
	<h1 class="h3 mb-0 text-gray-800">Info</h1>
	<a href="v1/admin/info" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Info List</a>
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
<form action="v1/admin/info/edit/{{ $info->id }}" method="post">
  @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label>Category</label>
      <select class="form-control" name="course_category_id">
        <option>--- Please select ---</option>
        @foreach($categories as $key => $val)
          <option value="{{ $val->id }}"
            @if($val->id == $info->course_category_id)
              selected=""
            @endif
            >{{ $val->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3 mb-3">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name..." value="{{ $info->name }}">
    </div>
    <div class="col-md-2 mb-3">
      <label>Duration (Hours)</label>
      <input type="text" class="form-control" name="duration" placeholder="Ex 2 hours" value="{{ $info->duration }}">
    </div>
    <div class="col-md-2 mb-3">
      <label>Prices (VND)</label>
      <input type="text" class="form-control" name="price" placeholder="Ex 2000000" value="{{ $info->price }}">
    </div>

    <div class="col-md-2 mb-3">
      <label>Promote Prices (VND)</label>
      <input type="text" class="form-control" name="promote_price" placeholder="Ex 1500000" value="{{ $info->promote_price }}">
    </div>

    <div class="col-md-2 mb-3">
      <label>Professor</label>
      <input type="text" class="form-control" name="professor" placeholder="Professor ..." value="{{ $info->professor }}">
    </div>

    <div class="col-md-3 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note" value="{{ $info->note }}">
    </div>

  </div>
  <button class="btn btn-primary" type="submit">Edit</button>
</form>
@endsection
@section('script')
<!-- Page level plugins -->
<script src="v1/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="v1/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="v1/admin/js/demo/datatables-demo.js"></script>

@endsection