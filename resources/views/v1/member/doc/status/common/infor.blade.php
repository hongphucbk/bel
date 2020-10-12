<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Code</label>
  <div class="col-sm-3">
    <input type="text" class="form-control form-control-sm" name="code" placeholder="Category code" value="{{ $category->code }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Name</label>
  <div class="col-sm-3">
    <input type="text" class="form-control form-control-sm" name="name" placeholder="Category name" value="{{ $category->name }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm" name="description" placeholder="Category description" value="{{ $category->description }}">
  </div>
</div>