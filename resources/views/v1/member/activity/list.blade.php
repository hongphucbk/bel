@extends('v1.member.layout.index')
@section('title')
	Course
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
    Course
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
          <h3 class="box-title">Lịch sử hoạt động</h3>

          <div class="box-tools">
            <p>Hiển thị lịch sử like, dislike và comment của bạn ở các bài học</p>
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
              <th>Time</th>
              <th>Description</th>
              
              
              <th>Action</th>
            </tr>
           	<?php $i = 1; ?>
          	@foreach($likes as $key => $val)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $val->created_at }}</td>
              <td>Bạn đã like bài học
                <span class="label label-success">{{ $val->course_lesson->name }}</span> 
                trong khóa học 
                <span class="label label-primary">{{ $val->course_lesson->course_info->name }}</span> 
                </td>
              <td>
                <!-- <a class='btn btn-info btn-xs' href="v1/page/appendix/{{ $val->id }}/{{ changeTitle($val->name) }}">
                  <i class="fas fa-th-list"> Detail</i>
                </a> -->
              </td>
              
            </tr>
            <?php $i++; ?>
            @endforeach
            @foreach($dislikes as $key => $val)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $val->created_at }}</td>
              <td>Bạn đã dislike bài học
                <span class="label label-warning">{{ $val->course_lesson->name }}</span> 
                trong khóa học 
                <span class="label label-default">{{ $val->course_lesson->course_info->name }}</span> 
                </td>
              <td>
                <!-- <a class='btn btn-info btn-xs' href="v1/page/appendix/{{ $val->id }}/{{ changeTitle($val->name) }}">
                  <i class="fas fa-th-list"> Detail</i>
                </a> --> 
              </td>
              
            </tr>
            <?php $i++; ?>
            @endforeach
            <!-- Comment -->
            @foreach($comments as $key => $val)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $val->created_at }}</td>
                <td>Bạn đã <span class="label label-default">comment</span> bài học
                  <a href="v1/page/appendix/{{ $val->course_lesson->course_info->id }}/lesson/{{ $val->course_lesson->id }}/{{ changeTitle($val->course_lesson->name) }}">
                    <span class="label label-success">{{ $val->course_lesson->name }}</span>
                  </a> 
                  trong khóa học 
                  <a href="v1/page/appendix/{{ $val->course_lesson->course_info->id }}/{{ changeTitle($val->course_lesson->course_info->name) }}">
                    <span class="label label-primary">{{ $val->course_lesson->course_info->name }}</span>
                  </a>
                  nội dung 
                  <span class="label label-default">{{ $val->comment }}</span>

                </td>
                <td>
                  <!-- <a class='btn btn-info btn-xs' href="v1/page/appendix/{{ $val->id }}/{{ changeTitle($val->name) }}">
                    <i class="fas fa-th-list"> Detail</i>
                  </a> --> 
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