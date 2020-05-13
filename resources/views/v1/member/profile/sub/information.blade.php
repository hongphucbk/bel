<div class="active tab-pane" id="settings">
  <form class="form-horizontal" method="post" action="v1/member/profile/{{Auth::user()->id}}/edit-infor">
  	@if(session('notify'))
      <div class="alert alert-{{session('label')}} col-sm-offset-2 col-sm-10">
          {{session('notify')}}                         
      </div>
    @endif
    @if(count($errors)>0)
      <div class="alert alert-danger">
          @foreach($errors->all() as $err)
              {{$err}}<br>
          @endforeach
      </div>
    @endif
    @csrf
    <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label">Name</label>

      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-sm-2 control-label">Email</label>

      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Phone</label>

      <div class="col-sm-5">
        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
      </div>
    </div>
    <!-- <div class="form-group">
      <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

      <div class="col-sm-10">
        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
      </div>
    </div> -->
    <!-- <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
          </label>
        </div>
      </div>
    </div> -->
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>
</div>