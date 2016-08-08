<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>Welcome To Elham</title>
    <link rel="stylesheet" href="app/Views/css/{{getenv('APP_ENV')}}/bootstrap.css" />
    <link rel="icon" href="app/Views/images/favicon.ico" />
</head>
<body>
<div class="container">
    @yield('content')
</div>
<!-- JavaScripts -->
<script src="app/Views/js/{{getenv('APP_ENV')}}/jquery.js"></script>
<script src="app/Views/js/{{getenv('APP_ENV')}}/bootstrap.js"></script>
</body>
</html>