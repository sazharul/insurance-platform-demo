@extends('frontend.layouts.master')
@section('title', 'Maine Cargo Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($marin > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $marin->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="text-dark fw-bold"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $marin->{app()->getLocale() . '_name'} }}</span></h6>

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

            <div class="row cus_mt_10 cus_mb_20">
                <div class="fire_container">
                    <div class="fire_container_content">



                        <h2 class="mt-5 mb-3">{{ __('Cargo Products') }}</h2>

                        <div class="wrap">
                            <select class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                                aria-label="Default select example" 
                                onchange="getCargoProductValue(this)">
                                <option value="" selected>Select Products</option>
                                @foreach ($marin->calculatorCargoProduct as $ccp_item)
                                    <option value="{{ $ccp_item->id }},{{ $ccp_item->member }}">
                                        {{ $ccp_item->{app()->getLocale() . '_name'} }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="toggle_member" style="display: none">
                            <h2 class="mt-5 mb-3">{{ __('Member of Association (If any)') }}</h2>
                            <div class="wrap" onclick="spd2()">
                                <select class="form-select filter_card mt-2 mb-2 onclick-select2"
                                    aria-label="Default select example" onchange="getMemberAssociationID(this)">
                                    <option value="" selected>Select exporters association : e.g.
                                        BGMEA/BKMEA/BTMEA</option>
                                    @foreach ($marin->calculatorMemberAssociation as $cma_item)
                                        <option value="{{ $cma_item->id }}">
                                            {{ $cma_item->{app()->getLocale() . '_name'} }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">{{ __('Tariff Type') }}</h2>

                        <div class="wrap" onclick="spd3()">
                            <select class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                                aria-label="Default select example"  onchange="getTariffType(this)">
                                <option value="" selected>Select Tariff Type</option>
                                @foreach ($marin->calculatorTariffType as $ctt_item)
                                    <option value="{{ $ctt_item->id }}">
                                        {{ $ctt_item->{app()->getLocale() . '_name'} }}</option>
                                @endforeach
                            </select>
                        </div>


                        <h2 class="mt-5 mb-3">{{ __('Total Sum Insured') }}</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <input class="filter_card form-control" type="text"
                                    placeholder="Type total sum insured : e.g. 100000" id="total_sum_insured">
                            </div>
                        </div>
                        <h2 class="mt-5 mb-3">{{ __('Carried By') }}</h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel_type">
                                    @foreach ($marin->calculatorCarriedBy as $ccb_item)
                                        <div class="property_card">
                                            <div class="carried_by" data-id="{{ $ccb_item->id }}"
                                                data-calculator_id="{{ $ccb_item->calculator_id }}"
                                                data-url="{{ route('ps.carriedbyRiskCover') }}">
                                                <div class="card carried_card">
                                                    <img src="{{ asset($ccb_item->color_image) }}" alt=""
                                                        class="black_image">
                                                    <img src="{{ asset($ccb_item->white_image) }}" alt=""
                                                        class="white_image">
                                                    <h3 class="">{{ $ccb_item->{app()->getLocale() . '_name'} }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="risk_cover_area">

                        </div>
                        <h2 class="mt-5 mb-3">{{ __('Additional Coverage') }}</h2>
                        <div class="row" style="justify-content: center;">
                            @foreach ($marin->calculatorAdditionalCoverage as $cac_item)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-2"
                                    onclick="getAdditionalCoverageID2(this,'{{ $cac_item->id }}')">
                                    <div class="card additional_coverage_card risk_covered">
                                        <div class="additional_coverage_card_round mb-1"></div>
                                        <div class="additional_coverage_card_line"></div>
                                        <img class="round_inside_img white_image" src="{{ asset($cac_item->color_image) }}"
                                            alt="">
                                        <img class="round_inside_img black_image" src="{{ asset($cac_item->white_image) }}"
                                            alt="">
                                        <p class="">{{ $cac_item->{app()->getLocale() . '_name'} }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-12 col-sm-12 new_btn_setup">
                                <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                                <a class="btn fire_btn fire_btn_calculate mb-2"
                                    data-url="{{ route('calculation.marin') }}" data-bs-toggle="modal"
                                    data-bs-target="#marinCalculateModal" onclick="marinCalculate(this)"
                                    href="javascript:;">{{ __('Calculate') }}</a>
                            </div>

                            <div class="modal fade calculator_modal" id="marinCalculateModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h2 class="modal-title" id="exampleModalLabel">
                                                {{ __('Premium Calculator') }}  </h2>
                                        </div>

                                        <input type="hidden" id="calculator_id" value="{{ $marin->id }}"
                                            name="calculator_id">
                                        <input type="hidden" id="cargo_id" name="cargo_id">
                                        <input type="hidden" id="member_association_id" name="member_association_id">
                                        <input type="hidden" id="tariff_id" name="teriff_id">
                                        <input type="hidden" id="carried_id" name="cargo_id">
                                        <input type="hidden" id="carried_risk_id" name="carried_risk_id">
                                        <input type="hidden" id="marine_interest_id" name="marine_interest_id">
                                        <input type="hidden" id="additional_coverage_id" name="additional_coverage_id">
                                        <input type="hidden" id="marin_carried_by" name="marin_carried_by">
                                        <div id="addmodalcalculation"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
