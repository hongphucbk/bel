<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="description" content="{{ $namePage }} | @yield('title')">
    <meta name="author" content="{{ $namePage }} - Phuc Truong | Vietnam">
    <meta name="keywords" content="{{ $namePage }}, Smart factory">

    <base href="{{asset('')}}">
    <title>{{ $namePage }} | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="img/plc.png"/>

    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Bootstrap v4.1.1 -->
    <link href="v1/home/css/bootstrap.min.css" rel="stylesheet">

    <link href="v1/news/css/index.css" rel="stylesheet">
    <link href="v1/news/css/product.css" rel="stylesheet">
    <link href="v1/news/css/product1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <style type="text/css">
      
    </style>

    <script data-ad-client="ca-pub-2650132087883895" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
    @yield('css')
</head>

<body>
<div class="container">
  <div class="row">
    <nav class="navbar fixed-top navbar-expand-md custom-navbar navbar-dark">
     <img class="navbar-brand" src="img/bel.png" id="logo_custom" width="45px"  alt="industrial iot" title="industrial-iot" />
        <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon "></span>
        </button>
        @include('v1.fontend.home.layout.header')         
    </nav>
  </div>
</div>


<hr>
<!-- News -->
@yield('content')

<!-- End Course -->



<!-- Product https://bootsnipp.com/snippets/xrXp9 -->
<!-- <div class="container">
  <div class="row">
    <div class="new-arrival">
           <div class="titlebar">
            <div class="next-back">
                 <span><a data-slide="prev" href="#Carousel" class="left carousel-control">Back</a></span>
                 <span><a data-slide="next" href="#Carousel" class="right carousel-control">Next</a></span>
              </div>
           </div>
           <div class="arrival-product">

              <div id="Carousel" class="carousel slide" data-ride="carousel">                         
                 <div class="carousel-inner">
                    <div class="carousel-item active">
                       <div class="arrival-item">
                          <Ul>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                          </Ul>                                    
                       </div>         
                    </div> 
                    <div class="carousel-item">
                       <div class="arrival-item">
                          <Ul>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                          </Ul>                                    
                       </div>                    
                    </div>             
                    <div class="carousel-item">
                       <div class="arrival-item">
                          <Ul>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                             <li><a href="#"><img src="http://placehold.jp/300x350.png" alt="Image" style="max-width:100%;"></a></li>
                          </Ul>                                    
                       </div>
                    </div>
                 </div>    
              </div>

           </div>
        </div>
  </div>
</div> -->
<!-- End Product -->





@include('v1.fontend.home.layout.footer')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
   $(document).ready(function(){
  $("#showbutton").click(function(){
    $("#showing").slideToggle("slow");
  });
  });
</script>
@yield('script')

</body>

</html>
