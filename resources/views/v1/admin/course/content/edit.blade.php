@extends('v1.admin.layout.index')
@section('title')
	Category List
@endsection
@section('css')
	<!-- Custom styles for this page -->
  	<!-- <link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script> -->
    <script src="ckeditor/ckeditor.js"></script>
    <link  href="ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet">
    <script src="ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Info</h1>
	<a href="v1/admin/content" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Content List</a>
  @if(isset($content))
  <a href="v1/admin/lesson/detail/{{$content->course_lesson->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Back to all list of {{ $content->course_lesson->name }}</a>
  @endif
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
<form action="v1/admin/content/edit/{{ $content->id }}" method="post">
  @csrf
    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label>Category - Info</label>
      <select class="form-control" name="course_lesson_id">
        <option>--- Please select ---</option>
        @foreach($lessons as $key => $val)
          <option value="{{ $val->id }}"
            @if($val->id == $content->course_lesson_id)
              selected=""
            @endif
            >{{ $val->course_info->name }} - {{ $val->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-8 mb-3">
      <label>Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title..." value="{{ $content->title }}">
    </div>
    
    <div class="col-md-12 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note..." value="{{ $content->note }}" >
    </div>
    <!-- The toolbar will be rendered in this container. -->

    <div class="col-md-12 mb-3">
      <label>Content</label>
      <textarea name="content" id="editor">{!! htmlspecialchars($content->content) !!}</textarea>
    </div>
    
  </div>
  <button class="btn btn-primary" type="submit">Edit</button>
</form>
<!-- <script>
    ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .then( editor => {
          //console.log( editor );
      } )
      .catch( error => {
          console.error( error );
      } );
</script> -->
<script type="text/javascript"></script>


<script>
  //Ver 04
    CKEDITOR.replace( 'editor',{
      extraPlugins: 'codesnippet',
      codeSnippet_theme: 'monokai_sublime',
      

      removePlugins: 'easyimage',

      height: 300,

      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    } );
</script>

@endsection
@section('script')
<!-- Page level plugins -->
<script src="v1/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="v1/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="v1/admin/js/demo/datatables-demo.js"></script>

@endsection