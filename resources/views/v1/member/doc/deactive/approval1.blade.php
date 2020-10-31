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
    label{
      margin-bottom: 2px;
    }
    .card{
      display:inline-table;
    }

    .level0{
      color: #CEC9C8;
      background-color: gray;
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
      Attached list
        <table class="table table-sm" id="dtTable">
          <thead>
            <tr style="background-color:  #f5f5ef">
              <th scope="col" style="width: 5%">#</th>
              <th scope="col" style="width: 15%">Name</th>
              <th scope="col" style="width: 15%">Link</th>
              <th scope="col" style="width: 15%">Description</th>
              <th scope="col" style="width: 5%">Type</th>
              <th scope="col" style="width: 6%">Size</th>
              <th scope="col" style="width: 8%">Raised by</th>
              <th scope="col" style="width: 15%">Updated at</th>
              <th scope="col" style="">Note</th>
              
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
              <td>{{ $val->description }}</td>
              <td>{{ $val->extend }}</td>
              <td>{{ $val->size }}</td>
              <td>{{ $val->user->name }}</td>
              <td>{{ $val->updated_at }}</td>
              <td>{{ $val->note }}</td>
              
            </tr>
            @endforeach
          </tbody>
          
        </table>

      <hr>
      Approval Flow
      <table class="table table-sm" id="dtTable">
          <thead>
            <tr style="background-color:  #f5f5ef">
              <th scope="col" style="width: 5%">#</th>
              
              <th scope="col" style="width: 12%">Approval name</th>
              <th scope="col" style="width: 4%">Level</th>
              <th scope="col" style="width: 12%">Added by</th>
              <th scope="col" style="width: 15%">Updated at</th>
              <th scope="col" style="width: 8%">Status</th>
              <th scope="col" style="width: 10%">is sent mail</th>
              <th scope="col" style="width: 10%">Comment</th>
              <th scope="col" style="width: 10%">Note</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($approvals as $key => $val)
            <tr class="odd 
              @if($val->level == 0)
                level0
              @endif
            "> 
              <td>{{ $val->id }}</td>              
              <td>{{ $val->approval->name }}</td>
              <td>{{ $val->level }}</td>
              <td>{{ $val->user->name }}</td>
              <td>{{ $val->updated_at }}</td>
              <td>{!! get_status_approval_id($val->id) !!}</td>
              <td>
                @if($val->is_submit == 1)
                  <span class="badge badge-primary"> <i class="fa fa-envelope"></i> Đã gửi mail</span>
                @endif
              </td>
              <td>{{ $val->comment }}</td>
              <td>{{ $val->note }}</td>
              <td>
                <!-- <a href="v1/member/doc/infor/display/{{ $val->id }}" class="tb1">
                  <i class="far fa-eye"></i></a> -->
                <!-- <a href="v1/member/doc/infor/{{ $inst->id }}/attach/edit/{{ $val->id }}" class="tb1">
                  <i class="fas fa-edit"></i></a> -->
                
                @if($val->status < 20 && isCanDeleteApproval($val->id) && isCanAddApprovalUser($val->infor_id))
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Delete
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <!-- <button class="dropdown-item" type="button">
                      <a href="v1/member/doc/infor/display/{{ $val->id }}" class="menu">
                        <i class="far fa-eye"></i>
                        View
                      </a>
                    </button> -->
                    
                    <!-- <button class="dropdown-item" type="button">
                      <a href="v1/member/doc/infor/{{ $inst->id }}/attach/edit/{{ $val->id }}" class="menu">
                        <i class="fas fa-edit" style=""></i>
                        Edit
                      </a>
                    </button> -->
                    <button class="dropdown-item" type="button">
                      <a href="v1/member/doc/infor/{{ $inst->id }}/approval/delete/{{ $val->id }}" class="menu">
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



      

    </div> 
  </div>
  <div class="row" style="margin-top: 20px;">
    <div class="col" >
      @if(isCanAddApprovalUser($inst->id))
      <div class="card" style="width: 40%">
        <h5 class="card-header" style="padding-top: 5px;padding-bottom: 2px;">Add manager approval</h5>
        <div class="card-body" style="padding-top: 4px;padding-bottom: 4px;">
          <form method="POST" action="v1/member/doc/infor/{{$inst->id}}/approval/add" enctype="multipart/form-data">
            @csrf
            <div class="form-group" >
              <label>Approval user</label>
                <select class="form-control col-mb3" name="approval_id">
                  @foreach($approvalList as $key => $val)
                  <option value="{{ $val->user->id }}">{{ $val->user->id }} - {{ $val->user->name }} - {{ $val->role->name }}</option>
                  @endforeach
                </select>
            </div>
            <!-- COMPONENT START -->
            <div class="form-group">
              <label>Level</label>
              <select class="form-control form-control-md" name="level">
                  <option value="1" selected="">Level 1</option>
                  <option value="2">Level 2</option>
                  <option value="0">Backup</option>
                </select>
            </div>
            <!-- COMPONENT END -->
            <div class="form-group">
              <button type="submit" class="btn btn-primary pull-right">Add manager</button>
              <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
            </div>
          </form>   
        </div>
      </div>
      @endif

      @if(isset($approve_inst))
      @if($approve_inst->level > 0 && !isReviewedApproval($approve_inst->id))
        <div class="card" style="width: 48%">
          <h5 class="card-header" style="padding-top: 5px;padding-bottom: 2px;">Approval by <span style="color: green">{{ Auth::user()->name }}</span> ?</h5>
          <div class="card-body" style="padding-top: 4px;padding-bottom: 4px;">
            <form method="POST" action="v1/member/doc/infor/{{$inst->id}}/approval/appr/{{ $approve_inst->id }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group" >
                <label>Comment</label>
                <input type="text" name="comment" class="form-control">
              </div>

              <!-- COMPONENT START -->
              <!-- <div class="form-group">
                <label>Level</label>
                <select class="form-control form-control-md" name="level">
                    <option value="1" selected="">Level 1</option>
                    <option value="2">Level 2</option>
                  </select>
              </div> -->
              <!-- COMPONENT END -->
              <div class="form-group">
                <button type="submit" class="btn btn-success pull-right" name="isApproval" value="30">Approve</button>
                <button type="submit" class="btn btn-warning pull-right" name="isApproval" value="20">Decline</button>
                <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
              </div>
            </form>   
          </div>
        </div>
      @endif
      @endif
    </div>
    <!--  -->
    
  </div>
  
  @if(isCanAddApprovalUser($inst->id))
    <hr>
    <a href="v1/member/doc/infor/{{ $inst->id }}/approval/submit">
        <button type="button" class="btn btn-danger">Submit</button>
      </a>
  @endif

  @if(isCanCompleteInfor($inst->id))
    <hr>
    <a href="v1/member/doc/infor/{{ $inst->id }}/approval/complete">
        <button type="button" class="btn btn-warning">Complete</button>
      </a>
  @endif
  <hr style="margin-bottom: 30px;">
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('.rd').attr('readonly', true);
  //$('select').attr('readonly', true);
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