<div class="form-group {{ $errors->has('en_date') ? 'has-error' : ''}}">
    <label for="en_date" class="control-label">{{ 'En Date' }}</label>
    <input class="form-control" name="en_date" type="text" id="en_title" value="{{ isset($newseventlist->en_date) ? $newseventlist->en_date : ''}}" >
    {!! $errors->first('en_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_date') ? 'has-error' : ''}}">
    <label for="bn_date" class="control-label">{{ 'Bn Date' }}</label>
    <input class="form-control" name="bn_date" type="text" id="en_title" value="{{ isset($newseventlist->bn_date) ? $newseventlist->bn_date : ''}}" >
    {!! $errors->first('bn_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($newseventlist->en_title) ? $newseventlist->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($newseventlist->bn_title) ? $newseventlist->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    @if (isset($newseventlist->image) ? $newseventlist->image : '')
    <img src="{{asset(isset($newseventlist->image) ? $newseventlist->image : '')}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($newseventlist->image) ? $newseventlist->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details') ? 'has-error' : ''}}">
    <label for="en_details" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_details" type="textarea" id="en_details" >{{ isset($newseventlist->en_details) ? $newseventlist->en_details : ''}}</textarea>
    {!! $errors->first('en_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_details') ? 'has-error' : ''}}">
    <label for="bn_details" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_details" type="textarea" id="bn_details" >{{ isset($newseventlist->bn_details) ? $newseventlist->bn_details : ''}}</textarea>
    {!! $errors->first('bn_details', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($newseventlist->status) && $newseventlist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($newseventlist->status) && $newseventlist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
