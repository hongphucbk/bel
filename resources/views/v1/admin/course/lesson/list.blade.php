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
      padding-left: 4px !important;
      padding-right: 4px !important;
    }
  </style>
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Lesson</h1>
	<a href="v1/admin/lesson/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm"></i>  Add new lesson</a>
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
      <h6 class="m-0 font-weight-bold text-primary">All Lession</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 2%">#</th>
              <th style="width: 30%">Name</th>
              <th>Category</th>
              <!-- <th>Content</th> -->
              <th>View</th>
              <!-- <th>-</th> -->
              <th>Note</th>
              <th style="width: 10%">Action</th>
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
          	@foreach($lessons as $key => $val)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $val->name }}</td>
              <td>{{ $val->course_info->name }}</td>
              <!-- <td>{{ $val->content }}</td> -->
              <!-- <td>{{ $val->price }}</td> -->
              <td>{{ get_total_view_lesson_course($val->id) }} -
              {{ get_member_view_lesson_course($val->id) }}</td>
              <td>{{ $val->note }}</td>
              <td>
                <a class='btn btn-info btn-sm' href="v1/admin/lesson/detail/{{ $val->id }}">
                  <i class="fas fa-th-list"></i>
                </a>
                <a class='btn btn-info btn-sm' href="v1/admin/lesson/edit/{{ $val->id }}"><i class="fas fa-edit"></i></a> 
                <a href="v1/admin/lesson/delete/{{ $val->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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