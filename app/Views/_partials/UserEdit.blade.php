{{-- */$oldValue = !empty($_REQUEST['oldInputs']) ? json_decode($_REQUEST['oldInputs']) : json_encode(['val'=>'noor']);/* --}}
{{-- */$errors = !empty($_REQUEST['errorBag']) ? json_decode($_REQUEST['errorBag']) : json_encode([''=>'']);/*--}}

<form action="/user/{{$userData['id']}}/update" method="POST"  role="form" enctype="multipart/form-data">
    <legend>Profile</legend>
    <div class="form-group col-sm-12 {{ @$errors->username ? 'has-error' : ''}}">
        <label for="username">Username</label>
        <input class="form-control" name="username" type="text" {{ @$errors->username ? 'autofocus' : ''}} placeholder="username" value="{{@$userData['username']}}">
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
        <input class="form-control" name="email" type="email" {{@$errors->email ? 'autofocus':''}} placeholder="email" value="{{@$userData['email']}}">
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
        <input class="form-control" name="password" {{@$errors->password ? 'autofocus':''}} type="password" value="{{@$userData['password']}}" placeholder="password">
        @if(@$errors->password)
            <ul>
                @foreach($errors->password as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group col-sm-12 {{@$errors->confirm_password ? 'has-error' : ''}}">
        <label for="password_confirmation">Confirm Password</label>
        <input class="form-control" name="confirm_password" {{@$errors->confirm_password ? 'autofocus':''}} type="password" value="{{@$userData['confirm_password']}}" placeholder="password again">
        @if(@$errors->confirm_password)
            <ul>
                @foreach($errors->confirm_password as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group col-sm-12 {{@$errors->image ? 'has-error' : ''}}">
        <label for="image">Update Image</label>
        <img src="images/{{$userData['image']}}" width="100" height="100" alt="">
        <input class="form-control" name="image"  {{@$errors->image ? 'autofocus':''}} type="file"   />
        <input type="hidden" name="oldImageName" value="{{@$userData['image']}}">
        @if(@$errors->image)
            <ul>
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
{{@$userData['image']}}
