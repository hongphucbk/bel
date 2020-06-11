<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Facility</label>
  <div class="col-sm-2">
    <select name="facility_id" class="form-control form-control-sm">
      @foreach($facilities as $key => $val)
      <option value="{{ $val->id }}" 
        @if($val->id == $warehouse->facility_id)
        selected=""
        @endif
        >{{ $val->name }}</option>
      @endforeach
    </select>
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Code</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="code" placeholder="Warehouse code" value="{{ $warehouse->code }}">
  </div>

  <label class="col-sm-1 col-form-label  text-right col-form-label-sm">Name</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="name" placeholder="Warehouse name" value="{{ $warehouse->name }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
  <div class="col-sm-5">
    <input type="text" class="form-control form-control-sm" name="description" placeholder="Warehouse description" value="{{ $warehouse->description }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Address</label>
  <div class="col-sm-3">
    <input type="text" class="form-control form-control-sm" name="address" placeholder="Address" value="{{ $warehouse->address }}">
  </div>

</div>
<div class="form-group row">
  
</div>