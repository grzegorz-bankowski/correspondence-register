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
<body style="width:1000px;margin:50px auto">
    <div style="width:1000px;text-align:center;margin:50px auto">
    <img class="photo" src="{{ url('img/ridley.jpg') }}">
        Hello {{ ucfirst(Auth()->user()->full_name) }}
        @if (Auth()->user()->admin == 'yes')
        <br>
        <span style="color:red;">(Admin)</span>
        @endif
        <br>
        <a href="{{url('logout')}}">Logout</a>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{url('incoming_post')}}">Add incoming post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('browse_incoming')}}">Browse incoming post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('outgoing_post')}}">Add outgoing post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('browse_outgoing')}}">Browse outgoing post</a>
        </li>
        @if (Auth()->user()->admin == 'yes')
        <li class="nav-item">
            <a class="nav-link active" href="{{url('add_user')}}">Add user</a>
        </li>
        @endif
    </ul>
    @if (Session::get('message'))
    <div style="margin:0 auto;text-align:center;padding:10px;">
        <h3>Success!</h3>
        <p style="margin:0">{{ Session::get('message') }}</p>
    </div>
    @endif
    <div class="container mt-5" style="width:70%;margin:0 auto;">
    <h3 style="color:green;margin:0 0 50px 0;">Add user</h3>
        <form action="{{url('add_user/add')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fname">Full name:</label><br>
                <input type="text" id="fname" name="name"><br>
                @if ($errors->has('name'))
                    <span class="error" style="color:red">{{ $errors->first('name') }}</span>
                @endif
            </div>
        <div class="form-group col-md-4">
            <label for="lname">Login:</label><br>
            <input type="text" id="lname" name="login"><br>
            @if ($errors->has('login'))
            <span class="error" style="color:red">{{ $errors->first('login') }}</span>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="fname">Password:</label><br>
            <input type="text" id="fname" name="password"><br>
            @if ($errors->has('password'))
            <span class="error" style="color:red">{{ $errors->first('password') }}</span>
            @endif
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lname">Admin ('<span style="color:green">yes</span>' or '<span style="color:red">no</span>'):</label><br>
            <input type="text" id="lname" name="admin"><br>
            @if ($errors->has('admin'))
            <span class="error" style="color:red">{{ $errors->first('admin') }}</span>
            @endif
        </div>
    </div>
        <input type="submit" class="btn btn-danger" value="Add user" style="margin:30px 0 0 0;">
    </form>
    </div>
    <footer style="border-top:1px solid #dee2e6; margin:50px 0 0 0; text-align:center;">
    <p style="margin:50px 0 0 0; font-weight:bold">&#169; Correspondence Register 2024</p>
        <p style="margin:0">Author : Grzegorz Bańkowski</p>
        <p style="margin:0">E-mail : <a href="mailto:grzegorz@bankowski.dev" target="_blank">grzegorz@bankowski.dev</a></p>
        <p>Website : <a href="https://bankowski.dev" target="_blank">bankowski.dev</a></p>
    </footer>
</body>
</html>