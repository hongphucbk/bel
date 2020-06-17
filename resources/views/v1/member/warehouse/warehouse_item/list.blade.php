@extends('v1.member.layout.index')
@section('title')
  Warehouse
@endsection
@section('module-code')
  STW010
@endsection
@section('module-name')
  Item List
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
  @include('v1.member.warehouse.warehouse_item.common.menu2')
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/warehouse/warehouse_item">
        @csrf
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Warehouse *</label>
          <div class="col-sm-3">
            <input type="hidden" name="warehouse_id" id="warehouse" value="{{ $oldData['wh_item_warehouse'] }}">
            <input list="brow2" class="form-control form-control-sm" name="WarehouseList" placeholder="Please select warehouse">
            <datalist id="brow2">
              @foreach($warehouses as $key => $val)
                <option data-id="{{ $val->id }}" value="{{ $val->code }} - {{ $val->name }}" 
                  

              @endforeach
            </datalist>
          </div>

          <label class="col-sm-1 col-form-label text-right col-form-label-sm">Item</label>
          <div class="col-sm-3">
            <input type="hidden" name="item_id" id="item">
            <input list="brow" name="ItemList" placeholder="Please select item" class="form-control form-control-sm">
            <datalist id="brow">
              @foreach($items as $key => $val)
                <option data-id="{{ $val->id }}" value="{{ $val->code }} - {{ $val->name }}">
              @endforeach
            </datalist>
          </div>

          <!-- <div class="col-sm-2">
            <select></select>
            <input type="text" class="form-control form-control-sm" name="wh_item_warehouse" value="{{ $oldData['wh_item_warehouse']}}">
          </div> -->

          <label class="col-sm-1 col-form-label text-right col-form-label-sm">Item</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="wh_item_item" value="{{ $oldData['wh_item_item']}}">
          </div>

        </div>
        <!-- <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Part number</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="partnumber" value=" $oldData['item_part']">
          </div>
        </div> -->
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
            <th scope="col" style="width: 5%">#</th>
            <th scope="col" style="width: 20%">Warehouse</th>
            <th scope="col" style="width: 10%">Item</th>
            <th scope="col" style="width: 20%">Description</th>
            <th scope="col" style="width: 10%">Start</th>
            <th scope="col" style="width: 10%">Min</th>
            <th scope="col" style="width: 10%">Max</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($wh_items as $key => $val)
          <tr class="odd">
            <td>{{ $val->id }}</td>
            <td>{{ $val->warehouse->code }}-{{ $val->warehouse->name }}</td>
            <td>{{ $val->item->code }}</td>
            <td>{{ $val->item->name }}</td>
            <td>{{ $val->start_quantity }}</td>
            <td>{{ $val->min_stock }}</td>
            <td>{{ $val->max_stock }}</td>

            
            <td>
              <a href="v1/member/warehouse/item/display/{{ $val->id }}" class="tb1">
                <i class="far fa-eye"></i></a>
              <a href="v1/member/warehouse/item/edit/{{ $val->id }}" class="tb1">
                <i class="fas fa-edit"></i></a>
              
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ...
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <button class="dropdown-item" type="button">
                    <a href="v1/member/warehouse/item/display/{{ $val->id }}" class="menu">
                      <i class="far fa-eye"></i>
                      View
                    </a>
                  </button>
                  
                  <button class="dropdown-item" type="button">
                    <a href="v1/member/warehouse/item/edit/{{ $val->id }}" class="menu">
                      <i class="fas fa-edit" style=""></i>
                      Edit
                    </a>
                  </button>
                  <button class="dropdown-item" type="button">
                    <a href="v1/member/warehouse/item/delete/{{ $val->id }}" class="menu">
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
      {{ $wh_items->links() }}
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

<script type="text/javascript">
  $("input[name=ItemList]").focusout(function(){
    var g = $(this).val()
    var id = $('#brow option[value="' + g +'"]').attr('data-id');
    $("#item").val(id);
  });

  $("input[name=WarehouseList]").focusout(function(){
    var g1 = $(this).val()
    var id1 = $('#brow2 option[value="' + g1 +'"]').attr('data-id');
    $("#warehouse").val(id1);
  });
</script>
@endsection