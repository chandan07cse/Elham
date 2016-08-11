<?php $__env->startSection('content'); ?>
    <ul>
        <?php foreach($users as $user): ?>
            <li>Username : <?php echo e($user['username']); ?></li>
            <li>Password : <?php echo e($user['password']); ?></li>
            <li>Email : <?php echo e($user['email']); ?></li>
            <li>Image : <img src="images/<?php echo e($user['image']); ?>" width="100" height="100"></li>
            <li><a href="/user/<?php echo e($user['id']); ?>">Edit</a></li>
            <li><a href="/user/<?php echo e($user['id']); ?>/delete">Delete</a></li>
        <?php endforeach; ?>
    </ul>
    <?php echo e(@$_REQUEST['message']); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>