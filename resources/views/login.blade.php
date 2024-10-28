<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<title>Correspondence Register</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="login">
    <img src="{{ url('img/envelope.jpg') }}" style="display:block;margin:0 auto 50px auto">
    <h2 style="text-align:center;margin:0 0 50px 0">Correspondence Register</h2>
    @if (Session::get('denied'))
    <div style="margin:0 auto;color:red;text-align:center;padding:10px;">
        <h4>Access denied!</h4>
        <p style="margin:0">{{ Session::get('denied') }}</p>
    </div>
    @endif
    <form action="{{url('post-login')}}" style="text-align:center" method="POST">
    {{ csrf_field() }}
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login" value="john" style="margin:10px auto"><br>
            @if ($errors->has('login'))
            <span class="error" style="display:block;color:red">{{ $errors->first('login') }}</span>
            @endif
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="admin" style="margin:0 auto 10px auto"><br><br>
        <input type="submit" class="btn btn-danger" value="Log in">
    </form> 
    </div>
</body>
</html>