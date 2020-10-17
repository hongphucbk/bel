<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Phuc Truong">
    <meta name="generator" content="INDUSTRIAL MANAGEMENTS">
    <base href="{{asset('')}}">
    <title>BEL | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="img/plc.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .alert{
        margin: 0px;
        padding-bottom: 0px;
        padding-top: 0px;
        padding-left: 4px;
        padding-right: 4px;
      }

      .dropdown-item{
        padding-top: 1px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 1px;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="v1/member/css/navbar-top-fixed.css" rel="stylesheet">
    @yield('css')
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top-1" style="background-color: rgb(0,0,102);">
      <a class="navbar-brand" href="#">BEL Group</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse" style="margin-left: 60px;">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <div class="nav-link">@yield('module-code') <span class="sr-only">(current)</span></div>
          </li>
          <li class="nav-item">
            <div class="nav-link" href="#">@yield('module-name')</div>
          </li>
          
        </ul>
        
        
      </div>
      <div class="btn-group" style="margin-right: 5px; padding-left: 5px;">
        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Module
        </button>
        <div class="dropdown-menu dropdown-menu-lg-right" >
          <a class="dropdown-item" href="v1/member/doc/status">DMS Status</a>
          <a class="dropdown-item" href="v1/member/doc/role">DMS Role</a>
          <a class="dropdown-item" href="v1/member/doc/auth">DMS Connect role</a>
          <a class="dropdown-item" href="v1/member/doc/infor">DMS Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="v1/member/user">User</a>
        </div>
      </div>
      <!-- Example single danger button -->
      <div class="btn-group">
        <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          {{ Auth::user()->name }}
        </button>
        <div class="dropdown-menu dropdown-menu-lg-right" >
          <a class="dropdown-item" href="#">Profile</a>
          <!-- <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout">Logout</a>
        </div>
      </div>
    </nav>
    
    @yield('menu2')

    @yield('content')

    <nav class="navbar fixed-bottom  navbar-dark bg-dark" style="margin: 0px">
      <div>
        @if(count($errors)>0)
          <div class="alert alert-danger alert-footer">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
          </div>
        @endif

        @if(session('notify'))
          <div class="alert alert-success alert-footer">
            {{session('notify')}}                         
          </div>
        @endif     
      </div>
      <div style="float: right; color: white">
        <label>Smart factory - Version 1.0</label>
      </div>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(".alert-footer").delay(5000).slideUp();
    </script>
    @yield('script')
</html>
