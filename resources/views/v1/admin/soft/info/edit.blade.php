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
	<a href="v1/admin/soft/info" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Info List</a>
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
<form action="v1/admin/soft/info/edit/{{ $info->id }}" method="post">
  @csrf
  <div class="form-row">
    
    <div class="col-md-3 mb-3">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name..." value="{{ $info->name }}">
    </div>

    <div class="col-md-9 mb-3">
      <label>Description</label>
      <input type="text" class="form-control" name="description" placeholder="Description ..." value="{{ $info->description }}">
    </div>

    <div class="col-md-2 mb-3">
      <label>Rate</label>
      <select class="form-control" name="rate">
        @for($i = 1; $i <= 10; $i++)
          <option value="{{ $i }}"
            @if($i == $info->rate)
              selected=""
            @endif
            >{{ $i }}</option>
        @endfor
      </select>
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