<div class="form-group {{ $errors->has('chairman_profile_id') ? 'has-error' : ''}}">
    {{-- <label for="chairman_profile_id" class="control-label">{{ 'Chairman Profile Id' }}</label> --}}
    <input class="form-control" name="chairman_profile_id" type="hidden" id="chairman_profile_id" value="{{ isset($chairmanawardlist->chairman_profile_id) ? $chairmanawardlist->chairman_profile_id : '1'}}" >
    {!! $errors->first('chairman_profile_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    @if (isset($chairmanawardlist->image) ? $chairmanawardlist->image : '')
    <img src="{{asset(isset($chairmanawardlist->image) ? $chairmanawardlist->image : '')}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($chairmanawardlist->image) ? $chairmanawardlist->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_year') ? 'has-error' : ''}}">
    <label for="en_year" class="control-label">{{ 'En Year' }}</label>
    <input class="form-control" name="en_year" type="text" id="en_year" value="{{ isset($chairmanawardlist->en_year) ? $chairmanawardlist->en_year : ''}}" >
    {!! $errors->first('en_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_year') ? 'has-error' : ''}}">
    <label for="bn_year" class="control-label">{{ 'Bn Year' }}</label>
    <input class="form-control" name="bn_year" type="text" id="bn_year" value="{{ isset($chairmanawardlist->bn_year) ? $chairmanawardlist->bn_year : ''}}" >
    {!! $errors->first('bn_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($chairmanawardlist->en_title) ? $chairmanawardlist->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($chairmanawardlist->bn_title) ? $chairmanawardlist->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_description') ? 'has-error' : ''}}">
    <label for="en_description" class="control-label">{{ 'En Description' }}</label>
    <textarea class="form-control" rows="5" name="en_description" type="textarea" id="en_description" >{{ isset($chairmanawardlist->en_description) ? $chairmanawardlist->en_description : ''}}</textarea>
    {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_description') ? 'has-error' : ''}}">
    <label for="bn_description" class="control-label">{{ 'Bn Description' }}</label>
    <textarea class="form-control" rows="5" name="bn_description" type="textarea" id="bn_description" >{{ isset($chairmanawardlist->bn_description) ? $chairmanawardlist->bn_description : ''}}</textarea>
    {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($chairmanawardlist->status) && $chairmanawardlist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($chairmanawardlist->status) && $chairmanawardlist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
