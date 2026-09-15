<h2 class="mt-5 mb-3">{{ __('Risk Cover') }}</h2>
<div class="row" style="justify-content: center;">
    @foreach ($risk as $item)
        <div class="col-lg-4 col-sm-4 col-6 mb-2 risk_covered_btn"
            onclick="changeRiskCoverage(this,'{{ $item->id }}')" data-url="{{ route('ps.marineRiskCoverage') }}" data-calculator_id="{{ $item->calculator_id }}" data-carried_by_id="{{ $item->carried_by_id }}">
            <div class="risk_covered">
                <button type="button">{{ $item->{app()->getLocale() . '_name'} }}</button>
            </div>
        </div>
    @endforeach
</div>

<div id="risk_coverage_interest"></div>