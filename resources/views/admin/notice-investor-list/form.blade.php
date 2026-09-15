<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'Icon' }}</label>
    @if (isset($noticeinvestorlist->icon) ? $noticeinvestorlist->icon : '')
    <img src="{{asset(isset($noticeinvestorlist->icon) ? $noticeinvestorlist->icon : '')}}" alt="" style="height: 40px; width: 40px;" class="mb-3 bg-success">
    @else
    @endif
    <input class="form-control" name="icon" type="file" id="icon" value="{{ isset($noticeinvestorlist->icon) ? $noticeinvestorlist->icon : ''}}" >
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_year') ? 'has-error' : ''}}">
    <label for="en_year" class="control-label">{{ 'En Year' }}</label>
    <input class="form-control" name="en_year" type="text" id="en_year" value="{{ isset($noticeinvestorlist->en_year) ? $noticeinvestorlist->en_year : ''}}" >
    {!! $errors->first('en_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_year') ? 'has-error' : ''}}">
    <label for="bn_year" class="control-label">{{ 'Bn Year' }}</label>
    <input class="form-control" name="bn_year" type="text" id="bn_year" value="{{ isset($noticeinvestorlist->bn_year) ? $noticeinvestorlist->bn_year : ''}}" >
    {!! $errors->first('bn_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($noticeinvestorlist->en_title) ? $noticeinvestorlist->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($noticeinvestorlist->bn_title) ? $noticeinvestorlist->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details') ? 'has-error' : ''}}">
    <label for="en_details" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_details" type="textarea" id="en_details" >{{ isset($noticeinvestorlist->en_details) ? $noticeinvestorlist->en_details : ''}}</textarea>
    {!! $errors->first('en_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_details') ? 'has-error' : ''}}">
    <label for="bn_details" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_details" type="textarea" id="bn_details" >{{ isset($noticeinvestorlist->bn_details) ? $noticeinvestorlist->bn_details : ''}}</textarea>
    {!! $errors->first('bn_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('uploaded_date') ? 'has-error' : ''}}">
    <label for="uploaded_date" class="control-label">{{ 'Uploaded Date' }}</label>
    <input class="form-control" name="uploaded_date" type="text" id="uploaded_date" value="{{ isset($noticeinvestorlist->uploaded_date) ? $noticeinvestorlist->uploaded_date : ''}}" >
    {!! $errors->first('uploaded_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('notice_file') ? 'has-error' : ''}}">
    <label for="notice_file" class="control-label">{{ 'Notice Image/Pdf' }}</label>
    <input class="form-control" name="notice_file" type="file" id="notice_file" value="{{ isset($noticeinvestorlist->notice_file) ? $noticeinvestorlist->notice_file : ''}}" >
    {!! $errors->first('notice_file', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($noticeinvestorlist->status) && $noticeinvestorlist->status == 1) ? 'checked': ''}} id="inlineRadio1" value="1">
      </div>
      <div class="form-check form-check-inline">
          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status" {{ ( isset($noticeinvestorlist->status) && $noticeinvestorlist->status == 0) ? 'checked': ''}} id="inlineRadio2" value="0">
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
