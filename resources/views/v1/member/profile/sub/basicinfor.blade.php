<div class="box box-primary">
  <div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle" src="v1/member/img/avatar.png" alt="User profile picture">

    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

    <p class="text-muted text-center">Software Engineer</p>

    <ul class="list-group list-group-unbordered">
      <li class="list-group-item">
        <b>Course</b> <a class="pull-right">{{get_total_infor_of_user_course(Auth::id())}}</a>
      </li>
      <li class="list-group-item">
        <b>Tickets</b> <a class="pull-right">{{ get_total_ticket_of_user_helpdesk( Auth::id() )}}</a>
      </li>
    </ul>

    <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
  </div>
  <!-- /.box-body -->
</div>