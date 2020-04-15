<!DOCTYPE html>
<html>
<head>
	<title>{{$namePage}} | Admin</title>
	<base href="{{asset('')}}">
	<link rel="shortcut icon" type="image/png" href="img/code.png"/>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!------ Include the above in your HEAD tag ---------->
	<head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/></head>
	<style type="text/css">
		  .container{
        border:1px solid green;
        text-align:center;
        
        height:500px;
        width:400px;
    }
    body{
        padding:60px;
    }
    h2{
        margin:auto;
    }
    .row{
        height:90px;
        width:395px;
        background-color:paleturquoise;
    }
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		 <h2><i class="fa fa-lock" aria-hidden="true"></i> Admin Login</h2>
  </div>
  <br/>
  @if(session('notification'))
    <div class="alert alert-danger">
        {{session('notification')}}                         
    </div>
	@endif
	@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
	@endif
  <form action="admin/login" method="post">
  	@csrf
	  <div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
			</div>
			<input type="text" name="email" class="form-control" placeholder="Email"/>
		</div><br/>
	         
	  <div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-key icon"></i></span>
			</div>
				<input type="Password" name="password" class="form-control" placeholder="password"/>
		</div><br />
	  <div class="checkbox">
	    <label><input type="checkbox" value=""/> Remember me</label>
	  </div><br />
	  
	  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Login</button>
	         
	  <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-remove"></span>Login with Facebook </button><br/>
 	</form>
               <br/> <center><div style="border:1px solid green;height:0px;width:250px;"></div></center><br />
        <div class="footer">
                  <p>Don't have an Account! <a href="#">Sign Up Here</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
 
	</div>

	<script src="v1/admin/js/flash_notification.js"></script>
</body>
</html>