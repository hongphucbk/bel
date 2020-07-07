<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Item</label>
  <!-- <div class="col-sm-1"> -->
    <!-- <input type="text" name="item_id" placeholder="Please select item" class="form-control form-control-sm" value="{{$inst->item->code}}"> -->
    
  <!-- </div> -->
  <div class="col-sm-3">
    <!-- <input name="ItemList" value="{{$inst->item->name}}"> -->
    <div class="input-group">
      <input type="text" class="form-control form-control-sm " value="{{$inst->item->code}}" readonly="">
      <input type="text" class="form-control form-control-sm input-50" value="{{$inst->item->name}}" readonly="">
    </div>

  </div>


  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Warehouse *</label>
  <div class="col-sm-3">
    <input type="hidden" name="warehouse_id" id="warehouse">
    <input list="brow2" class="form-control form-control-sm" name="WarehouseList" placeholder="Please select warehouse" value="{{$inst->warehouse->name}}" readonly="">
    <datalist id="brow2">
      @foreach($warehouses as $key => $val)
        <option data-id="{{ $val->id }}" value="{{ $val->code }} - {{ $val->name }}">
      @endforeach
    </datalist>
  </div>

  <label class="col-sm-1 col-form-label  text-right col-form-label-sm">Min Stock</label>
  <div class="col-sm-1">
    <input type="text" class="form-control form-control-sm" name="min_stock" placeholder="" value="{{$inst->min_stock}}">
  </div>

  <label class="col-sm-1 col-form-label  text-right col-form-label-sm">Max Stock</label>
  <div class="col-sm-1">
    <input type="text" class="form-control form-control-sm" name="max_stock" placeholder="" value="{{$inst->max_stock}}">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Start Qty</label>
  <div class="col-sm-1">
    <input type="text" class="form-control form-control-sm" name="start_quantity" placeholder="" value="{{$inst->start_quantity}}">
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