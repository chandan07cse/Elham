<?php
    $errors = \Elham\Controller\BaseController::getWith('errorBag');
    $oldValue = \Elham\Controller\BaseController::getWith('oldInputs');
?>
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
                    <div class="col-md-9 {{ @$errors->username ? 'has-error' : ''}}">
                        <input type="text" class="form-control" {{ @$errors->username ? 'autofocus' : ''}} name="username" placeholder="Your Username" value="{{@$oldValue->username}}" required>
                        @if(@$errors->username)
                            <ul class="validate_error">
                                @foreach($errors->username as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9 {{ @$errors->email ? 'has-error' : ''}}">
                        <input type="email" class="form-control" {{ @$errors->email ? 'autofocus' : ''}} name="email" placeholder="Email Address" value="{{@$oldValue->email}}" required>
                        @if(@$errors->email)
                            <ul class="validate_error">
                                @foreach($errors->email as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9 {{@$errors->password ? 'has-error' : ''}}">
                        <input name="password" type="password" class="form-control" {{@$errors->password ? 'autofocus':''}}  value="{{@$oldValue->password}}" placeholder="password" required>
                        @if(@$errors->password)
                            <ul class="validate_error">
                                @foreach($errors->password as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-md-3 control-label">Confirm</label>
                    <div class="col-md-9 {{@$errors->confirm_password ? 'has-error' : ''}}">
                        <input class="form-control" name="confirm_password" {{@$errors->confirm_password ? 'autofocus':''}} type="password" value="{{@$oldValue->confirm_password}}" placeholder="password again" required>
                        @if(@$errors->confirm_password)
                            <ul class="validate_error">
                                @foreach($errors->confirm_password as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="icode" class="col-md-3 control-label">Your Image</label>
                    <div class="col-md-9  {{@$errors->image ? 'has-error' : ''}}">
                        <input class="form-control" name="image" {{@$errors->image ? 'autofocus':''}} type="file" value="{{@$oldValue->image}}" placeholder="Your Image Please" required>
                        @if(@$errors->image)
                            <ul class="validate_error">
                                @foreach($errors->image as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <button  type="submit" class="btn btn-info" id="sign-up"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                    </div>
                </div>
                {{ \Elham\Controller\BaseController::getFlash('notice')}}
            </form>
        </div>
    </div>
</div>
