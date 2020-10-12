<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">User</label>
  <div class="col-sm-3">
    <select class="form-control form-control-sm" name="user_id">
      @foreach($users as $key => $val)
        <option value="{{ $val->id }}" 
        @if($val->id == $inst->user_id)
          selected=""
        @endif >{{ $val->id }} - {{ $val->name }}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Role</label>
  <div class="col-sm-3">
    <select class="form-control form-control-sm" name="role_id">
      @foreach($roles as $key => $val)
      <option value="{{ $val->id }}" 
        @if($val->id == $inst->role_id)
          selected=""
        @endif
        >{{ $val->id }} - {{ $val->name }}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-1 col-form-label col-form-label-sm">Note</label>
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm" name="note" placeholder="note" value="{{ $inst->note }}">
  </div>
</div>