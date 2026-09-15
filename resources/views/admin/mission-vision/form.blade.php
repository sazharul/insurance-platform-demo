<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($missionvision->en_title) ? $missionvision->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($missionvision->bn_title) ? $missionvision->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($missionvision->en_breadcrumb_1) ? $missionvision->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($missionvision->bn_breadcrumb_1) ? $missionvision->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($missionvision->en_breadcrumb_2) ? $missionvision->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($missionvision->bn_breadcrumb_2) ? $missionvision->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('main_image') ? 'has-error' : ''}}">
    <label for="main_image" class="control-label">{{ 'Main Image' }}</label>
    <img src="{{asset($missionvision->main_image)}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    <input class="form-control" name="main_image" type="file" id="main_image" value="{{ isset($missionvision->main_image) ? $missionvision->main_image : ''}}" >
    {!! $errors->first('main_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details') ? 'has-error' : ''}}">
    <label for="en_details" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_details" type="textarea" id="en_details" >{{ isset($missionvision->en_details) ? $missionvision->en_details : ''}}</textarea>
    {!! $errors->first('en_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_details') ? 'has-error' : ''}}">
    <label for="bn_details" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_details" type="textarea" id="bn_details" >{{ isset($missionvision->bn_details) ? $missionvision->bn_details : ''}}</textarea>
    {!! $errors->first('bn_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_mission_title') ? 'has-error' : ''}}">
    <label for="en_mission_title" class="control-label">{{ 'En Mission Title' }}</label>
    <input class="form-control" name="en_mission_title" type="text" id="en_mission_title" value="{{ isset($missionvision->en_mission_title) ? $missionvision->en_mission_title : ''}}" >
    {!! $errors->first('en_mission_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_mission_title') ? 'has-error' : ''}}">
    <label for="bn_mission_title" class="control-label">{{ 'Bn Mission Title' }}</label>
    <input class="form-control" name="bn_mission_title" type="text" id="en_mission_title" value="{{ isset($missionvision->bn_mission_title) ? $missionvision->bn_mission_title : ''}}" >
    {!! $errors->first('bn_mission_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mission_image') ? 'has-error' : ''}}">
    <label for="mission_image" class="control-label">{{ 'Mission Image' }}</label>
    <img src="{{asset($missionvision->mission_image)}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    <input class="form-control" name="mission_image" type="file" id="mission_image" value="{{ isset($missionvision->mission_image) ? $missionvision->mission_image : ''}}" >
    {!! $errors->first('mission_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_mission_info_1') ? 'has-error' : ''}}">
    <label for="en_mission_info_1" class="control-label">{{ 'En Mission Info 1' }}</label>
    <input class="form-control" name="en_mission_info_1" type="text" id="en_mission_info_1" value="{{ isset($missionvision->en_mission_info_1) ? $missionvision->en_mission_info_1 : ''}}" >
    {!! $errors->first('en_mission_info_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_mission_info_1') ? 'has-error' : ''}}">
    <label for="bn_mission_info_1" class="control-label">{{ 'Bn Mission Info 1' }}</label>
    <input class="form-control" name="bn_mission_info_1" type="text" id="bn_mission_info_1" value="{{ isset($missionvision->bn_mission_info_1) ? $missionvision->bn_mission_info_1 : ''}}" >
    {!! $errors->first('bn_mission_info_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_mission_info_2') ? 'has-error' : ''}}">
    <label for="en_mission_info_2" class="control-label">{{ 'En Mission Info 2' }}</label>
    <input class="form-control" name="en_mission_info_2" type="text" id="en_mission_info_2" value="{{ isset($missionvision->en_mission_info_2) ? $missionvision->en_mission_info_2 : ''}}" >
    {!! $errors->first('en_mission_info_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_mission_info_2') ? 'has-error' : ''}}">
    <label for="bn_mission_info_2" class="control-label">{{ 'Bn Mission Info 2' }}</label>
    <input class="form-control" name="bn_mission_info_2" type="text" id="bn_mission_info_2" value="{{ isset($missionvision->bn_mission_info_2) ? $missionvision->bn_mission_info_2 : ''}}" >
    {!! $errors->first('bn_mission_info_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_vision_title') ? 'has-error' : ''}}">
    <label for="en_vision_title" class="control-label">{{ 'En Vision Title' }}</label>
    <input class="form-control" name="en_vision_title" type="text" id="en_vision_title" value="{{ isset($missionvision->en_vision_title) ? $missionvision->en_vision_title : ''}}" >
    {!! $errors->first('en_vision_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_mission_title') ? 'has-error' : ''}}">
    <label for="bn_vision_title" class="control-label">{{ 'Bn Vision Title' }}</label>
    <input class="form-control" name="bn_vision_title" type="text" id="en_vision_title" value="{{ isset($missionvision->bn_vision_title) ? $missionvision->bn_vision_title : ''}}" >
    {!! $errors->first('bn_vision_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vision_image') ? 'has-error' : ''}}">
    <label for="vision_image" class="control-label">{{ 'Vision Image' }}</label>
    <img src="{{asset($missionvision->vision_image)}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    <input class="form-control" name="vision_image" type="file" id="vision_image" value="{{ isset($missionvision->vision_image) ? $missionvision->vision_image : ''}}" >
    {!! $errors->first('vision_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_vision_info_1') ? 'has-error' : ''}}">
    <label for="en_vision_info_1" class="control-label">{{ 'En Vision Info 1' }}</label>
    <input class="form-control" name="en_vision_info_1" type="text" id="en_vision_info_1" value="{{ isset($missionvision->en_vision_info_1) ? $missionvision->en_vision_info_1 : ''}}" >
    {!! $errors->first('en_vision_info_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_vision_info_1') ? 'has-error' : ''}}">
    <label for="bn_vision_info_1" class="control-label">{{ 'Bn Vision Info 1' }}</label>
    <input class="form-control" name="bn_vision_info_1" type="text" id="bn_vision_info_1" value="{{ isset($missionvision->bn_vision_info_1) ? $missionvision->bn_vision_info_1 : ''}}" >
    {!! $errors->first('bn_vision_info_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_vision_info_2') ? 'has-error' : ''}}">
    <label for="en_vision_info_2" class="control-label">{{ 'En Vision Info 2' }}</label>
    <input class="form-control" name="en_vision_info_2" type="text" id="en_vision_info_2" value="{{ isset($missionvision->en_vision_info_2) ? $missionvision->en_vision_info_2 : ''}}" >
    {!! $errors->first('en_vision_info_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_vision_info_2') ? 'has-error' : ''}}">
    <label for="bn_vision_info_2" class="control-label">{{ 'Bn Vision Info 2' }}</label>
    <input class="form-control" name="bn_vision_info_2" type="text" id="bn_vision_info_2" value="{{ isset($missionvision->bn_vision_info_2) ? $missionvision->bn_vision_info_2 : ''}}" >
    {!! $errors->first('bn_vision_info_2', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
