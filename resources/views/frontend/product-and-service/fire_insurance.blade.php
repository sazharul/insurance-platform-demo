@extends('frontend.layouts.master')
@section('title', 'Fire Insurance')

@section('content')
    <style>
        .sub_coverage {
            display: block;
        }

        .fire-details-dialog {
            margin: 0;
            position: absolute;
            top: 10%;
            left: 50%;
            -ms-transform: translate(-50%);
            transform: translate(-50%);
            width: 500px;
            background: white;
            border-radius: 2rem;
        }

        .fire-details-dialog .modal-body {
            margin-bottom: 30px;
        }

        .result-heading {
            background: #D9EBE4;
            border-radius: 24px 24px 0px 0px;
            color: #007C4A;
            padding: 1rem;
        }

        .service_name {
            text-align: center;
            color: #007C4A;
            text-align: center;
            position: relative;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .service_wrap {
            background: #ECF5F1;
            border: 1px solid #007C4A;
            border-radius: 10px;
            padding: 20px 0;
            margin: 0 30px;
        }

        .calculation_table_heading {
            display: flex;
            justify-content: space-between;
            color: #007C4A;
            border-bottom: 1px solid;
            margin: 20px 30px 0 30px;
        }

        .table {
            width: 88%;
            margin: 15px 30px 30px 30px;
        }

        .modal-footer {
            background: #007C4A;
            border: 1px solid #FFFFFF;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.25);
            border-radius: 6px;
            margin: 0 30px 30px 30px;
        }

        .modal-footer>button {
            color: white;
            font-weight: 600;
        }

        .service_name>h4 {
            border-bottom: 2px solid;
            width: fit-content;
            margin: auto;
        }

        .service_name.bottomLine {
            background: #007C4A;
            border-radius: 30px;
            bottom: -12px;
            border: 1px solid #007C4A;
            left: 50%;
            position: absolute;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 155px;
        }

        .fire-details-dialog-back {
            position: fixed;
            background: #00000091;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            min-height: 100vh;
            overflow-y: auto;
        }

        .table> :not(caption)>> {
            padding: 0.5rem 0.5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 0;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        .table>:not(caption)>*>* {
            padding: 0.5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 0;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        @media(max-width: 576px) {
            .fire-details-dialog {
                width: 96%;
            }
        }
    </style>
    {{-- <div class="container-fluid"> --}}
    <div class="breadgram-image">
        <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{ $fire->{app()->getLocale() . '_name'} }}</h2>
            <h6 class="text-center mt-3"><span class="text-dark"> <a class="text-dark fw-bold"
                        href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a> </span> / <span
                    class="text-success fw-bold">{{ $fire->{app()->getLocale() . '_name'} }}</span></h6>

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
                        <form action="">
                            <input type="hidden" id="calculator_id" value="{{ $fire->id }}">
                            <input type="hidden" name="property_location_id" id="property_location_id">
                            <input type="hidden" name="property_occupation_id" id="property_occupation_id">
                            <input type="hidden" name="member_association_id" id="member_association_id">

                            <input type="hidden" name="additional_coverage_id" id="additional_coverage_id">
                            <input type="hidden" name="interest_type_id" id="interest_type_id">

                            <input type="hidden" name="building_construction_id" id="building_construction_id"
                                value="">
                            <input type="hidden" name="building_construction_roof_id" id="building_construction_roof_id">

                            <div id="">
                                {{-- premiumCalculator --}}
                                <h2 class="mt-5 mb-3">{{ __('Select Property Location') }}</h2>

                                <div class="wrap" onclick="spd1()">
                                    <select style="z-index: 100"
                                        class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                                        aria-label="Default select example" onchange="getPropertyLocation(this)">
                                        <option value="" selected>Select Location</option>
                                        @foreach ($fire->calculatorPropertyLocation as $cpl_item)
                                            <option value="{{ $cpl_item->id }}">
                                                {{ $cpl_item->{app()->getLocale() . '_name'} }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- property0 --}}
                                <h2 class="mt-5 mb-3">{{ __('Type of Property / Occupation') }}</h2>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel_type">
                                            @foreach ($fire->calculatorPropertyOrOccupationType as $poo_item)
                                                <div class="property_card" onclick="getConstructionType(this)"
                                                    data-calculator_id="{{ $poo_item->calculator_id }}"
                                                    data-property_occupation_id="{{ $poo_item->id }}"
                                                    data-member="{{ $poo_item->member }}"
                                                    data-url="{{ route('ps.constructionType') }}"
                                                    data-interest_url="{{ route('ps.getInterestType') }}"
                                                    data-name="{{ $poo_item->en_name }}">
                                                    <div class="card carried_card">
                                                        <img src="{{ asset($poo_item->white_image) }}" alt=""
                                                            class="white_image">
                                                        <img src="{{ asset($poo_item->color_image) }}" alt=""
                                                            class="black_image">
                                                        <h3 class="">{{ $poo_item->{app()->getLocale() . '_name'} }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <div id="memberOfAssociation" style="display: none">
                                    <h2 class="mt-5 mb-3">{{ __('Member of Association (If any)') }}</h2>
                                    <div>
                                        <div class="wrap" onclick="spd2()">
                                            <select class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                                                aria-label="Default select example" onchange="getMemberAssociationID(this)">
                                                <option value="" selected>Select exporters association : e.g.
                                                    BGMEA/BKMEA/BTMEA</option>
                                                @foreach ($fire->calculatorMemberAssociation as $moa_item)
                                                    <option value="{{ $moa_item->id }}">
                                                        {{ $moa_item->{app()->getLocale() . '_name'} }}</option>
                                                @endforeach
                                            </select>
                                            <span class="filter_arrow_box arrow_img2"><img
                                                    src="{{ asset('images/website/arrow_down.png') }}"
                                                    alt=""></span>
                                        </div>
                                    </div>
                                </div>

                                {{-- occupation0 --}}

                                <h2 class="mt-5 mb-3">{{ __('Construction Type') }}</h2>
                                <div class="row mb-3">
                                    @foreach ($fire->calculatorBuildingConstruction as $c_item)
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-2"
                                            onclick="getConstructionID(this, '{{ $c_item->calculator_id }}','{{ $c_item->id }}')"
                                            data-url="{{ route('ps.constructionRoofType') }}">
                                            <div class="card construction_card">
                                                <p class="up_p">{{ $c_item->{app()->getLocale() . '_class_title'} }}
                                                </p>
                                                <p class="down_p">{{ $c_item->{app()->getLocale() . '_hero_title'} }}
                                                </p>
                                            </div>
                                            <div class="polygon_icon"><img src="{{ asset('images/website/polygon.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>



                                <h2 class="mt-5 mb-3">{{ __('Interest') }} ({{ __('Product') }})</h2>
                                <div class="wrap" id="interest_type">
                                    <select class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                                        id="interest_type_name" aria-label="Default select example"
                                        onchange="getInterestTypeID(this)">
                                        <option value="" selected>Select Interest type</option>
                                    </select>
                                </div>
                                {{-- <h2 class="mt-5 mb-3">{{ __('Interest') }} (Product)</h2>
                                <div class="wrap" onclick="spd1()">
                                    <select style="z-index: 100"
                                        class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                                        aria-label="Default select example" onchange="getPropertyLocation(this)">
                                        <option value="" selected>Select Location</option>
                                        @foreach ($fire->calculatorPropertyLocation as $cpl_item)
                                            <option value="{{ $cpl_item->id }}">
                                                {{ $cpl_item->{app()->getLocale() . '_name'} }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}


                                <h2 class="mt-5 mb-3">{{ __('Total Sum Insured') }}</h2>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <input class="filter_card form-control" type="text" id="total_amount"
                                            placeholder="Type total sum insured: e,g, 10000">
                                    </div>
                                </div>


                                <h2 class="mt-5 mb-3">{{ __('Additional Coverage') }}</h2>
                                <div class="row">
                                    @foreach ($fire->calculatorAdditionalCoverage->where('status', 1) as $key => $c_item)
                                        <div
                                            class="col-lg-3 col-md-4 col-sm-6 col-6 mt-2 additional_coverage_validation @if (
                                                $c_item->id == 1 ||
                                                    $c_item->id == 4 ||
                                                    $c_item->id == 5 ||
                                                    $c_item->id == 12 ||
                                                    $c_item->id == 13 ||
                                                    $c_item->id == 3 ||
                                                    $c_item->id == 9) {{ ' add_c' }} @else {{ ' add_c add_ac' }} @endif">
                                            <div onclick="getAdditionalCoverageID(this,'{{ $c_item->id }}')">
                                                <div class="card additional_coverage_card risk_covered">
                                                    <div class="additional_coverage_card_round mb-1"></div>
                                                    <div class="additional_coverage_card_line"></div>
                                                    <img class="round_inside_img white_image"
                                                        src="{{ asset($c_item->color_image) }}" alt="">
                                                    <img class="round_inside_img black_image"
                                                        src="{{ asset($c_item->white_image) }}" alt="">
                                                    <p id="card_name_{{ $key }}">
                                                        {{ $c_item->{app()->getLocale() . '_name'} }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div style="display:none;"
                                                id="toggleAdditionalSubcoverage_{{ $c_item->id }}"class="text-left">
                                                @php
                                                    $fixed = '';
                                                    if ($c_item->fireCoverageList->count() > 0 && $c_item->fireCoverageList->first()->is_fixed == 1) {
                                                        $fixed = $c_item->fireCoverageList->first()->id;
                                                    }
                                                    $check = DB::table('calculation_fire_additional_coverages')
                                                        ->where('additional_coverage_id', $c_item->id)
                                                        ->whereNotNull('district_id')
                                                        ->where('status', 1)
                                                        ->first();
                                                @endphp
                                                <input class="form-control a_input c_{{ $c_item->id }}" type="text"
                                                    id="sub_amount_{{ $c_item->id }}" placeholder="amount"
                                                    value=""
                                                    onkeyup="add('i', '{{ $c_item->id }}','{{ $fixed }}', this)">
                                                <p class="text-danger" id="amount_message_{{ $c_item->id }}"
                                                    style="display: none">
                                                    <span>Amount will less than total sum insured!</span>
                                                </p>
                                                <p class="text-danger amount_value_message_{{ $c_item->id }}"
                                                    id="amount_value_message_{{ $key }}" style="display: none">
                                                    <span>Amount field is required!</span>
                                                </p>
                                                @if ($check)
                                                    <select class="form-control"
                                                        id="get_district_for_{{ $c_item->id }}">
                                                        @foreach ($fire_district as $d_item)
                                                            <option value="{{ $d_item->id }}">
                                                                {{ $d_item->{app()->getLocale() . '_name'} }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                @if ($c_item->fireCoverageList->count() > 0)
                                                    <div class="d-flex justify-content-around">
                                                        @foreach ($c_item->fireCoverageList as $sub_fire)
                                                            <div>
                                                                <input type="checkbox" class="ss_{{ $sub_fire->id }}"
                                                                    onchange="add('c', '{{ $c_item->id }}','{{ $sub_fire->id }}', this)"
                                                                    id="check_sub_{{ $c_item->id . '_' . $sub_fire->id }}"
                                                                    @if ($sub_fire->is_fixed == 1) {{ 'checked' }} @endif
                                                                    {{ $sub_fire->en_name == 'Fire' ? 'disabled' : '' }}>{{ $sub_fire->{app()->getLocale() . '_name'} }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row text-center mt-5 mb-5">
                                    <div class="col-lg-12">
                                        <span><img src="{{ asset('images/website/alert.png') }}" alt=""></span>
                                        <span class="alert_msg">
                                            {{ __('Minimum Preminum Amount BDT 500.00 for Fire &/or Lighting') }}
                                        </span>
                                    </div>

                                    <div class="col-lg-12">
                                        <span><img src="{{ asset('images/website/alert.png') }}" alt=""></span>
                                        <span class="alert_msg">
                                            {{ __('Minimum Preminum Amount BDT 500.00 for Electrical Clause B') }}
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-12 col-sm-12 new_btn_setup">
                                    <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                                    <a class="btn fire_btn fire_btn_calculate mb-2" href="javascript:;"
                                        data-url="{{ route('calculation.fire') }}"
                                        onclick="fireCalculation(this)">{{ __('Calculate') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fire-insurence">
        <div id="fire-details-dialog-back" onclick="closeDialog(this)">
            <div id="addmodalcalculation" class="fire-details-dialog"></div>
        </div>
    </div>


@endsection
