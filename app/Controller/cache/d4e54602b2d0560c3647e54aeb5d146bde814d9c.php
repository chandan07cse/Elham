<?php $__env->startSection('content'); ?>
<?php echo $__env->make('_partials.UserEdit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo e(@$_REQUEST['message']); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>