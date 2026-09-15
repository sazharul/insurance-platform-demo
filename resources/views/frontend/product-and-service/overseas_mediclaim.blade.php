@extends('frontend.layouts.master')
@section('title', 'Overseas Mediclaim Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($mediclaim > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $mediclaim->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="fw-bold text-dark"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $mediclaim->{app()->getLocale() . '_name'} }}</span></h6>

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
                        <h2 class="cus_mt_20 cus_mb_20">{{ __('Insurance Sub Type') }}</h2>
                        <div class="row">
                            @foreach ($mediclaim->calculatorInsuranceSubType as $c_key => $cis_item)
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12 mt-2">
                                    <div class="overseas_card {{ $c_key == 0 ? 'overseas_card_active' : '' }}"
                                        data-insurance_sub_type="{{ $cis_item->id }}">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <img src="{{ asset($cis_item->white_image) }}" class="white_image" style="display: {{ $c_key == 0 ? 'inline' : '' }}">
                                                <img src="{{ asset($cis_item->color_image) }}" class="black_image" style="display: {{ $c_key == 0 ? 'none' : '' }}">
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                                                <p class="{{ $c_key == 0 ? 'active_p' : '' }}" id="active_text">
                                                    {{ $cis_item->{app()->getLocale() . '_name'} }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <select name="" id="" onchange="selectSengenNonSengen(this)">
                                <option value="1">Schengen</option>
                                <option value="2">Non Schengen</option>
                            </select> --}}
                        <h2 class="cus_mt_20 cus_mb_20">{{ __('Countries to be visited') }}</h2>
                        <div class="row mt-3">
                            <div class="col-lg-6 mt-2">
                                <input class="visited_country_items form-control" type="text"
                                    placeholder="Enter your destination countries" onkeyup="searchCountry()"
                                    id="search_country">
                                <img class="visited_country_search_icon"
                                    src="{{ asset('images/website/search_icon.png') }}" alt="">
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div class="country_type_select">
                                    <button class="visited_country_items form-control default_country_type"
                                        onclick="toggleCountryType()" type="button">{{ __('All Country') }}</button><img
                                        class="visited_country_polygon" src="{{ asset('images/website/polygon.png') }}"
                                        alt="">
                                    <div class="innter_country_type" style="z-index: 9999">
                                        <span class="child_inner_class_type" data-type="5">{{ __('All Country') }}</span>
                                        <span class="child_inner_class_type sengen" data-type="1">{{ __('NONSCHENGEN') }}</span>
                                        <span class="child_inner_class_type nonsengen" data-type="2">{{ __('SCHENGEN') }}</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="visited_country_panel">
                                    <div class="table_scroll_div">
                                        <table class="table table-hover all_new_country_list" id="my_tr">
                                            @foreach ($countries as $ccv_item)
                                                <tr
                                                    class="visited_country_radio_item @if ($ccv_item->type == 1) {{ 'sengen' }} @elseif($ccv_item->type == 2) {{ 'nonsengen' }} @elseif ($ccv_item->type == 3) {{ 'isengen' }} @elseif($ccv_item->type == 4) {{ 'inonsengen' }} @endif">
                                                    <td>
                                                        <input type="checkbox" class="form-check-input"
                                                            id="country{{ $ccv_item->id }}" name="fav_language"
                                                            value=""
                                                            onchange="getSelectedCountry('{{ $ccv_item->id }}','{{ $ccv_item->{app()->getLocale() . '_name'} }}', this)">
                                                        <label
                                                            for="country{{ $ccv_item->id }}">{{ $ccv_item->{app()->getLocale() . '_name'} }}</label><br>
                                                        <span style="display:none">{{ $ccv_item->type }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 visited_country_selected_btns mt-2 text-center">
                                <div id="selected_country_name"></div>

                                {{-- <button class="btn mb-2" type="submit">sdf<span id="current_selected_country"></span>
                                        <img src="{{ asset('images/website/close_icon.png') }}" alt=""></button> --}}
                            </div>
                        </div>
                        <div class="row mt-3 time_panel mb-35">
                            <div class="col-lg-6">
                                <h4 class="">{{ __('Date of Departure') }}</h4>
                                <input class="visited_input_box" type="text" id="date_of_departure" name=""
                                    placeholder="dd/mm/yyyy" value="">
                                <label for=""></label>
                            </div>
                            @php
                                $max = date('Y-m-d', strtotime(date('Y-m-d') . ' + 90 days'));
                            @endphp
                            <div class="col-lg-6">
                                <h4 class="">{{ __('Return Date') }}</h4>
                                <input class="visited_input_box" type="text" id="return_date" name=""
                                    placeholder="dd/mm/yyyy" value="" onchange="getDateDifferent(this)"
                                    max="{{ $max }}" min="{{ date('Y-m-d') }}">
                                <label for=""></label>
                            </div>
                            <div class="col-lg-12 visited_place_duration_info text-center cus_mt_20">
                                <span class="duration_info_1">{{ __('Travel Duration') }}: </span>
                                <span class="duration_info_2" id="travel_duration">0</span>{{ ' ' . __('Days') }}
                            </div>
                        </div>
                        <div class="row dob_line mb-35 time_panel">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <h4 class="text-center mt-35">{{ __('Date of Birth') }}</h4>
                                <input class="visited_input_box pp_date" type="text" id="date_of_birth"
                                    name="" placeholder="dd/mm/yyyy" onchange="setDateOfBirth(this)">
                                <label for=""></label>
                                <div class="col-lg-12 visited_place_duration_info text-center mt-2">
                                    <span class="duration_info_2" id="calculated_dob">0</span>{{ ' ' . __('Years') }}
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                        <div class="row mt-35">
                            <div class="col-lg-12 col-sm-12 new_btn_setup">
                                <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                                <a class="btn fire_btn fire_btn_calculate mb-2" href="javascript:;"
                                    data-url="{{ route('calculation.mediclaim') }}" data-bs-toggle="modal"
                                    data-bs-target="#mediclaimCalculateModal"
                                    onclick="mediclaimCalculate(this)">{{ __('Calculate') }}</a>
                            </div>
                            <div class="modal fade calculator_modal" id="mediclaimCalculateModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="exampleModalLabel">
                                                {{ __('Premium Calculator') }} </h2>
                                        </div>
                                        <form action="{{ route('calculation.buyMediclaim') }}" method="post">
                                            @csrf

                                            <input type="hidden" name="calculator_id" id="calculator_id"
                                                value="{{ $mediclaim->id }}">
                                            <input type="hidden" name="insurance_sub_type_id" id="insurance_sub_type_id"
                                                value="1">
                                            <input type="hidden" name="user_visit_country" id="user_visit_country">
                                            <input type="hidden" name="user_date_of_departure"
                                                id="user_date_of_departure">
                                            <input type="hidden" name="user_return_date" id="user_return_date">
                                            <input type="hidden" name="travel_duration" id="travel_duration_value">
                                            <input type="hidden" name="dob" id="user_date_of_birth">
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

@endsection
