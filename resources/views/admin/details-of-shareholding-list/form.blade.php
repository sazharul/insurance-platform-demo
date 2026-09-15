<div class="form-group {{ $errors->has('en_name') ? 'has-error' : ''}}">
    <label for="en_name" class="control-label">{{ 'En Name' }}</label>
    <input class="form-control" name="en_name" type="text" id="en_name" value="{{ isset($detailsofshareholdinglist->en_name) ? $detailsofshareholdinglist->en_name : ''}}" >
    {!! $errors->first('en_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_name') ? 'has-error' : ''}}">
    <label for="bn_name" class="control-label">{{ 'Bn Name' }}</label>
    <input class="form-control" name="bn_name" type="text" id="bn_name" value="{{ isset($detailsofshareholdinglist->bn_name) ? $detailsofshareholdinglist->bn_name : ''}}" >
    {!! $errors->first('bn_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_shares_no') ? 'has-error' : ''}}">
    <label for="en_shares_no" class="control-label">{{ 'En Shares No' }}</label>
    <input class="form-control" name="en_shares_no" type="text" id="en_shares_no" value="{{ isset($detailsofshareholdinglist->en_shares_no) ? $detailsofshareholdinglist->en_shares_no : ''}}" >
    {!! $errors->first('en_shares_no', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_shares_no') ? 'has-error' : ''}}">
    <label for="bn_shares_no" class="control-label">{{ 'Bn Shares No' }}</label>
    <input class="form-control" name="bn_shares_no" type="text" id="bn_shares_no" value="{{ isset($detailsofshareholdinglist->bn_shares_no) ? $detailsofshareholdinglist->bn_shares_no : ''}}" >
    {!! $errors->first('bn_shares_no', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('en_shares_percentage') ? 'has-error' : ''}}">
    <label for="en_shares_percentage" class="control-label">{{ 'En Shares Percentage' }}</label>
    <input class="form-control" name="en_shares_percentage" type="text" id="en_shares_percentage" value="{{ isset($detailsofshareholdinglist->en_shares_percentage) ? $detailsofshareholdinglist->en_shares_percentage : ''}}" >
    {!! $errors->first('en_shares_percentage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bn_shares_percentage') ? 'has-error' : ''}}">
    <label for="bn_shares_percentage" class="control-label">{{ 'Bn Shares Percentage' }}</label>
    <input class="form-control" name="bn_shares_percentage" type="text" id="bn_shares_percentage" value="{{ isset($detailsofshareholdinglist->bn_shares_percentage) ? $detailsofshareholdinglist->bn_shares_percentage : ''}}" >
    {!! $errors->first('bn_shares_percentage', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pie_chart_color') ? 'has-error' : ''}}">
    <label for="pie_chart_color" class="control-label">{{ 'Select Pie Chart Color' }}</label>
    <input class="form-control" name="pie_chart_color" type="color" id="pie_chart_color" value="{{ isset($detailsofshareholdinglist->pie_chart_color) ? $detailsofshareholdinglist->pie_chart_color : ''}}" >
    {!! $errors->first('pie_chart_color', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position" value="{{ isset($detailsofshareholdinglist->position) ? $detailsofshareholdinglist->position : ''}}">
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
