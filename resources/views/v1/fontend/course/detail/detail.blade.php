@extends('v1.fontend.course.detail.layout.index')
@section('title')
	{{ $info->name }}
@endsection
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
@section('css')
<style>

</style>

@endsection
@section('content')
<div id="wrapper">
  <div class="container">
    <section id="top" class="">
      <div class="row">
        <div class="col-md-12">
          <div class="big-title text-center">
            <h1><span><img src="img/codedaoplc.png" alt="Code dao PLC" width="200px"></span>  
              {{ $lesson->name }}</h1>
            <p class="lead">Khóa học <span style="color: blue">{{ $info->name }}</span></p>
          </div>
        </div>
      </div>
      <hr>
    </section>
    <!-- end section -->

    <div class="row">
      <div class="col-md-3">
          <nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200" role="navigation">
              <ul class="nav">
                @foreach($contents as $key => $val)
                  <li><a href="{{ url()->current() }}#line{{$val->id}}">{{ $val->title }}</a></li>                  
                @endforeach
                <li><a href="{{ url()->current() }}#lineCopy">Copyright and license</a></li>
              </ul>
          </nav >
      </div>
      <div class="col-md-9">
        @foreach($contents as $key => $val)
        <section id="line{{$val->id}}">
            <div class="row">
                <div class="col-md-12 left-align">
                    <h2 class="dark-text">{{ $val->title }} <a href="#top">#back to top</a><hr></h2>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
              <div class="col-md-12">
                {!! $val->content !!}
              

              </div>
            </div>
        </section>
        @endforeach

        <section id="lineCopy">
          <div class="row">
              <div class="col-md-12 left-align">
                  <h2 class="dark-text">Copyright and license <a href="#top">#back to top</a><hr></h2>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p>For more information about copyright and license check <a href="#" target="_blank">Code dao plc</a></p>
            
            </div>
          </div>
        </section>
          <!-- end section -->
      </div>
        <!-- // end .col -->

    </div>
    <!-- // end .row -->

  </div>
  <!-- // end container -->
</div>
<!-- end wrapper -->

@endsection
@section('script')
  
@endsection