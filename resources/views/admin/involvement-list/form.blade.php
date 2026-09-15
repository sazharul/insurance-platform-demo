<div class="form-group {{ $errors->has('chairman_profile_id') ? 'has-error' : ''}}">
    {{-- <label for="chairman_profile_id" class="control-label">{{ 'Chairman Profile Id' }}</label> --}}
    <input class="form-control" name="chairman_profile_id" type="hidden" id="chairman_profile_id" value="{{ isset($involvementlist->chairman_profile_id) ? $involvementlist->chairman_profile_id : '1'}}" >
    {!! $errors->first('chairman_profile_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_designation') ? 'has-error' : ''}}">
    <label for="en_designation" class="control-label">{{ 'En Designation' }}</label>
    <input class="form-control" name="en_designation" type="text" id="en_designation" value="{{ isset($involvementlist->en_designation) ? $involvementlist->en_designation : ''}}" >
    {!! $errors->first('en_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_designation') ? 'has-error' : ''}}">
    <label for="bn_designation" class="control-label">{{ 'Bn Designation' }}</label>
    <input class="form-control" name="bn_designation" type="text" id="bn_designation" value="{{ isset($involvementlist->bn_designation) ? $involvementlist->bn_designation : ''}}" >
    {!! $errors->first('bn_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_company_name') ? 'has-error' : ''}}">
    <label for="en_company_name" class="control-label">{{ 'En Company Name' }}</label>
    <input class="form-control" name="en_company_name" type="text" id="en_company_name" value="{{ isset($involvementlist->en_company_name) ? $involvementlist->en_company_name : ''}}" >
    {!! $errors->first('en_company_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_company_name') ? 'has-error' : ''}}">
    <label for="bn_company_name" class="control-label">{{ 'Bn Company Name' }}</label>
    <input class="form-control" name="bn_company_name" type="text" id="bn_company_name" value="{{ isset($involvementlist->bn_company_name) ? $involvementlist->bn_company_name : ''}}" >
    {!! $errors->first('bn_company_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details_name') ? 'has-error' : ''}}">
    <label for="en_details_name" class="control-label">{{ 'En Details Name' }}</label>
    <input class="form-control" name="en_details_name" type="text" id="en_details_name" value="{{ isset($involvementlist->en_details_name) ? $involvementlist->en_details_name : ''}}" >
    {!! $errors->first('en_details_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_details_name') ? 'has-error' : ''}}">
    <label for="bn_details_name" class="control-label">{{ 'Bn Details Name' }}</label>
    <input class="form-control" name="bn_details_name" type="text" id="bn_details_name" value="{{ isset($involvementlist->bn_details_name) ? $involvementlist->bn_details_name : ''}}" >
    {!! $errors->first('bn_details_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position"
           value="{{ isset($involvementlist->position) ? $involvementlist->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($involvementlist->status) && $involvementlist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($involvementlist->status) && $involvementlist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
