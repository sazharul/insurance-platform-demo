<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($aboutuspage->en_title) ? $aboutuspage->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($aboutuspage->bn_title) ? $aboutuspage->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($aboutuspage->en_breadcrumb_1) ? $aboutuspage->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($aboutuspage->bn_breadcrumb_1) ? $aboutuspage->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($aboutuspage->en_breadcrumb_2) ? $aboutuspage->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($aboutuspage->bn_breadcrumb_2) ? $aboutuspage->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image1') ? 'has-error' : ''}}">
    <label for="image1" class="control-label">{{ 'Image1' }}</label>
    @if (isset($aboutuspage->image1) ? $aboutuspage->image1 : '')
    <img src="{{asset(isset($aboutuspage->image1) ? $aboutuspage->image1 : '')}}" alt="" style="height: 100px; width: 100px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image1" type="file" id="image1" value="{{ isset($aboutuspage->image1) ? $aboutuspage->image1 : ''}}" >
    {!! $errors->first('image1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image2') ? 'has-error' : ''}}">
    <label for="image2" class="control-label">{{ 'Image2' }}</label>
    @if (isset($aboutuspage->image2) ? $aboutuspage->image2 : '')
    <img src="{{asset(isset($aboutuspage->image2) ? $aboutuspage->image2 : '')}}" alt="" style="height: 100px; width: 100px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image2" type="file" id="image2" value="{{ isset($aboutuspage->image2) ? $aboutuspage->image2 : ''}}" >
    {!! $errors->first('image2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_description') ? 'has-error' : ''}}">
    <label for="en_description" class="control-label">{{ 'En Description' }}</label>
    <textarea class="form-control" rows="5" name="en_description" type="textarea" id="en_description" >{{ isset($aboutuspage->en_description) ? $aboutuspage->en_description : ''}}</textarea>
    {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_description') ? 'has-error' : ''}}">
    <label for="bn_description" class="control-label">{{ 'Bn Description' }}</label>
    <textarea class="form-control" rows="5" name="bn_description" type="textarea" id="bn_description" >{{ isset($aboutuspage->bn_description) ? $aboutuspage->bn_description : ''}}</textarea>
    {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_core_title') ? 'has-error' : ''}}">
    <label for="en_core_title" class="control-label">{{ 'En Core Title' }}</label>
    <input class="form-control" name="en_core_title" type="text" id="en_core_title" value="{{ isset($aboutuspage->en_core_title) ? $aboutuspage->en_core_title : ''}}" >
    {!! $errors->first('en_core_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_core_title') ? 'has-error' : ''}}">
    <label for="bn_core_title" class="control-label">{{ 'Bn Core Title' }}</label>
    <input class="form-control" name="bn_core_title" type="text" id="bn_core_title" value="{{ isset($aboutuspage->bn_core_title) ? $aboutuspage->bn_core_title : ''}}" >
    {!! $errors->first('bn_core_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_left_core_description') ? 'has-error' : ''}}">
    <label for="en_left_core_description" class="control-label">{{ 'En Left Core Description' }}</label>
    <textarea class="form-control" rows="5" name="en_left_core_description" type="textarea" id="en_left_core_description" >{{ isset($aboutuspage->en_left_core_description) ? $aboutuspage->en_left_core_description : ''}}</textarea>
    {!! $errors->first('en_left_core_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_left_core_description') ? 'has-error' : ''}}">
    <label for="bn_left_core_description" class="control-label">{{ 'Bn Left Core Description' }}</label>
    <textarea class="form-control" rows="5" name="bn_left_core_description" type="textarea" id="bn_left_core_description" >{{ isset($aboutuspage->bn_left_core_description) ? $aboutuspage->bn_left_core_description : ''}}</textarea>
    {!! $errors->first('bn_left_core_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('core_image') ? 'has-error' : ''}}">
    <label for="core_image" class="control-label">{{ 'Core Image' }}</label>
    <img src="{{asset($aboutuspage->core_image)}}" alt="" style="height: 100px; width: 150px;">
    <input class="form-control" name="core_image" type="file" id="core_image" value="{{ isset($aboutuspage->core_image) ? $aboutuspage->core_image : ''}}" >
    {!! $errors->first('core_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_right_core_description') ? 'has-error' : ''}}">
    <label for="bn_right_core_description" class="control-label">{{ 'Bn Right Core Description' }}</label>
    <textarea class="form-control" rows="5" name="bn_right_core_description" type="textarea" id="bn_right_core_description" >{{ isset($aboutuspage->bn_right_core_description) ? $aboutuspage->bn_right_core_description : ''}}</textarea>
    {!! $errors->first('bn_right_core_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_process_title') ? 'has-error' : ''}}">
    <label for="en_process_title" class="control-label">{{ 'En Process Title' }}</label>
    <input class="form-control" name="en_process_title" type="text" id="en_process_title" value="{{ isset($aboutuspage->en_process_title) ? $aboutuspage->en_process_title : ''}}" >
    {!! $errors->first('en_process_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_process_title') ? 'has-error' : ''}}">
    <label for="bn_process_title" class="control-label">{{ 'Bn Process Title' }}</label>
    <input class="form-control" name="bn_process_title" type="text" id="bn_process_title" value="{{ isset($aboutuspage->bn_process_title) ? $aboutuspage->bn_process_title : ''}}" >
    {!! $errors->first('bn_process_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_process_description') ? 'has-error' : ''}}">
    <label for="en_process_description" class="control-label">{{ 'En Process Description' }}</label>
    <input class="form-control" name="en_process_description" type="text" id="en_process_description" value="{{ isset($aboutuspage->en_process_description) ? $aboutuspage->en_process_description : ''}}" >
    {!! $errors->first('en_process_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_process_description') ? 'has-error' : ''}}">
    <label for="bn_process_description" class="control-label">{{ 'Bn Process Description' }}</label>
    <input class="form-control" name="bn_process_description" type="text" id="bn_process_description" value="{{ isset($aboutuspage->bn_process_description) ? $aboutuspage->bn_process_description : ''}}" >
    {!! $errors->first('bn_process_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('process_image') ? 'has-error' : ''}}">
    <label for="process_image" class="control-label">{{ 'Process Image' }}</label>
    <img src="{{asset($aboutuspage->process_image)}}" alt="" style="height: 100px; width: 150px;">
    <input class="form-control" name="process_image" type="file" id="process_image" value="{{ isset($aboutuspage->process_image) ? $aboutuspage->process_image : ''}}" >
    {!! $errors->first('process_image', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
