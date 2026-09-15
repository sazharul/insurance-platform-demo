<div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
    <label for="en_title" class="control-label">{{ 'En Title' }}</label>
    <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($detailsofshareholding->en_title) ? $detailsofshareholding->en_title : ''}}" >
    {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
    <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
    <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($detailsofshareholding->bn_title) ? $detailsofshareholding->bn_title : ''}}" >
    {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
    <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1" value="{{ isset($detailsofshareholding->en_breadcrumb_1) ? $detailsofshareholding->en_breadcrumb_1 : ''}}" >
    {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
    <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1" value="{{ isset($detailsofshareholding->bn_breadcrumb_1) ? $detailsofshareholding->bn_breadcrumb_1 : ''}}" >
    {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
    <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2" value="{{ isset($detailsofshareholding->en_breadcrumb_2) ? $detailsofshareholding->en_breadcrumb_2 : ''}}" >
    {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
    <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
    <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2" value="{{ isset($detailsofshareholding->bn_breadcrumb_2) ? $detailsofshareholding->bn_breadcrumb_2 : ''}}" >
    {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_heading') ? 'has-error' : ''}}">
    <label for="en_heading" class="control-label">{{ 'En Heading' }}</label>
    <input class="form-control" name="en_heading" type="text" id="en_heading" value="{{ isset($detailsofshareholding->en_heading) ? $detailsofshareholding->en_heading : ''}}" >
    {!! $errors->first('en_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_heading') ? 'has-error' : ''}}">
    <label for="bn_heading" class="control-label">{{ 'Bn Heading' }}</label>
    <input class="form-control" name="bn_heading" type="text" id="bn_heading" value="{{ isset($detailsofshareholding->bn_heading) ? $detailsofshareholding->bn_heading : ''}}" >
    {!! $errors->first('bn_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_sub_heading') ? 'has-error' : ''}}">
    <label for="en_sub_heading" class="control-label">{{ 'En Sub Heading' }}</label>
    <input class="form-control" name="en_sub_heading" type="text" id="en_sub_heading" value="{{ isset($detailsofshareholding->en_sub_heading) ? $detailsofshareholding->en_sub_heading : ''}}" >
    {!! $errors->first('en_sub_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_sub_heading') ? 'has-error' : ''}}">
    <label for="bn_sub_heading" class="control-label">{{ 'Bn Sub Heading' }}</label>
    <input class="form-control" name="bn_sub_heading" type="text" id="bn_sub_heading" value="{{ isset($detailsofshareholding->bn_sub_heading) ? $detailsofshareholding->bn_sub_heading : ''}}" >
    {!! $errors->first('bn_sub_heading', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_table_name') ? 'has-error' : ''}}">
    <label for="en_table_name" class="control-label">{{ 'En Table Name' }}</label>
    <input class="form-control" name="en_table_name" type="text" id="en_table_name" value="{{ isset($detailsofshareholding->en_table_name) ? $detailsofshareholding->en_table_name : ''}}" >
    {!! $errors->first('en_table_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_table_name') ? 'has-error' : ''}}">
    <label for="bn_table_name" class="control-label">{{ 'Bn Table Name' }}</label>
    <input class="form-control" name="bn_table_name" type="text" id="bn_table_name" value="{{ isset($detailsofshareholding->bn_table_name) ? $detailsofshareholding->bn_table_name : ''}}" >
    {!! $errors->first('bn_table_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('en_table_of_shares') ? 'has-error' : ''}}">
    <label for="en_table_of_shares" class="control-label">{{ 'En Table Of Shares' }}</label>
    <input class="form-control" name="en_table_of_shares" type="text" id="en_table_of_shares" value="{{ isset($detailsofshareholding->en_table_of_shares) ? $detailsofshareholding->en_table_of_shares : ''}}" >
    {!! $errors->first('en_table_of_shares', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_table_of_shares') ? 'has-error' : ''}}">
    <label for="bn_table_of_shares" class="control-label">{{ 'Bn Table Of Shares' }}</label>
    <input class="form-control" name="bn_table_of_shares" type="text" id="bn_table_of_shares" value="{{ isset($detailsofshareholding->bn_table_of_shares) ? $detailsofshareholding->bn_table_of_shares : ''}}" >
    {!! $errors->first('bn_table_of_shares', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_table_of_share_in') ? 'has-error' : ''}}">
    <label for="en_table_of_share_in" class="control-label">{{ 'En Table Of Share In' }}</label>
    <input class="form-control" name="en_table_of_share_in" type="text" id="en_table_of_share_in" value="{{ isset($detailsofshareholding->en_table_of_share_in) ? $detailsofshareholding->en_table_of_share_in : ''}}" >
    {!! $errors->first('en_table_of_share_in', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_table_of_share_in') ? 'has-error' : ''}}">
    <label for="bn_table_of_share_in" class="control-label">{{ 'Bn Table Of Share In' }}</label>
    <input class="form-control" name="bn_table_of_share_in" type="text" id="bn_table_of_share_in" value="{{ isset($detailsofshareholding->bn_table_of_share_in) ? $detailsofshareholding->bn_table_of_share_in : ''}}" >
    {!! $errors->first('bn_table_of_share_in', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
