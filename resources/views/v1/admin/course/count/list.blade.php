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
	<h1 class="h3 mb-0 text-gray-800">Information</h1>
	<!-- <a href="v1/admin/lesson/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm"></i>  Add new lesson</a> -->
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
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All informations</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th style="width: 16%">Datetime</th>
              <th style="width: 28%">Name</th>
              <th>IP</th>
              <th>Country</th>
              <!-- <th>Iso code</th> -->
              <th>City</th>
              <th>Member</th>
              <th>Note</th>
              <th style="width: 5%">Action</th>
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
          	@foreach($counts as $key => $val)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ date('d-m-Y H:i', strtotime($val->created_at))  }}</td>
              <td>{{ $val->course_lesson->name }}</td>
              <td>{{ $val->ip }}</td>
              <td>{{ $val->country }}</td>
              <!-- <td>{{ $val->iso_code }}</td> -->
              <td>{{ $val->city }}</td>

              <td>
                @if( ! is_null($val->user_id))
                  {{ $val->user->name }}
                @endif
              </td>
              <td>{{ $val->note }}</td>
              <td>
                <!-- <a class='btn btn-info btn-sm' href="v1/admin/lesson/detail/{{ $val->id }}">
                  <i class="fas fa-th-list"></i>
                </a> -->

                <!-- <a class='btn btn-info btn-sm' href="v1/admin/lesson/edit/{{ $val->id }}"><span class="glyphicon glyphicon-edit"></span> Edit</a>  -->
                <a href="v1/admin/count/delete/{{ $val->id }}" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
              
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        {!! $counts->links() !!}
      </div>
    </div>
</div>
@endsection
@section('script')
<!-- Page level plugins -->
<!-- <script src="v1/admin/vendor/datatables/jquery.dataTables.min.js"></script> -->
<!-- <script src="v1/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

<!-- Page level custom scripts -->
<script src="v1/admin/js/demo/datatables-demo.js"></script>

@endsection