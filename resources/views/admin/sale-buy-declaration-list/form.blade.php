<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
    <label for="icon" class="control-label">{{ 'Icon' }}</label>
    @if (isset($salebuydeclarationlist->icon) ? $salebuydeclarationlist->icon : '')
        <img src="{{ asset(isset($salebuydeclarationlist->icon) ? $salebuydeclarationlist->icon : '') }}" alt=""
            style="height: 40px; width: 40px;" class="mb-3 bg-success">
    @else
    @endif
    <input class="form-control" name="icon" type="file" id="icon"
        value="{{ isset($salebuydeclarationlist->icon) ? $salebuydeclarationlist->icon : '' }}">
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_name') ? 'has-error' : '' }}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name"
        value="{{ isset($salebuydeclarationlist->en_name) ? $salebuydeclarationlist->en_name : '' }}">
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : '' }}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name"
        value="{{ isset($salebuydeclarationlist->bn_name) ? $salebuydeclarationlist->bn_name : '' }}">
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_details') ? 'has-error' : '' }}">
    <label for="en_details" class="control-label">{{ 'En Details' }}</label>
    <textarea class="form-control" rows="5" name="en_details" type="textarea" id="en_details">{{ isset($salebuydeclarationlist->en_details) ? $salebuydeclarationlist->en_details : '' }}</textarea>
    {!! $errors->first('en_details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_details') ? 'has-error' : '' }}">
    <label for="bn_details" class="control-label">{{ 'Bn Details' }}</label>
    <textarea class="form-control" rows="5" name="bn_details" type="textarea" id="bn_details">{{ isset($salebuydeclarationlist->bn_details) ? $salebuydeclarationlist->bn_details : '' }}</textarea>
    {!! $errors->first('bn_details', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position"
        value="{{ isset($salebuydeclarationlist->position) ? $salebuydeclarationlist->position : '' }}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>

<div class="col-md-3 mt-3">
    Status
</div>
<div class="col-md-9 mt-3">
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio1">Publish</label>
        <input class="form-check-input" type="radio" name="status"
            {{ isset($salebuydeclarationlist->status) && $salebuydeclarationlist->status == 1 ? 'checked' : '' }}
            id="inlineRadio1" value="1">
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label" for="inlineRadio2">Unpublish</label>
        <input class="form-check-input" type="radio" name="status"
            {{ isset($salebuydeclarationlist->status) && $salebuydeclarationlist->status == 0 ? 'checked' : '' }}
            id="inlineRadio2" value="0">
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
