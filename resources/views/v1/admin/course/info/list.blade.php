@extends('v1.admin.layout.index')
@section('title')
	Category List
@endsection
@section('css')
	<!-- Custom styles for this page -->
	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Info</h1>
	<a href="v1/admin/info/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm"></i>  Add new info</a>
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
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Info</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th style="width: 20%">Name</th>
              <th>Category</th>
              <th>Duration (h) </th>
              <th>Price (VND)</th>
              <th>Pro. price</th>
              <th>Priority</th>
              <th>Display</th>
              <th>Note</th>
              <th style="width: 15%">Action</th>
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
          	@foreach($infos as $key => $val)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $val->name }}</td>
              <td>{{ $val->course_category->name }}</td>
              <td>{{ $val->duration }}</td>
              <td>{{ $val->price }}</td>
              <td>{{ $val->promote_price }}</td>
              <td>{{ $val->priority }}</td>
              <td>{{ $val->is_display }}</td>
              <td>{{ $val->note }}</td>
              <td>
                <a class='btn btn-info btn-sm' href="v1/admin/info/detail/{{ $val->id }}">
                  {{get_Total_Lesson($val->id)}}
                  <i class="fas fa-th-list"></i>
                  
                </a>
                
                @if(is_admin_edit_course_info($val->id))
                  <a class='btn btn-info' href="v1/admin/info/edit/{{ $val->id }}"><i class="fas fa-edit"></i></a>
                @endif
                @if(is_admin_delete_course_info($val->id))
                  <a href="v1/admin/info/delete/{{ $val->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                @endif
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