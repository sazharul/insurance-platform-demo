<h2 class="mt-5 mb-3 vehicle_engine_capacity">{{ __('Engine Capacity (CC)') }}</h2>
<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-3"></div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group">
            <input type="number" class="form-control" id="engine_capacity_cc" placeholder="Engine capacity in cc">
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3"></div>
</div>

@if ($weight == 1)
    <h2 class="mt-5 mb-3 vehicle_engine_capacity">{{ __('Vehicle Weight (Ton)') }}</h2>
    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <input type="number" class="form-control" id="vehicle_weight_ton" placeholder="Vehicle weight in ton">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
    </div>
@endif
