@extends('v1.fontend.home.layout.index')
@section('title')
    Index
@endsection
@section('css')
<style>

</style>
@endsection
@section('content')
<div class="container" style="margin-bottom: 20px;">
  <div class="row" >
    @foreach($news as $key => $val)
  	<div class="col-sm-6" style="margin-top: 10px">
	    <div class="card">
	      <div class="card-body">
	      	
	        <h5 class="card-title"><a href="v1/page/news/{{$val->id}}">{{ $val->name }}</a></h5>

	        <p class="card-text">{{ $val->description }}</p>
	        <!-- <a href="#" class="btn btn-primary btn-sm">View</a> -->
	      </div>
	    </div>
	  </div>
    @endforeach
  </div>
</div>
 
@endsection
@section('script')
    <script>

    </script>
@endsection