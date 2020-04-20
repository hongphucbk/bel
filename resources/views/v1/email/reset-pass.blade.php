<!DOCTYPE html>
<html>
<head>
 <title>{{$namePage}}</title>
 <base href="{{asset('')}}">
</head>
<body>
 <h1 style="color: blue">INDUSTRIAL IOT</h1>
 <h4>RESET PASSWORD</h4>
 <p>Bạn {{ $user->name }} vui lòng bấm vào link để reset password <a href="newpass/{{ $new_pass }}">Tại đây</a> </p>
 <hr>
 <p>Thank you</p>
 <p>Industrial-Iot Team</p>
</body>
</html> 
