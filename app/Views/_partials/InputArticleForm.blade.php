{{--{{\Elham\Controller\BaseController::getFlash('articleInput')}}--}}
<div class="confirm"></div>
<form action="#" method="POST"  role="form" id="articleInputForm">
    <div class="form-group col-sm-12 {{ @$errors->caption ? 'has-error' : ''}}">
        <label for="caption">Caption</label>
        <input class="form-control" name="caption" type="text" {{ @$errors->caption ? 'autofocus' : ''}} value="{{@$oldValue->caption}}" id="caption">
        <div class="captionErrors"></div>
    </div>
    <div class="form-group col-sm-12 {{ @$errors->description ? 'has-error' : ''}}">
        <label for="description">Description</label>
        {{--<textarea class="form-control" name="description" type="text" {{@$errors->description ? 'autofocus':''}}  rows="10">{{@$oldValue->description}}</textarea>--}}
        <textarea name="description" class="summernote" id="description" title="Contents"></textarea>
        <div class="descriptionErrors"></div>
    </div>

    <div class="form-group col-sm-12">
        <button class="btn btn-primary">Input</button>
    </div>
</form>

