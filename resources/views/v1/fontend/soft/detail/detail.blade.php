@extends('v1.fontend.course.detail.layout.index')
@section('title')
	{{ $info->name }}
@endsection
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
@section('css')
<style>
  hr{
    margin-top: 1px !important;
    margin-bottom: 5px !important;
    width: 260px !important;
  }
</style>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
@endsection
@section('content')
<div id="wrapper">
  <div class="container" style="width: 100%">
    <section id="top" class="">
      <div class="row">
        <div class="col-md-12">
          <div class="big-title text-center">
            <h1><img src="img/codedaoplc.png" alt="Code dao PLC" width="200px"></span></h1>
            
            <h2>Phần mềm: <span style="color: green; font-size: 26px">{{ $info->name }}</span></h2>
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
                <li><a href="{{ url()->current() }}#lineDownload">Download/ Tải phần mềm</a></li>
                <li><a href="{{ url()->current() }}#lineCopy">Copyright and license</a></li>
              </ul>
          </nav >
      </div>
      <div class="col-md-9">
        @foreach($contents as $key => $val)
        <section id="line{{$val->id}}">
            <div class="row">
                <div class="col-md-12 left-align">
                    <h2 class="dark-text">{{ $val->title }} <a href="{{ url()->current() }}#top">#back to top</a><hr></h2>
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

        <section id="lineDownload">
          <div class="row">
              <div class="col-md-12 left-align">
                  <h2 class="dark-text">Download/ Tải phần mềm <a href="{{ url()->current() }}#top">#back to top</a><hr></h2>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p>Link download</p>
              <table id="customers">
              <tr>
                <th style="width: 5%">STT</th>
                <th>Name</th>
                <th>Description</th>
                <th>Link 1</th>
                <th>Link 2</th>
                <th style="width: 10%">ID No.</th>
              </tr>
              <?php $i = 1; ?>
              @foreach($attachs as $key => $val)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $val->name }}</td>
                <td>{{ $val->description }}</td>
                <td>{{ $val->link }}</td>
                <td>{{ $val->link_qc }}</td>
                <td>{{ $val->id }}</td>
              </tr>
              <?php $i++ ?>
              @endforeach
              
            </table>
            </div>
          </div>
        </section>

        <section id="lineCopy">
          <div class="row">
              <div class="col-md-12 left-align">
                  <h2 class="dark-text">Copyright and license <a href="{{ url()->current() }}#top">#back to top</a><hr></h2>
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