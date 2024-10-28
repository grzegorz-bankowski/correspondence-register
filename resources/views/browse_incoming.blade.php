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
            <a class="nav-link active" href="{{url('browse_incoming')}}">Browse incoming post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('outgoing_post')}}">Add outgoing post</a>
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
    <div class="container mt-5">
    <h3 style="color:green;margin:0 0 50px 0;">Browse incoming post</h3>
        <table id="desktop" class="table table-bordered mb-5">
            <thead>
                <tr class="bg-primary text-white">
                    <th>#</th>
                    <th>Date of receipt</th>
                    <th>Letter number</th>
                    <th>Sender's name</th>
                    <th>Sender's Address</th>
                </tr>
            </thead>
            @foreach($letters as $letter)
            <tr style="vertical-align:middle">
                <td style="vertical-align:middle">{{ $letter->id }}</td>
                <td style="vertical-align:middle">{{ $letter->incoming_date }}</td>
                <td style="vertical-align:middle">{{ $letter->letter_num }}</td>
                <td style="vertical-align:middle">{{ $letter->sender_name }}</td>
                <td style="vertical-align:middle">{{ $letter->street }} {{ $letter->house_num }}<br>{{ $letter->post_code }} {{ $letter->city }}<br>{{ $letter->country }}</td>
            </tr>
            @endforeach
        </table>
                @foreach($letters as $letter)
                <table id="mobile" class="table-bordered mb-5" style="width:100%; margin:0 auto;">
                <tr>
                    <th class="bg-primary text-white" style="width:30%">#</th>
                    <td style="vertical-align:middle" style="width:70%">{{ $letter->id }}</td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Date of receipt</th>
                    <td style="vertical-align:middle">{{ $letter->incoming_date }}</td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Letter number</th>
                    <td style="vertical-align:middle">{{ $letter->letter_num }}</td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Sender's name</th>
                    <td style="vertical-align:middle">{{ $letter->sender_name }}</td>
                </tr>
                <tr>
                    <th class="bg-primary text-white">Sender's Address</th>
                    <td style="vertical-align:middle; margin-bottom:20px;">{{ $letter->street }} {{ $letter->house_num }}<br>{{ $letter->post_code }} {{ $letter->city }}</td>
                </tr>
                </table>
                @endforeach
        <div class="d-flex justify-content-center">
            {{ $letters->links() }}
        </div>
    </div>
    <footer style="border-top:1px solid #dee2e6; margin:50px 0 0 0; text-align:center;">
        <p style="margin:50px 0 0 0; font-weight:bold">&#169; Correspondence Register 2024</p>
        <p style="margin:0">Author : Grzegorz Bańkowski</p>
        <p style="margin:0">E-mail : <a href="mailto:grzegorz@bankowski.dev" target="_blank">grzegorz@bankowski.dev</a></p>
        <p>Website : <a href="https://bankowski.dev" target="_blank">bankowski.dev</a></p>
    </footer>
</body>
</html>