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
    <div class="incoming">
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
            <a class="nav-link active" href="{{url('outgoing_post')}}">Add outgoing post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('browse_outgoing')}}">Browse outgoing post</a>
        </li>
        @if (Auth()->user()->admin == 'yes')
        <li class="nav-item">
            <a class="nav-link" href="{{url('add_user')}}">Add user</a>
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
    <h3 style="color:green;margin:0 0 50px 0;">Add outgoing post</h3>
    <form action="{{url('outgoing_post/add')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="fname">Send date:</label><br>
            <input type="date" id="fname" name="date"><br>
            @if ($errors->has('date'))
            <span class="error" style="color:red">{{ $errors->first('date') }}</span>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="lname">Letter number:</label><br>
            <input type="text" id="lname" name="number"><br>
            @if ($errors->has('number'))
            <span class="error" style="color:red">{{ $errors->first('number') }}</span>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="fname">Receiver name:</label><br>
            <input type="text" id="fname" name="name"><br>
            @if ($errors->has('name'))
            <span class="error" style="color:red">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lname">Street:</label><br>
            <input type="text" id="lname" name="street"><br>
            @if ($errors->has('street'))
            <span class="error" style="color:red">{{ $errors->first('street') }}</span>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="fname">House number:</label><br>
            <input type="text" id="fname" name="house"><br>
            @if ($errors->has('house'))
            <span class="error" style="color:red">{{ $errors->first('house') }}</span>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="fname">City:</label><br>
            <input type="text" id="fname" name="city"><br>
            @if ($errors->has('city'))
            <span class="error" style="color:red">{{ $errors->first('city') }}</span>
            @endif
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="lname">Post code</label><br>
            <input type="text" id="lname" name="code"><br>
            @if ($errors->has('code'))
            <span class="error" style="color:red">{{ $errors->first('code') }}</span>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="lname">Post:</label><br>
            <input type="text" id="lname" name="post"><br>
            @if ($errors->has('post'))
            <span class="error" style="color:red">{{ $errors->first('post') }}</span>
            @endif
        </div>
    </div>
        <input type="submit" class="btn btn-danger" value="Add outgoing letter">
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