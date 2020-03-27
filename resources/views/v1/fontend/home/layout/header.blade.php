<div class="collapse navbar-collapse " id="collapsibleNavbar">
  <ul class="navbar-nav ml-auto ">
    <li class="nav-item">
      <a class="nav-link" href="#">Introduce</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://solution.phuctruong.net:3000">Solution</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="#" style="color: green !important"><b>Login</b></a>
    </li> -->
    
    <!-- Example single danger button -->
    
    @if( Auth::check() )
      <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="v1/member/course">My page</a>
        <!-- <a class="dropdown-item" href="#">Document</a> -->
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout">Logout</a>
      </div>
    @else
    <!-- <a href="login"><span class="badge">Login</span></a> -->
      <li class="nav-item">
        <a class="nav-link" style="color: blue !important" href="login">Login</a>
      </li>

    <!-- <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="#">Login</a>
      <a class="dropdown-item" href="#">Document</a>
      <a class="dropdown-item" href="#">Instruction</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">About</a>
    </div> -->
    @endif
    

     

</div>



  </ul>
  

</div> 