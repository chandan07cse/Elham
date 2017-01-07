{{\Elham\Controller\BaseController::getFlash('greeting')}}
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Sign In</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
        </div>

        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <form  class="form-horizontal" role="form" action="/user/login/post" method="POST">
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="email" class="form-control" name="email" value="" placeholder="Your Email Please" required>
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="Your Password Please" required>
                </div>
                <div class="input-group">
                    <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                        </label>
                    </div>
                </div>
                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                        <button id="btn-login" class="btn btn-success">Login</button>
                        {{--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>--}}
                    </div>
                </div>
            </form>
            <div class="form-group">
                <div class="col-md-12 control">
                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                        Don't have an account!
                        <a href="/user/create">
                            Sign Up Here
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
