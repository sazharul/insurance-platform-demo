@extends('frontend.layouts.master')
@section('title', 'Motor Insurance')

@section('content')
    <style>
        .extra_button {
            color: #FFFFFF !important;
            background: #007C4A !important;
        }

        .certificate {
            display: none;
        }

        .renewal_insurance_section {
            display: none;
        }

        .select2-container {
            width: 100% !important;
        }

        .dca {
            display: none;
        }
    </style>
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $motor->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="text-dark fw-bold"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $motor->{app()->getLocale() . '_name'} }}</span></h6>

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

            <div class="fire_container cus_mt_10 cus_mb_20">
                <div class="fire_container_content">
                    <div class="motor_insurance_panel cus_mb_20">
                        <div class="row">
                            <div class="col-lg-12 motor_insurance_panel cus_mt_20 text-center">
                                {{-- @for ($i = 1; $i < 12; $i++) --}}
                                <span class="btn mb-2 extra_button Comprehensive"
                                    onclick="selectInsuranceType(this,'Comprehensive')"><img
                                        src="{{ asset('images/website/renew.png') }}" alt="">
                                    {{ __('Comprehensive') }}</span>
                                <span class="btn mb-2 Act_Liability"
                                    onclick="selectInsuranceType(this,'Act Liability')"><img
                                        src="{{ asset('images/website/renew.png') }}" alt="">
                                    {{ __('Act Liability') }}</span>
                                <input type="hidden" name="selected_insurance_type" id="selected_insurance_type"
                                    value="Comprehensive">
                                <input type="hidden" name="insurance_first" id="insurance_first"
                                    value="First Time Insurance">
                                {{-- @endfor --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12  cus_mt_20 text-center">
                                {{-- @for ($i = 1; $i < 12; $i++) --}}
                                <span class="btn mb-2 extra_button" onclick="insuranceFirst(this,'First Time Insurance')"
                                    data-url="{{ route('calculation.checkLogin') }}"><img
                                        src="{{ asset('images/website/renew.png') }}" alt="">
                                    {{ __('First Time Insurance') }}</span>
                                <span class="btn mb-2" onclick="insuranceFirst(this,'Renewal Insurance')"
                                    data-url="{{ route('calculation.checkLogin') }}"><img
                                        src="{{ asset('images/website/renew.png') }}" alt="">
                                    {{ __('Renewal Insurance') }}</span>
                                {{-- @endfor --}}
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 certificate" style="display: none;">
                            <h2 class="cus_mt_20 cus_mb_20">{{ __('Certificate Number') }}</h2>
                            <div class="input-group mb-3">
                                <input type="text" name="certificate_number" id="certificate_number" class="form-control"
                                    placeholder="{{ __('Certificate Number') }}" aria-label="Username"
                                    aria-describedby="basic-addon1" onkeyup="getCertificateDetails(this)"
                                    data-url="{{ route('calculation.certificateDetails') }}">
                            </div>
                            <p class="text-danger dca">Please enter valid first time registered certificate number.</p>
                        </div>

                        <h2 class="cus_mt_20 cus_mb_20">{{ __('Vehicle Category') }}</h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel_type">
                                    @foreach ($vehicle_category as $vehicle_cat)
                                        <div class="property_card">
                                            <div class="card carried_card"
                                                onclick="motorActiveClass(this);get_vehicle_type(this)"
                                                data-id="{{ $vehicle_cat->id }}" data-name="{{ $vehicle_cat->en_name }}"
                                                data-url="{{ route('get_vehicle_type', $vehicle_cat->id) }}"
                                                id="vehicle_category_id_{{ $vehicle_cat->id }}">
                                                <img class="carried_card_img" src="{{ asset($vehicle_cat->color_image) }}"
                                                    alt="">
                                                <img class="carried_card_active_img"
                                                    src="{{ asset($vehicle_cat->white_image) }}" alt="">
                                                <h3 class="">{{ $vehicle_cat->{app()->getLocale() . '_name'} }}</h3>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="vehicle_type_list"></div>


                        <div class="engine_capacity_list"></div>

                        <h2 class="mt-5 mb-3">{{ __('Additional Information') }}</h2>
                        <div class="row motor_insurance_input">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="vehicle_price" id="vehicle_price" class="form-control"
                                        placeholder="{{ __('Vehicle Price') }}" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                    <span class="input-group-text"
                                        id="basic-addon1"><strong>{{ __('BDT') }}</strong></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" name="passanger" id="passanger" class="form-control"
                                        placeholder="{{ __('Passenger') }}*" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <label for=""><strong>{{ __('Policy Start Date') }}</strong></label> <br>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control date_val date" placeholder="dd/mm/yyyy"
                                        aria-label="Username" onchange="addOneYear(this)" aria-describedby="basic-addon1"
                                        id="policy_start_date">
                                    <span class="input-group-text" id="basic-addon1"><img
                                            src="{{ asset('images/website/calender.png') }}" alt=""></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="policy_end_label" for="">{{ __('Policy End Date') }}</label> <br>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control policy_end_date" placeholder="14.01.24"
                                        id="policy_end_date" readonly aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 mb-5 additional_coverage_content text-center">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="driver" id="self-driver"
                                        value="self">
                                    <label class="form-check-label" for="self-driver">{{ __('Self Driver') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="driver" id="paid-driver"
                                        value="paid" checked>
                                    <label class="form-check-label" for="paid-driver">{{ __('Paid Driver') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 mb-5 additional_coverage_content text-center  vt">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-check form-check-inline t">
                                    <input class="form-check-input" type="checkbox" name="tachometer" id="tachometer"
                                        value="0">
                                    <label class="form-check-label" for="tachometer">{{ __('Tachometer') }}</label>
                                </div>
                                <div class="form-check form-check-inline v">
                                    <input class="form-check-input" type="checkbox" name="vts_meter" id="vts_meter"
                                        value="0">
                                    <label class="form-check-label" for="vts_meter">{{ __('VTS Meter') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="excludingRiskCoverage">
                            <h2 class="mt-5 mb-3">{{ __('Excluding') }} {{ __('Risk Coverage') }}</h2>
                            <div class="row mb-3">
                                @foreach ($motor->calculatorRiskCover as $risk_item)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-2">
                                        <div class="card construction_card motor_risk_coverage"
                                            data-id="{{ $risk_item->id }}"
                                            id="active_risk_coverage_id_{{ $risk_item->id }}">
                                            <input type="checkbox" class="motor_risk_value" name="motor_risk"
                                                value="{{ $risk_item->id }}" style="visibility: hidden">
                                            <p class="up_p">{{ $risk_item->{app()->getLocale() . '_name'} }}</p>
                                            <p class="down_p">{{ $risk_item->{app()->getLocale() . '_subtitle'} }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row text-center cus_mt_20 cus_mb_20">
                                <div class="col-lg-12">
                                    <span><img src="{{ asset('images/website/alert.png') }}" alt=""></span>
                                    <span class="alert_msg">You can select multiple risk coverage</span>
                                </div>
                            </div>
                        </div>

                        <div class="renewal_insurance_section">
                            <div class="wrap" onclick="spd1()">
                                <input type="hidden" id="ncb">
                                <h2 class="mt-5 mb-3">{{ __('Select Renewal NCB') }} ({{ __('For renewal only') }})</h2>
                                <select style="z-index: 100"
                                    class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                                    aria-label="Default select example" onchange="NCB(this)">
                                    <option value="" selected>Select Option</option>
                                    <option value="30">30% discount on own damage for 1st year renewal </option>
                                    <option value="40">40% discount on own damage for 2nd year renewal </option>
                                    <option value="50">50% discount on own damage for 3rd year renewal </option>

                                </select>
                            </div>
                            <div style="" class="wrap" onclick="spd1()">
                                <h2 class="mt-5 mb-3">{{ __('Select Loading') }} ({{ __('For renewal only') }})</h2>
                                <input type="hidden" id="loading">
                                <select style="z-index: 100"
                                    class="form-select filter_card mt-2 mb-2 js-example-basic-single" id="select_loading"
                                    aria-label="Default select example" onchange="loading(this)">
                                    <option value="" selected>Select Option</option>
                                    <option value="30">30% Add On own damage for 1st claim</option>
                                    <option value="40">40% Add On own damage for 2nd claim</option>
                                    <option value="50">50% Add On own damage for 3rd claim</option>

                                </select>
                            </div>
                        </div>




                        <div class="row cus_mt_20 cus_mb_20">
                            <div class="col-lg-12 col-sm-12 new_btn_setup">
                                <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                                <a class="btn fire_btn fire_btn_calculate mb-2"
                                    data-url="{{ route('get_motor_tariff_web') }}" data-bs-toggle="modal"
                                    data-bs-target="#marinCalculateModal" onclick="motorCalculate(this)"
                                    href="javascript:;">{{ __('Calculate') }}</a>
                            </div>

                            <div class="modal fade calculator_modal" id="marinCalculateModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="exampleModalLabel">
                                                {{ __('Premium Calculator') }} </h2>
                                        </div>
                                        <form action="{{ route('calculation.buyMotor') }}" method="post">
                                            @csrf

                                            <input type="hidden" name="calculator_id" id="calculator_id"
                                                value="{{ $motor->id }}">
                                            <input type="hidden" name="vehicle_category_id" id="vehicle_category_id">
                                            <input type="hidden" name="vehicle_type_id" id="vehicle_type_id">
                                            {{-- <input type="hidden" name="engine_capacity_id" id="engine_capacity_id">
                                            <input type="hidden" name="capacity_id" id="capacity_id"> --}}
                                            <input type="hidden" name="c_capacity[]" id="c_capacity">
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
    </div>

    <script>
        function addOneYear(e) {
            //var date = new Date($(e).val());

            var date = $(e).val();
            date = date.split('/');
            var new_date1 = Number(date[0]) - 1;
            console.log(new_date1);
            date = date[1] + '/' + new_date1 + '/' + date[2];
            const new_date = new Date(date);

            //Making a copy with the Date() constructor
            //const dateCopy = new Date(new_date);

            new_date.setFullYear(new_date.getFullYear() + 1);

            $("#policy_end_date").val(new_date);
        }
    </script>
@endsection
