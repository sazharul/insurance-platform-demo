@extends('frontend.layouts.master')
@section('title', 'Cash In Transit Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($cash > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $cash->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="text-dark fw-bold"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $cash->{app()->getLocale() . '_name'} }}</span></h6>

            </div>
        </div>
    </div>
    <div class="container-fluid">

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
                <div class="fire_container_content">
                    <h2 class="mt-5 mb-3">{{ __('Type of Institution') }}</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel_type type_institution">
                                @foreach ($cash->calculatorInstitutionType->where('status', 1) as $cit_item)
                                    <div class="property_card">
                                        <div onclick="cashOnTransit(this)"
                                            data-calculator_id="{{ $cit_item->calculator_id }}"
                                            data-property_occupation_id="{{ $cit_item->id }}"
                                            data-url="{{ route('ps.constructionType') }}"
                                            data-name="{{ $cit_item->en_name }}">

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
                    <h2 class="mt-5 mb-3">{{ __('Yearly Turnover') }}</h2>
                    <div class="row <div row motor_insurance_input">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="input-group mb-3">
                                <input class="filter_card filter_card_custom form-control" type="text"
                                    id="yearly_turnover" placeholder="Enter yearly turnover of your institution">
                                <span class="input-group-text"
                                    id="basic-addon1"><strong>{{ __('BDT') }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <h2 class="mt-5 mb-3">{{ __('Strike Riot Civil Commotion (SRCC) Type') }}</h2>

                    <div class="wrap" onclick="spd1()">
                        <select class="form-select filter_card mt-2 mb-2 js-example-basic-single" id="srcc_name"
                            aria-label="Default select example" onchange="srcc(this)">
                            <option value="" selected>Select Type</option>
                            @foreach ($cash->calculatorStrikeRiotCivilCommotion as $item)
                                <option class=" mt-2" value="{{ $item->id }}">
                                    {{ $item->{app()->getLocale() . '_name'} }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-4 mb-4 additional_coverage_content text-center">
                        <div class="col-lg-12 col-sm-12 col-12 armod">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label vat_exampled" for="inlineCheckbox1">
                                    {{ __('VCash transit by armored vehicle') }}:</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="armored" id="inlineCheckbox1"
                                    value="1">
                                <label class="form-check-label" for="inlineCheckbox1">{{ __('Yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="armored" id="inlineCheckbox2"
                                    value="0" checked>
                                <label class="form-check-label" for="inlineCheckbox2">{{ __('No') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 new_btn_setup">
                            <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                            <a class="btn fire_btn fire_btn_calculate mb-2" href="javascript:;"
                                data-url="{{ route('calculation.cashInTransitTransitTeriff') }}" data-bs-toggle="modal"
                                data-bs-target="#mediclaimCalculateModal"
                                onclick="cashInTransitTransit(this)">{{ __('Calculate') }}</a>
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
                                            value="{{ $cash->id }}">
                                        <input type="hidden" name="institute_type_id" id="institute_type_id">
                                        <input type="hidden" name="srcc_id" id="srcc_id">
                                        <div id="addmodalcalculation"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
