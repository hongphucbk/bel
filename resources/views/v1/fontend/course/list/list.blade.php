@extends('v1.fontend.course.list.layout.index')
@section('title')
	{{ $info->name }}
@endsection
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
@section('css')
<style>
  hr{
    margin-bottom: 3px;
    margin-top: 3px;
  }
</style>

@endsection
@section('content')
	<div class="container">
    <section id="top" class="section">
      <div class="row">
        <div class="col-md-12">
            <div class="big-title text-center">
              <img src="img/industrial_iot.png" alt="{{ $namePage }}" width="220px">
              
              <p class="lead" style="margin-bottom: 5px;">Khóa học <span style="color: blue">{{ $info->name }}</span></p>
            </div>
            <!-- end title -->
        </div>
      </div>
      <hr>
    </section>
    <!-- end section -->
</div>
<!-- // end container -->
<div class="container">
    <div class="row col-md-12">
    <table class="table table-striped custab">
      <thead>
        <a class="pull-left"><h3>DANH SÁCH BÀI HỌC</h3></a>
        <a href="#" class="btn btn-primary btn-xs pull-right"><span><i class="fas fa-home"></i></span> Back to </a>
        <tr>
          <th>#</th>
          <th>Bài</th>
          <th>Nội dung</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      	<?php $i = 1; ?>
      	@foreach($lessons as $key => $val)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $val->name }}</td>
            <td>{{ $val->content }}</td>
            <td class="text-center">
            	<a class='btn btn-info btn-xs' href="v1/page/appendix/{{ $info->id }}/lesson/{{ $val->id }}"><span class="glyphicon glyphicon-eye-open"></span> Xem</a>
            </td>
          </tr>
        <?php $i++; ?>
        @endforeach
    </table>
    </div>
</div>

@endsection

@section('script')
  
@endsection