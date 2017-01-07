<?php
    $errors = \Elham\Controller\BaseController::getWith('errorBag');
    $oldValue = \Elham\Controller\BaseController::getWith('oldInputs');
?>
{{\Elham\Controller\BaseController::getFlash('userUpdateMessage')}}
<form action="/user/{{$userData['id']}}/update" method="POST"  role="form" enctype="multipart/form-data">
    <div class="form-group col-sm-12 {{ @$errors->username ? 'has-error' : ''}}">
        <label for="username">Username</label>
        <input class="form-control" name="username" type="text" {{ @$errors->username ? 'autofocus' : ''}} value="{{@$userData['username']}}">
        @if(@$errors->username)
            <ul>
                @foreach($errors->username as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group col-sm-12 {{ @$errors->email ? 'has-error' : ''}}">
        <label for="email">Email</label>
        <input class="form-control" name="email" type="email" {{@$errors->email ? 'autofocus':''}} value="{{@$userData['email']}}">
        @if(@$errors->email)
            <ul>
                @foreach($errors->email as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group col-sm-12 {{@$errors->password ? 'has-error' : ''}}">
        <label for="password">Password</label>
        <input class="form-control" name="password" {{@$errors->password ? 'autofocus':''}} type="password">
        @if(@$errors->password)
            <ul class="validate_error">
                @foreach($errors->password as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group col-sm-12 {{@$errors->confirm_password ? 'has-error' : ''}}">
        <label for="password_confirmation">Confirm Password</label>
        <input class="form-control" name="confirm_password" {{@$errors->confirm_password ? 'autofocus':''}} type="password">
        @if(@$errors->confirm_password)
            <ul class="validate_error">
                @foreach($errors->confirm_password as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group col-sm-12 {{@$errors->image ? 'has-error' : ''}}">
        <img src="images/{{$userData['image']}}" width="100" height="100" alt="" id="oldImage">
        <img id="currentImage">
        <input class="form-control" name="image"  {{@$errors->image ? 'autofocus':''}} type="file"   />
        <input type="hidden" name="oldImageName" value="{{@$userData['image']}}">
        @if(@$errors->image)
            <ul class="validate_error">
                @foreach($errors->image as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group col-sm-12">
        <button class="btn btn-primary">Update</button>
    </div>
</form>

