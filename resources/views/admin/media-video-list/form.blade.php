<div class="form-group {{ $errors->has('en_title') ? 'has-error' : '' }}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title"
        value="{{ isset($mediavideolist->en_title) ? $mediavideolist->en_title : '' }}">
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : '' }}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title"
        value="{{ isset($mediavideolist->bn_title) ? $mediavideolist->bn_title : '' }}">
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="control-label">{{ 'Thumbnail Image' }}</label>
    @if (isset($mediavideolist->image) ? $mediavideolist->image : '')
        <img src="{{ asset(isset($mediavideolist->image) ? $mediavideolist->image : '') }}" alt=""
            style="height: 200px; width: 200px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image" type="file" id="image"
        value="{{ isset($mediavideolist->image) ? $mediavideolist->image : '' }}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
    <label for="video" class="control-label">{{ 'Video' }}</label>
    <input class="form-control" name="video" type="file" id="video"
        value="{{ isset($mediavideolist->video) ? $mediavideolist->video : '' }}">
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_date') ? 'has-error' : '' }}">
    <label for="en_date" class="control-label">{{ 'En Date' }}</label>
    <input class="form-control" name="en_date" type="text" id="en_title"
        value="{{ isset($mediavideolist->en_date) ? $mediavideolist->en_date : '' }}">
    {!! $errors->first('en_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_date') ? 'has-error' : '' }}">
    <label for="bn_date" class="control-label">{{ 'Bn Date' }}</label>
    <input class="form-control" name="bn_date" type="text" id="en_title"
        value="{{ isset($mediavideolist->bn_date) ? $mediavideolist->bn_date : '' }}">
    {!! $errors->first('bn_date', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" checked name="status"
            {{ isset($mediavideolist->status) && $mediavideolist->status == 1 ? 'checked' : '' }} id="inlineRadio1"
            value="1">
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status"
            {{ isset($mediavideolist->status) && $mediavideolist->status == 0 ? 'checked' : '' }} id="inlineRadio2"
            value="0">
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
