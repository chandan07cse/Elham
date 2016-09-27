{{\Elham\Controller\AuthController::check()}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To Dashboard</title>
    <base href="http://{{$_SERVER['HTTP_HOST']}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/bootstrap.css" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/alertify.css" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/semantic.css" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/style.css" />
    <link rel="stylesheet" href="css/{{getenv('APP_ENV')}}/summernote.css" />
    <link rel="icon" href="images/favicon.ico" />
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
            <a class="navbar-brand" href="/user/dashboard"><img class="img-circle img-responsive" src="images/{{\Elham\Controller\AuthController::image()}}" width="45" height="40"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li @if($_SERVER['REQUEST_URI']=='/user/dashboard') class="active" @endif><a href="/user/dashboard">Dashboard</a></li>
                <li @if($_SERVER['REQUEST_URI']=='/user/'.\Elham\Controller\AuthController::userId()) class="active" @endif><a href="/user/{{\Elham\Controller\AuthController::userId()}}">Profile</a></li>
                <li @if($_SERVER['REQUEST_URI']=='/articles/input') class="active" @endif><a href="/articles/input">Input Article</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/user/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
   @yield('content')
</div>
@include('_partials.footer')

<!-- JavaScripts -->
<script src="js/{{getenv('APP_ENV')}}/alertify.js"></script>
<script src="js/{{getenv('APP_ENV')}}/jquery.min.js"></script>
<script src="js/{{getenv('APP_ENV')}}/bootstrap.js"></script>
<script src="js/{{getenv('APP_ENV')}}/summernote.js"></script>
<script src="js/{{getenv('APP_ENV')}}/script.js"></script>
</body>
</html>