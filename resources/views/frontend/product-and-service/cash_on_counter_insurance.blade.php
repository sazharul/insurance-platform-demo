@extends('frontend.layouts.master')
@section('title', 'Cash On Counter Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($cash_on_counter > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $cash_on_counter->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="text-dark fw-bold"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $cash_on_counter->{app()->getLocale() . '_name'} }}</span></h6>

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

        <div class="fire_container cus_mt_20 cus_mb_20">
            <div class="fire_container_content cash_in_safe_panel">
                <h2 class="mb-3"> {{ __('Type of Institution') }} </h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel_type type_institution">
                            @foreach ($cash_on_counter->calculatorInstitutionType as $cit_item)
                                <div class="property_card">
                                    <div onclick="cashOnTransit(this)" data-calculator_id="{{ $cit_item->calculator_id }}"
                                        data-property_occupation_id="{{ $cit_item->id }}"
                                        data-url="{{ route('ps.constructionType') }}">

                                        <div class="card carried_card">
                                            <img src="{{ asset($cit_item->white_image) }}" alt=""
                                                class="white_image">
                                            <img src="{{ asset($cit_item->color_image) }}" alt=""
                                                class="black_image">
                                            <h3 class="">{{ $cit_item->{app()->getLocale() . '_name'} }}</h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <h2 class="mt-5 mb-3"> {{ __('Maximum Vault Amount') }} </h2>
                <div class="row  motor_insurance_input">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-group mb-3">
                            <input class="filter_card filter_card_custom form-control" type="text" id="yearly_turnover"
                                placeholder="Enter yearly turnover of your institution">
                            <span class="input-group-text" id="basic-addon1"><strong>{{ __('BDT') }}</strong></span>
                        </div>
                    </div>
                </div>
                {{-- <h2 class="mt-5 mb-3">{{ __('Strike Riot Civil Commotion (SRCC) Type') }}</h2>

                <div class="wrap" onclick="spd1()">
                    <select class="form-select filter_card mt-2 mb-2 js-example-basic-single" id="srcc_name"
                        aria-label="Default select example" onchange="srcc(this)">
                        <option value="" selected>Select Type</option>
                        @foreach ($cash_on_counter->calculatorStrikeRiotCivilCommotion as $item)
                            <option class="mt-2" value="{{ $item->id }}">
                                {{ $item->{app()->getLocale() . '_name'} }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="row">
                    <h2 class="mt-5 mb-3"> {{ __('Building Construction Type') }} </h2>

                    <div class="row mb-3 center_position">
                        @foreach ($cash_on_counter->calculatorBuildingConstruction as $cbc_item)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2"
                                onclick="getConstructionID(this, '{{ $cbc_item->calculator_id }}','{{ $cbc_item->id }}')"
                                data-url="{{ route('ps.constructionRoofType') }}">
                                <div class="card construction_card">
                                    <p class="up_p">{{ $cbc_item->{app()->getLocale() . '_class_title'} }}</p>
                                    <p class="down_p">{{ $cbc_item->{app()->getLocale() . '_hero_title'} }}</p>
                                </div>
                                <div class="polygon_icon"><img src="{{ asset('images/website/polygon.png') }}"
                                        alt=""></div>
                            </div>
                        @endforeach
                    </div>

{{--                    <div class="row center_position">--}}
{{--                        <div class="col-lg-12 mb-45 select_roof_area select_roof_area_custom">--}}
{{--                            <div class="row g-3 align-items-center">--}}
{{--                                <div class="col-lg-2 col-12 col-auto">--}}
{{--                                    <label for="inputPassword6"--}}
{{--                                        class="col-form-label text-center select_roof_text">{{ __('Select Roof') }}</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-10 col-12 col-auto">--}}
{{--                                    --}}{{-- <div class="wrap" onclick="spd2()">--}}
{{--                                        <input type="text" id="building_construction_roof_name" class="form-control"--}}
{{--                                            aria-describedby="passwordHelpInline"--}}
{{--                                            placeholder="Select roof e.g. metal sheet / concrete / brick tile">--}}
{{--                                        <span class="filter_arrow_box_small arrow_img2"><img--}}
{{--                                                src="{{ asset('images/website/arrow_down.png') }}" alt=""></span>--}}
{{--                                    </div> --}}
{{--                                    --}}{{-- <div class="selectPropertyDIV2"> --}}
{{--                                    <div id="add_roof">--}}
{{--                                        <select class="form-select js-example-basic-single"--}}
{{--                                            aria-label="Default select example">--}}
{{--                                            <option value="" selected>Select Roof</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    --}}{{-- </div> --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 col-sm-12 new_btn_setup">
                        <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                        <a class="btn fire_btn fire_btn_calculate mb-2" href="javascript:;"
                            data-url="{{ route('calculation.cashOnCounterTeriff') }}" data-bs-toggle="modal"
                            data-bs-target="#mediclaimCalculateModal"
                            onclick="cashOnCounter(this)">{{ __('Calculate') }}</a>
                    </div>
                    <div class="modal fade calculator_modal" id="mediclaimCalculateModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">
                                        {{ __('Premium Calculator') }} </h2>
                                </div>
                                <form action="">
                                    @csrf

                                    <input type="hidden" name="calculator_id" id="calculator_id"
                                        value="{{ $cash_on_counter->id }}">
                                    <input type="hidden" name="institute_type_id" id="institute_type_id">
                                    <input type="hidden" name="srcc_id" id="srcc_id">
                                    <input type="hidden" name="building_construction_id" id="building_construction_id">
                                    <input type="hidden" name="building_construction_roof_id"
                                        id="building_construction_roof_id">
                                    <div id="addmodalcalculation"></div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
