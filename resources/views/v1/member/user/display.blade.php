@extends('v1.member.layout.index')
@section('title')
	View user
@endsection
@section('module-code')
  CSU013
@endsection
@section('module-name')
  View user
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

@section('menu2')
  @include('v1.member.user.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      
      @include('v1.member.user.common.infor')
      <a href="v1/member/user/edit/{{ $inst->id }}">
        <button type="button" class="btn btn-info">Edit</button>
      </a>
      
    </div> 
  </div>

  <hr>
  

</div>


@endsection
@section('script')
<script type="text/javascript">
  $('input').attr('readonly', true);
  $('select').attr('readonly', true);
</script>



@endsection