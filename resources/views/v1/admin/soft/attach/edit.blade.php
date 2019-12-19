@extends('v1.admin.layout.index')
@section('title')
	Product Attach
@endsection
@section('css')
	<!-- Custom styles for this page -->
  	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Attach Edit</h1>
	<a href="v1/admin/soft/attach" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Attach List</a>
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
<form action="v1/admin/soft/attach/edit/{{ $attach->id }}" method="post">
  @csrf
  <div class="form-row">

    <div class="col-md-3 mb-3">
      <label>Info</label>
      <select class="form-control" name="info_id">
        <option>--- Please select ---</option>
        @foreach($infos as $key => $val)
          <option value="{{$val->id}}"
            @if($val->id == $attach->info_id)
              selected=""
            @endif
            >{{ $val->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-3 mb-3">
      <label>Name (20 chars)</label>
      <input type="text" class="form-control" name="name" placeholder="Name..." value="{{ $attach->name }}">
    </div>
    <div class="col-md-3 mb-3">
      <label>Name (20 chars)</label>
      <input type="text" class="form-control" name="description" placeholder="Description..." value="{{ $attach->description }}">
    </div>
    <div class="col-md-6 mb-3">
      <label>Link (200 chars)</label> 
      <input type="text" class="form-control" name="link" placeholder="Link..." value="{{ $attach->link }}">
    </div>
    <div class="col-md-6 mb-3">
      <label>Link QC (200 chars)</label> 
      <input type="text" class="form-control" name="link_qc" placeholder="Link qc..." value="{{ $attach->link_qc }}">
    </div>
    <div class="col-md-3 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note" value="{{ $attach->note }}">
    </div>

    <!-- <div class="col-md-12 mb-3">
      <label>Content</label>
      <textarea name="content" id="editor"></textarea>
    </div> -->

    

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