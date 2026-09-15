@extends('frontend.layouts.master')
@section('title', 'Flat/Apartment Owner Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($flat_apartment > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $flat_apartment->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="text-dark fw-bold"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $flat_apartment->{app()->getLocale() . '_name'} }}</span></h6>

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
                <h2 class="mb-3"> {{ __('Insurance District') }} </h2>

                <div class="wrap" onclick="spd1()">
                    <select class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                        aria-label="Default select example" onchange="getDistrictValue(this)">
                        <option value="" selected>Select District</option>
                        @foreach ($districts as $cid_item)
                            <option class=" mt-2" value="{{ $cid_item->id }}">
                                {{ $cid_item->{app()->getLocale() . '_name'} }}</option>
                        @endforeach
                    </select>

                </div>


                <h2 class="mt-5 mb-3"> {{ __('Select Your Location') }} </h2>

                <div class="wrap" onclick="spd2()">
                    <select class="form-select filter_card mt-2 mb-2 js-example-basic-single"
                        aria-label="Default select example" onchange="getPropertyLocation(this)">
                        <option value="" selected>Select Location</option>
                        @foreach ($flat_apartment->calculatorPropertyLocation as $cpl_item)
                            <option value="{{ $cpl_item->id }}" class=" mt-2">
                                {{ $cpl_item->{app()->getLocale() . '_name'} }}</option>
                        @endforeach
                    </select>

                </div>

                <h2 class="mt-5 mb-3"> {{ __('Total Sum Insured') }} </h2>
                <input class="filter_card form-control" type="text" placeholder="Type total sum insured e.g. 10000"
                    id="total_amount">

                <h2 class="mt-5 mb-3"> {{ __('Risk Coverage') }} </h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="visited_country_panel">
                            <div class="table_scroll_div">
                                <table class="table table-hover">
                                    @foreach ($flat_apartment->calculatorRiskCover as $crc_item)
                                        <tr class="visited_country_radio_item">
                                            <td>
                                                <input type="checkbox" id="country{{ $crc_item->id }}"
                                                    {{ $crc_item->id == 14 ? 'checked disabled' : '' }}
                                                    onchange="getSelectedCountry('{{ $crc_item->id }}','{{ $crc_item->{app()->getLocale() . '_name'} }}', this)"
                                                    name="fav_language" value="">
                                                <label
                                                    for="country{{ $crc_item->id }}">{{ $crc_item->{app()->getLocale() . '_name'} }}</label><br>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 visited_country_selected_btns mt-2 text-center">
                        <div id="selected_country_name"></div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 col-sm-12 new_btn_setup">
                        <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                        <a class="btn fire_btn fire_btn_calculate mb-2" data-url="{{ route('calculation.flat') }}"
                            data-bs-toggle="modal" data-bs-target="#marinCalculateModal" onclick="flatTeriff(this)"
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
                                <form action="{{ route('calculation.buyFlat') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="calculator_id" id="calculator_id"
                                        value="{{ $flat_apartment->id }}">
                                    <input type="hidden" name="flat_district_id" id="district_id">
                                    <input type="hidden" name="flat_location_id" id="property_location_id">
                                    <input type="hidden" name="flat_risk_coverage" id="user_visit_country">
                                    <input type="hidden" name="default_fire" id="default_fire" value="14">
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
