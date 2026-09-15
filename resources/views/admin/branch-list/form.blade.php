<div class="form-group {{ $errors->has('branch_location_id') ? 'has-error' : ''}}">
    <label for="branch_location_id" class="control-label">{{ 'Branch Location' }}</label>
    <select class="form-control" name="branch_location_id" id="branch_location_id">
        @php
            $location_list = \App\Models\BranchLocation::where('status',1)->get();
        @endphp
        <option value="">Select Branch Location</option>
        @foreach($location_list as $item)
            <option value="{{ $item->id }}" {{ isset($branchlist->branch_location_id) ? ($branchlist->branch_location_id == $item->id) ? 'selected' : '' : '' }} >{{ $item->en_name }}</option>
            {{-- <option value="{{ $item->id }}" {{ (isset($item->en_name)) ? ($branchlist->branch_location_id == $item->id) ? 'selected' : '' : '' }}>{{ $item->en_name }}</option> --}}
        @endforeach
    </select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Branch Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($branchlist->en_name) ? $branchlist->en_name : ''}}" >
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Branch Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($branchlist->bn_name) ? $branchlist->bn_name : ''}}" >
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_address') ? 'has-error' : ''}}">
    <label for="en_address" class="control-label">{{ 'En Branch Address' }}</label>
    <input class="form-control" name="en_address" type="text" id="en_address" value="{{ isset($branchlist->en_address) ? $branchlist->en_address : ''}}" >
    {!! $errors->first('en_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_address') ? 'has-error' : ''}}">
    <label for="bn_address" class="control-label">{{ 'Bn Branch Address' }}</label>
    <input class="form-control" name="bn_address" type="text" id="bn_address" value="{{ isset($branchlist->bn_address) ? $branchlist->bn_address : ''}}" >
    {!! $errors->first('bn_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('branch_map_url') ? 'has-error' : ''}}">
    <label for="branch_map_url" class="control-label">{{ 'Branch Maps Url' }}</label>
    <input class="form-control" name="branch_map_url" type="text" id="branch_map_url" value="{{ isset($branchlist->branch_map_url) ? $branchlist->branch_map_url : ''}}" >
    {!! $errors->first('branch_map_url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_employee_name') ? 'has-error' : ''}}">
    <label for="en_employee_name" class="control-label">{{ 'En Communication Employee Name' }}</label>
    <input class="form-control" name="en_employee_name" type="text" id="en_employee_name" value="{{ isset($branchlist->en_employee_name) ? $branchlist->en_employee_name : ''}}" >
    {!! $errors->first('en_employee_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_employee_name') ? 'has-error' : ''}}">
    <label for="bn_employee_name" class="control-label">{{ 'Bn Communication Employee Name' }}</label>
    <input class="form-control" name="bn_employee_name" type="text" id="bn_employee_name" value="{{ isset($branchlist->bn_employee_name) ? $branchlist->bn_employee_name : ''}}" >
    {!! $errors->first('bn_employee_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_employee_designation') ? 'has-error' : ''}}">
    <label for="en_employee_designation" class="control-label">{{ 'En Communication Employee Designation' }}</label>
    <input class="form-control" name="en_employee_designation" type="text" id="en_employee_designation" value="{{ isset($branchlist->en_employee_designation) ? $branchlist->en_employee_designation : ''}}" >
    {!! $errors->first('en_employee_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_employee_designation') ? 'has-error' : ''}}">
    <label for="bn_employee_designation" class="control-label">{{ 'Bn Communication Employee Designation' }}</label>
    <input class="form-control" name="bn_employee_designation" type="text" id="bn_employee_designation" value="{{ isset($branchlist->bn_employee_designation) ? $branchlist->bn_employee_designation : ''}}" >
    {!! $errors->first('bn_employee_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_contact_number') ? 'has-error' : ''}}">
    <label for="en_contact_number" class="control-label">{{ 'En Contact Number' }}</label>
    <input class="form-control" name="en_contact_number" type="text" id="en_contact_number" value="{{ isset($branchlist->en_contact_number) ? $branchlist->en_contact_number : ''}}" >
    {!! $errors->first('en_contact_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_contact_number') ? 'has-error' : ''}}">
    <label for="bn_contact_number" class="control-label">{{ 'Bn Contact Number' }}</label>
    <input class="form-control" name="bn_contact_number" type="text" id="bn_contact_number" value="{{ isset($branchlist->bn_contact_number) ? $branchlist->bn_contact_number : ''}}" >
    {!! $errors->first('bn_contact_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_contact_number2') ? 'has-error' : ''}}">
    <label for="en_contact_number2" class="control-label">{{ 'En Contact Number 2' }}</label>
    <input class="form-control" name="en_contact_number2" type="text" id="bn_contact_number2" value="{{ isset($branchlist->en_contact_number2) ? $branchlist->en_contact_number2 : ''}}" >
    {!! $errors->first('bn_contact_number2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_contact_number2') ? 'has-error' : ''}}">
    <label for="bn_contact_number2" class="control-label">{{ 'Bn Contact Number 2' }}</label>
    <input class="form-control" name="bn_contact_number2" type="text" id="bn_contact_number2" value="{{ isset($branchlist->bn_contact_number2) ? $branchlist->bn_contact_number2 : ''}}" >
    {!! $errors->first('bn_contact_number2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Communication Employee Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($branchlist->image) ? $branchlist->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($branchlist->status) && $branchlist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($branchlist->status) && $branchlist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
