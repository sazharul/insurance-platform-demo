<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($contactu->en_title) ? $contactu->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($contactu->bn_title) ? $contactu->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($contactu->en_breadcrumb_1) ? $contactu->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($contactu->bn_breadcrumb_1) ? $contactu->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($contactu->en_breadcrumb_2) ? $contactu->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($contactu->bn_breadcrumb_2) ? $contactu->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_heading') ? 'has-error' : ''}}">
    <label for="en_heading" class="control-label">{{ 'En Heading' }}</label>
    <input class="form-control" name="en_heading" type="text" id="en_heading" value="{{ isset($contactu->en_heading) ? $contactu->en_heading : ''}}" >
    {!! $errors->first('en_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_heading') ? 'has-error' : ''}}">
    <label for="bn_heading" class="control-label">{{ 'Bn Heading' }}</label>
    <input class="form-control" name="bn_heading" type="text" id="bn_heading" value="{{ isset($contactu->bn_heading) ? $contactu->bn_heading : ''}}" >
    {!! $errors->first('bn_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location_icon') ? 'has-error' : ''}}">
    <label for="location_icon" class="control-label">{{ 'Location Icon' }}</label>
    <img src="{{asset($contactu->location_icon)}}" alt="" style="height: 40px; width: 40px;" class="mb-3 bg-success">
    <input class="form-control" name="location_icon" type="file" id="location_icon" value="{{ isset($contactu->location_icon) ? $contactu->location_icon : ''}}" >
    {!! $errors->first('location_icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_location_title') ? 'has-error' : ''}}">
    <label for="en_location_title" class="control-label">{{ 'En Location Title' }}</label>
    <input class="form-control" name="en_location_title" type="text" id="en_location_title" value="{{ isset($contactu->en_location_title) ? $contactu->en_location_title : ''}}" >
    {!! $errors->first('en_location_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_location_title') ? 'has-error' : ''}}">
    <label for="bn_location_title" class="control-label">{{ 'Bn Location Title' }}</label>
    <input class="form-control" name="bn_location_title" type="text" id="bn_location_title" value="{{ isset($contactu->bn_location_title) ? $contactu->bn_location_title : ''}}" >
    {!! $errors->first('bn_location_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_location_address') ? 'has-error' : ''}}">
    <label for="en_location_address" class="control-label">{{ 'En Location Address' }}</label>
    <input class="form-control" name="en_location_address" type="text" id="en_location_address" value="{{ isset($contactu->en_location_address) ? $contactu->en_location_address : ''}}" >
    {!! $errors->first('en_location_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_location_address') ? 'has-error' : ''}}">
    <label for="bn_location_address" class="control-label">{{ 'Bn Location Address' }}</label>
    <input class="form-control" name="bn_location_address" type="text" id="bn_location_address" value="{{ isset($contactu->bn_location_address) ? $contactu->bn_location_address : ''}}" >
    {!! $errors->first('bn_location_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email_icon') ? 'has-error' : ''}}">
    <label for="email_icon" class="control-label">{{ 'Email Icon' }}</label>
    <img src="{{asset($contactu->email_icon)}}" alt="" style="height: 40px; width: 40px;" class="mb-3 bg-success">
    <input class="form-control" name="email_icon" type="file" id="email_icon" value="{{ isset($contactu->email_icon) ? $contactu->email_icon : ''}}" >
    {!! $errors->first('email_icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_email_title') ? 'has-error' : ''}}">
    <label for="en_email_title" class="control-label">{{ 'En Email Title' }}</label>
    <input class="form-control" name="en_email_title" type="text" id="en_email_title" value="{{ isset($contactu->en_email_title) ? $contactu->en_email_title : ''}}" >
    {!! $errors->first('en_email_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_email_title') ? 'has-error' : ''}}">
    <label for="bn_email_title" class="control-label">{{ 'Bn Email Title' }}</label>
    <input class="form-control" name="bn_email_title" type="text" id="bn_email_title" value="{{ isset($contactu->bn_email_title) ? $contactu->bn_email_title : ''}}" >
    {!! $errors->first('bn_email_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_email_address') ? 'has-error' : ''}}">
    <label for="en_email_address" class="control-label">{{ 'En Email Address' }}</label>
    <input class="form-control" name="en_email_address" type="text" id="en_email_address" value="{{ isset($contactu->en_email_address) ? $contactu->en_email_address : ''}}" >
    {!! $errors->first('en_email_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_email_address') ? 'has-error' : ''}}">
    <label for="bn_email_address" class="control-label">{{ 'Bn Email Address' }}</label>
    <input class="form-control" name="bn_email_address" type="text" id="bn_email_address" value="{{ isset($contactu->bn_email_address) ? $contactu->bn_email_address : ''}}" >
    {!! $errors->first('bn_email_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('hotline_icon') ? 'has-error' : ''}}">
    <label for="hotline_icon" class="control-label">{{ 'Hotline Icon' }}</label>
    <img src="{{asset($contactu->hotline_icon)}}" alt="" style="height: 40px; width: 40px;" class="mb-3 bg-success">
    <input class="form-control" name="hotline_icon" type="file" id="hotline_icon" value="{{ isset($contactu->hotline_icon) ? $contactu->hotline_icon : ''}}" >
    {!! $errors->first('hotline_icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_hotline_title') ? 'has-error' : ''}}">
    <label for="en_hotline_title" class="control-label">{{ 'En Hotline Title' }}</label>
    <input class="form-control" name="en_hotline_title" type="text" id="en_hotline_title" value="{{ isset($contactu->en_hotline_title) ? $contactu->en_hotline_title : ''}}" >
    {!! $errors->first('en_hotline_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_hotline_title') ? 'has-error' : ''}}">
    <label for="bn_hotline_title" class="control-label">{{ 'Bn Hotline Title' }}</label>
    <input class="form-control" name="bn_hotline_title" type="text" id="bn_hotline_title" value="{{ isset($contactu->bn_hotline_title) ? $contactu->bn_hotline_title : ''}}" >
    {!! $errors->first('bn_hotline_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_hotline_address') ? 'has-error' : ''}}">
    <label for="en_hotline_address" class="control-label">{{ 'En Hotline Address' }}</label>
    <input class="form-control" name="en_hotline_address" type="text" id="en_hotline_address" value="{{ isset($contactu->en_hotline_address) ? $contactu->en_hotline_address : ''}}" >
    {!! $errors->first('en_hotline_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_hotline_address') ? 'has-error' : ''}}">
    <label for="bn_hotline_address" class="control-label">{{ 'Bn Hotline Address' }}</label>
    <input class="form-control" name="bn_hotline_address" type="text" id="bn_hotline_address" value="{{ isset($contactu->bn_hotline_address) ? $contactu->bn_hotline_address : ''}}" >
    {!! $errors->first('bn_hotline_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_btn_text') ? 'has-error' : ''}}">
    <label for="en_btn_text" class="control-label">{{ 'En Btn Text' }}</label>
    <input class="form-control" name="en_btn_text" type="text" id="en_btn_text" value="{{ isset($contactu->en_btn_text) ? $contactu->en_btn_text : ''}}" >
    {!! $errors->first('en_btn_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_btn_text') ? 'has-error' : ''}}">
    <label for="bn_btn_text" class="control-label">{{ 'Bn Btn Text' }}</label>
    <input class="form-control" name="bn_btn_text" type="text" id="bn_btn_text" value="{{ isset($contactu->bn_btn_text) ? $contactu->bn_btn_text : ''}}" >
    {!! $errors->first('bn_btn_text', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
