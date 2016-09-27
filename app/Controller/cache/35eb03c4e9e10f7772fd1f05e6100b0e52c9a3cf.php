<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome To Elham</title>
    <base href="http://<?php echo e($_SERVER['HTTP_HOST']); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/<?php echo e(getenv('APP_ENV')); ?>/bootstrap.css" />
    <link rel="stylesheet" href="css/<?php echo e(getenv('APP_ENV')); ?>/alertify.css" />
    <link rel="stylesheet" href="css/<?php echo e(getenv('APP_ENV')); ?>/semantic.css" />
    <link rel="stylesheet" href="css/<?php echo e(getenv('APP_ENV')); ?>/style.css" />
    <link rel="stylesheet" href="css/<?php echo e(getenv('APP_ENV')); ?>/summernote.css" />
    <link rel="icon" href="images/favicon.ico" />
    <style>
    <?php if($_SERVER['REQUEST_URI']=='/'): ?>
        body{background-image:url('images/banner.jpg');background-size: cover;}
        <?php else: ?>
            body{background-image:url('images/banner22.jpg');background-size: cover;}
    <?php endif; ?>
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
                <li <?php if($_SERVER['REQUEST_URI']=='/'): ?> class="active" <?php endif; ?>><a href="/">Home</a></li>
                <li <?php if($_SERVER['REQUEST_URI']=='/user/create'): ?> class="active" <?php endif; ?>><a href="/user/create">Registration</a></li>
                <li <?php if($_SERVER['REQUEST_URI']=='/usersarticle/show'): ?> class="active" <?php endif; ?>><a href="/usersarticle/show">Articles</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?php if($_SERVER['REQUEST_URI']=='/user/login'): ?> class="active" <?php endif; ?>><a href="/user/login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php if($_SERVER['REQUEST_URI']!='/'): ?>
    <?php echo $__env->make('_partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<!-- JavaScripts -->
<script src="js/<?php echo e(getenv('APP_ENV')); ?>/alertify.js"></script>
<script src="js/<?php echo e(getenv('APP_ENV')); ?>/jquery.min.js"></script>
<script src="js/<?php echo e(getenv('APP_ENV')); ?>/bootstrap.js"></script>
<script src="js/<?php echo e(getenv('APP_ENV')); ?>/summernote.js"></script>
<script src="js/<?php echo e(getenv('APP_ENV')); ?>/script.js"></script>
</body>
</html>