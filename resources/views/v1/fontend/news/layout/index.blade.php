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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="v1/news/css/index.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    @yield('css')
</head>

<body>
<div class="container">
    <div class="row">
        <nav class="navbar fixed-top navbar-expand-md custom-navbar navbar-dark">
         <img class="navbar-brand" src="img/codedaoplc.png" id="logo_custom" width="10%"  alt="logo">
            <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon "></span>
            </button>
            @include('v1.fontend.news.layout.header')
              
        </nav>
    </div>
</div>
<div class="container" style="margin-top: 5%; margin-bottom: 20px;">
  <div class="row" >
    @foreach($infos as $key => $val)
    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
        <div class="card">
            <img class="card-img-top" src="https://picsum.photos/200/150/?random">
            <div class="card-block">
                <h4 class="card-title" style="color: green !important">{{ $val->name }}</h4>
                <div class="meta">
                    <a href="#">VND {{ number_format($val->price) }}</a>
                </div>
                <div class="card-text">
                    Tổng bài học.
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
<!-- <div class="container" style="margin-top: 5%">
    <div class="row" >
        <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
            <div class="card">
                <img class="card-img-top" src="https://picsum.photos/200/150/?random">
                <div class="card-block">
                    <h4 class="card-title">Tawshif Ahsan Khan</h4>
                    <div class="meta">
                        <a href="#">Friends</a>
                    </div>
                    <div class="card-text">
                        Tawshif is a web designer living in Bangladesh.
                    </div>
                </div>
                <div class="card-footer">
                    <span class="float-right">Joined in 2013</span>
                    <span><i class=""></i>75 Friends</span>
                </div>
            </div>
        </div>
    </div>
</div> -->

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
    <!-- // end container -->
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
    @include('v1.fontend.news.layout.footer')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @yield('script')

</body>

</html>
