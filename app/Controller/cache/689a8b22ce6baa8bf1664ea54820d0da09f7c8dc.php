<?php if(!empty($_REQUEST['oldInputs']))  $oldValue = json_decode($_REQUEST['oldInputs']); ?>
<?php if(!empty($_REQUEST['errorBag'])) $errors = json_decode($_REQUEST['errorBag']); ?>
<?php /*<form action="/user/store" method="POST"  role="form" enctype="multipart/form-data">*/ ?>
    <?php /*<legend>Register Please</legend>*/ ?>
    <?php /*<div class="form-group col-md-9 <?php echo e(@$errors->username ? 'has-error' : ''); ?>">*/ ?>
        <?php /*<input class="form-control" name="username" type="text" <?php echo e(@$errors->username ? 'autofocus' : ''); ?> placeholder="username" value="<?php echo e(@$oldValue->username); ?>">*/ ?>
        <?php /*<?php if(@$errors->username): ?>*/ ?>
            <?php /*<ul>*/ ?>
                <?php /*<?php foreach($errors->username as $error): ?>*/ ?>
                    <?php /*<li><?php echo e($error); ?></li>*/ ?>
                <?php /*<?php endforeach; ?>*/ ?>
            <?php /*</ul>*/ ?>
        <?php /*<?php endif; ?>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<div class="form-group col-md-9 <?php echo e(@$errors->email ? 'has-error' : ''); ?>">*/ ?>
        <?php /*<input class="form-control" name="email" type="email" <?php echo e(@$errors->email ? 'autofocus':''); ?> placeholder="email" value="<?php echo e(@$oldValue->email); ?>">*/ ?>
        <?php /*<?php if(@$errors->email): ?>*/ ?>
            <?php /*<ul>*/ ?>
                <?php /*<?php foreach($errors->email as $error): ?>*/ ?>
                    <?php /*<li><?php echo e($error); ?></li>*/ ?>
                <?php /*<?php endforeach; ?>*/ ?>
            <?php /*</ul>*/ ?>
        <?php /*<?php endif; ?>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<div class="form-group col-md-9 <?php echo e(@$errors->password ? 'has-error' : ''); ?>">*/ ?>
        <?php /*<input class="form-control" name="password" <?php echo e(@$errors->password ? 'autofocus':''); ?> type="password" value="<?php echo e(@$oldValue->password); ?>" placeholder="password">*/ ?>
        <?php /*<?php if(@$errors->password): ?>*/ ?>
            <?php /*<ul>*/ ?>
                <?php /*<?php foreach($errors->password as $error): ?>*/ ?>
                    <?php /*<li><?php echo e($error); ?></li>*/ ?>
                <?php /*<?php endforeach; ?>*/ ?>
            <?php /*</ul>*/ ?>
        <?php /*<?php endif; ?>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<div class="form-group col-md-9 <?php echo e(@$errors->confirm_password ? 'has-error' : ''); ?>">*/ ?>
        <?php /*<input class="form-control" name="confirm_password" <?php echo e(@$errors->confirm_password ? 'autofocus':''); ?> type="password" value="<?php echo e(@$oldValue->confirm_password); ?>" placeholder="password again">*/ ?>
        <?php /*<?php if(@$errors->confirm_password): ?>*/ ?>
            <?php /*<ul>*/ ?>
                <?php /*<?php foreach($errors->confirm_password as $error): ?>*/ ?>
                    <?php /*<li><?php echo e($error); ?></li>*/ ?>
                <?php /*<?php endforeach; ?>*/ ?>
            <?php /*</ul>*/ ?>
        <?php /*<?php endif; ?>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<div class="form-group col-md-9 <?php echo e(@$errors->image ? 'has-error' : ''); ?>">*/ ?>
        <?php /*<input class="form-control" name="image" <?php echo e(@$errors->image ? 'autofocus':''); ?> type="file" value="<?php echo e(@$oldValue->image); ?>" placeholder="Your Image Please">*/ ?>
        <?php /*<?php if(@$errors->image): ?>*/ ?>
            <?php /*<ul>*/ ?>
                <?php /*<?php foreach($errors->image as $error): ?>*/ ?>
                    <?php /*<li><?php echo e($error); ?></li>*/ ?>
                <?php /*<?php endforeach; ?>*/ ?>
            <?php /*</ul>*/ ?>
        <?php /*<?php endif; ?>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<div class="form-group col-md-9">*/ ?>
        <?php /*<button class="btn btn-primary">Join</button>*/ ?>
    <?php /*</div>*/ ?>
<?php /*</form>*/ ?>

<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/user/login">Sign In</a></div>
        </div>
        <div class="panel-body" >
            <form  class="form-horizontal" role="form" method="POST" action="/user/store" enctype="multipart/form-data">
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Username</label>
                    <div class="col-md-9 <?php echo e(@$errors->username ? 'has-error' : ''); ?>">
                        <input type="text" class="form-control" <?php echo e(@$errors->username ? 'autofocus' : ''); ?> name="username" placeholder="Your Username" value="<?php echo e(@$oldValue->username); ?>">
                        <?php if(@$errors->username): ?>
                            <ul>
                                <?php foreach($errors->username as $error): ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9 <?php echo e(@$errors->email ? 'has-error' : ''); ?>">
                        <input type="text" class="form-control" <?php echo e(@$errors->email ? 'autofocus' : ''); ?> name="email" placeholder="Email Address" value="<?php echo e(@$oldValue->email); ?>">
                        <?php if(@$errors->email): ?>
                            <ul>
                                <?php foreach($errors->email as $error): ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9 <?php echo e(@$errors->password ? 'has-error' : ''); ?>">
                        <input type="password" class="form-control" <?php echo e(@$errors->password ? 'autofocus':''); ?>  value="<?php echo e(@$oldValue->password); ?>" placeholder="password">
                        <?php if(@$errors->password): ?>
                            <ul>
                                <?php foreach($errors->password as $error): ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-md-3 control-label">Confirm</label>
                    <div class="col-md-9 <?php echo e(@$errors->confirm_password ? 'has-error' : ''); ?>">
                        <input class="form-control" name="confirm_password" <?php echo e(@$errors->confirm_password ? 'autofocus':''); ?> type="password" value="<?php echo e(@$oldValue->confirm_password); ?>" placeholder="password again">
                        <?php if(@$errors->confirm_password): ?>
                            <ul>
                                <?php foreach($errors->confirm_password as $error): ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="icode" class="col-md-3 control-label">Your Image</label>
                    <div class="col-md-9  <?php echo e(@$errors->image ? 'has-error' : ''); ?>">
                        <input class="form-control" name="image" <?php echo e(@$errors->image ? 'autofocus':''); ?> type="file" value="<?php echo e(@$oldValue->image); ?>" placeholder="Your Image Please">
                        <?php if(@$errors->image): ?>
                            <ul>
                                <?php foreach($errors->image as $error): ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <button  type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                        <?php /*<input type="submit" value="Sign up">*/ ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
