@extends('v1.admin.layout.index')
@section('title')
	Category List
@endsection
@section('css')
	<!-- Custom styles for this page -->
  	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> -->
    <script src="ckeditor/ckeditor.js"></script>
    <!-- Successful -->
    <!-- <script src="https://cdn.ckeditor.com/4.13.0/standard-all/ckeditor.js"></script> -->  


@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Content</h1>
	<a href="v1/admin/content" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Content List</a>
  @if(isset($lesson))
  <a href="v1/admin/lesson/detail/{{$lesson->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Back to all list of {{ $lesson->name }}</a>
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
<form action="v1/admin/content/add" method="post">
  @csrf
  <div class="form-row">
    <div class="col-md-5 mb-3">
      <label>Info (Course) - Lesson</label>
      <select class="form-control" name="course_lesson_id">
        <!-- <option>--- Please select ---</option>
        @foreach($lessons as $key => $val)
          <option value="{{ $val->id }}">{{ $val->course_info->name }} - {{ $val->name }}</option>
        @endforeach -->

        @if(isset($lesson))
          <option value="{{$lesson->id}}">{{ $lesson->course_info->name }} - {{ $lesson->name }}</option>
        @else
        <option>--- Please select ---</option>
        @foreach($lessons as $key => $val)
          <option value="{{ $val->id }}">{{ $val->course_info->name }} - {{ $val->name }}</option>
        @endforeach
        @endif
      </select>
    </div>
    <div class="col-md-7 mb-6">
      <label>Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title...">
    </div>
    
    <div class="col-md-12 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note...">
    </div>
    <!-- The toolbar will be rendered in this container. -->

    <div class="col-md-12 mb-3">
      <label>Content</label>
      <textarea name="content" id="editor">
          
      </textarea>
    </div>
    
  </div>
  <button class="btn btn-primary" type="submit">Add</button>
</form>
<script>
    // ClassicEditor
    //   .create( document.querySelector( '#editor' ) )
      
    //   .then( editor => {
    //       console.log( editor );
    //   } )
    //   .catch( error => {
    //       console.error( error );
    //   } );


</script>
<script>
  //Ver 04
    CKEDITOR.replace( 'editor',{
      //extraPlugins: 'easyimage',
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


<!-- , {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo', 'highlight'],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }

      } -->