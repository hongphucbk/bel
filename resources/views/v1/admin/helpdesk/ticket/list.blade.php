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
      padding-left: 3px !important;
    }
  </style>
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Helpdesk</h1>
	<!-- <a href="v1/admin/helpdesk/category/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm"></i>  Add new category</a> -->
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
      <h6 class="m-0 font-weight-bold text-primary">All ticket</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Raised by</th>
              <th style="width: 30%">Title</th>
              <th>Assign to</th>
              <th>Status</th>
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
          	@foreach($tickets as $key => $val)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $val->user->name }}</td>
              <td>{{ $val->title }}</td>
              <td>
                @if( $val->assign_id > 0)
                  {{ $val->assign->name }}
                @endif
              </td>
              <td>
                {!! get_status_activity_helpdesk($val->id) !!}
              </td>
              <td>
                <a class='btn btn-info btn-sm' href="v1/admin/helpdesk/ticket/edit/{{ $val->id }}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                <a href="v1/admin/helpdesk/category/delete/{{ $val->id }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span> Delete</a>
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