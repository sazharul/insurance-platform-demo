<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($mujibcorner->en_title) ? $mujibcorner->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($mujibcorner->bn_title) ? $mujibcorner->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($mujibcorner->en_breadcrumb_1) ? $mujibcorner->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($mujibcorner->bn_breadcrumb_1) ? $mujibcorner->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($mujibcorner->en_breadcrumb_2) ? $mujibcorner->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($mujibcorner->bn_breadcrumb_2) ? $mujibcorner->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mujib_image') ? 'has-error' : ''}}">
    <label for="mujib_image" class="control-label">{{ 'Mujib Image' }}</label>
    <img src="{{asset($mujibcorner->mujib_image)}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    <input class="form-control" name="mujib_image" type="file" id="mujib_image" value="{{ isset($mujibcorner->mujib_image) ? $mujibcorner->mujib_image : ''}}" >
    {!! $errors->first('mujib_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details') ? 'has-error' : ''}}">
    <label for="en_details" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_details" type="textarea" id="en_details" >{{ isset($mujibcorner->en_details) ? $mujibcorner->en_details : ''}}</textarea>
    {!! $errors->first('en_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_details') ? 'has-error' : ''}}">
    <label for="bn_details" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_details" type="textarea" id="bn_details" >{{ isset($mujibcorner->bn_details) ? $mujibcorner->bn_details : ''}}</textarea>
    {!! $errors->first('bn_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_gallery_title') ? 'has-error' : ''}}">
    <label for="en_gallery_title" class="control-label">{{ 'En Gallery Title' }}</label>
    <textarea class="form-control" rows="5" name="en_gallery_title" type="textarea" id="en_gallery_title" >{{ isset($mujibcorner->en_gallery_title) ? $mujibcorner->en_gallery_title : ''}}</textarea>
    {!! $errors->first('en_gallery_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_gallery_title') ? 'has-error' : ''}}">
    <label for="bn_gallery_title" class="control-label">{{ 'Bn Gallery Title' }}</label>
    <textarea class="form-control" rows="5" name="bn_gallery_title" type="textarea" id="bn_gallery_title" >{{ isset($mujibcorner->bn_gallery_title) ? $mujibcorner->bn_gallery_title : ''}}</textarea>
    {!! $errors->first('bn_gallery_title', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
