@extends('v1.fontend.course.detail.layout.index')
@section('title')
  {{ $info->name }}
@endsection
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
@section('css')

  <link rel="stylesheet" type="text/css" href="v1/fontend/course/content.css">

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
            <p class="lead">Khóa học <a href="v1/page/appendix/{{$info->id}}/{{changeTitle($info->name)}}"><span style="color: blue">{{ $info->name }}</span></a></p>
            <h2 class='lesson-title'>Giới thiệu bài học {{ $lesson->name }}</h2>
          </div>
        </div>
      </div>
      <hr>

    </section>
    <!-- end section -->

    <div class="row">
      
      @include('v1.fontend.course.detail.sub.menu')
      
      <div class="col-md-9">
        @if(session('notify'))
          <div class="alert alert-success">
              {{session('notify')}}                         
          </div>
        @endif

        @include('v1.fontend.course.detail.sub.content')
        
        @if(Auth::check() && 0)
        <hr>
        <section id="">
          <div class="row">
            <div class="col-md-12 left-align">
              Cảm ơn {{ Auth::user()->name }} đã xem bài {{ $lesson->name }} trong khóa học {{ $info->name }} <br>

              @if(!isset($like) and (!isset($dislike)))
              Did you like this lesson?

              <a href="v1/page/appendix/{{ $info->id }}/lesson/{{ $lesson->id }}/{{changeTitle($lesson->name)}}/like">
                <button class="like">
                  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </button>
              </a>
              <a href="v1/page/appendix/{{ $info->id }}/lesson/{{ $lesson->id }}/{{changeTitle($lesson->name)}}/dislike">
                <button class="dislike">
                  <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                </button>
              </a>
              @else
                @if(isset($like))
                <div class="alert alert-success" role="alert">
                  Cảm ơn {{ Auth::user()->name }} đã like bài học này.
                </div>
                @endif

                @if(isset($dislike))
                <div class="alert alert-danger" role="alert">
                  Bạn {{ Auth::user()->name }} đã dislike bài học này. Rất mong bạn chia sẻ lí do để mình có thể cải thiện tốt hơn.
                </div>
                @endif
              @endif

              <table class="table">
                <tbody >
                @foreach($comments as $key => $val)
                <tr style="font-size: 13px" class="comment">
                  <td style="width: 15%">{{ date('d-M-Y H:i', strtotime($val->created_at))  }}</td>
                  <td style="width: 20%">{{ $val->user->name  }}</td>
                  <td style="width: 50%">{{ $val->comment  }}</td>
                  <td style="width: 5%">
                    @if(is_user_delete_comment_in_lesson($val->id))
                    <a href="v1/page/appendix/{{ $info->id }}/lesson/{{ $lesson->id }}/{{changeTitle($lesson->name)}}/comment/delete/{{$val->id}}"><span style="color: red" class="glyphicon glyphicon-trash"></span></a>
                    @endif
                  </td>
                </tr>

                @endforeach
                </tbody>
              </table>
              <form method="post" action="v1/page/appendix/{{ $info->id }}/lesson/{{ $lesson->id }}/{{changeTitle($lesson->name)}}/comment">
                @csrf
                <input type="" name="content" style="width: 70%" placeholder="Nhập nội dung bạn muốn phản hồi...">
                <button>Send</button>
              </form>
            </div>

          </div>
        </section>
        @endif
        <hr>
        <!-- end section -->

        <section id="lineCopy">
          <div class="row">
              <div class="col-md-12 left-align">
                  <h4 class="dark-text">Copyright and license <a href="#top">#back to top</a><hr></h4>
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