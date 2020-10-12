@extends('v1.member.layout.index')
@section('title')
  Documents
@endsection
@section('module-code')
  DMS031
@endsection
@section('module-name')
  Documents list
@endsection

@section('css')
  <!-- Custom styles for this page -->
  <!-- <link href="v1/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <style type="text/css">
    th, td, .btn{
      padding-top: 1px !important;
      padding-bottom: 1px !important;
      padding-left: 3px !important;
      padding-right: 3px !important;
    }
    .current { color: white !important; font-weight: bold; background-color: green !important}
    tr.current td a.tb1 {color: white;}
    /*tr td a.line:hover {text-decoration: underline}*/

    tr td a.menu {text-decoration:none}
    tr.current td div.btn-group button.btn{background-color: #eca004;}
    div.col nav{float: right;}
    a.page-link, span.page-link {padding-top: 3px; padding-bottom: 3px; padding-left: 8px; padding-right: 8px}
    hr{margin-top: 5px; margin-bottom: 5px;}
  </style>

@endsection

@section('menu2')
  @include('v1.member.doc.infor.common.menu2')
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/doc/infor">
        @csrf
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">User</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="auth_user" value="{{ $oldData['auth_user'] }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Role</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="auth_role" value="{{ $oldData['auth_role'] }}">
          </div>
        </div>
        <!-- <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="description" placeholder="Facility description">
          </div>
        </div> -->
      
        <!-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> -->
        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
      </form>
    </div> 
  </div>

  <hr>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-sm" id="dtTable">
        <thead>
          <tr style="background-color:  #f5f5ef">
            <th scope="col" style="width: 4%">#</th>
            <th scope="col" style="width: 8%">Code</th>
            <th scope="col" style="width: 10%">Name</th>
            <th scope="col" style="width: 15%">Description</th>
            <th scope="col" style="width: 10%">Raised by</th>
            <th scope="col" style="width: 5%">Attach</th>
            <th scope="col" style="width: 5%">Approve</th>
            <th scope="col" style="width: 8%">Status</th>
            <th scope="col" style="width: 12%">Updated at</th>
            <th scope="col" style="width: 10%">Note</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($insts as $key => $val)
          <tr class="odd">
            <td>{{ $val->id }}</td>
            <td>{{ $val->code }}</td>
            <td>{{ $val->name }}</td>
            <td>{{ $val->description }}</td>
            <td>{{ $val->user->name }}</td>
            <td>
              <a href="v1/member/doc/infor/{{ $val->id }}/attach">
                {{ get_total_attach_bel($val->id) }}
              </a>
            </td>
            <td>
              <a href="v1/member/doc/infor/{{ $val->id }}/approval">
                {{ get_total_approval_bel($val->id) }}
              </a>
            </td>
            <td></td>
            <td>{{ $val->updated_at }}</td>
            <td>{{ $val->note }}</td>
            <td>
              <a href="v1/member/doc/infor/display/{{ $val->id }}" class="tb1">
                <i class="far fa-eye"></i></a>
              <a href="v1/member/doc/infor/edit/{{ $val->id }}" class="tb1">
                <i class="fas fa-edit"></i></a>
              

              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ...
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <button class="dropdown-item" type="button">
                    <a href="v1/member/doc/infor/display/{{ $val->id }}" class="menu">
                      <i class="far fa-eye"></i>
                      View
                    </a>
                  </button>
                  
                  <button class="dropdown-item" type="button">
                    <a href="v1/member/doc/infor/edit/{{ $val->id }}" class="menu">
                      <i class="fas fa-edit" style=""></i>
                      Edit
                    </a>
                  </button>
                  <button class="dropdown-item" type="button">
                    <a href="v1/member/doc/infor/delete/{{ $val->id }}" class="menu">
                      <i class="far fa-trash-alt"></i>
                      Delete
                    </a></button>

                </div>
              </div>

            </td>
          </tr>
          @endforeach
        </tbody>
        
      </table>    
      <hr>
    </div>

    <div class="col">
      {{ $insts->links() }}
    </div>
  </div>
  

</div>


@endsection
@section('script')
<script type="text/javascript">
  
  $(document).ready(function() {
    console.log('hello')
    $('#dtTable tr.odd').click(function(){
      console.log('click this', this)
          $('tr').removeClass();
          $(this).addClass('current');
      });
  });
</script>


@endsection