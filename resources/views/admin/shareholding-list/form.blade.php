<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($shareholdinglist->en_name) ? $shareholdinglist->en_name : ''}}" >
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($shareholdinglist->bn_name) ? $shareholdinglist->bn_name : ''}}" >
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_status') ? 'has-error' : ''}}">
    <label for="en_status" class="control-label">{{ 'En Status' }}</label>
    <input class="form-control" name="en_status" type="text" id="en_status" value="{{ isset($shareholdinglist->en_status) ? $shareholdinglist->en_status : ''}}" >
    {!! $errors->first('en_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_status') ? 'has-error' : ''}}">
    <label for="bn_status" class="control-label">{{ 'Bn Status' }}</label>
    <input class="form-control" name="bn_status" type="text" id="bn_status" value="{{ isset($shareholdinglist->bn_status) ? $shareholdinglist->bn_status : ''}}" >
    {!! $errors->first('bn_status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_shares_no') ? 'has-error' : ''}}">
    <label for="en_shares_no" class="control-label">{{ 'En Shares No' }}</label>
    <input class="form-control" name="en_shares_no" type="text" id="en_shares_no" value="{{ isset($shareholdinglist->en_shares_no) ? $shareholdinglist->en_shares_no : ''}}" >
    {!! $errors->first('en_shares_no', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_shares_no') ? 'has-error' : ''}}">
    <label for="bn_shares_no" class="control-label">{{ 'Bn Shares No' }}</label>
    <input class="form-control" name="bn_shares_no" type="text" id="bn_shares_no" value="{{ isset($shareholdinglist->bn_shares_no) ? $shareholdinglist->bn_shares_no : ''}}" >
    {!! $errors->first('bn_shares_no', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_shares_percentage') ? 'has-error' : ''}}">
    <label for="en_shares_percentage" class="control-label">{{ 'En Shares Percentage' }}</label>
    <input class="form-control" name="en_shares_percentage" type="text" id="en_shares_percentage" value="{{ isset($shareholdinglist->en_shares_percentage) ? $shareholdinglist->en_shares_percentage : ''}}" >
    {!! $errors->first('en_shares_percentage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_shares_percentage') ? 'has-error' : ''}}">
    <label for="bn_shares_percentage" class="control-label">{{ 'Bn Shares Percentage' }}</label>
    <input class="form-control" name="bn_shares_percentage" type="text" id="bn_shares_percentage" value="{{ isset($shareholdinglist->bn_shares_percentage) ? $shareholdinglist->bn_shares_percentage : ''}}" >
    {!! $errors->first('bn_shares_percentage', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position" value="{{ isset($shareholdinglist->position) ? $shareholdinglist->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
