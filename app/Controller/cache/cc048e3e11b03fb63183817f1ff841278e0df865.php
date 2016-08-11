<?php $__env->startSection('content'); ?>
    <style>
        @import  url(https://fonts.googleapis.com/css?family=Tangerine);
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
        <?php echo $__env->make('_partials.svg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <h1><?php echo e($me); ?></h1><p><?php echo e($message); ?></p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>