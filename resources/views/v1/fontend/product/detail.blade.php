@extends('v1.fontend.course.detail.layout.index')
@section('title')
	{{ $info->name }}
@endsection
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>



@section('css')
<style>

</style>

@endsection
@section('content')
<div class="container">   
  <div class="row">
    <div class="col-md-12">
      <div class="big-title text-center">
        <h1><span><img src="img/codedaoplc.png" alt="Code dao PLC" width="200px"></span></h1>
        <p class="lead">Sản phẩm <span style="color: blue">{{ $info->name }}</span></p>
      </div>
    </div>

    <div class="col-md-4 item-photo">
      <img style="max-width:100%;" src="https://ak1.ostkcdn.com/images/products/20133268/Strick-Bolton-Yinka-Antique-Glass-Pendant-Lights-00f4f1d3-f3ea-4599-bc7a-9ddd16c96e39.jpg" />
    </div>

    <div class="col-md-8" style="border:0px solid gray">
        <!-- Datos del vendedor y titulo del producto -->
        <h3>Samsung Galaxy S4 I337 16GB 4G LTE Unlocked GSM Android Cell Phone</h3>    
        <h5 style="color:#337ab7">vendido por <a href="#">Samsung</a> · <small style="color:#337ab7">(5054 ventas)</small></h5>

        <!-- Precios -->
        <h6 class="title-price"><small>PRICE/ GIÁ</small></h6>
        <h3 style="margin-top:0px;"> 
            @if(!$info->promote_price)
                VNĐ <span style="color: blue">{{ number_format($info->price) }}</span>
            @else
                VNĐ <strike>{{ number_format($info->price) }}</strike>
                VNĐ <span style="color: blue">{{ number_format($info->promote_price) }}</span>
            @endif
            

        </h3>


        <!-- Detalles especificos del producto -->
        <!-- <div class="section">
            <h6 class="title-attr" style="margin-top:15px;" ><small>COLOR</small></h6>                    
            <div>
                <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                <div class="attr" style="width:25px;background:white;"></div>
            </div>
        </div>
        <div class="section" style="padding-bottom:5px;">
            <h6 class="title-attr"><small>CAPACIDAD</small></h6>                    
            <div>
                <div class="attr2">16 GB</div>
                <div class="attr2">32 GB</div>
            </div>
        </div>    -->
        <div class="section" style="padding-bottom:20px;">
            <h6 class="title-attr"><small>ON HAND / SẴN CÓ HÀNG</small></h6>                    
            <div>
                <input value="1" disabled="" />
            </div>
        </div>                

        <!-- Botones de compra -->
        <div class="section" style="padding-bottom:20px;">
            <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> ĐỂ ĐẶT HÀNG GỌI 094.111.2022</button>
            <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> PLEASE CALL 094.111.2022</a></h6>
        </div>                                        
    </div>                              

    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        @foreach($details as $key => $val)
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#{{ $val->id }}">{{ $val->title }}</a>
          </li>
        @endforeach
      </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <?php $i = 0 ?>
          @foreach($details as $key => $val)
          <div id="{{ $val->id }}" class="container tab-pane 
            @if($i == 0)
            active
            @endif
            "><br>
            <h3>{{ $val->title }}</h3>
            {!! $val->content !!}
          </div>
          <?php $i++ ?>
          @endforeach
        </div>

    </div>    
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    //-- Click on detail
    $("ul.menu-items > li").on("click",function(){
        $("ul.menu-items > li").removeClass("active");
        $(this).addClass("active");
    })

    $(".attr,.attr2").on("click",function(){
        var clase = $(this).attr("class");

        $("." + clase).removeClass("active");
        $(this).addClass("active");
    })

    //-- Click on QUANTITY
    $(".btn-minus").on("click",function(){
        var now = $(".section > div > input").val();
        if ($.isNumeric(now)){
            if (parseInt(now) -1 > 0){ now--;}
            $(".section > div > input").val(now);
        }else{
            $(".section > div > input").val("1");
        }
    })            
    $(".btn-plus").on("click",function(){
        var now = $(".section > div > input").val();
        if ($.isNumeric(now)){
            $(".section > div > input").val(parseInt(now)+1);
        }else{
            $(".section > div > input").val("1");
        }
    })                        
  }) 
</script>
@endsection