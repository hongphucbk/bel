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

    .status span {
      font-size: 100% !important;
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
        <table class="table table-sm" id="dtTable">
        <thead>
          <tr style="background-color:  #f5f5ef">
            <th scope="col" style="width: 5%">#</th>
            <th scope="col" style="width: 15%">Name</th>
            <th scope="col" style="width: 8%">Link</th>
            <!-- <th scope="col" style="width: 15%">Description</th> -->
            <th scope="col" style="width: 5%">Type</th>
            <th scope="col" style="width: 6%">Size</th>
            <th scope="col" style="width: 8%">Raised by</th>
            <th scope="col" style="width: 10%">Updated at</th>
            <th scope="col" style="width: 10%">Note</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($insts as $key => $val)
          <tr class="odd">
            <td>{{ $val->id }}</td>
            <td>{{ $val->name }}</td>
            <td>
              <a href="{{$val->path}}/{{ $val->link }}">{{ $val->name }}</a>
              </td>
            <!-- <td>{{ $val->description }}</td> -->
            <td>{{ $val->extend }}</td>
            <td>{{ $val->size }}</td>
            <td>{{ $val->user->name }}</td>
            <td>{{ $val->updated_at }}</td>
            <td>{{ $val->note }}</td>
            <td>
              <!-- <a href="v1/member/doc/infor/display/{{ $val->id }}" class="tb1">
                <i class="far fa-eye"></i></a> -->
              @if(Auth::id() == $val->user_id)
              <a href="v1/member/doc/infor/{{ $inst->id }}/attach/edit/{{ $val->id }}" class="tb1">
                <i class="fas fa-edit"></i></a>
              

              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ...
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- <button class="dropdown-item" type="button">
                    <a href="v1/member/doc/infor/display/{{ $val->id }}" class="menu">
                      <i class="far fa-eye"></i>
                      View
                    </a>
                  </button> -->
                  
                  <button class="dropdown-item" type="button">
                    <a href="v1/member/doc/infor/{{ $inst->id }}/attach/edit/{{ $val->id }}" class="menu">
                      <i class="fas fa-edit" style=""></i>
                      Edit
                    </a>
                  </button>
                  <button class="dropdown-item" type="button">
                    <a href="v1/member/doc/infor/{{ $inst->id }}/attach/delete/{{ $val->id }}" class="menu">
                      <i class="far fa-trash-alt"></i>
                      Delete
                    </a></button>

                </div>
              </div>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
        
      </table>

      <hr>
      



      

    </div> 
  </div>
  <div class="row" style="margin-top: 20px;">
    @if(isCanAttachFile($inst->id))
    <div class="col">
      <div class="card" style="width: 60%">
        <h5 class="card-header">Document upload</h5>
        <div class="card-body">
          <form method="POST" action="v1/member/doc/infor/{{$inst->id}}/attach/add" enctype="multipart/form-data">
            @csrf
            <div class="form-group" >
              <label>Tên mô tả (PDF, Word, Excel, Ảnh, ...)</label>
                  <div class="input-group">
                      <span class="input-group-addon primary"><span class="glyphicon glyphicon-star"></span></span>
                      <input type="text" name="name" class="form-control attach">
                  </div>
              </div>
            <!-- COMPONENT START -->
            <div class="form-group">
              <label>File... (Tên file không có ký tự đặc biệt !@#$%^&*(),... Dung lượng tối đa 8MB)</label>
              <div class="input-group input-file" name="filelink">
                <span class="input-group-btn">
                      <button class="btn btn-default btn-choose" type="button">Choose</button>
                  </span>
                  <input type="text" class="form-control attach" placeholder='Choose a file...' name="filelink" value="{{ old('flielink') }}" />
                  <span class="input-group-btn">
                       <button class="btn btn-warning btn-reset" type="button">Reset</button>
                  </span>
              </div>
            </div>
            <!-- COMPONENT END -->
            <div class="form-group">
              <button type="submit" class="btn btn-primary pull-right">Add file</button>
              <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
            </div>
          </form>   
        </div>
      </div>
    </div>
    @endif

  </div>

  <hr>
  <a href="v1/member/doc/infor/{{ $inst->id }}/approval">
    <button type="submit" class="btn btn-primary">Go to Approval process</button>
  </a>
  

</div>


@endsection
@section('script')
<script type="text/javascript">
  $('input').attr('readonly', true);
  $('select').attr('readonly', true);
  $('.attach').attr('readonly', false);
  
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


@endsection