<div class="form-group {{ $errors->has('management_name_id') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Management Name' }}</label>
    @php
        $management_name = \App\Models\ManagementName::where('status', 1)->orderBy('position', 'asc')->get();
    @endphp
    <select name="management_name_id" id="status" class="form-control">
        <option value="">Select Management</option>
        @foreach($management_name as $item)
            <option value="{{ $item->id }}" {{ (isset($managementmember->management_name_id) && $managementmember->management_name_id == $item->id) ? 'selected' : ''}}>{{ $item->en_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('management_name_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image (Height: 250px)' }}</label>
    @if (isset($managementmember->image) ? $managementmember->image : '')
        <img src="{{asset(isset($managementmember->image) ? $managementmember->image : '')}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($managementmember->image) ? $managementmember->image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($managementmember->en_name) ? $managementmember->en_name : ''}}">
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($managementmember->bn_name) ? $managementmember->bn_name : ''}}">
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_designation') ? 'has-error' : ''}}">
    <label for="en_designation" class="control-label">{{ 'En Designation' }}</label>
    <input class="form-control" name="en_designation" type="text" id="en_designation"
           value="{{ isset($managementmember->en_designation) ? $managementmember->en_designation : ''}}">
    {!! $errors->first('en_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_designation') ? 'has-error' : ''}}">
    <label for="bn_designation" class="control-label">{{ 'Bn Designation' }}</label>
    <input class="form-control" name="bn_designation" type="text" id="bn_designation"
           value="{{ isset($managementmember->bn_designation) ? $managementmember->bn_designation : ''}}">
    {!! $errors->first('bn_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_department') ? 'has-error' : ''}}">
    <label for="en_department" class="control-label">{{ 'En Department' }}</label>
    <input class="form-control" name="en_department" type="text" id="en_department"
           value="{{ isset($managementmember->en_department) ? $managementmember->en_department : ''}}">
    {!! $errors->first('en_department', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_department') ? 'has-error' : ''}}">
    <label for="bn_department" class="control-label">{{ 'Bn Department' }}</label>
    <input class="form-control" name="bn_department" type="text" id="bn_department"
           value="{{ isset($managementmember->bn_department) ? $managementmember->bn_department : ''}}">
    {!! $errors->first('bn_department', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position"
           value="{{ isset($managementmember->position) ? $managementmember->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>

<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($managementmember->status) && $managementmember->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($managementmember->status) && $managementmember->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
