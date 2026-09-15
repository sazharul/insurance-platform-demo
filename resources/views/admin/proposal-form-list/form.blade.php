<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($proposalformlist->en_title) ? $proposalformlist->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($proposalformlist->bn_title) ? $proposalformlist->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('pdf_file') ? 'has-error' : ''}}">
    <label for="pdf_file" class="control-label">{{ 'Pdf File' }}</label>
    <input class="form-control" name="pdf_file" type="file" id="pdf_file" value="{{ isset($proposalformlist->pdf_file) ? $proposalformlist->pdf_file : ''}}" >
    {!! $errors->first('pdf_file', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
