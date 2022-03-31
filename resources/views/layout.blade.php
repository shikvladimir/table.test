<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Test</title>
</head>
<body>
@if(isset($user->name))
<p>Привет:&nbsp;{{$user->name}}</p>
@endif
@if(\Illuminate\Support\Facades\Auth::check() == 'true')
<form method="POST" action="{{route('logout')}}">
    @csrf
    <button type="submit">Выйти из системы</button>
</form>
@endif
@yield('content')
</body>
</html>
