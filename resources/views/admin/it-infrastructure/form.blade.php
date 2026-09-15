<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($itinfrastructure->en_title) ? $itinfrastructure->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($itinfrastructure->bn_title) ? $itinfrastructure->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($itinfrastructure->en_breadcrumb_1) ? $itinfrastructure->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($itinfrastructure->bn_breadcrumb_1) ? $itinfrastructure->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($itinfrastructure->en_breadcrumb_2) ? $itinfrastructure->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($itinfrastructure->bn_breadcrumb_2) ? $itinfrastructure->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_heading') ? 'has-error' : ''}}">
    <label for="en_heading" class="control-label">{{ 'En Heading' }}</label>
    <input class="form-control" name="en_heading" type="text" id="en_heading" value="{{ isset($itinfrastructure->en_heading) ? $itinfrastructure->en_heading : ''}}" >
    {!! $errors->first('en_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_heading') ? 'has-error' : ''}}">
    <label for="bn_heading" class="control-label">{{ 'Bn Heading' }}</label>
    <input class="form-control" name="bn_heading" type="text" id="bn_heading" value="{{ isset($itinfrastructure->bn_heading) ? $itinfrastructure->bn_heading : ''}}" >
    {!! $errors->first('bn_heading', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('en_description') ? 'has-error' : ''}}">
    <label for="en_description" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_description" type="textarea" id="en_description" >{{ isset($itinfrastructure->en_description) ? $itinfrastructure->en_description : ''}}</textarea>
    {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_description') ? 'has-error' : ''}}">
    <label for="bn_description" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_description" type="textarea" id="bn_description" >{{ isset($itinfrastructure->bn_description) ? $itinfrastructure->bn_description : ''}}</textarea>
    {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
