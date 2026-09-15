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
                <h5> {{ __('Vehicle Category') }}:
                    <span class="fw-bold">
                        {{ $tariff->calculatorVehicleCategory->{app()->getLocale() . '_name'} }}
                    </span>
                </h5>
            </div>

            <div class="service_items">
                <h5> {{ __('Vehicle Type') }}:
                    <span class="fw-bold">
                        {{ $tariff->calculatorVehicleType->{app()->getLocale() . '_name'} }}
                    </span>
                </h5>
            </div>

            <div class="service_items">
                <h5> {{ __('Engine Capacity') }}:
                    <span class="fw-bold">
                        {{ $engine_capacity_cc }} CC
                    </span>
                </h5>
            </div>

            @if ($vehicle_weight_ton)
                <div class="service_items">
                    <h5> {{ __('Truck weight') }}:
                        <span class="fw-bold">
                            {{ $vehicle_weight_ton }} Ton
                        </span>
                    </h5>
                </div>
            @endif
        </div>
        <div class="calculation_table_heading">
            <h4> {{ __('Insurance Details') }} </h4>
            <h4> {{ __('Amount') }} </h4>
        </div>
        <table class="table">
            <tbody>
                @if ($basic_premium > 0)
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                 alt="">{{ __('Basic Premium') }}</td>
                        <td>{{ app()->getLocale() == 'en' ? number_format($basic_premium, 2) : $numto->bnCommaLakh($basic_premium) }}
                        </td>
                    </tr>
                @endif
                @if ($tachometer_amount > 0)
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                 alt="">{{ __('Tachometer') }} ({{ eng_to_bng($tachometer) }})
                        </td>
                        <td>{{ app()->getLocale() == 'en' ? number_format($tachometer_amount, 2) : $numto->bnCommaLakh($tachometer_amount) }}
                        </td>
                    </tr>
                @endif

                @if ($selected_insurance_type != 'Act Liability')
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}" alt="">+
                            {{ $fiv }} On FIV
                        </td>
                        <td>{{ app()->getLocale() == 'en' ? number_format($fiv_amount, 2) : $numto->bnCommaLakh($fiv_amount) }}
                        </td>
                    </tr>
                @endif
                @if ($selected_insurance_type != 'Act Liability' && isset($risk_cover))

                    <tr>
                        <td>
                            @php
                                $fiv = 0;
                            @endphp
                            @foreach ($risk_cover as $cover_item)
                                @php
                                    $fiv += $cover_item->value;
                                @endphp
                            @endforeach
                            <span><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                       alt="">Less: {{ number_format($fiv, 2) }}% on FIV for

                                @foreach ($risk_cover as $cover_item)
                                    {{ $cover_item->{app()->getLocale() . '_name'} }} {{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </span>
                        </td>
                        <td>{{ app()->getLocale() == 'en' ? number_format($covarage_amount, 2) : $numto->bnCommaLakh($covarage_amount) }}
                        </td>
                    </tr>
                @endif
                @if (isset($request_ncb))
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                 alt="">{{ __('Less: ' . $request_ncb . '% NCB') }}
                        </td>
                        <td>{{ app()->getLocale() == 'en' ? number_format($ncb, 2) : $numto->bnCommaLakh($ncb) }} </td>
                    </tr>
                @endif
                @if (isset($request_loading))
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                 alt="">{{ __('Add: ' . $request_loading . '% Claim Loading') }}
                        </td>
                        <td>{{ app()->getLocale() == 'en' ? number_format($loading, 2) : $numto->bnCommaLakh($loading) }}
                        </td>
                    </tr>
                @endif

                @if ($vtss_amount > 0)
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                 alt="">{{ __('VTS Meter') }} ({{ $vtss }})
                        </td>
                        <td>{{ app()->getLocale() == 'en' ? number_format($vtss_amount, 2) : $numto->bnCommaLakh($vtss_amount) }}
                        </td>
                    </tr>
                @endif

                @if ($act > 0)
                    <tr>
                        <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                 alt="">{{ __('Act Liability Premium') }} </td>
                        <td>{{ app()->getLocale() == 'en' ? number_format($act, 2) : $numto->bnCommaLakh($act) }} </td>
                    </tr>
                @endif

                <tr>
                    <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                             alt="">{{ __('Passenger') }} ({{ $passenger }} x
                        {{ $single_passenger_price }})
                    </td>
                    <td>{{ app()->getLocale() == 'en' ? number_format($passenger_price, 2) : $numto->bnCommaLakh($passenger_price) }}
                    </td>
                </tr>
                <tr>
                    <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                             alt="">{{ __('Driver') }} ({{ $driver }} x
                        {{ $driver_price / $driver }})
                    </td>
                    <td>{{ app()->getLocale() == 'en' ? number_format($driver_price, 2) : $numto->bnCommaLakh($driver_price) }}
                    </td>
                </tr>


                <tr class="bg-success text-white">
                    <td>{{ __('Net Premium') }}</td>
                    <td> {{ app()->getLocale() == 'en' ? number_format($net_premium, 2) : $numto->bnCommaLakh($net_premium) }}

                    </td>
                </tr>

                @if ($vat > 0)
                    <tr class="bg-success text-white">
                        <td>{{ __('Add @ 15% VAT') }}</td>
                        <td>
                            {{ app()->getLocale() == 'en' ? number_format($vat_amount, 2) : $numto->bnCommaLakh($vat_amount) }}
                        </td>
                    </tr>
                @endif

                <tr class="bg-success text-white fw-bold">
                    <td>{{ __('Total Premium') }}</td>
                    <td style="width: 120px;">
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

        <input type="hidden" name="stamp_charge" value="{{ $stamp_amount ?? 0 }}">
        <input type="hidden" name="net_premium" value="{{ $net_premium ?? 0 }}">
        <input type="hidden" name="vat" value="{{ $vat ?? 0 }}">
        <input type="hidden" name="total_amount" value="{{ $total_premium ?? 0 }}">
        <input type="hidden" name="insured_amount" value="{{ $vehicle_price ?? 0 }}">
        <input type="hidden" name="policy_start_date" value="{{ $policy_start_date }}">
        <input type="hidden" name="teriff_code" value="{{ $tariff->teriff_code }}">
        <input type="hidden" name="certificate_number" value="{{ $certificate_number }}">

        @if($calculator->buyable == '1')
            <button type="submit" class="btn modal_buy_btn"> {{ __('Buy Now') }} </button>
        @endif
    </div>
@endif
