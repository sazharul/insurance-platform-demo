<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($shareholdingposition->en_title) ? $shareholdingposition->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($shareholdingposition->bn_title) ? $shareholdingposition->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($shareholdingposition->en_breadcrumb_1) ? $shareholdingposition->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($shareholdingposition->bn_breadcrumb_1) ? $shareholdingposition->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($shareholdingposition->en_breadcrumb_2) ? $shareholdingposition->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($shareholdingposition->bn_breadcrumb_2) ? $shareholdingposition->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_heading') ? 'has-error' : ''}}">
    <label for="en_heading" class="control-label">{{ 'En Heading' }}</label>
    <input class="form-control" name="en_heading" type="text" id="en_heading" value="{{ isset($shareholdingposition->en_heading) ? $shareholdingposition->en_heading : ''}}" >
    {!! $errors->first('en_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_heading') ? 'has-error' : ''}}">
    <label for="bn_heading" class="control-label">{{ 'Bn Heading' }}</label>
    <input class="form-control" name="bn_heading" type="text" id="bn_heading" value="{{ isset($shareholdingposition->bn_heading) ? $shareholdingposition->bn_heading : ''}}" >
    {!! $errors->first('bn_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_sub_heading') ? 'has-error' : ''}}">
    <label for="en_sub_heading" class="control-label">{{ 'En Sub Heading' }}</label>
    <input class="form-control" name="en_sub_heading" type="text" id="en_sub_heading" value="{{ isset($shareholdingposition->en_sub_heading) ? $shareholdingposition->en_sub_heading : ''}}" >
    {!! $errors->first('en_sub_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_sub_heading') ? 'has-error' : ''}}">
    <label for="bn_sub_heading" class="control-label">{{ 'Bn Sub Heading' }}</label>
    <input class="form-control" name="bn_sub_heading" type="text" id="bn_sub_heading" value="{{ isset($shareholdingposition->bn_sub_heading) ? $shareholdingposition->bn_sub_heading : ''}}" >
    {!! $errors->first('bn_sub_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_table_name') ? 'has-error' : ''}}">
    <label for="en_table_name" class="control-label">{{ 'En Table Name' }}</label>
    <input class="form-control" name="en_table_name" type="text" id="en_table_name" value="{{ isset($shareholdingposition->en_table_name) ? $shareholdingposition->en_table_name : ''}}" >
    {!! $errors->first('en_table_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_table_name') ? 'has-error' : ''}}">
    <label for="bn_table_name" class="control-label">{{ 'Bn Table Name' }}</label>
    <input class="form-control" name="bn_table_name" type="text" id="bn_table_name" value="{{ isset($shareholdingposition->bn_table_name) ? $shareholdingposition->bn_table_name : ''}}" >
    {!! $errors->first('bn_table_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_table_status') ? 'has-error' : ''}}">
    <label for="en_table_status" class="control-label">{{ 'En Table Status' }}</label>
    <input class="form-control" name="en_table_status" type="text" id="en_table_status" value="{{ isset($shareholdingposition->en_table_status) ? $shareholdingposition->en_table_status : ''}}" >
    {!! $errors->first('en_table_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_table_status') ? 'has-error' : ''}}">
    <label for="bn_table_status" class="control-label">{{ 'Bn Table Status' }}</label>
    <input class="form-control" name="bn_table_status" type="text" id="bn_table_status" value="{{ isset($shareholdingposition->bn_table_status) ? $shareholdingposition->bn_table_status : ''}}" >
    {!! $errors->first('bn_table_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_table_of_shares') ? 'has-error' : ''}}">
    <label for="en_table_of_shares" class="control-label">{{ 'En Table Of Shares' }}</label>
    <input class="form-control" name="en_table_of_shares" type="text" id="en_table_of_shares" value="{{ isset($shareholdingposition->en_table_of_shares) ? $shareholdingposition->en_table_of_shares : ''}}" >
    {!! $errors->first('en_table_of_shares', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_table_of_shares') ? 'has-error' : ''}}">
    <label for="bn_table_of_shares" class="control-label">{{ 'Bn Table Of Shares' }}</label>
    <input class="form-control" name="bn_table_of_shares" type="text" id="bn_table_of_shares" value="{{ isset($shareholdingposition->bn_table_of_shares) ? $shareholdingposition->bn_table_of_shares : ''}}" >
    {!! $errors->first('bn_table_of_shares', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_table_of_share_in') ? 'has-error' : ''}}">
    <label for="en_table_of_share_in" class="control-label">{{ 'En Table Of Share In' }}</label>
    <input class="form-control" name="en_table_of_share_in" type="text" id="en_table_of_share_in" value="{{ isset($shareholdingposition->en_table_of_share_in) ? $shareholdingposition->en_table_of_share_in : ''}}" >
    {!! $errors->first('en_table_of_share_in', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_table_of_share_in') ? 'has-error' : ''}}">
    <label for="bn_table_of_share_in" class="control-label">{{ 'Bn Table Of Share In' }}</label>
    <input class="form-control" name="bn_table_of_share_in" type="text" id="bn_table_of_share_in" value="{{ isset($shareholdingposition->bn_table_of_share_in) ? $shareholdingposition->bn_table_of_share_in : ''}}" >
    {!! $errors->first('bn_table_of_share_in', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
