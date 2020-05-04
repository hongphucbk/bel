@extends('v1.admin.layout.index')
@section('title')
	Category List
@endsection
@section('css')
	<!-- Custom styles for this page -->
  <link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style type="text/css">
    td, .btn{
      padding-top: 1px !important;
      padding-bottom: 1px !important;
    }
  </style>
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Content Type</h1>
	<a href="v1/admin/course/content_type/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm"></i>  Add new type</a>
</div>

@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif

@if(session('notify'))
    <div class="alert alert-success">
        {{session('notify')}}                         
    </div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Code</th>
              <th>Label</th>
              <th style="width: 10%">Is active</th>
              <th>Priority</th>
              <th>Note</th>
              <th>Action</th>
            </tr>
          </thead>
          <!-- <tfoot>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Note</th>
              <th>Action</th>
            </tr>
          </tfoot> -->
          <tbody>
          	<?php $i = 1; ?>
          	@foreach($types as $key => $val)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $val->name }}</td>
              <td>{{ $val->code }}</td>
              <td>{{ $val->label }}</td>
              <td>{{ $val->is_active }}</td>
              <td>{{ $val->priority }}</td>
              <td>{{ $val->note }}</td>
              <td>
                <a class='btn btn-info btn-sm' href="v1/admin/course/content_type/edit/{{ $val->id }}">
                  <i class="fas fa-edit"></i>
                </a> 
                <a href="v1/admin/course/content_type/delete/{{ $val->id }}" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
              
            </tr>
            <?php $i++; ?>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
@section('script')
<!-- Page level plugins -->
<script src="v1/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="v1/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="v1/admin/js/demo/datatables-demo.js"></script>

@endsection