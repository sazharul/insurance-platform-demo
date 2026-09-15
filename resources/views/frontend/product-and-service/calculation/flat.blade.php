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
                <h5> {{ __('District') }}: <span
                        class="fw-bold">{{ $criteria->district->{app()->getLocale() . '_name'} }}</span>
                </h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Property Location') }}:
                    <span class="fw-bold">{{ $criteria->location->{app()->getLocale() . '_name'} }}</span>
                </h5>
            </div>
        </div>

        <div class="calculation_table_heading">
            <h6> {{ __('Premium Computation') }} </h6>
            <h6> {{ __('Premium Amount (BDT)') }} </h6>
        </div>
        <table class="table">
            <tbody>
                @foreach ($cal as $item)
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                 alt="">{{ $item->riskCoverage->{app()->getLocale() . '_name'} }} @ {{ $item->value }} TK
                            on {{ number_format($request_all['total_amount'],2) }}</td>
                        <td> {{ app()->getLocale() == 'en' ? number_format($item->self_value, 2) : $numto->bnCommaLakh($item->self_value) }}

                        </td>
                    </tr>
                @endforeach

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
        <input type="hidden" name="net_premium" value="{{ $net_premium }}">
        <input type="hidden" name="vat" value="{{ $vat }}">
        <input type="hidden" name="total_amount" value="{{ $total_premium }}">
        <input type="hidden" name="insured_amount" value="{{ $request_all['total_amount'] }}">
        <input type="hidden" name="teriff_code" value="{{ $criteria->teriff_code }}">
    @else
        <div class="alert alert-danger mt-5">
            {{ __($alert_message) }}
        </div>
    @endif

</div>
@if (!$alert_message || $calculator->buyable == 1)
    <div class="modal-footer">
        <button type="button" class="btn modal_back_btn" data-bs-dismiss="modal"> {{ __('Go Back') }} </button>
        @if($calculator->buyable == 1)
            <button type="submit" class="btn modal_buy_btn"> {{ __('Buy Now') }} </button>
        @endif
    </div>
@endif
