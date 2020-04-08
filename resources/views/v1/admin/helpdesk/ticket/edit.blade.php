@extends('v1.admin.layout.index')
@section('title')
	Category Edit
@endsection
@section('css')
	<!-- Custom styles for this page -->
  	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style type="text/css">
      .cl-gr{
        color: green;
      }
    </style>
    <style type="text/css">
    td,th, .btn{
      padding-top: 1px !important;
      padding-bottom: 1px !important;
      padding-left: 3px !important;
      padding-right: 3px !important;
    }
    th{
      color: white;
      background-color: green;
    }
  </style>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Helpdesk - <span style="color:green">{{ $ticket->title }}</span> </h1>
	<a href="v1/admin/helpdesk/ticket" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> All ticket</a>
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
<div class="col-md-12 mb-3 form-row">
  <h6 class="font-weight-bold text-primary"></h6>
  <div class="col-md-5 mb-3">
    <label>Title</label>
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$ticket->title}}">
  </div>

  <div class="col-md-5 mb-3">
    <label>Content</label>
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$ticket->content}}">
  </div>
  <div class="col-md-12 mb-3">
    <label>Raised by <span class="cl-gr">{{ $ticket->user->name }}</span> 
      - Phone <span class="cl-gr">{{ $ticket->user->phone }}</span> 
      - Email <span class="cl-gr">{{ $ticket->user->email }}</span></label>
    <label>Created at  <span class="cl-gr">{{ $ticket->created_at }}</span></label>
  </div>

</div>
<hr>
<div class="col-md-12 mb-3 form-row">
  <table class="table table-bordered">
    <tr> 
      <th>ID</th>
      <th style="width: 40%">Solution</th>
      <th>Status</th>
      <th style="width: 20%">Created at</th>
      <th>Action</th>
    </tr>
    @foreach($activities as $key => $val)
    <tr>
      <td>{{ $val->id }}</td>
      <td>{{ $val->solution }}</td>
      <td>{{ $val->status->name }}</td>
      <td>{{ $val->created_at }}</td>
      <td>
        <a href="v1/admin/helpdesk/ticket/activity/delete/{{$val->id}}/"><i class="fa fa-fw fa-trash"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
<hr>

<form action="v1/admin/helpdesk/ticket/edit/{{ $ticket->id }}" method="post">
  @csrf
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label>Solution</label>
      <input type="text" class="form-control" name="solution" placeholder="Solution..." value="">
    </div>

    <div class="col-md-2 mb-3">
      <label>Status</label>
      <select class="form-control" name="status_id">
        @foreach($statuses as $key => $val)
          <option value="{{ $val->id }}">{{ $val->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-2 mb-3">
      <label>Assign to</label>
      <select class="form-control" name="assign_id">
        @foreach($admin_users as $key => $val)
          <option value="{{ $val->id }}" 
            @if(Auth::user()->id == $val->id)
              selected=""
            @endif
            >{{ $val->name }}</option>
        @endforeach
      </select>
    </div>


    <!-- <div class="col-md-4 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note" value="{{$ticket->note}}">
    </div> -->

  </div>
  <button class="btn btn-primary btn-sm" type="submit">Edit</button>
</form>
@endsection
@section('script')
<!-- Page level plugins -->
<script src="v1/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="v1/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="v1/admin/js/demo/datatables-demo.js"></script>

@endsection