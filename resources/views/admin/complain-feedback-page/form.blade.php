<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($complainfeedbackpage->en_title) ? $complainfeedbackpage->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($complainfeedbackpage->bn_title) ? $complainfeedbackpage->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($complainfeedbackpage->en_breadcrumb_1) ? $complainfeedbackpage->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($complainfeedbackpage->bn_breadcrumb_1) ? $complainfeedbackpage->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($complainfeedbackpage->en_breadcrumb_2) ? $complainfeedbackpage->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($complainfeedbackpage->bn_breadcrumb_2) ? $complainfeedbackpage->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_heading') ? 'has-error' : ''}}">
    <label for="en_heading" class="control-label">{{ 'En Heading' }}</label>
    <input class="form-control" name="en_heading" type="text" id="en_heading" value="{{ isset($complainfeedbackpage->en_heading) ? $complainfeedbackpage->en_heading : ''}}" >
    {!! $errors->first('en_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_heading') ? 'has-error' : ''}}">
    <label for="bn_heading" class="control-label">{{ 'Bn Heading' }}</label>
    <input class="form-control" name="bn_heading" type="text" id="bn_heading" value="{{ isset($complainfeedbackpage->bn_heading) ? $complainfeedbackpage->bn_heading : ''}}" >
    {!! $errors->first('bn_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details') ? 'has-error' : ''}}">
    <label for="en_details" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_details" type="textarea" id="en_details" >{{ isset($complainfeedbackpage->en_details) ? $complainfeedbackpage->en_details : ''}}</textarea>
    {!! $errors->first('en_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_details') ? 'has-error' : ''}}">
    <label for="bn_details" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_details" type="textarea" id="bn_details" >{{ isset($complainfeedbackpage->bn_details) ? $complainfeedbackpage->bn_details : ''}}</textarea>
    {!! $errors->first('bn_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_form_title') ? 'has-error' : ''}}">
    <label for="en_form_title" class="control-label">{{ 'En Form Title' }}</label>
    <input class="form-control" name="en_form_title" type="text" id="en_form_title" value="{{ isset($complainfeedbackpage->en_form_title) ? $complainfeedbackpage->en_form_title : ''}}" >
    {!! $errors->first('en_form_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_form_title') ? 'has-error' : ''}}">
    <label for="bn_form_title" class="control-label">{{ 'Bn Form Title' }}</label>
    <input class="form-control" name="bn_form_title" type="text" id="bn_form_title" value="{{ isset($complainfeedbackpage->bn_form_title) ? $complainfeedbackpage->bn_form_title : ''}}" >
    {!! $errors->first('bn_form_title', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
