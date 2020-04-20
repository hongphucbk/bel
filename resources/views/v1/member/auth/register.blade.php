<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="{{asset('')}}">
  <title>{{$namePage}} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="v1/member/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="v1/member/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="v1/member/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="v1/member/dist/css/AdminLTE.min.css"> -->

  <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body class="hold-transition">
<div class="login-box" style="margin-top: 5%;">  	

  <!-- <p class="login-box-msg">Sign in to start your session</p> -->
   
  <div class="container-fluid">
    <section class="container">
      <div class="container-page">
        <div class="col-md-6">
          
          <img src="img/industrial_iot.png" id="logo_custom" width="80%"  alt="industrial iot" title="industrial-iot" />

          <br><br>
          <p>
            Chào mừng các bạn đến với trang web.
          </p>
          <p>
            Với việc đăng kí thành viên các bạn sẽ nhận được thông hữu ích từ trang Industrial-iot.
          </p>
          <p>
            <!-- Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6) -->
          </p>
          <p>
            Hi vọng trang web sẽ cung cấp những thông bạn cảm thấy hài lòng. Cảm ơn bạn.
          </p>
        </div>

        <div class="col-md-6">
          @if(session('notify'))
            <div class="alert alert-{{session('label')}}">
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

          <form action="register" method="post">
            @csrf
            <h3 class="dark-grey">Registration</h3>
            
            <div class="form-group col-lg-6 col-md-6">
              <label>Your name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            
            <div class="form-group col-lg-6">
              <label>Password </label>  <label class="checkbox-inline"><input type="checkbox" value="">Show</label>
              <input type="password" name="password" class="form-control">
            </div>
            
            <div class="form-group col-lg-6">
              <label>Repeat Password</label>
              <input type="password" name="re_password" class="form-control">
            </div>
                    
            <div class="form-group col-lg-6">
              <label>Email Address</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            
            <div class="form-group col-lg-6">
              <label>Repeat Email Address</label>
              <input type="email" name="re_email" class="form-control" value="{{ old('re_email') }}">
            </div>

            <div class="form-group col-lg-6">
              <button type="submit" class="btn btn-primary">Register</button>   
            </div>
          </form>        
        </div> 
      </div>
    </section>
  </div>
    
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="v1/member/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="v1/member/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
