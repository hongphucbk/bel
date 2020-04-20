<!DOCTYPE html>
<html>
<head>
 <title>{{$namePage}}</title>
 <base href="{{asset('')}}">
</head>
<body>
 <h1 style="color: blue">INDUSTRIAL IOT</h1>
 <h3>Cảm ơn {{ $user->name }} đã đăng kí thành viên trên trang web industrial-iot.asia.</h3>
 <p>Bạn vui lòng bấm vào link để xác nhận đăng kí <a href="confirm/{{ $confirmation_code }}">Tại đây</a> </p>
 <hr>
 <p>Thank you</p>
 <p>Industrial-Iot Team</p>
</body>
</html> 
