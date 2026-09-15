<div class="form-group {{ $errors->has('committee_name_id') ? 'has-error' : ''}}">
    <label for="committee_name_id" class="control-label">{{ 'Committee Name' }}</label>


    <select class="form-control" name="committee_name_id" id="committee_name_id">
        @php
            $committee_name = \App\Models\CommitteeName::where('status',1)->get();
        @endphp
        <option value="">Select Committee</option>
        @foreach($committee_name as $item)
            <option value="{{ $item->id }}" {{ (isset($committeeboardmember->bn_name)) ? ($committeeboardmember->committee_name_id == $item->id) ? 'selected' : '' : '' }}>{{ $item->en_name }}</option>
        @endforeach
    </select>


    {!! $errors->first('committee_name_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('profile_image') ? 'has-error' : ''}}">
    <label for="profile_image" class="control-label">{{ 'Profile Image (Height: 210px)' }}</label>
    @if (isset($committeeboardmember->profile_image) ? $committeeboardmember->profile_image : '')
    <img src="{{asset(isset($committeeboardmember->profile_image) ? $committeeboardmember->profile_image : '')}}" alt="" style="height: 200px; width: 200px;" class="mb-3 bg-success">
    @else
    @endif
    <input class="form-control" name="profile_image" type="file" id="profile_image" value="{{ isset($committeeboardmember->profile_image) ? $committeeboardmember->profile_image : ''}}" >
    {!! $errors->first('profile_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($committeeboardmember->en_name) ? $committeeboardmember->en_name : ''}}" >
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($committeeboardmember->bn_name) ? $committeeboardmember->bn_name : ''}}" >
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('en_designation') ? 'has-error' : ''}}">
    <label for="en_designation" class="control-label">{{ 'En Designation' }}</label>
    <input class="form-control" name="en_designation" type="text" id="en_designation" value="{{ isset($committeeboardmember->en_designation) ? $committeeboardmember->en_designation : ''}}" >
    {!! $errors->first('en_designation', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_designation') ? 'has-error' : ''}}">
    <label for="bn_designation" class="control-label">{{ 'Bn Designation' }}</label>
    <input class="form-control" name="bn_designation" type="text" id="bn_designation" value="{{ isset($committeeboardmember->bn_designation) ? $committeeboardmember->bn_designation : ''}}" >
    {!! $errors->first('bn_designation', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('link_owner_name_id') ? 'has-error' : ''}}">
    <label for="link_owner_name_id" class="control-label">{{ 'Profile LInk' }}</label>


    <select class="form-control" name="link_owner_name_id" id="link_owner_name_id">
        @php
            $link_owner_name = \App\Models\BoardMember::where('status',1)->get();
        @endphp
         <option value="">Select Profile</option>
        @foreach($link_owner_name as $item)
            <option value="{{ $item->id }}" {{ (isset($committeeboardmember->bn_name)) ? ($committeeboardmember->link_owner_name_id == $item->id) ? 'selected' : '' : '' }}>{{ $item->en_name }}</option>
        @endforeach
    </select>


    {!! $errors->first('link_owner_name_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position" value="{{ isset($committeeboardmember->position) ? $committeeboardmember->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>


<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($committeeboardmember->status) && $committeeboardmember->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($committeeboardmember->status) && $committeeboardmember->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
