@extends('v1.member.layout.index')
@section('title')
	Facility
@endsection
@section('module-code')
  STW012
@endsection
@section('module-name')
  Item Add 
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
  



  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/js/bootstrap-select.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/css/bootstrap-select.min.css" rel="stylesheet" />


@endsection

@section('menu2')
  @include('v1.member.warehouse.warehouse_item.common.menu2')
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <form method="post" action="v1/member/warehouse/warehouse_item/add">
        @csrf
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Item</label>
          <div class="col-sm-3">
            <input type="hidden" name="item_id" id="item">
            <input list="brow" name="ItemList" placeholder="Please select item" class="form-control form-control-sm">
            <datalist id="brow">
              <option data-id="0" value="Please select item" selected="">
              @foreach($items as $key => $val)
                <option data-id="{{ $val->id }}" value="{{ $val->code }} - {{ $val->name }}">
              @endforeach
            </datalist>
          </div>
       
          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Warehouse *</label>
          <div class="col-sm-3">
            <input type="hidden" name="warehouse_id" id="warehouse">
            <input list="brow2" class="form-control form-control-sm" name="WarehouseList" placeholder="Please select warehouse">
            <datalist id="brow2">
              @foreach($warehouses as $key => $val)
                <option data-id="{{ $val->id }}" value="{{ $val->code }} - {{ $val->name }}">
              @endforeach
            </datalist>
          </div>

          <label class="col-sm-1 col-form-label  text-right col-form-label-sm">Min Stock</label>
          <div class="col-sm-1">
            <input type="text" class="form-control form-control-sm" name="min_stock" placeholder="" value="0">
          </div>

          <label class="col-sm-1 col-form-label  text-right col-form-label-sm">Max Stock</label>
          <div class="col-sm-1">
            <input type="text" class="form-control form-control-sm" name="max_stock" placeholder="" value="1000">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label col-form-label-sm">Start Qty</label>
          <div class="col-sm-1">
            <input type="text" class="form-control form-control-sm" name="start_quantity" placeholder="" value="0">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm">Priority</label>
          <div class="col-sm-1">
            <input type="text" class="form-control form-control-sm" name="priority" placeholder="">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Note</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="note" placeholder="Note">
          </div>

        </div>

        <div class="form-group row">
          <label class="form-check-label col-sm-1" for="gridCheck">
                Is Alarm
          </label>
          <div class="form-check col-sm-1">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="is_alarm">
          </div>

          <label class="form-check-label col-sm-1" for="gridCheck">
                Is Active
          </label>
          <div class="form-check col-sm-1">
            <input class="form-check-input" type="checkbox" checked="" id="gridCheck" name="is_active">
            
          </div>
          

          <!-- <label class="col-sm-1 col-form-label col-form-label-sm">Color</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="color" placeholder="Item color">
          </div>

          <label class="col-sm-1 col-form-label col-form-label-sm text-right">Weight</label>
          <div class="col-sm-2">
            <input type="text" class="form-control form-control-sm" name="weight" placeholder="Weight">
          </div> -->

          
        </div>
        
        
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div> 
  </div>

  <hr>
  

</div>


@endsection
@section('script')
<!-- Page level plugins -->

<script type="text/javascript">
  $("input[name=ItemList]").focusout(function(){
    var g = $(this).val()
    var id = $('#brow option[value="' + g +'"]').attr('data-id');
    $("#item").val(id);

    //alert(id);
  });

  $("input[name=WarehouseList]").focusout(function(){
    var g1 = $(this).val()
    var id1 = $('#brow2 option[value="' + g1 +'"]').attr('data-id');
    $("#warehouse").val(id1);

    //alert(id);
  });


</script>

<script type="text/javascript">
  $(function() {
    $('.selectpicker').selectpicker();
  });

</script>
@endsection