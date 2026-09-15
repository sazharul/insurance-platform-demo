@extends('frontend.layouts.master')
@section('title', 'Peoples Personal Accident Insurance')

@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;
        
        $numto = new NumberToBangla();
    @endphp
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($people > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 8px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $people->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="text-dark fw-bold"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $people->{app()->getLocale() . '_name'} }}</span></h6>

            </div>
        </div>
    </div>
    <div class="container cus_mb_20">

        <div class="row cus_mt_20">
            <div class="col-lg-12">
                <div class="calculator_back_btn_area">
                    <a class="calculator_back_btn" href="{{ route('ps.productAndService') }}"> <img
                            src="{{ asset('images/website/report_arrow.png') }}" alt=""> Go Back</a>
                </div>
            </div>
        </div>

        <div class="fire_container cus_mt_20">
            <form action="{{ route('calculation.buyPeoplePersonalAccident') }}" method="post">
                @csrf

                <div class="fire_container_content" id="peoplePersonalAccident">
                    <div class="row mt-3">
                        <div class="col-lg-3 mt-3 text-center">
                            <img class="img-fluid mt-3"
                                src="{{ asset($people->calculatorPeoplePersonalAccident->first()->hero_image) }}"
                                alt="">
                        </div>
                        <div class="col-lg-9 mt-3">
                            <span class="mujib_info_1">{!! $people->calculatorPeoplePersonalAccident->first()->{app()->getLocale() . '_hero_title'} !!}</span> <span class="mujib_info_2">
                                {!! $people->calculatorPeoplePersonalAccident->first()->{app()->getLocale() . '_hero_subtitle'} !!}
                            </span>
                        </div>
                    </div>
                    <h2 class="cus_mt_20 cus_mb_20">{{ __('Plan Type') }}</h2>
                    <div class="row personal_accident ">
                        <div class="col-lg-12 mt-2 text-center">
                            @foreach ($people->calculatorPeoplePersonalAccident as $item)
                                <button class="btn mb-2 @if($item->id==1) {{ 'btn btn-success' }} @else {{ 'btn btn-outline-success' }} @endif" type="button"
                                    onclick="peoplePersonalAccident(this,'{{ $item->id }}')"
                                    data-url="{{ route('ps.ajaxPeoplePersonalAccident') }}">
                                    {{-- <img src="{{ asset('images/website/group.png') }}" alt=""> --}}
                                    {{ $item->{app()->getLocale() . '_plan_type_name'} }}</button>
                            @endforeach
                        </div>
                    </div>
                    @php
                        $min = date('Y-m-d', strtotime(date('Y-m-d') . ' - 18 years'));
                        $max = date('Y-m-d', strtotime(date('Y-m-d') . ' - 200 years'));
                    @endphp
                    <div class="row mujib_bima_form_area time_panel cus_mt_20">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <h4 class="">{{ __('Date of Birth') }}</h4>
                            <input class="visited_input_box pp_date" placeholder="dd/mm/yyyy" type="text"
                                onchange="date_of_birth(this)" name="dob" required> <label for=""></label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <h4 class="mb-35"></h4>
                            <input class="visited_input_box" type="text" id="calculated_dob" disabled> <label
                                for=""></label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <h4 class="years">{{ __('years') }}</h4>
                        </div>
                    </div>
                    <div class="row mujib_bima_form_area mt-5">
                        <div class="col-lg-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="mujib_bima_td"> {{ __('Capital Sum Insured') }}:</td>
                                        <td> <input class="form-control" type="text" disabled
                                                value="{{ app()->getLocale() == 'en' ? $people->calculatorPeoplePersonalAccident->first()->capital_sum_insured : $numto->bnNum($people->calculatorPeoplePersonalAccident->first()->capital_sum_insured) }}">

                                            {{-- <img class="visited_country_polygon" src="{{ asset('images/website/polygon.png') }}" alt=""> --}}
                                        </td>
                                        <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="mujib_bima_td"> {{ __('Net Premium') }} : </td>
                                        <td class="mujib_bima_td_2">
                                            {{ app()->getLocale() == 'en' ? $people->calculatorPeoplePersonalAccident->first()->net_premium : $numto->bnNum($people->calculatorPeoplePersonalAccident->first()->net_premium) }}
                                        </td>

                                        <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="mujib_bima_td"> {{ __('VAT') }}@
                                            {{ app()->getLocale() == 'en' ? $people->calculatorPeoplePersonalAccident->first()->vat : $numto->bnNum($people->calculatorPeoplePersonalAccident->first()->vat) }}%:
                                        </td>
                                        <td class="mujib_bima_td_2">
                                            {{ app()->getLocale() == 'en' ? GET_VAT_AMOUNT($people->calculatorPeoplePersonalAccident->first()->net_premium, $people->calculatorPeoplePersonalAccident->first()->vat) : $numto->bnNum(GET_VAT_AMOUNT($people->calculatorPeoplePersonalAccident->first()->net_premium, $people->calculatorPeoplePersonalAccident->first()->vat)) }}
                                        </td>
                                        <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="mujib_bima_td"> {{ __('Total Premium') }} </td>
                                        <td class="mujib_bima_td_2">
                                            {{ app()->getLocale() == 'en' ? $people->calculatorPeoplePersonalAccident->first()->net_premium + GET_VAT_AMOUNT($people->calculatorPeoplePersonalAccident->first()->net_premium, $people->calculatorPeoplePersonalAccident->first()->vat) : $numto->bnNum($people->calculatorPeoplePersonalAccident->first()->net_premium + GET_VAT_AMOUNT($people->calculatorPeoplePersonalAccident->first()->net_premium, $people->calculatorPeoplePersonalAccident->first()->vat)) }}
                                        </td>
                                        <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <input type="hidden" name="net_premium"
                        value="{{ $people->calculatorPeoplePersonalAccident->first()->net_premium }}">
                    <input type="hidden" name="vat"
                        value="{{ GET_VAT_AMOUNT($people->calculatorPeoplePersonalAccident->first()->net_premium, $people->calculatorPeoplePersonalAccident->first()->vat) }}">
                    <input type="hidden" name="total_amount"
                        value="{{ $people->calculatorPeoplePersonalAccident->first()->net_premium + GET_VAT_AMOUNT($people->calculatorPeoplePersonalAccident->first()->net_premium, $people->calculatorPeoplePersonalAccident->first()->vat) }}">
                    <input type="hidden" name="insured_amount"
                        value="{{ $people->calculatorPeoplePersonalAccident->first()->capital_sum_insured }}">
                    <input type="hidden" name="teriff_code"
                        value="{{ $people->calculatorPeoplePersonalAccident->first()->teriff_code }}">

                    @if ($people->buyable == 1)
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 new_btn_setup">
                                <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                                <input type="hidden" name="people_personal_id"
                                    value="{{ $people->calculatorPeoplePersonalAccident->first()->id }}">
                                <input type="hidden" name="calculator_id" value="{{ $people->id }}">
                                <button class="btn fire_btn fire_btn_calculate mb-2"
                                    type="submit">{{ __('Buy Now') }}</button>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
