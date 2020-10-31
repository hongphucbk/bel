<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Document name *</label>
  <div class="col-sm-3">
    <input type="text" class="form-control form-control-sm rd" name="name" placeholder="document name" value="{{ $inst->name }}">
    
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm">Document code</label>
  <div class="col-sm-3">
    <input type="text" class="form-control form-control-sm rd" name="code" placeholder="document code" value="{{ $inst->code }}">
  </div>
  <label class="col-sm-1 col-form-label col-form-label-sm">Status</label>
  <div class="status" >
    {!! displayInforStatus(getIdStatusInfor($inst->id)) !!}
  </div>

</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm rd" name="description" placeholder="document description" value="{{ $inst->description }}">
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Note</label>
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm rd" name="note" placeholder="note" value="{{ $inst->note }}">
  </div>
</div>