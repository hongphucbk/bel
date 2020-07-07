<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Code *</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="code" placeholder="Supplier code" value="{{ $supplier->code }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Name *</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="name" placeholder="Supplier name" value="{{ $supplier->name }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Tax ID</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="tax_id_number" placeholder="Tax ID" value="{{ $supplier->tax_id_number }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="description" placeholder="Description" value="{{ $supplier->description }}">
  </div>

</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Phone</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="phone" placeholder="Phone" value="{{ $supplier->phone }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Email</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="email" placeholder="Email" value="{{ $supplier->email }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Address</label>
  <div class="col-sm-5">
    <input type="text" class="form-control form-control-sm" name="address" placeholder="Address" value="{{ $supplier->address }}">
  </div>


</div>



<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Contact name</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="contact_name" placeholder="Contact name" value="{{ $supplier->contact_name }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Account No.</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="account_number" placeholder="Acount Number" value="{{ $supplier->account_number }}" >
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm text-right">Bank name.</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="bank" placeholder="Bank" value="{{ $supplier->bank }}">
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
    <input class="form-check-input" type="checkbox" @if($supplier->is_active) checked="" @endif id="gridCheck" name="is_active">
    
  </div>
</div>
        