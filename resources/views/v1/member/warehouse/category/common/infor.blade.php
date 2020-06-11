<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Code</label>
  <div class="col-sm-3">
    <input type="text" class="form-control form-control-sm" name="code" placeholder="Facility code" value="{{ $facility->code }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Name</label>
  <div class="col-sm-3">
    <input type="text" class="form-control form-control-sm" name="name" placeholder="Facility name" value="{{ $facility->name }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm" name="description" placeholder="Facility description" value="{{ $facility->description }}">
  </div>
</div>