@extends('v1.member.layout.index')
@section('title')
	Ticket
@endsection
@section('css')
	<!-- Custom styles for this page -->
	<!-- <link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
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

<section class="content-header">
  <h1>
    Helpdesk
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <!--------------------------
    | Your Page Content Here |
    -------------------------->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách ticket</h3>
          <a href="v1/member/helpdesk/ticket/add">
          	<span style="float: right;" class="label label-primary">New ticket</span>
          </a>
          <div class="box-tools">
            <!-- <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div> -->
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Content</th>
              <th>Created at</th>
              <th>Assign to</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
           	<?php $i = 1; ?>
          	@foreach($tickets as $key => $val)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $val->title }}</td>
              <td>{{ $val->content }}</td>
              <td>{{ $val->created_at }}</td>
              
              <td>
                @if( $val->assign_id > 0 )
                  {{ $val->assign->name }}
                @endif
              </td>
              <td>{!! get_status_activity_helpdesk($val->id) !!}</td>
              <td>
                <a class='btn btn-info btn-xs' href="v1/member/helpdesk/ticket/detail/{{ $val->id }}">
                  <i class="fas fa-th-list"> Detail</i>
                </a>
              </td>
              
            </tr>
            <?php $i++; ?>
            @endforeach
           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>

</section>


@endsection
@section('script')
<!-- Page level plugins -->



@endsection