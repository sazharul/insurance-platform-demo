<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($circularpage->en_title) ? $circularpage->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($circularpage->bn_title) ? $circularpage->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($circularpage->en_breadcrumb_1) ? $circularpage->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($circularpage->bn_breadcrumb_1) ? $circularpage->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($circularpage->en_breadcrumb_2) ? $circularpage->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($circularpage->bn_breadcrumb_2) ? $circularpage->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_description') ? 'has-error' : ''}}">
    <label for="en_description" class="control-label">{{ 'En Description' }}</label>
    <textarea class="form-control" name="en_description" type="text" id="en_description">{{ isset($circularpage->en_description) ? $circularpage->en_description : ''}}</textarea>
    {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_description') ? 'has-error' : ''}}">
    <label for="bn_description" class="control-label">{{ 'Bn Description' }}</label>
    <textarea class="form-control" name="bn_description" type="text" id="bn_description">{{ isset($circularpage->bn_description) ? $circularpage->bn_description : ''}}</textarea>
    {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <img src="{{asset($circularpage->image)}}" alt="" style="height: 200px; width: 300px;" class="mb-3">
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($circularpage->image) ? $circularpage->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_job_title') ? 'has-error' : ''}}">
    <label for="en_job_title" class="control-label">{{ 'En Job Title' }}</label>
    <input class="form-control" name="en_job_title" type="text" id="en_job_title" value="{{ isset($circularpage->en_job_title) ? $circularpage->en_job_title : ''}}" >
    {!! $errors->first('en_job_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_job_title') ? 'has-error' : ''}}">
    <label for="bn_job_title" class="control-label">{{ 'Bn Job Title' }}</label>
    <input class="form-control" name="bn_job_title" type="text" id="bn_job_title" value="{{ isset($circularpage->bn_job_title) ? $circularpage->bn_job_title : ''}}" >
    {!! $errors->first('bn_job_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_btn_text') ? 'has-error' : ''}}">
    <label for="en_btn_text" class="control-label">{{ 'En Btn Text' }}</label>
    <input class="form-control" name="en_btn_text" type="text" id="en_btn_text" value="{{ isset($circularpage->en_btn_text) ? $circularpage->en_btn_text : ''}}" >
    {!! $errors->first('en_btn_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_btn_text') ? 'has-error' : ''}}">
    <label for="bn_btn_text" class="control-label">{{ 'Bn Btn Text' }}</label>
    <input class="form-control" name="bn_btn_text" type="text" id="bn_btn_text" value="{{ isset($circularpage->bn_btn_text) ? $circularpage->bn_btn_text : ''}}" >
    {!! $errors->first('bn_btn_text', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
