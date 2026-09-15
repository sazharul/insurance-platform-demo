<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'Icon' }}</label>
    @if (isset($awardlist->icon) ? $awardlist->icon : '')
    <img src="{{asset(isset($awardlist->icon) ? $awardlist->icon : '')}}" alt="" style="height: 40px; width: 40px;" class="mb-3 bg-success">
    @else
    @endif
    <input class="form-control" name="icon" type="file" id="icon" value="{{ isset($awardlist->icon) ? $awardlist->icon : ''}}" >
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($awardlist->en_title) ? $awardlist->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($awardlist->bn_title) ? $awardlist->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_award_details') ? 'has-error' : ''}}">
    <label for="en_award_details" class="control-label">{{ 'En Award Details' }}</label>
    <textarea class="form-control" id="en_award_details" name="en_award_details">{{ isset($awardlist->en_award_details) ? $awardlist->en_award_details : ''}}</textarea>
    {!! $errors->first('en_award_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_en_award_details') ? 'has-error' : ''}}">
    <label for="bn_award_details" class="control-label">{{ 'Bn Award Details' }}</label>
    <textarea class="form-control" id="bn_award_details" name="bn_award_details">{{ isset($awardlist->bn_award_details) ? $awardlist->bn_award_details : ''}}</textarea>
    {!! $errors->first('bn_award_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    @if (isset($awardlist->image) ? $awardlist->image : '')
    <img src="{{asset(isset($awardlist->image) ? $awardlist->image : '')}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($awardlist->image) ? $awardlist->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($awardlist->status) && $awardlist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($awardlist->status) && $awardlist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
