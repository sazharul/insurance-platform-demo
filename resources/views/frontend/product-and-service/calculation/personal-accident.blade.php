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
                <h5> {{ __('Class of Occupation') }}: <span
                        class="fw-bold">{{ $teriff->occupation->{app()->getLocale() . '_name'} }}</span>
                </h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Scope of Cover') }}:
                    <span class="fw-bold">{{ $teriff->riskCoverage->{app()->getLocale() . '_name'} }}</span>
                </h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Medical Benefit') }}:
                    <span class="fw-bold">{{ $request_all['medical_benifit'] == true ? 'Yes' : 'No' }}</span>
                </h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Sum Insured') }}:
                    <span class="fw-bold">{{ __('BDT') }}
                        {{ app()->getLocale() == 'en' ? number_format($request_all['total_amount'], 2) : $numto->bnCommaLakh($request_all['total_amount']) }}
                    </span>
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
                    <td>{{ __('PA@' . $teriff->value) }}%</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($pa, 2) : $numto->bnCommaLakh($pa) }}

                    </td>
                </tr>
                @if ($request_all['medical_benifit'] == true)
                    <tr class="bg-success text-white">
                        <td>{{ __('Add: Medical Benefits @ 10% of Premium Amount') }}</td>
                        <td> {{ app()->getLocale() == 'en' ? number_format($medical_amount, 2) : $numto->bnCommaLakh($medical_amount) }}

                        </td>
                    </tr>
                @endif
                <tr class="bg-success text-white">
                    <td>{{ __('Net Premium') }}</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($net_premium, 2) : $numto->bnCommaLakh($net_premium) }}

                    </td>
                </tr>
                <tr class="bg-success text-white">
                    <td>{{ __('Add 15% VAT') }} </td>
                    <td>
                        {{ app()->getLocale() == 'en' ? number_format($vat, 2) : $numto->bnCommaLakh($vat) }}

                    </td>
                </tr>
                <tr class="bg-success text-white">
                    <td>{{ __('Stamp Duty') }}</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($stamp_charge, 2) : $numto->bnCommaLakh($stamp_charge) }}

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
        <button type="button" class="btn modal_back_btn" data-bs-dismiss="modal"> {{ __('Go Back') }} </button>
        @if ($calculator->buyable == 1)
            <input type="hidden" name="net_premium" value="{{ $net_premium }}">
            <input type="hidden" name="vat" value="{{ $vat }}">
            <input type="hidden" name="total_amount" value="{{ $total_premium }}">
            <input type="hidden" name="stamp_charge" value="{{ $stamp_charge }}">
            <input type="hidden" name="insured_amount" value="{{ $request_all['total_amount'] }}">
            <input type="hidden" name="teriff_code" value="{{ $teriff->teriff_code }}">
            <button type="submit" class="btn modal_buy_btn"> {{ __('Buy Now') }} </button>
        @endif
    </div>
@endif
