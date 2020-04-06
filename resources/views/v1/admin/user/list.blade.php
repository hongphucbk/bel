@extends('v1.admin.layout.index')
@section('title')
	All users
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
	<h1 class="h3 mb-0 text-gray-800">User</h1>
	<a href="v1/admin/user/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm"></i>  Add new user</a>
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
        {{ session('notification') }}                         
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Role</th>
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
          	@foreach($users as $key => $val)
            <tr>
              <td>{{ $val->id }}</td>
              <td>{{ $val->name }}</td>
              <td>{{ $val->email }}</td>

              <td>{{ $val->phone }}</td>
              <td>{{ $val->role }}</td>
              <td>{{ $val->note }}</td>
              <td>
                @if(Auth::user()->role >= 2)
                <a class='btn btn-info' href="v1/admin/user/edit/{{ $val->id }}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                @endif
                @if(Auth::user()->role >= 3)
                <a href="v1/admin/user/delete/{{ $val->id }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
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