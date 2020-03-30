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
    <title>{{ $namePage }} | @yield('title') - Industrial Digital Transformation</title>
    <!-- <link rel="shortcut icon" type="image/png" href="image/icon/congty.png"/> -->

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="v1/fontend/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="v1/fontend/css/stroke.css">
    <link rel="stylesheet" type="text/css" href="v1/fontend/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="v1/fontend/css/animate.css">
    <link rel="stylesheet" type="text/css" href="v1/fontend/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="v1/fontend/css/style.css">

    <link rel="stylesheet" type="text/css" href="v1/fontend/js/syntax-highlighter/styles/shCore.css" media="all">
    <link rel="stylesheet" type="text/css" href="v1/fontend/js/syntax-highlighter/styles/shThemeRDark.css" media="all">
    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="v1/fontend/css/custom.css">
    <link rel="stylesheet" type="text/css" href="v1/fontend/css/product.detail.css">

    @yield('css')
</head>

<body>
    @yield('content')

    <script src="v1/fontend/js/jquery.min.js"></script>
    <script src="v1/fontend/js/bootstrap.min.js"></script>
    <script src="v1/fontend/js/retina.js"></script>
    <script src="v1/fontend/js/jquery.fitvids.js"></script>
    <script src="v1/fontend/js/wow.js"></script>
    <script src="v1/fontend/js/jquery.prettyPhoto.js"></script>

    <!-- CUSTOM PLUGINS -->
    <script src="v1/fontend/js/custom.js"></script>
    <script src="v1/fontend/js/main.js"></script>

    <script src="v1/fontend/js/syntax-highlighter/scripts/shCore.js"></script>
    <script src="v1/fontend/js/syntax-highlighter/scripts/shBrushXml.js"></script>
    <script src="v1/fontend/js/syntax-highlighter/scripts/shBrushCss.js"></script>
    <script src="v1/fontend/js/syntax-highlighter/scripts/shBrushJScript.js"></script>
    @yield('script')
</body>

</html>
