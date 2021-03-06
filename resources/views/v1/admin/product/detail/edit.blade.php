@extends('v1.admin.layout.index')
@section('title')
	Product detail
@endsection
@section('css')
	<!-- Custom styles for this page -->
	<link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Info</h1>
	<a href="v1/admin/product/detail" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm"></i> Info List</a>
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
<form action="v1/admin/product/detail/edit/{{ $detail->id }}" method="post">
  @csrf
  @csrf
  <div class="form-row">

    <div class="col-md-3 mb-3">
      <label>Info</label>
      <select class="form-control" name="product_info_id">
        <option>--- Please select ---</option>
        @foreach($infos as $key => $val)
          <option value="{{$val->id}}">{{ $val->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title..." value="{{ $detail->title }}">
    </div>

    <div class="col-md-3 mb-3">
      <label>Note</label>
      <input type="text" class="form-control" name="note" placeholder="Note" value="{{ $detail->note }}">
    </div>

    <div class="col-md-12 mb-3">
      <label>Content</label>
      <textarea name="content" id="editor">{{ $detail->content }}</textarea>
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
    });
</script>

@endsection