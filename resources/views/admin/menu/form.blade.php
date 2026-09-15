<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($menu->en_name) ? $menu->en_name : ''}}">
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($menu->bn_name) ? $menu->bn_name : ''}}">
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    <label for="url" class="control-label">{{ 'URL' }}</label>
    <input class="form-control" name="url" type="text" id="url" value="{{ isset($menu->url) ? $menu->url : ''}}">
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Parent Menu' }}</label>
    <select class="form-control" name="parent_id" id="parent_id">
        @php
            $menu_list = \App\Models\Menu::get();
        @endphp
        <option value="">Parent</option>
        @foreach($menu_list as $item)
            <option value="{{ $item->id }}" {{ (isset($menu->bn_name)) ? ($menu->parent_id == $item->id) ? 'selected' : '' : '' }}>{{ $item->en_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position" value="{{ isset($menu->position) ? $menu->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('left_right') ? 'has-error' : ''}}">
    <label for="left_right" class="control-label">{{ 'Left Right' }}</label>
    <select class="form-control" name="left_right" id="left_right">
        <option value="left" {{ isset($menu->left_right) ? ($menu->left_right == 'left') ? 'selected' : '' : '' }}>Left</option>
        <option value="right" {{ isset($menu->left_right) ? ($menu->left_right == 'right') ? 'selected' : '' : '' }}>Right</option>
    </select>
    {!! $errors->first('left_right', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
