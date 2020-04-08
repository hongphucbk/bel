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

  <!-- daterange picker -->
  <link rel="stylesheet" href="v1/member/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="v1/member/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
      

    </div>
  </div>

  <div class="row">
    <!-- /.col (left) -->
    <div class="col-md-6">
    	<div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">New Request</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	@if(count($errors)>0)
				    <div class="alert alert-danger alart-hide-5s">
				        @foreach($errors->all() as $err)
				            {{$err}}<br>
				        @endforeach
				    </div>
					@endif

					@if(session('notify'))
				    <div class="alert alert-success alart-hide-5s">
				      {{session('notify')}}                         
				    </div>
					@endif

          <form role="form" action="{{ url()->current() }}" method="post">
          	@csrf
          	<!-- select -->
            <div class="form-group">
              <label>Select category (*)</label>
              <select class="form-control" name="category_id">
              	<option>--- Please select category ---</option>
              	@foreach($categories as $key => $val)
                	<option value="{{ $val->id }}">{{ $val->name }}</option>
                @endforeach
                
              </select>
            </div>
            <!-- text input -->
            <div class="form-group">
              <label>Tóm tắt (*)</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="title">
            </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Nội dung (*)</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..." name="content"></textarea>
            </div>
            <button type="submit">Submit</button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>

      <!-- <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Date picker</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Date:</label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker">
            </div>
          </div>
        
        </div>
        
      </div> -->
    </div>

    <div class="col-md-6">
    	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Hướng dẫn</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	Các nội dung có dấu (*) là bắt buộc phải điền.


          

        </div>
        <!-- /.box-body -->
      </div>

      <!-- <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Date picker</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Date:</label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker">
            </div>
          </div>
        
        </div>
        
      </div> -->
    </div>
    
  </div>

</section>


@endsection
@section('script')

<!-- date-range-picker -->
<script src="v1/member/moment/min/moment.min.js"></script>
<script src="v1/member/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="v1/member/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
	//Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>


@endsection