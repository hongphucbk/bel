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
	<a href="v1/admin/product/info" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Info List</a>
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
<form action="v1/admin/product/info/add" method="post">
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
    <div class="col-md-2 mb-3">
      <label>Rate</label>
      <select class="form-control" name="rate">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5" selected="">5</option>
      </select>
    </div>
    <div class="col-md-2 mb-3">
      <label>Prices (VND)</label>
      <input type="text" class="form-control" name="price" placeholder="Ex 2000000">
    </div>

    <div class="col-md-2 mb-3">
      <label>Promote Prices (VND)</label>
      <input type="text" class="form-control" name="promote_price" placeholder="Ex 1500000">
    </div>

    <!-- <div class="col-md-2 mb-3">
      <label>Professor</label>
      <input type="text" class="form-control" name="professor" placeholder="Professor ...">
    </div> -->

    <div class="col-md-3 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note">
    </div>

    <div class="col-md-10 mb-12">
      <label>File ảnh (210 x 190) (Tên file không có ký tự đặc biệt !@#$%^&*(),... Dung lượng tối đa 8MB)</label>
      <div class="input-group input-file" name="filelink">
        <span class="input-group-btn">
              <button class="btn btn-default btn-choose" type="button">Choose</button>
          </span>
          <input type="text" class="form-control" placeholder='Choose a file...' name="filelink" />
          <span class="input-group-btn">
               <button class="btn btn-warning btn-reset" type="button">Reset</button>
          </span>
      </div>
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