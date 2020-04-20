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

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body class="hold-transition">
<div class="login-box" style="margin-top: 5%;">  	

  <!-- <p class="login-box-msg">Sign in to start your session</p> -->
  
  
  <div class="container-fluid">
    <section class="container">
      <div class="container-page">
        <div class="col-md-6" style="text-align: justify-all;">
          <img src="img/industrial_iot.png" id="logo_custom" width="80%"  alt="industrial iot" title="industrial-iot" />
          <p>
            <!-- Chào mừng các bạn đến với trang web. -->
          </p>
          <p>
          </p>
          <p>
            Để reset lại password bạn vui lòng nhập địa chỉ email đã đăng kí. Sau đó check mail và làm theo hướng dẫn.
          </p>
          <p>
            <!-- Hi vọng trang web sẽ cung cấp những thông bạn cảm thấy hài lòng. Cảm ơn bạn. -->
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

          <form action="resetpass" method="post">
            @csrf
            <h3 class="dark-grey">Forget Pass</h3>
                    
            <div class="form-group col-lg-8">
              <label>Email Address</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-primary">Reset</button>   
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
