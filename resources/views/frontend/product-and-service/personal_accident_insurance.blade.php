@extends('frontend.layouts.master')
@section('title', 'Personal Accident Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($personal > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $personal->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="text-dark fw-bold"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $personal->{app()->getLocale() . '_name'} }}</span></h6>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row cus_mt_20">
                <div class="col-lg-12">
                    <div class="calculator_back_btn_area">
                        <a class="calculator_back_btn" href="{{ route('ps.productAndService') }}"> <img
                                src="{{ asset('images/website/report_arrow.png') }}" alt=""> Go Back</a>
                    </div>
                </div>
            </div>

            <div class="row cus_mt_20 cus_mb_20">
                <div class="fire_container">
                    <div class="fire_container_content mt-5">
                        <h2 class="mt-5 mb-3"> {{ __('Class of Occupation') }}</h2>
                        @foreach ($personal->calculatorPropertyOrOccupationType as $item)
                            <div onclick="classOfOccupation(this)" data-occupation_id="{{ $item->id }}">
                                <div class="occupation_panel mb-15">
                                    <div class="occupation_left">
                                        <img src="{{ asset($item->white_image) }}" alt="" class="white_image">
                                        <img src="{{ asset($item->color_image) }}" alt="" class="black_image">
                                        <h6>{{ $item->{app()->getLocale() . '_name'} }}</h6>
                                    </div>

                                    <div class="occupation_right">
                                        {{ $item->{app()->getLocale() . '_title'} }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <h2 class="mt-5 mb-3">{{ __('Risk Cover') }}</h2>

                        <div class="wrap" onclick="spd1()">
                            <select class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                                aria-label="Default select example" onchange="getRiskCoverage(this)">
                                <option value="" selected>Select Risk Cover</option>
                                @foreach ($personal->calculatorRiskCover as $crc_item)
                                    <option value="{{ $crc_item->id }}" class=" mt-2">
                                        {{ $crc_item->{app()->getLocale() . '_name'} }}</option>
                                @endforeach
                            </select>
                        </div>

                        <form action="{{ route('calculation.buyPersonalAccident') }}" method="post">
                            @csrf
                            <h2 class="mt-5 mb-3">{{ __('Total Sum Insured') }}</h2>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input class="filter_card form-control" type="number" min="{{ $pv->minimum ?? 0 }}"
                                        max="{{ $pv->maximum ?? 0 }}" name="insured_amount"
                                        placeholder="Type total sum insured: e,g, 100000" id="total_amount">
                                        <small class="text-danger">Minimum and maximum amount is {{ $pv->minimum ?? 0 }} and {{ $pv->maximum ?? 0 }} respectively</small>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3 additional_coverage_content text-center">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label vat_exampled"
                                            for="inlineCheckbox1">{{ __('Medical Benefits') }}:</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="personal_medical_benifit"
                                            id="inlineCheckbox1" value="1">
                                        <label class="form-check-label" for="inlineCheckbox1">{{ __('Yes') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="personal_medical_benifit"
                                            id="inlineCheckbox2" value="0" checked>
                                        <label class="form-check-label" for="inlineCheckbox2">{{ __('No') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 new_btn_setup">
                                    <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                                    <a class="btn fire_btn fire_btn_calculate mb-2" href="javascript:;"
                                        data-url="{{ route('calculation.personalAccident') }}" data-bs-toggle="modal"
                                        data-bs-target="#mediclaimCalculateModal"
                                        onclick="personalTeriff(this)">{{ __('Calculate') }}</a>
                                </div>
                                <div class="modal fade calculator_modal" id="mediclaimCalculateModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">
                                                    {{ __('Premium Calculator') }} </h2>
                                            </div>


                                            <input type="hidden" name="calculator_id" id="calculator_id"
                                                value="{{ $personal->id }}">
                                            <input type="hidden" name="occupation_id" id="occupation_id">
                                            <input type="hidden" name="risk_coverage_id" id="risk_coverage_id">
                                            <div id="addmodalcalculation"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
