<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <base href="{{asset('')}}">
    <title>Code dao plc | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="img/plc.png"/>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
     <img class="navbar-brand" src="img/codedaoplc.png" id="logo_custom" width="10%"  alt="logo"/>
        <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon "></span>
        </button>
        @include('v1.fontend.news.layout.header')         
    </nav>
  </div>
</div>

<!-- Course -->
<div class="container" style="margin-top: 5%; margin-bottom: 20px;">
  <div class="row" >
    @foreach($infos as $key => $val)
    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
        <div class="card">
            <img class="card-img-top" src="https://picsum.photos/200/150/?random">
            <div class="card-block">
                <h4 class="card-title" style="color: green !important">{{ $val->name }}</h4>
                <div class="meta">
                  VND {{ number_format($val->price) }}
                  <span style="float: right;">
                    <a href="v1/page/appendix/{{$val->id}}"><span><i class="far fa-list-alt"> {{ get_Total_Lesson($val->id) }} Bài</i></span></a>
                  </span>
                </div>
                
                
                <div class="card-text">
                    Tổng bài học {{ get_Total_Lesson($val->id) }}
                    <br>
                    Tổng số giờ học.
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
    <h3 class="h3">Product / Solutions</h3>
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
                    <h3 class="title"><a href="#">{{ $val->name }}</a></h3>
                    <div class="price">VND {{ number_format($val->promote_price) }}
                        <span>VND {{ number_format($val->price) }}  </span>
                    </div>
                    <a class="add-to-cart" href="">+ Chi tiết</a>
                </div>
            </div>
        </div>
      @endforeach
        
    </div>
</div>
<!-- End Product 1 -->

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

<!-- Contact -->
<div class="container" style="margin-top: 20px; ">
  <div class="section-heading center-holder" style="text-align: center;">
      <h3 style="padding-top: 20px;padding-bottom: 30px;">Thông tin liên hệ</h3>
  </div>
    <div class="row">
        
        <div class="col-md-9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1399548826093!2d106.70929831411662!3d10.800591161702224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528bab4ff54a3%3A0x2a094731a07a6319!2zMzAwIFjDtCBWaeG6v3QgTmdo4buHIFTEqW5oLCBQaMaw4budbmcgMjEsIELDrG5oIFRo4bqhbmgsIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1569040345385!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        
        <div class="col-md-3">
            <h2>Code dạo PLC</h2>
            <address>
                <strong>Địa chỉ</strong><br>
                300 Xô Viết Nghệ Tĩnh<br>
                Phường 21<br>
                Bình Thạnh<br>
                Hồ Chí Minh<br>
                Việt Nam<br>
                email: codedaoplc@gmail.com<br>
                <abbr title="Phone">P:</abbr> 094 111 2022
            </address>
        </div>
    </div>
</div>
<!-- End Contact -->

@include('v1.fontend.news.layout.footer')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@yield('script')

</body>

</html>
