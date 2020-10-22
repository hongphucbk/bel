<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Name *</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="name" placeholder="name" value="{{ $inst->name }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm">Email *</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="email" placeholder="email" value="{{ $inst->email }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm">Phone *</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" name="phone" placeholder="phone" value="{{ $inst->phone }}">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm">is active</label>
  <div class="col-sm-2">
    <select class="form-control form-control-sm" name="is_active">
      @if($inst->is_active == 1)
        <option value="1" selected="">Active</option>
        <option value="0">Deactive</option>
      @else
        <option value="1">Active (default)</option>
        <option value="0" selected="">Deactive</option>

      @endif

    </select>
  </div>


</div>
<div class="form-group row">

  <label class="col-sm-1 col-form-label col-form-label-sm">Password * 
    <input type="checkbox" id="changePassword" width="30px;" height="30px;" name="changePassword">


  </label>

  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm password" name="password" placeholder="password" disabled="">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm">Password Again *</label>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm password" name="passwordAgain" placeholder="password again" disabled="">
  </div>

  <label class="col-sm-1 col-form-label col-form-label-sm">Role</label>
  <div class="col-sm-2">
    <select class="form-control form-control-sm" name="role">
      @if($inst->role < 4)
        <option value="1" selected="">Member (default)</option>
        <option value="4">Admin</option>
      @else
        <option value="1">Member (default)</option>
        <option value="4" selected="">Admin</option>

      @endif

    </select>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Description</label>
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm" name="description" placeholder="description" value="{{ $inst->description }}">
  </div>
</div>