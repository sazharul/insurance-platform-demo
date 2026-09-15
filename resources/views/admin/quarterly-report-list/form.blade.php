<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($quarterlyreportlist->en_title) ? $quarterlyreportlist->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($quarterlyreportlist->bn_title) ? $quarterlyreportlist->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_year') ? 'has-error' : ''}}">
    <label for="en_year" class="control-label">{{ 'En Year' }}</label>
    <input class="form-control" name="en_year" type="text" id="en_year" value="{{ isset($quarterlyreportlist->en_year) ? $quarterlyreportlist->en_year : ''}}" >
    {!! $errors->first('en_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_year') ? 'has-error' : ''}}">
    <label for="bn_year" class="control-label">{{ 'Bn Year' }}</label>
    <input class="form-control" name="bn_year" type="text" id="bn_year" value="{{ isset($quarterlyreportlist->bn_year) ? $quarterlyreportlist->bn_year : ''}}" >
    {!! $errors->first('bn_year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Cover Image' }}</label>
    @if (isset($quarterlyreportlist->image) ? $quarterlyreportlist->image : '')
    <img src="{{asset(isset($quarterlyreportlist->image) ? $quarterlyreportlist->image : '')}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
    @else
    @endif
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($quarterlyreportlist->image) ? $quarterlyreportlist->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pdf_file') ? 'has-error' : ''}}">
    <label for="pdf_file" class="control-label">{{ 'Pdf File' }}</label>
    <input class="form-control" name="pdf_file" type="file" id="pdf_file" value="{{ isset($quarterlyreportlist->pdf_file) ? $quarterlyreportlist->pdf_file : ''}}" >
    {!! $errors->first('pdf_file', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
