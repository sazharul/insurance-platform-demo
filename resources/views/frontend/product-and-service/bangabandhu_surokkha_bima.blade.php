@extends('frontend.layouts.master')
@section('title', 'Bangabandhu Surokkha Bima')

@section('content')
    @php
        use Rakibhstu\Banglanumber\NumberToBangla;

        $numto = new NumberToBangla();
    @endphp
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($item > '50'))
                    <style>
                        @media (max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $item->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="fw-bold text-dark"
                                                                        href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $item->{app()->getLocale() . '_name'} }}</span></h6>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container cus_mb_20">

            @if (session()->has('message'))
                <div class="row">
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            <div class="row cus_mt_20">
                <div class="col-lg-12">
                    <div class="calculator_back_btn_area">
                        <a class="calculator_back_btn" href="{{ route('ps.productAndService') }}"> <img
                                src="{{ asset('images/website/report_arrow.png') }}" alt=""> Go Back</a>
                    </div>
                </div>
            </div>

            <div class="fire_container">
                <div class="fire_container_content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="mt-5 mb-3">{{ $item->{app()->getLocale() . '_name'} }}</h2>
                        </div>
                    </div>
                    <div class="row mt-3 mujib_hero_content">
                        <div class="col-lg-3 text-center">
                            <img class="img-fluid" src="{{ asset('images/website/mujib.png') }}" alt="">
                        </div>
                        <div class="col-lg-9">
                            {!! $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_title'} !!}
                            <br>
                            <span class="mujib_info_3">
                                {!! $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_subtitle'} !!}
                            </span>
                        </div>
                    </div>
                    <div class="row mt-1 mb-3">
                        <div class="col-lg-9 mt-2">
                            <div class="mujib_box mujib_box_left">
                                <span>{{ $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_hero_title1'} }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <div class="mujib_box mujib_box_right">
                                <span>{{ $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_hero_subtitle1'} }}</span>
                            </div>
                        </div>
                        <div class="col-lg-9 mt-2">
                            <div class="mujib_box mujib_box_left">
                                <span>{{ $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_hero_title2'} }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <div class="mujib_box mujib_box_right">
                                <span>{{ $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_hero_subtitle2'} }}</span>
                            </div>
                        </div>
                        <div class="col-lg-9 mt-2">
                            <div class="mujib_box mujib_box_left">
                                <span>{{ $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_hero_title3'} }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <div class="mujib_box mujib_box_right">
                                <span>{{ $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_hero_subtitle3'} }}</span>
                            </div>
                        </div>
                        <div class="col-lg-9 mt-2">
                            <div class="mujib_box mujib_box_left">
                                <span>{{ $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_hero_title4'} }}</span>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <div class="mujib_box mujib_box_right">
                                <span>{{ $item->calculatorBangabandhuSurakshaBima->{app()->getLocale() . '_hero_subtitle4'} }}</span>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('calculation.buyBongoBunduSurokhaBima') }}" method="post">
                        @csrf
                        <div class="row mujib_bima_form_area time_panel mt-5">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <h4 class="">{{ __('Date of Birth') }}</h4>
                                <input class="visited_input_box date_of pp_date" type="text" placeholder="dd/mm/yyyy"
                                       name="dob" max="{{ date('Y-m-d') }}" onchange="date_of_birth(this)"> <label
                                    for=""></label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                                <h4 class="mb-35"></h4>
                                <input class="visited_input_box" type="text" id="calculated_dob" name="" disabled>
                                <label for=""></label>
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
                                            <td><input class="form-control" type="text"
                                                       value="{{ app()->getLocale() == 'en' ? $item->calculatorBangabandhuSurakshaBima->capital_sum_insured : $numto->bnNum($item->calculatorBangabandhuSurakshaBima->capital_sum_insured) }}"
                                                       disabled>
                                                {{-- <img class="visited_country_polygon"
                                                src="{{ asset('images/website/polygon.png') }}" alt=""> --}}
                                            </td>
                                            <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="mujib_bima_td"> {{ __('Net Premium') }}:</td>
                                            <td class="mujib_bima_td_2">
                                                {{ app()->getLocale() == 'en' ? $item->calculatorBangabandhuSurakshaBima->net_premium : $numto->bnNum($item->calculatorBangabandhuSurakshaBima->net_premium) }}
                                            </td>
                                            <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="mujib_bima_td"> {{ __('VAT') }}@
                                                {{ app()->getLocale() == 'en' ? $item->calculatorBangabandhuSurakshaBima->vat : $numto->bnNum($item->calculatorBangabandhuSurakshaBima->vat) }}
                                                %:
                                            </td>
                                            <td class="mujib_bima_td_2">
                                                {{ app()->getLocale() == 'en' ? GET_VAT_AMOUNT($item->calculatorBangabandhuSurakshaBima->net_premium, $item->calculatorBangabandhuSurakshaBima->vat) : $numto->bnNum(GET_VAT_AMOUNT($item->calculatorBangabandhuSurakshaBima->net_premium, $item->calculatorBangabandhuSurakshaBima->vat)) }}

                                            </td>
                                            <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="mujib_bima_td"> {{ __('Total Premium') }} </td>
                                            <td class="mujib_bima_td_2">
                                                {{ app()->getLocale() == 'en' ? $item->calculatorBangabandhuSurakshaBima->net_premium + GET_VAT_AMOUNT($item->calculatorBangabandhuSurakshaBima->net_premium, $item->calculatorBangabandhuSurakshaBima->vat) : $numto->bnNum($item->calculatorBangabandhuSurakshaBima->net_premium + GET_VAT_AMOUNT($item->calculatorBangabandhuSurakshaBima->net_premium, $item->calculatorBangabandhuSurakshaBima->vat)) }}
                                            </td>
                                            <td class="mujib_bima_td_3">{{ __('BDT') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <input type="hidden" name="calculator_id" value="{{ $item->id }}">
                        <input type="hidden" name="insured_amount"
                               value="{{ $item->calculatorBangabandhuSurakshaBima->capital_sum_insured }}">
                        <input type="hidden" name="teriff_code"
                               value="{{ $item->calculatorBangabandhuSurakshaBima->teriff_code }}">
                        <input type="hidden" name="net_premium"
                               value="{{ $item->calculatorBangabandhuSurakshaBima->net_premium }}">
                        <input type="hidden" name="vat"
                               value="{{ GET_VAT_AMOUNT($item->calculatorBangabandhuSurakshaBima->net_premium, $item->calculatorBangabandhuSurakshaBima->vat) }}">
                        <input type="hidden" name="total_amount"
                               value="{{ $item->calculatorBangabandhuSurakshaBima->net_premium + GET_VAT_AMOUNT($item->calculatorBangabandhuSurakshaBima->net_premium, $item->calculatorBangabandhuSurakshaBima->vat) }}">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 new_btn_setup">
                                <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                                @if ($item->buyable == 1)
                                    <button type="submit"
                                            class="btn fire_btn fire_btn_calculate mb-2">{{ __('Buy Now') }}</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
