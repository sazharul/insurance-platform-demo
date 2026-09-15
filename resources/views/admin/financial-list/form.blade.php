<div class="form-group {{ $errors->has('en_particulars') ? 'has-error' : ''}}">
    <label for="en_particulars" class="control-label">{{ 'En Particulars' }}</label>
    <input class="form-control" name="en_particulars" type="text" id="en_particulars" value="{{ isset($particular_list->en_particulars) ? $particular_list->en_particulars : ''}}" >
    {!! $errors->first('en_particulars', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('bn_particulars') ? 'has-error' : ''}}">
    <label for="bn_particulars" class="control-label">{{ 'Bn Particulars' }}</label>
    <input class="form-control" name="bn_particulars" type="text" id="bn_particulars" value="{{ isset($particular_list->bn_particulars) ? $particular_list->bn_particulars : ''}}" >
    {!! $errors->first('bn_particulars', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position" value="{{ isset($particular_list->position) ? $particular_list->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
