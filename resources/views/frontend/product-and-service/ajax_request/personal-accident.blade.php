@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    
    $numto = new NumberToBangla();
@endphp
<div class="row mt-3">
    <div class="col-lg-3 mt-3 text-center">
        <img class="img-fluid mt-3" src="{{ asset($people->hero_image) }}" alt="">
    </div>
    <div class="col-lg-9 mt-5">
        <span class="mujib_info_1">{!! $people->{app()->getLocale() . '_hero_title'} !!}</span> <span class="mujib_info_2">
            {!! $people->{app()->getLocale() . '_hero_subtitle'} !!}
        </span>
    </div>
</div>
<h2 class="mt-5 mb-3">{{ __('Plan Type') }}</h2>
<div class="row personal_accident">
    <div class="col-lg-12 motor_insurance_pane mt-2 text-center">
        @foreach ($data->calculatorPeoplePersonalAccident as $item)
            @if ($item->id == 1)
                <a href="{{ route('ps.people_personal_accident_insurance') }}"
                    class="btn mb-2 @if ($item->id == 2) {{ 'btn btn-success' }} @else {{ 'btn btn-outline-success' }} @endif"
                    type="button" onclick="peoplePersonalAccident(this, '{{ $item->id }}')"
                    data-url="{{ route('ps.ajaxPeoplePersonalAccident') }}">
                    {{-- <img src="{{ asset('images/website/group.png') }}" alt=""> --}}
                    {{ $item->{app()->getLocale() . '_plan_type_name'} }}</a>
            @else
                <button
                    class="btn mb-2 @if ($item->id == 2) {{ 'btn btn-success' }} @else {{ 'btn btn-outline-success' }} @endif"
                    type="button" onclick="peoplePersonalAccident(this, '{{ $item->id }}')"
                    data-url="{{ route('ps.ajaxPeoplePersonalAccident') }}">
                    {{-- <img src="{{ asset('images/website/group.png') }}" alt=""> --}}
                    {{ $item->{app()->getLocale() . '_plan_type_name'} }}</button>
            @endif
        @endforeach
    </div>
</div>
<div class="row mujib_bima_form_area time_panel mt-5">
    @if ($people->id == 1)
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <h4 class="">{{ __('Date of Birth') }}</h4>
            <input class="visited_input_box pp_date" placeholder="dd/mm/yyyy" type="text"
                onkeyup="date_of_birth(this)" name="dob" required> <label for=""></label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
            <h4 class="mb-35"></h4>
            <input class="visited_input_box" type="text" id="calculated_dob" name=""> <label
                for=""></label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
            <h4 class="years">{{ __('years') }}</h4>
        </div>
    @else
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <h4 class="mb-35">{{ __('Number of People') }}</h4>
            <input class="visited_input_box" type="text" onkeyup="calculated_people(this)"
                onkeydown="calculated_people(this)" data-url="{{ route('ps.putSessionPeopleNumber') }}" name="people_number_of_people" placeholder="Enter number of people"
                required>
            <label for=""></label>
        </div>
        <input type="hidden" value="{{ $people->net_premium }}" id="g_roup_net_premium">
        <input type="hidden" value="{{ $people->vat }}" id="g_roup_vat">
        <input type="hidden" id="g_roup_total_amount"
            value="{{ $people->net_premium + GET_VAT_AMOUNT($people->net_premium, $people->vat) }}">
    @endif
</div>
<div class="row mujib_bima_form_area mt-5">
    <div class="col-lg-12">
        <table class="table">
            <tbody>
                <tr>
                    <td class="mujib_bima_td"> {{ __('Capital Sum Insured') }}:</td>
                    <td> <input class="form-control" type="text" disabled
                            value="{{ app()->getLocale() == 'en' ? $people->capital_sum_insured : $numto->bnNum($people->capital_sum_insured) }}">
                        {{-- <img class="visited_country_polygon" src="{{ asset('images/website/polygon.png') }}" alt=""> --}}
                    </td>
                    <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                </tr>
                <tr>
                    <td class="mujib_bima_td"> {{ __('Net Premium') }} : </td>
                    <td class="mujib_bima_td_2">
                        <span class="group_net_premium">
                            {{ app()->getLocale() == 'en' ? $people->net_premium : $numto->bnNum($people->net_premium) }}
                        </span>
                    </td>
                    <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                </tr>
                <tr>
                    <td class="mujib_bima_td"> {{ __('VAT') }}@
                        {{ app()->getLocale() == 'en' ? $people->vat : $numto->bnNum($people->vat) }}%:
                    </td>
                    <td class="mujib_bima_td_2">
                        <span class="group_vat">
                            {{ app()->getLocale() == 'en' ? GET_VAT_AMOUNT($people->net_premium, $people->vat) : $numto->bnNum(GET_VAT_AMOUNT($people->net_premium, $people->vat)) }}
                        </span>
                    </td>
                    <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="mujib_bima_td"> {{ __('Total Premium') }} </td>
                    <td class="mujib_bima_td_2">
                        <span class="group_total">
                            {{ app()->getLocale() == 'en' ? $people->net_premium + GET_VAT_AMOUNT($people->net_premium, $people->vat) : $numto->bnNum($people->net_premium + GET_VAT_AMOUNT($people->net_premium, $people->vat)) }}
                        </span>
                    </td>
                    <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<input type="hidden" name="net_premium" value="{{ $people->net_premium }}" id="group_net_premium">
<input type="hidden" name="vat" value="{{ $people->vat }}" id="group_vat">
<input type="hidden" name="total_amount" id="group_total_amount"
    value="{{ $people->net_premium + GET_VAT_AMOUNT($people->net_premium, $people->vat) }}">
<input type="hidden" name="insured_amount" value="{{ $people->capital_sum_insured }}">
@if ($people->calculator->buyable == 1)
    <div class="row mt-5">
        <div class="col-lg-12 col-sm-12 new_btn_setup">
            <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
            <input type="hidden" name="people_personal_id" value="{{ $people->id }}">
            <input type="hidden" name="calculator_id" value="{{ $people->calculator_id }}">
            <input type="hidden" name="teriff_code" value="{{ $people->teriff_code }}">
            <button type="submit" class="btn fire_btn fire_btn_calculate mb-2">{{ __('Buy Now') }}</button>
        </div>
    </div>
@endif
