@extends('backend.layouts.master')
@section('title', 'Admin Home')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                <div class="page_title_left d-flex align-items-center">
                    <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-6">
            <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single_crm">
                            <div class="crm_head d-flex align-items-center justify-content-between">
                                <div class="thumb">
                                    <img src="{{ asset('backend') }}/img/crm/businessman.svg" alt="">
                                </div>
                                
                            </div>
                            <div class="crm_body">
                                <h4>{{ $todays_insurance }}</h4>
                                <p>Todays Insurance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_crm ">
                            <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                <div class="thumb">
                                    <img src="{{ asset('backend') }}/img/crm/customer.svg" alt="">
                                </div>
                                
                            </div>
                            <div class="crm_body">
                                <h4>{{ $total_insurance }}</h4>
                                <p>Total Insurance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_crm">
                            <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                <div class="thumb">
                                    <img src="{{ asset('backend') }}/img/crm/infographic.svg" alt="">
                                </div>
                                
                            </div>
                            <div class="crm_body">
                                <h4>{{ $unchecked }}</h4>
                                <p>Unchecked Insurance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_crm">
                            <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                <div class="thumb">
                                    <img src="{{ asset('backend') }}/img/crm/sqr.svg" alt="">
                                </div>
                                
                            </div>
                            <div class="crm_body">
                                <h4>{{ $checked }}</h4>
                                <p>Checked Insurance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_crm">
                            <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                <div class="thumb">
                                    <img src="{{ asset('backend') }}/img/crm/infographic.svg" alt="">
                                </div>
                                
                            </div>
                            <div class="crm_body">
                                <h4>{{ number_format($todays_amount, 2) }}</h4>
                                <p>Todays Amount</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_crm">
                            <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                <div class="thumb">
                                    <img src="{{ asset('backend') }}/img/crm/sqr.svg" alt="">
                                </div>
                                
                            </div>
                            <div class="crm_body">
                                <h4>{{ number_format($total_amount, 2) }}</h4>
                                <p>Total Amount</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="white_card card_height_100 mb_20 ">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Premium calculator insurance</h3>
                        </div>
                        
                    </div>
                </div>
                <div class="white_card_body QA_section">
                    <div class="QA_table ">

                        <table class="table lms_table_active2 p-0">
                            <thead>
                                <tr>
                                    <th scope="col">Premium calculator</th>
                                    <th scope="col">Total insurance</th>
                                    <th scope="col">Total amount</th>
                                    <th scope="col">Todays insurance</th>
                                    <th scope="col">Uncheck insurance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="customer d-flex align-items-center">
                                            <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                    src="{{ asset(calculator_details(3)->color_image) }}" alt="">
                                            </div>
                                            <span
                                                class="f_s_12 f_w_600 color_text_5">{{ calculator_details(3)->en_name }}</span>
                                        </div>
                                    </td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ total_insurance_by_cal(3) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_7">{{ total_amount_by_cal(3) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ todays_insurance_by_cal(3) }}</td>
                                    <td class="f_s_12 f_w_400 text-end">{{ uncheck_insurance_by_cal(3) }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="customer d-flex align-items-center">
                                            <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                    src="{{ asset(calculator_details(4)->color_image) }}" alt="">
                                            </div>
                                            <span
                                                class="f_s_12 f_w_600 color_text_5">{{ calculator_details(4)->en_name }}</span>
                                        </div>
                                    </td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ total_insurance_by_cal(4) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_7">{{ total_amount_by_cal(4) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ todays_insurance_by_cal(4) }}</td>
                                    <td class="f_s_12 f_w_400 text-end">{{ uncheck_insurance_by_cal(4) }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="customer d-flex align-items-center">
                                            <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                    src="{{ asset(calculator_details(5)->color_image) }}" alt="">
                                            </div>
                                            <span
                                                class="f_s_12 f_w_600 color_text_5">{{ calculator_details(5)->en_name }}</span>
                                        </div>
                                    </td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ total_insurance_by_cal(5) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_7">{{ total_amount_by_cal(5) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ todays_insurance_by_cal(5) }}</td>
                                    <td class="f_s_12 f_w_400 text-end">{{ uncheck_insurance_by_cal(5) }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="customer d-flex align-items-center">
                                            <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                    src="{{ asset(calculator_details(6)->color_image) }}" alt="">
                                            </div>
                                            <span
                                                class="f_s_12 f_w_600 color_text_5">{{ calculator_details(6)->en_name }}</span>
                                        </div>
                                    </td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ total_insurance_by_cal(6) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_7">{{ total_amount_by_cal(6) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ todays_insurance_by_cal(6) }}</td>
                                    <td class="f_s_12 f_w_400 text-end">{{ uncheck_insurance_by_cal(6) }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="customer d-flex align-items-center">
                                            <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                    src="{{ asset(calculator_details(7)->color_image) }}" alt="">
                                            </div>
                                            <span
                                                class="f_s_12 f_w_600 color_text_5">{{ calculator_details(7)->en_name }}</span>
                                        </div>
                                    </td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ total_insurance_by_cal(7) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_7">{{ total_amount_by_cal(7) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ todays_insurance_by_cal(7) }}</td>
                                    <td class="f_s_12 f_w_400 text-end">{{ uncheck_insurance_by_cal(7) }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="customer d-flex align-items-center">
                                            <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50"
                                                    src="{{ asset(calculator_details(8)->color_image) }}" alt="">
                                            </div>
                                            <span
                                                class="f_s_12 f_w_600 color_text_5">{{ calculator_details(8)->en_name }}</span>
                                        </div>
                                    </td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ total_insurance_by_cal(8) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_7">{{ total_amount_by_cal(8) }}</td>
                                    <td class="f_s_12 f_w_400 color_text_6">{{ todays_insurance_by_cal(8) }}</td>
                                    <td class="f_s_12 f_w_400 text-end">{{ uncheck_insurance_by_cal(8) }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
