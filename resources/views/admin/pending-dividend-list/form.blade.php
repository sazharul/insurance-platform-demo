<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($pendingdividendlist->en_title) ? $pendingdividendlist->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($pendingdividendlist->bn_title) ? $pendingdividendlist->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_year') ? 'has-error' : ''}}">
    <label for="en_year" class="control-label">{{ 'En Year' }}</label>
    <input class="form-control" name="en_year" type="text" id="en_year" value="{{ isset($pendingdividendlist->en_year) ? $pendingdividendlist->en_year : ''}}" >
    {!! $errors->first('en_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_year') ? 'has-error' : ''}}">
    <label for="bn_year" class="control-label">{{ 'Bn Year' }}</label>
    <input class="form-control" name="bn_year" type="text" id="bn_year" value="{{ isset($pendingdividendlist->bn_year) ? $pendingdividendlist->bn_year : ''}}" >
    {!! $errors->first('bn_year', '<p class="help-block">:message</p>') !!}
</div>


@if(isset($pendingdividendlist->pdf_file))
    <div class="form-group">
        <label for="pdf_file" class="control-label">{{ 'Pdf File' }}</label>
        <a href="{{ asset($pendingdividendlist->pdf_file) }}" target="_blank">View Pdf</a>
    </div>
@endif

<div class="form-group {{ $errors->has('pdf_file') ? 'has-error' : ''}}">
    <label for="pdf_file" class="control-label">{{ 'Pdf File' }}</label>
    <input class="form-control" name="pdf_file" type="file" id="pdf_file" value="{{ isset($pendingdividendlist->pdf_file) ? $pendingdividendlist->pdf_file : ''}}" >
    {!! $errors->first('pdf_file', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($pendingdividendlist->status) && $pendingdividendlist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($pendingdividendlist->status) && $pendingdividendlist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
