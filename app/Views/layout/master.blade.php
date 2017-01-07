<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To Elham</title>
    <base href="http://{{$_SERVER['HTTP_HOST']}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/bootstrap.css" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/alertify.css" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/semantic.css" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/style.css" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/summernote.css" />
    <link rel="icon" href="images/favicon.ico" />
    <style>
    @if($_SERVER['REQUEST_URI']=='/')
        body{background-image:url('images/banner.jpg');background-size: cover;}
    @else
        body{background-image:url('images/banner22.jpg');background-size: cover;}
    @endif
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="images/favicon.ico"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li @if($_SERVER['REQUEST_URI']=='/') class="active" @endif><a href="/">Home</a></li>
                <li @if($_SERVER['REQUEST_URI']=='/user/create') class="active" @endif><a href="/user/create">Registration</a></li>
                <li @if($_SERVER['REQUEST_URI']=='/usersarticle/show') class="active" @endif><a href="/usersarticle/show">Articles</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li @if($_SERVER['REQUEST_URI']=='/user/login') class="active" @endif><a href="/user/login"><i class="material-icons valign">accessible</i>Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
@if($_SERVER['REQUEST_URI']!='/')
    @include('_partials.footer')
@endif
<!-- JavaScripts -->
<script src="js/{{getenv('APP_ENV')}}/alertify.js"></script>
<script src="js/{{getenv('APP_ENV')}}/jquery.min.js"></script>
<script src="js/{{getenv('APP_ENV')}}/bootstrap.js"></script>
<script src="js/{{getenv('APP_ENV')}}/summernote.js"></script>
<script src="js/{{getenv('APP_ENV')}}/script.js"></script>
</body>
</html>