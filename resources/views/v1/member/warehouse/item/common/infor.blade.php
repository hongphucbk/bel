<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Category</label>
  <div class="col-sm-2">
    <select name="category_id" class="form-control form-control-sm">
      @foreach($categories as $key => $val)
      <option value="{{ $val->id }}">{{ $val->name }}</option>
      @endforeach
    </select>
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Code *</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="code" placeholder="Item code" value="{{ $inst->code }}">
  </div>

  <label class="col-sm-1 col-form-label  text-right col-form-label-sm">Name *</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="name" placeholder="Item name" value="{{ $inst->name }}">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Description *</label>
  <div class="col-sm-5">
    <input type="text" class="form-control form-control-sm" name="description" placeholder="Item description" value="{{ $inst->description }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Unit</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="unit" placeholder="Unit" value="{{ $inst->unit }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Part No.</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="partnumber" placeholder="Part number" value="{{ $inst->partnumber }}">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Color</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="color" placeholder="Item color" value="{{ $inst->color }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Weight</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="weight" placeholder="Weight" value="{{ $inst->weight }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Note</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="note" placeholder="Note" value="{{ $inst->note }}">
  </div>
</div>