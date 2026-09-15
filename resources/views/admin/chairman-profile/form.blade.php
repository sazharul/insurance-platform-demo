<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($chairmanprofile->en_title) ? $chairmanprofile->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($chairmanprofile->bn_title) ? $chairmanprofile->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($chairmanprofile->en_breadcrumb_1) ? $chairmanprofile->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($chairmanprofile->bn_breadcrumb_1) ? $chairmanprofile->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($chairmanprofile->en_breadcrumb_2) ? $chairmanprofile->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($chairmanprofile->bn_breadcrumb_2) ? $chairmanprofile->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('chairman_image') ? 'has-error' : ''}}">
    <label for="chairman_image" class="control-label">{{ 'Chairman Image' }}</label>
    <img src="{{asset($chairmanprofile->chairman_image)}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    <input class="form-control" name="chairman_image" type="file" id="chairman_image" value="{{ isset($chairmanprofile->chairman_image) ? $chairmanprofile->chairman_image : ''}}" >
    {!! $errors->first('chairman_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($chairmanprofile->en_name) ? $chairmanprofile->en_name : ''}}" >
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($chairmanprofile->bn_name) ? $chairmanprofile->bn_name : ''}}" >
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_designation') ? 'has-error' : ''}}">
    <label for="en_designation" class="control-label">{{ 'En Designation' }}</label>
    <input class="form-control" name="en_designation" type="text" id="en_designation" value="{{ isset($chairmanprofile->en_designation) ? $chairmanprofile->en_designation : ''}}" >
    {!! $errors->first('en_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_designation') ? 'has-error' : ''}}">
    <label for="bn_designation" class="control-label">{{ 'Bn Designation' }}</label>
    <input class="form-control" name="bn_designation" type="text" id="bn_designation" value="{{ isset($chairmanprofile->bn_designation) ? $chairmanprofile->bn_designation : ''}}" >
    {!! $errors->first('bn_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details') ? 'has-error' : ''}}">
    <label for="en_details" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_details" type="textarea" id="en_details" >{{ isset($chairmanprofile->en_details) ? $chairmanprofile->en_details : ''}}</textarea>
    {!! $errors->first('en_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_details') ? 'has-error' : ''}}">
    <label for="bn_details" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_details" type="textarea" id="bn_details" >{{ isset($chairmanprofile->bn_details) ? $chairmanprofile->bn_details : ''}}</textarea>
    {!! $errors->first('bn_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_involvement_title') ? 'has-error' : ''}}">
    <label for="en_involvement_title" class="control-label">{{ 'En Involvement Title' }}</label>
    <input class="form-control" name="en_involvement_title" type="text" id="en_involvement_title" value="{{ isset($chairmanprofile->en_involvement_title) ? $chairmanprofile->en_involvement_title : ''}}" >
    {!! $errors->first('en_involvement_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_involvement_title') ? 'has-error' : ''}}">
    <label for="bn_involvement_title" class="control-label">{{ 'Bn Involvement Title' }}</label>
    <input class="form-control" name="bn_involvement_title" type="text" id="bn_involvement_title" value="{{ isset($chairmanprofile->bn_involvement_title) ? $chairmanprofile->bn_involvement_title : ''}}" >
    {!! $errors->first('bn_involvement_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_awards_title') ? 'has-error' : ''}}">
    <label for="en_awards_title" class="control-label">{{ 'En Awards Title' }}</label>
    <input class="form-control" name="en_awards_title" type="text" id="en_awards_title" value="{{ isset($chairmanprofile->en_awards_title) ? $chairmanprofile->en_awards_title : ''}}" >
    {!! $errors->first('en_awards_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_awards_title') ? 'has-error' : ''}}">
    <label for="bn_awards_title" class="control-label">{{ 'Bn Awards Title' }}</label>
    <input class="form-control" name="bn_awards_title" type="text" id="bn_awards_title" value="{{ isset($chairmanprofile->bn_awards_title) ? $chairmanprofile->bn_awards_title : ''}}" >
    {!! $errors->first('bn_awards_title', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
