<div class="form-group {{ $errors->has('youtube_link') ? 'has-error' : ''}}">
    <label for="youtube_link" class="control-label">{{ 'Youtube Link' }}</label>
    <textarea class="form-control" id="youtube_link" name="youtube_link"> {{ isset($mujibvideolist->youtube_link) ? $mujibvideolist->youtube_link : ''}} </textarea>


    {!! $errors->first('youtube_link', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($mujibvideolist->status) && $mujibvideolist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($mujibvideolist->status) && $mujibvideolist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
