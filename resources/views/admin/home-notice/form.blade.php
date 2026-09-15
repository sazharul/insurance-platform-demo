{{--<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">--}}
{{--    <label for="title" class="control-label">{{ 'Title' }}</label>--}}
{{--    <input class="form-control" name="title" type="text" id="title" value="{{ isset($homenotice->title) ? $homenotice->title : ''}}" >--}}
{{--    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" accept="image/*" value="{{ isset($homenotice->image) ? $homenotice->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>

<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($homenotice->status) && $homenotice->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($homenotice->status) && $homenotice->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
