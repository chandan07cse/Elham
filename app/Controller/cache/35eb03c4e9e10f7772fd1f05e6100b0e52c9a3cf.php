<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>Welcome To Elham</title>

    <link rel="stylesheet" href="app/Views/css/<?php echo e(getenv('APP_ENV')); ?>/bootstrap.css" />
    <link rel="icon" href="app/Views/images/elham_avatar.png" />
</head>
<body>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
</body>
</html>