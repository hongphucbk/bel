@extends('v1.fontend.course.detail.layout.index')
@section('title')
	{{ $info->name }}
@endsection
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
@section('css')
<style>
hr{
  margin-top: 5px !important;
  margin-bottom: 5px;
}
h2, p {
  margin-top: 5px;
  margin-bottom: 5px !important;
}

pre{
  padding: 0 !important;
}
button.like{
  width: 30px;
  height: 30px;
  margin: 0 auto;
  line-heigth: 50px;
  border-radius: 50%;
  color: rgba(0,150,136 ,1);
  background-color:rgba(38,166,154 ,0.3);
  border-color: rgba(0,150,136 ,1);
  border-width: 1px;
  font-size: 15px;
}

button.dislike{
  width: 30px;
  height: 30px;
  margin: 0 auto;
  line-heigth: 50px;
  border-radius: 50%;
  color: rgba(255,82,82 ,1);
  background-color: rgba(255,138,128 ,0.3);
  border-color: rgba(255,82,82 ,1);
  border-width: 1px;
  font-size: 15px;
}

button.learnmore{
  width: 100%;
  padding: 10px;
  border: none;
  background: rgba(0,151,167 ,1);
  border-radius: 5px;
  text-transform: uppercase;
  font-size: 16px;
  color: #fff;
  letter-spacing: 1px;
}
</style>

  <!-- <script src="ckeditor/ckeditor.js"></script>
  <link  href="ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet"> -->
  <link href="ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="ckeditor/contents.css">
  <!-- <link  href="ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet"> -->

  <script src="ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>

@endsection
@section('content')
<div id="wrapper">
  <div class="container" style="width: 100%">
    <section id="top" class="">
      <div class="row">
        <div class="col-md-12">
          <div class="big-title text-center">
            <img src="img/industrial_iot.png" alt="{{ $namePage }}" width="200px">
            <p class="lead">Khóa học <span style="color: blue">{{ $info->name }}</span></p>
            <h2 style="color: green; font-weight: bold">{{ $lesson->name }}</h2>
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
                    <h2 class="dark-text">{{ $val->title }} <a href="{{ url()->current() }}#top">#back to top</a><hr></h2>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
              <div class="col-md-12 .cke_editable">
                {!! $val->content !!}
                
               

              </div>
              <!-- <textarea name="content" id="editor">{!! htmlspecialchars($val->content) !!}</textarea> -->

            </div>
        </section>
        @endforeach

        
        @if(Auth::check())
        <hr>
        <section id="">
          <div class="row">
            <div class="col-md-12 left-align">
              Cảm ơn {{ Auth::user()->name }} đã xem bài {{ $lesson->name }} trong khóa học {{ $info->name }} <br>
              Did you like this lesson?
              <button class="dislike">
                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
              </button>

              <button class="like">
                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
              </button>

            </div>

          </div>
        </section>
        @endif
        <hr>
        <!-- end section -->

        <section id="lineCopy">
          <div class="row">
              <div class="col-md-12 left-align">
                  <h2 class="dark-text">Copyright and license <a href="#top">#back to top</a><hr></h2>
              </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p>For more information about copyright and license check <a href="#" target="_blank">{{ $namePage }}</a></p>
            
            </div>
          </div>
        </section>
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
  
  <script type="text/javascript">
    // CKEDITOR.inline( 'editor', {
    //   extraPlugins: 'codesnippet'
    // } );

  </script>
@endsection