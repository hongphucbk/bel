@extends('v1.admin.layout.index')
@section('title')
	Activity
@endsection
@section('css')
	<!-- Custom styles for this page -->
	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Activity</h1>
	<a href="v1/admin/course/activity" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Activity List</a>
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
<form action="v1/admin/course/activity/edit/{{ $activity->id }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-row">
    <div class="col-md-2 mb-3">
      <label>User</label>
      <select class="form-control" name="user_id">
        <option>--- Please select ---</option>
        @foreach($users as $key => $val)
          <option value="{{ $val->id }}"
            @if($val->id == $activity->user_id)
              selected
            @endif
            >{{ $val->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-4 mb-3">
      <label>Khóa học (Info)</label>
      <select class="form-control" name="course_info_id">
        <option>--- Please select ---</option>
        @foreach($infos as $key => $val)
          <option value="{{ $val->id }}"
            @if($val->id == $activity->user_id)
              selected
            @endif
            >{{ $val->name }}</option>
        @endforeach
      </select>
    </div>
    
    <div class="col-md-2 mb-3">
      <label>Paid</label>
      <input type="text" class="form-control" name="paid" placeholder="1/0" value="{{ $activity->paid }}">
    </div>

    <div class="col-md-2 mb-3">
      <label>Price</label>
      <input type="text" class="form-control" name="price" placeholder="VND" value="{{ $activity->price }}">
    </div>
    
    <div class="col-md-3 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note" value="{{ $activity->note }}">
    </div>

    <div class="col-md-2 mb-3">
      <label>Deadline (dd-mm-yyyy) </label>
      <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
        <input class="form-control" type="text" name="deadline" readonly value="{{ $activity->deadline }}" />
        <span class="input-group-addon"></span>
        <!-- <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span> -->
      </div>
    </div>

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
<script>
  $(function() {
    bs_input_file();
  });

  function bs_input_file() {
    $(".input-file").before(
      function() {
        if ( ! $(this).prev().hasClass('input-ghost') ) {
          var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
          element.attr("name",$(this).attr("name"));
          element.change(function(){
            element.next(element).find('input').val((element.val()).split('\\').pop());
          });
          $(this).find("button.btn-choose").click(function(){
            element.click();
          });
          $(this).find("button.btn-reset").click(function(){
            element.val(null);
            $(this).parents(".input-file").find('input').val('');
          });
          $(this).find('input').css("cursor","pointer");
          $(this).find('input').mousedown(function() {
            $(this).parents('.input-file').prev().click();
            return false;
          });
          return element;
        }
    });
  };
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
  $(function () {
    $("#datepicker").datepicker({ 
          autoclose: true, 
          todayHighlight: true,
          format: 'dd-mm-yyyy'
    }).datepicker('update', new Date('{{$activity->deadline}}'));
  });


</script>
@endsection