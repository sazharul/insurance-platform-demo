@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    
    $numto = new NumberToBangla();
@endphp

<div class="modal-body">
    <div class="text-center result-heading">
        <h2>{{ __('Premium Calculator') }}</h2>
    </div>
    <div class="service_name">
        <h4>{{ $calculator->{app()->getLocale() . '_name'} }}</h4>
        <span class="bottomLine"></span>
    </div>
    @if (!$alert_message)
        <div class="service_wrap text-center">
            <div class="service_items">
                <h5> {{ __('Property Location') }}:
                    <span class="fw-bold">{{ $location->{app()->getLocale() . '_name'} }}</span>
                </h5>
            </div>
            <div class="service_items">
                <h5> {{ __('Building Construction') }}: <span
                        class="fw-bold">{{ $building->{app()->getLocale() . '_class_title'} }}</span>
                </h5>
            </div>
        </div>
        <div class="calculation_table_heading">
            <h6> {{ __('Premium Computation') }} </h6>
            <h6> {{ __('Premium Amount (BDT)') }} </h6>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td><img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                            alt="">{{ __('Fire &/or Lighting') }} @ {{ $fire_terif_details->value }}%
                        @if ($isMinimum)
                            ({{ __($isMinimum) }})
                        @endif
                        on TK
                        {{ app()->getLocale() == 'en' ? number_format($total_amount, 2) : $numto->bnCommaLakh($total_amount) }}
                    </td>
                    <td style="float: right;">
                        {{ app()->getLocale() == 'en' ? number_format($fire_interest, 2) : $numto->bnCommaLakh($fire_interest) }}

                    </td>
                </tr>

                @php
                    $new_data = [];
                    $key = 0;
                @endphp
                @foreach ($coverage_data as $item)
                    @php
                        
                        $amount = 0;
                        if ($item['cac']['id'] == 3) {
                            $new_data[$key]['name'] = $item['cac']['en_name'];
                        
                            if (isset($item['coverage']['additional_subcoverage_id'])) {
                                $new_data[$key]['sub_name'] = DB::table('calculation_fire_additional_subcoverages')
                                    ->where('id', $item['coverage']['additional_subcoverage_id'])
                                    ->first()->en_name;
                            }
                            $amount += $item['c_amount'];
                            $new_data[$key]['amount'] = $item['c_amount'];
                            ++$key;
                        }
                        
                    @endphp
                    @if ($item['cac']['id'] != 3)
                        <tr>
                            <td>
                                <img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                    alt="">{{ $item['cac']['en_name'] }} @if (isset($item['coverage']['additional_subcoverage_id']))
                                    ({{ DB::table('calculation_fire_additional_subcoverages')->where('id', $item['coverage']['additional_subcoverage_id'])->first()->en_name }})
                                @endif @TK{{ $item['coverage']['value'] }}% on
                                TK {{ number_format($item['coverage_amount'], 2) }}
                            </td>
                            <td style="float: right;">
                                {{ app()->getLocale() == 'en' ? number_format($item['c_amount'], 2) : $numto->bnCommaLakh($item['c_amount']) }}

                            </td>
                        </tr>
                    @endif
                @endforeach
                {{-- {{ dd($new_data) }} --}}
                @if (isset($new_data[0]['name']) && isset($new_data[1]['name']))
                    <tr>
                        <td>
                            <img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                alt="">{{ $new_data[0]['name'] }}
                            ({{ $new_data[0]['sub_name'] . ' and ' . $new_data[1]['sub_name'] }})

                        </td>
                        @php
                            $new_amount = $new_data[0]['amount'] + $new_data[1]['amount'];
                        @endphp
                        <td style="float: right;">
                            {{ app()->getLocale() == 'en' ? number_format($new_amount, 2) : $numto->bnCommaLakh($new_amount) }}

                        </td>
                    </tr>
                @elseif(isset($new_data[0]['name']))
                    <tr>
                        <td>
                            <img class="mr-10" src="{{ asset('images/website/green_tick.png') }}"
                                alt="">{{ $new_data[0]['name'] }} ({{ $new_data[0]['sub_name'] }})
                        </td>
                        @php
                            $new_amount = $new_data[0]['amount'];
                        @endphp
                        <td style="float: right;">
                            {{ app()->getLocale() == 'en' ? number_format($new_amount, 2) : $numto->bnCommaLakh($new_amount) }}

                        </td>
                    </tr>
                @endif
                {{-- {{ dd($new_data) }} --}}
                <tr class="bg-success text-white">
                    <td>{{ __('Premium') }}</td>
                    <td style="float: right;">
                        {{ app()->getLocale() == 'en' ? number_format($net_premium, 2) : $numto->bnCommaLakh($net_premium) }}

                    </td>
                </tr>
                <tr class="bg-success text-white">
                    <td>{{ __('Add 15% VAT') }}</td>
                    <td style="float: right;">
                        {{ app()->getLocale() == 'en' ? number_format($vat, 2) : $numto->bnCommaLakh($vat) }}

                    </td>
                </tr>
                <tr class="bg-success text-white fw-bold">
                    <td>{{ __('Total Premium') }}</td>
                    <td style="float: right;">
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
@if (!$alert_message)
    <div class="modal-footer" onclick="closeDialog(this)">
        <button style="width: 100%" type="button" class="btn modal_back_btn" data-bs-dismiss="modal">
            {{ __('Go Back') }} </button>

    </div>
@endif
