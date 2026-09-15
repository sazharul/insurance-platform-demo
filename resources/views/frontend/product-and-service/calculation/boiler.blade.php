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
                <h5> Boiler and Pressure vessel age:
                    <span class="fw-bold">{{ $boiler_age }} Years</span>
                </h5>
            </div>

            @if ($spp > 0)
                <div class="service_items">
                    <h5> {{ __('Surrounding Property') }}:
                        <span class="fw-bold">{{ __('Yes') }}</span>
                    </h5>
                </div>
                <div class="service_items">
                    <h5> {{ __('Surrounding Property Value BDT') }}:
                        <span class="fw-bold">{{ number_format($spp_value, 2) }}</span>
                    </h5>
                </div>
            @endif
            <div class="service_items">
                <h5> {{ __('Sum Insured') }} BDT:
                    <span
                        class="fw-bold">{{ app()->getLocale() == 'en' ? number_format($total_request_amount, 2) : $numto->bnCommaLakh($total_request_amount) }}</span>
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
                    <td>{{ __('BPV @ ' . $boiler->value) }}%</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($bpv, 2) : $numto->bnCommaLakh($bpv) }}

                    </td>
                </tr>
                @if ($spp > 0)
                    <tr class="bg-success text-white">
                        <td>{{ __('Add: Sorrunding Property @ 2%') }}</td>
                        <td> {{ app()->getLocale() == 'en' ? number_format($spp, 2) : $numto->bnCommaLakh($spp) }}

                        </td>
                    </tr>
                @endif
                <tr class="bg-success text-white">
                    <td>{{ __('Net Premium') }}</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($net_premium, 2) : $numto->bnCommaLakh($net_premium) }}

                    </td>
                </tr>
                <tr class="bg-success text-white">
                    <td>{{ __('Add 15% VAT') }}</td>
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
