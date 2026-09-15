@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    
    $numto = new NumberToBangla();
@endphp

<div class="modal-body">
    <div class="service_name">
        <h4>{{ $calculator->{app()->getLocale() . '_name'} }}</h4>
        <span class="bottomLine"></span>
    </div>
    @if ($alert_message)
        <div class="alert alert-danger mt-5">
            {{ __($alert_message) }}
        </div>
    @else
        <div class="service_wrap text-center">
            <div class="service_items">
                <h5> {{ __('Institution Type') }}: <span
                        class="fw-bold">{{ $teriff->institute->{app()->getLocale() . '_name'} }}</span>
                </h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Sum Insured') }}:
                    <span class="fw-bold">BDT {{ app()->getLocale() == 'en' ? number_format($request_all['yearly_turnover'], 2) : $numto->bnCommaLakh($request_all['yearly_turnover']) }}</span>
                </h5>
            </div>
        </div>
        <div class="calculation_table_heading">
            <h6> {{ __('Premium Computation') }} </h6>
            <h6> {{ __('Premium Amount (BDT)') }} </h6>
        </div>
        <table class="table">
            <tbody>

                <tr class="bg-success text-white">
                    <td>{{ __('Premium @ ' . $teriff->value) }}%</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($net_premium, 2) : $numto->bnCommaLakh($net_premium) }}

                    </td>
                </tr>
                <tr class="bg-success text-white">
                    <td>{{ __('VAT') }} ({{ app()->getLocale() == 'en' ? 15 : $numto->bnCommaLakh(15) }}%)</td>
                    <td>
                        {{ app()->getLocale() == 'en' ? number_format($vat, 2) : $numto->bnCommaLakh($vat) }}

                    </td>
                </tr>
                <tr class="bg-success text-white fw-bold">
                    <td>{{ __('Total Premium') }}</td>
                    <td>
                        {{ app()->getLocale() == 'en' ? number_format($total_premium, 2) : $numto->bnCommaLakh($total_premium) }}

                    </td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
@if (!$alert_message)
    <div class="modal-footer">
        <button style="width: 100%" type="button" class="btn modal_back_btn" data-bs-dismiss="modal">
            {{ __('Go Back') }} </button>

    </div>
@endif
