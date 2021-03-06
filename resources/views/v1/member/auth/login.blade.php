
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <base href="{{asset('')}}">
    <title>BEL | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="img/logo-bel.png"/>


    <title>{{$namePage}} | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      div.main{
          background: #969696; /* Old browsers */
      background: -moz-radial-gradient(center, ellipse cover,  #969696 1%, #1c2b5a 100%); /* FF3.6+ */
      background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(1%,#969696), color-stop(100%,#1c2b5a)); /* Chrome,Safari4+ */
      background: -webkit-radial-gradient(center, ellipse cover,  #969696 1%,#969696 100%); /* Chrome10+,Safari5.1+ */
      background: -o-radial-gradient(center, ellipse cover,  #969696 1%,#969696 100%); /* Opera 12+ */
      background: -ms-radial-gradient(center, ellipse cover,  #969696 1%,#969696 100%); /* IE10+ */
      background: radial-gradient(ellipse at center,  #969696 1%,#969696 100%); /* W3C */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#969696', endColorstr='#969696',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
      height:calc(100vh);
      width:100%;
      }

      [class*="fontawesome-"]:before {
        font-family: 'FontAwesome', sans-serif;
      }

      /* ---------- GENERAL ---------- */

      * {
        box-sizing: border-box;
          margin:0px auto;

        &:before,
        &:after {
          box-sizing: border-box;
        }

      }

      body {
         
          color: #606468;
        font: 87.5%/1.5em 'Open Sans', sans-serif;
        margin: 0;
      }

      a {
        color: #eee;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }

      input {
        border: none;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 14px;
        line-height: 1.5em;
        padding: 0;
        -webkit-appearance: none;
      }

      p {
        line-height: 1.5em;
      }

      .clearfix {
        *zoom: 1;

        &:before,
        &:after {
          content: ' ';
          display: table;
        }

        &:after {
          clear: both;
        }

      }

      .container {
        left: 50%;
        position: fixed;
        top: 50%;
        transform: translate(-50%, -50%);
      }

      /* ---------- LOGIN ---------- */

      #login form{
        width: 250px;
      }
      #login, .logo{
          display:inline-block;
          width:40%;
      }
      #login{
      border-right:1px solid #fff;
        padding: 0px 22px;
        width: 59%;
      }
      .logo{
      color:#fff;
      font-size:50px;
        line-height: 125px;
      }

      #login form span.fa {
        background-color: #fff;
        border-radius: 3px 0px 0px 3px;
        color: #000;
        display: block;
        float: left;
        height: 50px;
          font-size:24px;
        line-height: 50px;
        text-align: center;
        width: 50px;
      }

      #login form input {
        height: 50px;
      }
      fieldset{
          padding:0;
          border:0;
          margin: 0;

      }
      #login form input[type="text"], input[type="password"] {
        background-color: #fff;
        border-radius: 0px 3px 3px 0px;
        color: #000;
        margin-bottom: 1em;
        padding: 0 16px;
        width: 200px;
      }

      #login form input[type="submit"] {
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        background-color: #000000;
        color: #eee;
        font-weight: bold;
        /* margin-bottom: 2em; */
        text-transform: uppercase;
        padding: 5px 10px;
        height: 30px;
      }

      #login form input[type="submit"]:hover {
        background-color: #d44179;
      }

      #login > p {
        text-align: center;
      }

      #login > p span {
        padding-left: 5px;
      }
      .middle {
        display: flex;
        width: 600px;
      }
    </style>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</head>
<body>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 --><!-- Include the above in your HEAD tag -->

<div class="main">
  <div class="container">
    <center>
      <div class="middle">
        <div id="login">
          
          @if(session('notify'))
            <div class="alert alert-{{ session('label') }}">
                {{ session('notify') }}                         
            </div>
          @endif
          @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
          @endif
          <form action="login" method="post">
            @csrf
            <fieldset class="clearfix">

              <p ><span class="fa fa-user"></span>
                <input type="text"  Placeholder="Email" required="" name="email">
              </p>
              <p><span class="fa fa-lock"></span>
                <input type="password"  Placeholder="Password" required name="password">
              </p>
              
              <div>
                  <!-- <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot
                  password?</a></span> -->
                  <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
              </div>

            </fieldset>
            <div class="clearfix"></div>
          </form>

          <div class="clearfix"></div>

        </div> <!-- end login -->
        <div class="logo">
            <img src="img/bel.png" style="width: 200px">
            <div class="clearfix"></div>
        </div>     
      </div>
    </center>
    <div style="text-align: center; padding-top: 40px; color: white">Please contact your administrator if you can not login</div>
  </div>
  
</div>
<script type="text/javascript">

</script>
<script type="text/javascript">
  $(".alert").delay(5000).slideUp();
</script>
</body>
</html>
