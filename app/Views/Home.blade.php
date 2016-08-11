@extends('layout.master')
@section('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Tangerine);
        h1{
            font-family: 'Tangerine', cursive;
            font-size:50px;
            text-shadow: 6px 6px 0px rgba(0,0,0,0.2);
        }
        body {
            background: #ff9c08;
            color: #fff;
        }
        a {
            color:#fff;
        }
        p {
            padding: 3em 0;
        }
        .container {
            text-align:center;
            padding: 3em 0;
            margin-top: 5%;
        }
    </style>
    <div class="container">
        @include('_partials.svg')
        <h1>{{$me}}</h1><p>{{$message}}</p>
    </div>
    <a href="/user/create">Create</a>
@endsection