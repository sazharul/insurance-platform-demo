<div class="form-group {{ $errors->has('passenger_price') ? 'has-error' : ''}}">
    <label for="passenger_price" class="control-label">{{ 'Passenger Price' }}</label>
    <input class="form-control" name="passenger_price" type="text" id="passenger_price" value="{{ isset($passengerprice->passenger_price) ? $passengerprice->passenger_price : ''}}" >
    {!! $errors->first('passenger_price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('self_driver_price') ? 'has-error' : ''}}">
    <label for="self_driver_price" class="control-label">{{ 'Self Driver Price' }}</label>
    <input class="form-control" name="self_driver_price" type="text" id="self_driver_price" value="{{ isset($passengerprice->self_driver_price) ? $passengerprice->self_driver_price : ''}}" >
    {!! $errors->first('self_driver_price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('paid_driver_price') ? 'has-error' : ''}}">
    <label for="paid_driver_price" class="control-label">{{ 'Paid Driver Price' }}</label>
    <input class="form-control" name="paid_driver_price" type="text" id="paid_driver_price" value="{{ isset($passengerprice->paid_driver_price) ? $passengerprice->paid_driver_price : ''}}" >
    {!! $errors->first('paid_driver_price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tacometer') ? 'has-error' : ''}}">
    <label for="tacometer" class="control-label">{{ 'Tacometer Value (%)' }}</label>
    <input class="form-control" name="tacometer" type="text" id="tacometer" value="{{ isset($passengerprice->tacometer) ? $passengerprice->tacometer : ''}}" >
    {!! $errors->first('tacometer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vts_meter') ? 'has-error' : ''}}">
    <label for="vts_meter" class="control-label">{{ 'VTS Meter Value (%)' }}</label>
    <input class="form-control" name="vts_meter" type="text" id="vts_meter" value="{{ isset($passengerprice->vts_meter) ? $passengerprice->vts_meter : ''}}" >
    {!! $errors->first('vts_meter', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
