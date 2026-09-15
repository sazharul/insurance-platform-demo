<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($agentlist->en_title) ? $agentlist->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($agentlist->bn_title) ? $agentlist->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($agentlist->en_breadcrumb_1) ? $agentlist->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($agentlist->bn_breadcrumb_1) ? $agentlist->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($agentlist->en_breadcrumb_2) ? $agentlist->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($agentlist->bn_breadcrumb_2) ? $agentlist->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_subject') ? 'has-error' : ''}}">
    <label for="en_subject" class="control-label">{{ 'En Subject' }}</label>
    <input class="form-control" name="en_subject" type="text" id="en_subject" value="{{ isset($agentlist->en_subject) ? $agentlist->en_subject : ''}}" >
    {!! $errors->first('en_subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_subject') ? 'has-error' : ''}}">
    <label for="bn_subject" class="control-label">{{ 'Bn Subject' }}</label>
    <input class="form-control" name="bn_subject" type="text" id="bn_subject" value="{{ isset($agentlist->bn_subject) ? $agentlist->bn_subject : ''}}" >
    {!! $errors->first('bn_subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pdf_file') ? 'has-error' : ''}}">
    <label for="pdf_file" class="control-label">{{ 'Pdf File' }}</label>
    <input class="form-control" name="pdf_file" type="file" id="pdf_file" value="{{ isset($agentlist->pdf_file) ? $agentlist->pdf_file : ''}}" >
    {!! $errors->first('pdf_file', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
