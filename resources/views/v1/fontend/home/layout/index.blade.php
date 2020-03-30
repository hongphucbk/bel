<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="{{ $namePage }} | @yield('title') - Industrial Digital Transformation - PLC S7 1200 - Gateway">
    <meta name="author" content="{{ $namePage }} - Phuc Truong | Vietnam">
    <meta name="keywords" content="{{ $namePage }}, Smart factory, IOT, Gateway">

    <base href="{{asset('')}}">
    <title>{{ $namePage }} | @yield('title') - Industrial Digital Transformation</title>
    <link rel="shortcut icon" type="image/png" href="img/plc.png"/>

    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    

    <link href="v1/news/css/index.css" rel="stylesheet">
    <link href="v1/news/css/product.css" rel="stylesheet">
    <link href="v1/news/css/product1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <style type="text/css">
      
    </style>
    @yield('css')
</head>

<body>
<div class="container">
  <div class="row">
    <nav class="navbar fixed-top navbar-expand-md custom-navbar navbar-dark">
     <img class="navbar-brand" src="img/industrial_iot.png" id="logo_custom" width="15%"  alt="industrial iot" title="industrial-iot" />
        <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon "></span>
        </button>
        @include('v1.fontend.home.layout.header')         
    </nav>
  </div>
</div>

<!-- Course -->
<div class="container" style="margin-top: 5%; margin-bottom: 20px;">
  <div class="row" >

    @foreach($infos as $key => $val)
    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
        <div class="card">
          @if(! $val->linkpicture)
            <img class="card-img-top" src="https://picsum.photos/200/150/?random" style="height:190px !important">
          @else
            <img class="card-img-top" src="upload/course_info/img/{{$val->linkpicture}}" style="height:190px !important">
          @endif
            <div class="card-block">
                <h4 class="card-title" style="color: green !important"><a href="v1/page/appendix/{{$val->id}}/{{changeTitle($val->name)}}">{{ $val->name }}</a></h4>
                <div class="meta">
                  VND {{ number_format($val->price) }}
                  <span style="float: right;">
                    <a href="v1/page/appendix/{{$val->id}}/{{changeTitle($val->name)}}"><span><i class="far fa-list-alt"> {{ get_Total_Lesson($val->id) }} Bài</i></span></a>
                  </span>
                </div>
                
                
                <div class="card-text">
                    Tổng bài học {{ get_Total_Lesson($val->id) }}
                    <br>
                    Bạn cần {{ $val->duration }} giờ để học
                </div>
            </div>
            <div class="card-footer">
                <span class="float-right"> {{ $val->updated_at->format("Y") }}</span>
                <span><i class=""></i>Tác giả: {{ $val->professor }}</span>
            </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
<!-- End Course -->

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
<hr>
<!-- Product 1 Link: https://bootsnipp.com/snippets/xrXp9 -->
<div class="container">
    <h3 class="h3">Product - Solutions/ Sản phẩm - Giải pháp</h3>
    <div class="row">
      @foreach($products as $key => $val)  
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="v1/news/img/img1.png">
                        <img class="pic-2" src="v1/news/img/img1.png">
                    </a>
                    <!-- <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul> -->
                    <span class="product-new-label">New</span>
                    <span class="product-discount-label">10%</span>
                </div>
                <ul class="rating">
                  @for($i = 1; $i <= $val->rate; $i++)
                    <li class="fa fa-star"></li>
                  @endfor
                  @for($i = 1; $i <= 5 - $val->rate; $i++)
                    <li class="fa fa-star disable"></li>
                  @endfor
                </ul>
                <div class="product-content">
                    <h3 class="title"><a href="v1/page/product/{{ $val->id }}">{{ $val->name }}</a></h3>
                    <div class="price">VND {{ number_format($val->promote_price) }}
                        <span>VND {{ number_format($val->price) }}  </span>
                    </div>
                    <a class="add-to-cart" href="v1/page/product/{{ $val->id }}">+ Chi tiết</a>
                </div>
            </div>
        </div>
      @endforeach
        
    </div>
</div>
<!-- End Product 1 -->
<hr>
<!-- Our service -->
<div class="container" style="margin-top: 2%;">
    <div class="section-heading center-holder" style="text-align: center;">
        <h3>Our service</h3>
        <div class="section-heading-line"></div>
        <p>We have more solutions to solve your problem
            <br>As bellow.</p>
    </div>
    <?php $i= 1; ?>
    @foreach($services as $key => $val)
        @if($i == 1)<div class="row mt-60">@endif
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <div class="serv-section-2-icon"> <i class="{{$val->icon}}"></i> </div>
                <div class="serv-section-desc">
                    <h4>{{$val->name}}</h4>
                    <h5>{{$val->description}}</h5> </div>
                <div class="section-heading-line-left"></div>
            </div>
        </div>
        
        @if($i == 3)
            </div>
            <?php  $i = 1; ?>
        @else
            <?php $i = $i + 1; ?>
        @endif
    @endforeach           
</div>
<!-- End Our service -->
<hr>

<!-- Soft -->
<div class="container" style="margin-top: 5%; margin-bottom: 20px;">
  <div class="section-heading center-holder" style="text-align: center;">
      <h3>Automation Soft/ Phần mềm tự động hóa</h3>
      <div class="section-heading-line"></div>
      <p>We have more solutions to solve your problem
          <br>As bellow.</p>
  </div>

  <div class="row" >
    @foreach($softs as $key => $val)
    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
        <div class="card">
          @if(! $val->linkpicture)
            <img class="card-img-top" src="https://picsum.photos/200/150/?random" style="height:190px !important" alt="{{ $val->name }}" title="{{ $val->name }}">
          @else
            <img class="card-img-top" src="upload/soft/img/{{$val->linkpicture}}" style="height:190px !important" alt="{{ $val->name }}" title="{{ $val->name }}">
          @endif
            <div class="card-block">
                <h4 class="card-title" style="color: green !important"><a href="">{{ $val->name }}</a></h4>
                <div class="meta">
                  Dung lượng/Size: {{ $val->price }}
                  <span style="float: right;">
                    <a href="v1/page/soft/{{$val->id}}/{{ changeTitle($val->name) }}"><span><i class="far fa-list-alt"> Chi tiết</i></span></a>
                  </span>
                </div>
                
                
                <div class="card-text">
                    
                </div>
            </div>
            <div class="card-footer">
                <span class="float-right"> {{ $val->updated_at->format("Y") }}</span>
                <span><i class=""></i>Tác giả: {{ $val->professor }}</span>
            </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
<!-- End Soft -->
<hr>
<!-- Contact -->
<div class="container" style="margin-top: 20px; ">
  <div class="section-heading center-holder" style="text-align: center;">
      <h3 style="padding-top: 20px;padding-bottom: 30px;">Thông tin liên hệ</h3>
  </div>
    <div class="row">
        
        <div class="col-md-6">
          <!-- <a href="https://goo.gl/maps/yNqHtjxoz9cvcNCL8">Address</a> -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.591950966394!2d106.7320561141169!3d10.842506360936955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527daa45b96a7%3A0xbf5d4de820bf5107!2zxJDGsOG7nW5nIDM4LCBIaeG7h3AgQsOsbmggQ2jDoW5oLCBUaOG7pyDEkOG7qWMsIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1577887487839!5m2!1sen!2s" width="500" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

            
        </div>
        
        <div class="col-md-6">
            <h1>{{ $namePage }}</h1>
            <address>
                <h2><strong>Địa chỉ</strong></h2>
                <h3>38 Street - Hiep Binh Chanh</h3>
                
                Thu Duc<br>
                Hồ Chí Minh<br>
                Việt Nam<br>
                email: industrial.iot.vn@gmail.com<br>
                <abbr title="Phone">P:</abbr> 094 111 2022
            </address>
        </div>
    </div>
</div>
<!-- End Contact -->

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
