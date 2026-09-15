<div class="form-group {{ $errors->has('insurance_type') ? 'has-error' : '' }}">
    <label for="insurance_type" class="control-label">Insurance Type</label>
    <select class="form-control" name="insurance_type" id="insurence_type">

        <option value="">Please Select</option>
        <option value="Comprehensive"
            {{ isset($calculatormotortariffprice) ? ($calculatormotortariffprice->insurance_type == 'Comprehensive' ? 'selected' : '') : '' }}>
            Comprehensive</option>
        <option value="Act Liability"
            {{ isset($calculatormotortariffprice) ? ($calculatormotortariffprice->insurance_type == 'Act Liability' ? 'selected' : '') : '' }}>
            Act Liability</option>
    </select>
    {!! $errors->first('vehicle_category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_category_id') ? 'has-error' : '' }}">
    <label for="vehicle_category_id" class="control-label">{{ 'Vehicle Category' }}</label>
    <select class="form-control" name="vehicle_category_id" id="vehicle_category_id">
        @php
            $vehicle_category = \App\Models\CalculatorVehicleCategory::get();
        @endphp
        <option value="0">Please Select</option>
        @foreach ($vehicle_category as $item)
            <option value="{{ $item->id }}"
                {{ isset($calculatormotortariffprice) ? ($calculatormotortariffprice->vehicle_category_id == $item->id ? 'selected' : '') : '' }}>
                {{ $item->en_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('vehicle_category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vehicle_type_id') ? 'has-error' : '' }}">
    <label for="vehicle_type_id" class="control-label">{{ 'Vehicle Type' }}</label>
    <select class="form-control" name="vehicle_type_id" id="vehicle_type_id">
        <option
            value="{{ isset($calculatormotortariffprice->vehicle_type_id) ? $calculatormotortariffprice->vehicle_type_id : '' }}">
            {{ isset($calculatormotortariffprice->calculatorVehicleType) ? $calculatormotortariffprice->calculatorVehicleType->en_name : '' }}
        </option>
    </select>
    {!! $errors->first('vehicle_type_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('capacity_from') ? 'has-error' : '' }}">
            <label for="capacity_from" class="control-label">{{ 'Engine capacity from (cc)' }}</label>
            <input class="form-control" name="capacity_from" type="text" id="capacity_from"
                value="{{ isset($calculatormotortariffprice->capacity_from) ? $calculatormotortariffprice->capacity_from : '' }}">
            {!! $errors->first('capacity_from', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('capacity_to') ? 'has-error' : '' }}">
            <label for="capacity_to" class="control-label">{{ 'Engine capacity to (cc)' }}</label>
            <input class="form-control" name="capacity_to" type="text" id="capacity_to"
                value="{{ isset($calculatormotortariffprice->capacity_to) ? $calculatormotortariffprice->capacity_to : '' }}">
            {!! $errors->first('capacity_to', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('weight_from') ? 'has-error' : '' }}">
            <label for="weight_from" class="control-label">{{ 'Vehicle weight from (Ton)' }}</label>
            <input class="form-control" name="weight_from" type="text" id="weight_from"
                value="{{ isset($calculatormotortariffprice->weight_from) ? $calculatormotortariffprice->weight_from : '' }}">
            {!! $errors->first('weight_from', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('weight_to') ? 'has-error' : '' }}">
            <label for="weight_to" class="control-label">{{ 'Vehicle weight to (Ton)' }}</label>
            <input class="form-control" name="weight_to" type="text" id="weight_to"
                value="{{ isset($calculatormotortariffprice->weight_to) ? $calculatormotortariffprice->weight_to : '' }}">
            {!! $errors->first('weight_to', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('self_driver') ? 'has-error' : '' }}">
            <label for="self_driver" class="control-label">{{ 'Self driver price' }}</label>
            <input class="form-control" name="self_driver" type="text" id="self_driver"
                value="{{ isset($calculatormotortariffprice->self_driver) ? $calculatormotortariffprice->self_driver : '' }}">
            {!! $errors->first('self_driver', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('paid_driver') ? 'has-error' : '' }}">
            <label for="paid_driver" class="control-label">{{ 'Paid driver price' }}</label>
            <input class="form-control" name="paid_driver" type="text" id="paid_driver"
                value="{{ isset($calculatormotortariffprice->paid_driver) ? $calculatormotortariffprice->paid_driver : '' }}">
            {!! $errors->first('paid_driver', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('act_liability') ? 'has-error' : '' }}">
    <label for="act_liability" class="control-label">{{ 'Act Liability Basic Price' }}</label>
    <input class="form-control" name="act_liability" type="text" id="act_liability"
        value="{{ isset($calculatormotortariffprice->act_liability) ? $calculatormotortariffprice->act_liability : '' }}">
    {!! $errors->first('act_liability', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="control-label">{{ 'Comprehensive Basic' }}</label>
    <input class="form-control" name="price" type="text" id="price"
        value="{{ isset($calculatormotortariffprice->price) ? $calculatormotortariffprice->price : '' }}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('teriff_code') ? 'has-error' : '' }}">
    <label for="teriff_code" class="control-label">{{ 'Teriff code' }}</label>
    <input class="form-control" name="teriff_code" type="text" id="teriff_code"
        value="{{ isset($calculatormotortariffprice->teriff_code) ? $calculatormotortariffprice->teriff_code : '' }}">
    {!! $errors->first('teriff_code', '<p class="help-block">:message</p>') !!}
</div>

{{-- <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}"> --}}
{{--    <label for="status" class="control-label">{{ 'Status' }}</label> --}}
{{--    <select name="status" id="status" class="form-control"> --}}
{{--        <option value="1">Active</option> --}}
{{--        <option value="0">InActive</option> --}}
{{--    </select> --}}
{{--    {!! $errors->first('status', '<p class="help-block">:message</p>') !!} --}}
{{-- </div> --}}


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
