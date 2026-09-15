@php
    use Rakibhstu\Banglanumber\NumberToBangla;

    $numto = new NumberToBangla();
@endphp

<div class="modal-body">
    <div class="service_name">
        <h4>{{ $calculator->{app()->getLocale() . '_name'} }}</h4>
        <span class="bottomLine"></span>
    </div>
    @if (!$alert_message)
        <div class="service_wrap text-center">
            <div class="service_items">
                <h5> {{ __('Mediclaim Type') }}: <span class="fw-bold">
                        @if ($is_schengen == 1)
                            {{ __('Schengene Country') }}
                        @else
                            {{ __('Non Schengene Country') }}
                        @endif
                    </span></h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Plan Type') }}: <span class="fw-bold">
                        @if ($is_including == 1)
                            {{ __('Including USA & CANADA') }}
                        @else
                            {{ __('Excluding USA & CANADA') }}
                        @endif
                    </span></h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Travel Duration') }}:
                    <span class="fw-bold">{{ app()->getLocale() == 'en' ? $visit_day : $numto->bnNum($visit_day) }}
                        {{ __('Days') }}</span>
                </h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Age') }}:
                    <span class="fw-bold">{{ app()->getLocale() == 'en' ? $age : $numto->bnNum($age) }}
                        {{ $age > 0 ? __('Year') : __('Month') }}</span>
                </h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Date of Departure') }}: <span class="fw-bold">{{ $user_date_of_departure }}</span></h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Return Date') }}: <span class="fw-bold">{{ $user_return_date }}</span></h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Sum Insured') }}: <span class="fw-bold">US $50,000.00 or 30,000 euro</span></h5>
            </div>
        </div>
        <div class="calculation_table_heading">
            <h6> {{ __('Premium Computation') }} </h6>
            <h6> {{ __('Premium Amount (BDT)') }} </h6>
        </div>
        <table class="table">
            <tbody>

                <tr class="bg-success text-white">
                    <td>{{ __('Net Premium') }}</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($country->amount, 2) : $numto->bnCommaLakh($country->amount) }}

                    </td>
                </tr>
                <tr class="bg-success text-white">
                    <td>{{ __('Add 15% VAT') }} </td>
                    <td>
                        {{ app()->getLocale() == 'en' ? number_format($vat, 2) : $numto->bnCommaLakh($vat) }}

                    </td>
                </tr>
                <tr class="bg-success text-white fw-bold">
                    <td>{{ __('Stamp Charge') }}</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($stamp_amount, 2) : $numto->bnCommaLakh($stamp_amount) }}

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
    @else
        <div class="alert alert-danger mt-5">
            {{ __($alert_message) }}
        </div>
    @endif
</div>
@if (!$alert_message || $calculator->buyable == 1)
    <div class="modal-footer">
        <button type="button" class="btn modal_back_btn" data-bs-dismiss="modal"> {{ __('Go Back') }} </button>

        <input type="hidden" name="stamp_charge" value="{{ $stamp_amount ?? 0 }}">
        <input type="hidden" name="net_premium" value="{{ $country->amount ?? 0 }}">
        <input type="hidden" name="vat" value="{{ $vat ?? 0 }}">
        <input type="hidden" name="total_amount" value="{{ $total_premium ?? 0 }}">
        <input type="hidden" name="teriff_code" value="{{ $country->teriff_code ?? 0 }}">

        @if($calculator->buyable == 1)
            <button type="submit" class="btn modal_buy_btn"> {{ __('Buy Now') }} </button>
        @endif

    </div>
@endif
