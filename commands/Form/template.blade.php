{{$oldValue = json_decode($_REQUEST['oldInputs'])}}
{{$errors = json_decode($_REQUEST['errorBag'])}}

<form action="/formData" method="POST"  role="form" enctype="multipart/form-data">
    <legend>Profile</legend>
    <div class="form-group col-sm-12 {{ $errors->username ? 'has-error' : ''}}">
        <label for="username">Username</label>
        <input class="form-control" name="username" type="text" {{ $errors->username ? 'autofocus' : ''}} placeholder="username" value="{{$oldValue->username}}">
        <ul>
            @foreach($errors->username as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    <div class="form-group col-sm-12 {{ $errors->email ? 'has-error' : ''}}">
        <label for="email">Email</label>
        <input class="form-control" name="email" type="email" {{$errors->email ? 'autofocus':''}} placeholder="email" value="{{$oldValue->email}}">
        <ul>
            @foreach($errors->email as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    <div class="form-group col-sm-12 {{$errors->password ? 'has-error' : ''}}">
        <label for="password">Password</label>
        <input class="form-control" name="password" {{$errors->password ? 'autofocus':''}} type="password" value="{{$oldValue->password}}" placeholder="password">
        <ul>
            @foreach($errors->password as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    <div class="form-group col-sm-12 {{$errors->confirm_password ? 'has-error' : ''}}">
        <label for="password_confirmation">Confirm Password</label>
        <input class="form-control" name="confirm_password" {{$errors->confirm_password ? 'autofocus':''}} type="password" value="{{$oldValue->confirm_password}}" placeholder="password again">
        <ul>
            @foreach($errors->confirm_password as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    <div class="form-group col-sm-12 {{$errors->image ? 'has-error' : ''}}">
        <label for="image">Upload Image</label>
        <input class="form-control" name="image" {{$errors->image ? 'autofocus':''}} type="file" value="{{$oldValue->image}}" placeholder="Your Image Please">
        <ul>
            @foreach($errors->image as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    <div class="form-group col-sm-12">
        <button class="btn btn-primary">Join</button>
    </div>
</form>
