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
        @php
            $carried_by = [];
            $carried_risk = [];
            foreach (json_decode($all_requested_value['marin_carried_by']) as $mcb) {
                $carried_by[] = DB::table('calculator_carried_bies')
                    ->where('id', $mcb->carried_by)
                    ->first();
                $carried_risk[] = DB::table('calculator_risk_covers')
                    ->where('id', $mcb->carried_risk_id)
                    ->first();
            }
        @endphp
        <div class="service_wrap text-center">
            <div class="service_items">
                <h5> {{ __('Carried By') }} : <span class="fw-bold">
                        @foreach ($carried_by as $cb)
                            {{ $cb->{app()->getLocale() . '_name'} }}@if (!$loop->last)
                                {{ '/' }}
                            @endif
                        @endforeach
                    </span> </h5>
            </div>

            <div class="service_items">
                <h5> {{ __('Sum Insured') }}:
                    <span class="fw-bold">BDT {{ number_format($all_requested_value['total_sum_insured'], 2) }}</span>
                </h5>
            </div>
            @if (count($carried_risk) > 0)
                <div class="service_items">
                    <h5> {{ __('Conditions of Cover') }} :
                        <span class="fw-bold">
                            @foreach ($carried_risk as $cr)
                                {{ $cr->{app()->getLocale() . '_name'} }}@if (!$loop->last)
                                    {{ '/' }}
                                @endif
                            @endforeach
                            @if (isset($additional_coverage))
                                ,{{ $additional_coverage->{app()->getLocale() . '_name'} }}
                            @endif
                        </span>
                    </h5>
                </div>
            @endif
        </div>
        <div class="calculation_table_heading">
            <h6> {{ __('Premium Computation') }} </h6>
            <h6> {{ __('Premium Amount (BDT)') }} </h6>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                            alt="">{{ __('Marin') }} @
                        {{ app()->getLocale() == 'en' ? $interest->value : $numto->bnNum($interest->value) }}%
                        @if ($is_minimum)
                            ({{ $is_minimum }})
                        @endif
                    </td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($interest_amount, 2) : $numto->bnCommaLakh($interest_amount) }}
                    </td>
                </tr>
                @if ($additional_coverage)
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                alt="">{{ $additional_coverage->{app()->getLocale() . '_name'} }} @
                            {{ app()->getLocale() == 'en' ? $additional_coverage->value : $numto->bnNum($additional_coverage->value) }}%
                        </td>
                        <td> {{ app()->getLocale() == 'en' ? number_format($additional_coverage_amount, 2) : $numto->bnCommaLakh($additional_coverage_amount) }}

                        </td>
                    </tr>
                @endif
                <tr class="bg-success text-white">
                    <td>{{ __('Net Premium') }}</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($net_premium, 2) : $numto->bnCommaLakh($net_premium) }}

                    </td>
                </tr>
                @if ($vat > 0)
                    <tr class="bg-success text-white">
                        <td>{{ __('VAT') }} ({{ app()->getLocale() == 'en' ? 15 : $numto->bnNum(15) }}%)
                        </td>
                        <td>
                            {{ app()->getLocale() == 'en' ? number_format($vat, 2) : $numto->bnCommaLakh($vat) }}

                        </td>
                    </tr>
                @endif
                <tr class="bg-success text-white">
                    <td>{{ __('Stamp Duty') }}</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($stamp_charge, 2) : $numto->bnCommaLakh($stamp_charge) }}
                    </td>
                </tr>
                <tr class="bg-success text-white fw-bold mt-5">
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
