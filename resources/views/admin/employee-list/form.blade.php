<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($employeelist->en_name) ? $employeelist->en_name : ''}}" >
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($employeelist->bn_name) ? $employeelist->bn_name : ''}}" >
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('designation_id') ? 'has-error' : ''}}">
    <label for="designation_id" class="control-label">{{ 'Designation' }}</label>

    <select class="form-control" name="designation_id" id="designation_id">
        @php
            $designation = \App\Models\Designation::where('status',1)->get();
        @endphp
        <option value="">Select Designation</option>
        @foreach($designation as $item)
            <option value="{{ $item->id }}" {{ (isset($employeelist->designation_id)) ? ($employeelist->designation_id == $item->id) ? 'selected' : '' : '' }}>{{ $item->en_name }}</option>
        @endforeach
    </select>

    {!! $errors->first('designation_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_address') ? 'has-error' : ''}}">
    <label for="en_address" class="control-label">{{ 'En Address' }}</label>
    <input class="form-control" name="en_address" type="text" id="en_address" value="{{ isset($employeelist->en_address) ? $employeelist->en_address : ''}}" >
    {!! $errors->first('en_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_address') ? 'has-error' : ''}}">
    <label for="bn_address" class="control-label">{{ 'Bn Address' }}</label>
    <input class="form-control" name="bn_address" type="text" id="bn_address" value="{{ isset($employeelist->bn_address) ? $employeelist->bn_address : ''}}" >
    {!! $errors->first('bn_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    <label for="department_id" class="control-label">{{ 'Department' }}</label>

    <select class="form-control" name="department_id" id="department_id">
        @php
            $department = \App\Models\Department::where('status',1)->get();
        @endphp
        <option value="">Select Department</option>
        @foreach($department as $item)
            <option value="{{ $item->id }}" {{ (isset($employeelist->department_id)) ? ($employeelist->department_id == $item->id) ? 'selected' : '' : '' }}>{{ $item->en_name }}</option>
        @endforeach
    </select>

    {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_phone_number') ? 'has-error' : ''}}">
    <label for="en_phone_number" class="control-label">{{ 'En Phone Number' }}</label>
    <input class="form-control" name="en_phone_number" type="text" id="en_phone_number" value="{{ isset($employeelist->en_phone_number) ? $employeelist->en_phone_number : ''}}" >
    {!! $errors->first('en_phone_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_phone_number') ? 'has-error' : ''}}">
    <label for="bn_phone_number" class="control-label">{{ 'Bn Phone Number' }}</label>
    <input class="form-control" name="bn_phone_number" type="text" id="bn_phone_number" value="{{ isset($employeelist->bn_phone_number) ? $employeelist->bn_phone_number : ''}}" >
    {!! $errors->first('bn_phone_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($employeelist->email) ? $employeelist->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('profile_image') ? 'has-error' : ''}}">
    <label for="profile_image" class="control-label">{{ 'Profile Image' }}</label>
    @if (isset($employeelist->profile_image) ? $employeelist->profile_image : '')
    <img src="{{asset(isset($employeelist->profile_image) ? $employeelist->profile_image : '')}}" alt="" style="height: 200px; width: 200px;" class="mb-3 bg-success">
    @else
    @endif
    <input class="form-control" name="profile_image" type="file" id="profile_image" value="{{ isset($employeelist->profile_image) ? $employeelist->profile_image : ''}}" >
    {!! $errors->first('profile_image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position" value="{{ isset($employeelist->position) ? $employeelist->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>

<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($employeelist->status) && $employeelist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($employeelist->status) && $employeelist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
