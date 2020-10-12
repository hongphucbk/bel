@extends('v1.member.layout.index')
@section('title')
	Connect role
@endsection
@section('module-code')
  DMS033
@endsection
@section('module-name')
  View document
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
  @include('v1.member.doc.infor.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      
      @include('v1.member.doc.infor.common.infor')
      <a href="v1/member/doc/infor/edit/{{ $inst->id }}">
        <!-- <button type="button" class="btn btn-info">Edit</button> -->
      </a>

      <hr>
      <a href="v1/member/doc/infor/{{ $inst->id }}/attach/">
        <button type="button" class="btn btn-info">Back</button>
      </a>

    </div> 
  </div>
  <div class="row" style="margin-top: 20px;">
    <div class="col">
      <div class="card" style="">
        <h5 class="card-header">Document upload</h5>
        <div class="card-body">
          <form method="POST" action="v1/member/doc/infor/{{$inst->id}}/attach/edit/{{ $attach->id }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group" >
              <label>Tên mô tả (PDF, Word, Excel, Ảnh, ...)</label>
                  <div class="input-group">
                      <span class="input-group-addon primary"><span class="glyphicon glyphicon-star"></span></span>
                      <input type="text" name="name" class="form-control attach" value="{{ $attach->name }}">
                  </div>
              </div>
            <!-- COMPONENT START -->
            <div class="form-group">
              <input type="checkbox" name="changeFile" id="changeFile">
              <label>File... (Tên file không có ký tự đặc biệt !@#$%^&*(),... Dung lượng tối đa 8MB)</label>
              <div class="input-group input-file" name="filelink">
                <span class="input-group-btn">
                      <button class="btn btn-default btn-choose" type="button">Choose</button>
                  </span>
                  <input type="text" class="form-control file" placeholder='Choose a file...' name="filelink" disabled value="{{ $attach->link }}"/>
                  <span class="input-group-btn">
                       <button class="btn btn-warning btn-reset" type="button">Reset</button>
                  </span>
              </div>
            </div>
            <!-- COMPONENT END -->
            <div class="form-group">
              <button type="submit" class="btn btn-primary pull-right">Edit</button>
              <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
            </div>
          </form>   
        </div>
      </div>
    </div>


    <div class="col">
      <div class="card" style="">
        <h5 class="card-header">Work Instruction</h5>
        <div class="card-body">
          Please refer as work instruction 
        </div>
      </div>
    </div>
  </div>

  <hr>
  

</div>


@endsection
@section('script')
<script type="text/javascript">
  //$('input').attr('readonly', true);
  $('.rd').attr('readonly', true);
  //$('.attach').attr('readonly', false);
  
</script>
<script>
    $(function() {
    bs_input_file();
  });

    function bs_input_file() {
    $(".input-file").before(
      function() {
        if ( ! $(this).prev().hasClass('input-ghost') ) {
          var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
          element.attr("name",$(this).attr("name"));
          element.change(function(){
            element.next(element).find('input').val((element.val()).split('\\').pop());
          });
          $(this).find("button.btn-choose").click(function(){
            element.click();
          });
          $(this).find("button.btn-reset").click(function(){
            element.val(null);
            $(this).parents(".input-file").find('input').val('');
          });
          $(this).find('input').css("cursor","pointer");
          $(this).find('input').mousedown(function() {
            $(this).parents('.input-file').prev().click();
            return false;
          });
          return element;
        }
    });
  };
  

  </script>
<script>
    $(document).ready(function () {
        $("#changeFile").change(function(){
            if($(this).is(":checked"))
            {
                $(".file").removeAttr('disabled');
            }
            else
            {
                $(".file").attr('disabled','');
            }
        });
    });
</script>

@endsection