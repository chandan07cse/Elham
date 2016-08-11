<?php /* */$oldValue = !empty($_REQUEST['oldInputs']) ? json_decode($_REQUEST['oldInputs']) : json_encode(['val'=>'noor']);/* */ ?>
<?php /* */$errors = !empty($_REQUEST['errorBag']) ? json_decode($_REQUEST['errorBag']) : json_encode([''=>'']);/**/ ?>

<form action="/user/<?php echo e($userData['id']); ?>/update" method="POST"  role="form" enctype="multipart/form-data">
    <legend>Profile</legend>
    <div class="form-group col-sm-12 <?php echo e(@$errors->username ? 'has-error' : ''); ?>">
        <label for="username">Username</label>
        <input class="form-control" name="username" type="text" <?php echo e(@$errors->username ? 'autofocus' : ''); ?> placeholder="username" value="<?php echo e(@$userData['username']); ?>">
        <?php if(@$errors->username): ?>
            <ul>
                <?php foreach($errors->username as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="form-group col-sm-12 <?php echo e(@$errors->email ? 'has-error' : ''); ?>">
        <label for="email">Email</label>
        <input class="form-control" name="email" type="email" <?php echo e(@$errors->email ? 'autofocus':''); ?> placeholder="email" value="<?php echo e(@$userData['email']); ?>">
        <?php if(@$errors->email): ?>
            <ul>
                <?php foreach($errors->email as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="form-group col-sm-12 <?php echo e(@$errors->password ? 'has-error' : ''); ?>">
        <label for="password">Password</label>
        <input class="form-control" name="password" <?php echo e(@$errors->password ? 'autofocus':''); ?> type="password" value="<?php echo e(@$userData['password']); ?>" placeholder="password">
        <?php if(@$errors->password): ?>
            <ul>
                <?php foreach($errors->password as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="form-group col-sm-12 <?php echo e(@$errors->confirm_password ? 'has-error' : ''); ?>">
        <label for="password_confirmation">Confirm Password</label>
        <input class="form-control" name="confirm_password" <?php echo e(@$errors->confirm_password ? 'autofocus':''); ?> type="password" value="<?php echo e(@$userData['confirm_password']); ?>" placeholder="password again">
        <?php if(@$errors->confirm_password): ?>
            <ul>
                <?php foreach($errors->confirm_password as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="form-group col-sm-12 <?php echo e(@$errors->image ? 'has-error' : ''); ?>">
        <label for="image">Update Image</label>
        <img src="images/<?php echo e($userData['image']); ?>" width="100" height="100" alt="">
        <input class="form-control" name="image" <?php echo e(@$errors->image ? 'autofocus':''); ?> type="file" value="<?php echo e(@$userData['image']); ?>" />
        <?php if(@$errors->image): ?>
            <ul>
                <?php foreach($errors->image as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="form-group col-sm-12">
        <button class="btn btn-primary">Update</button>
    </div>
</form>

