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
    <title>Codedaoplc | @yield('title')</title>
    <!-- <link rel="shortcut icon" type="image/png" href="image/icon/congty.png"/> -->

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
        .custab{
            border: 1px solid #ccc;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
        }
        .custab:hover{
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
        }
    </style>

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="v1/fontend/css/custom.css">
    @yield('css')
</head>

<body>
    @yield('content')


</body>
<!-- SCRIPT -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

@yield('script')
</html>
