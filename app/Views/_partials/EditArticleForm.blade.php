<?php
    $errors = \Elham\Controller\BaseController::getWith('errorBag');
    $oldValue = \Elham\Controller\BaseController::getWith('oldInputs');
?>
{{\Elham\Controller\BaseController::getFlash('articleUpdateMsg')}}
<form action="/article/update/{{$articleData->id}}" method="POST"  role="form">
    <div class="form-group col-sm-12 {{ @$errors->caption ? 'has-error' : ''}}">
        <label for="username">Caption</label>
        <input class="form-control" name="caption" type="text" {{ @$errors->caption ? 'autofocus' : ''}} value="{{$articleData->caption}}" required>
        @if(@$errors->caption)
            <ul class="validate_error">
                @foreach($errors->caption as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="form-group col-sm-12 {{ @$errors->description ? 'has-error' : ''}}">
        <label for="email">Description</label>
        <textarea class="form-control" name="description" type="text" {{@$errors->description ? 'autofocus':''}} required rows="10">{{$articleData->description}}</textarea>
        @if(@$errors->description)
            <ul class="validate_error">
                @foreach($errors->description as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-group col-sm-12">
        <button class="btn btn-success">Update</button>
    </div>
</form>

