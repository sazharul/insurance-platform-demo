<div class="form-group {{ $errors->has('board_cat_id') ? 'has-error' : ''}}">
    <label for="board_cat_id" class="control-label">{{ 'Board Cat' }}</label>

    <select class="form-control" name="board_cat_id" id="board_cat_id">
        @php
            $committee_name = \App\Models\BoardCategory::where('status',1)->get();
        @endphp
        <option value="">Select Category</option>
        @foreach($committee_name as $item)
            <option value="{{ $item->id }}" {{ (isset($boardmember->board_cat_id)) ? ($boardmember->board_cat_id == $item->id) ? 'selected' : '' : '' }}>{{ $item->en_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('board_cat_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('designation_id') ? 'has-error' : ''}}">
    <label for="designation_id" class="control-label">{{ 'Designation' }}</label>

    <select class="form-control" name="designation_id" id="designation_id">
        @php
            $committee_name = \App\Models\Designation::where('status',1)->get();
        @endphp
        <option value="">Select Designation</option>
        @foreach($committee_name as $item)
            <option value="{{ $item->id }}" {{ (isset($boardmember->designation_id)) ? ($boardmember->designation_id == $item->id) ? 'selected' : '' : '' }}>{{ $item->en_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('designation_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($boardmember->en_name) ? $boardmember->en_name : ''}}" >
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($boardmember->bn_name) ? $boardmember->bn_name : ''}}" >
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image (Height: 155px, Chairman: 250px)' }}</label>
    @if (isset($boardmember->image) ? $boardmember->image : '')
    <img src="{{asset(isset($boardmember->image) ? $boardmember->image : '')}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($boardmember->image) ? $boardmember->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details') ? 'has-error' : ''}}">
    <label for="en_details" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_details" type="textarea" id="en_details" >{{ isset($boardmember->en_details) ? $boardmember->en_details : ''}}</textarea>
    {!! $errors->first('en_details', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('bn_details') ? 'has-error' : ''}}">
    <label for="bn_details" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_details" type="textarea" id="bn_details" >{{ isset($boardmember->bn_details) ? $boardmember->bn_details : ''}}</textarea>
    {!! $errors->first('bn_details', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position" value="{{ isset($boardmember->position) ? $boardmember->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>

<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($boardmember->status) && $boardmember->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($boardmember->status) && $boardmember->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
