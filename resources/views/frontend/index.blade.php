@extends('frontend.layouts.master')
@section('title', 'Home')
<style>
    .intro_premium_calculator {
        margin-bottom: 0px !important;
    }

    .main_menu_list .desktop_menu {
        margin: 0px !important;
    }

    .owl_control_section .owl_control {

        padding: 7px 10px !important;
    }
</style>
@section('content')
    @include('sweetalert::alert')
    <div class="container cus_mt_30 home_page mb-100">
        <div class="row hero_home">
            <div class="col-lg-5 col-md-12">
                <h1>{!! $home_page_content->{app()->getLocale() . '_title'} !!}</h1>
                <p>{!! $home_page_content->{app()->getLocale() . '_description'} !!}
                </p>
            </div>
            <div class="col-lg-5 col-md-8 col-sm-12 col-12 text-center responsive_display_none"
                 style="background: url('images/website/title_bg_box.png'); background-repeat: no-repeat">
                <img class="img-fluid" src="{{ asset($home_page_content->slider1) }}" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 col-12 text-center responsive_display_none">
                <div class="hero_right_images">
                    <img class="img1" src="{{ asset($home_page_content->slider2) }}" alt="">
                    <img class="img2" src="{{ asset($home_page_content->slider3) }}" alt="">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mobile_slider">
                    <img src="{{ asset('images/website/hero_center_img.png') }}" alt="">
                    <img src="{{ asset('images/website/hero_right_top_img.png') }}" alt="">
                    <img src="{{ asset('images/website/hero_right_bottom_img.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid cus_mb_30">
        <div class="product_menu_bar_green">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 cust_col mt-3">
                        <a href="{{ route('ps.online.insurance') }}">
                            <div class="product_items">
                                <span class="circle mb-2"><img src="{{ asset('images/icon/online_insurance.png') }}"
                                                               alt=""></span>
                                <h4> {{ __('Online Insurance') }} </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 cust_col mt-3">
                        <a href="{{ route('ps.fire.insurance.details') }}">
                            <div class="product_items">
                                <span class="circle mb-2">
                                    <img src="{{ asset($product_service[1]['color_icon']) }}" alt="">
                                </span>
                                <h4> {{ $menus[20]->{app()->getLocale() . '_name'} }} </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 cust_col mt-3">
                        <a href="{{ route('ps.motor.insurance.details') }}">
                            <div class="product_items">
                                <span class="circle mb-2"><img class="img-fluid"
                                                               src="{{ asset($product_service[4]['color_icon']) }}"
                                                               alt=""></span>
                                <h4> {{ $menus[22]->{app()->getLocale() . '_name'} }} </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 cust_col mt-3">
                        <a href="{{ route('ps.marine.cargo.insurance.details') }}">
                            <div class="product_items">
                                <span class="circle mb-2"><img src="{{ asset($product_service[2]['color_icon']) }}"
                                                               alt=""></span>
                                <h4> {{ $menus[21]->{app()->getLocale() . '_name'} }} </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 cust_col mt-3">
                        <a href="{{ route('ps.miscellaneous.insurance.details') }}">
                            <div class="product_items">
                                <span class="circle mb-2"><img src="{{ asset($product_service[6]['color_icon']) }}"
                                                               alt=""></span>
                                <h4> {{ $menus[23]->{app()->getLocale() . '_name'} }} </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 cust_col mt-3">
                        <a href="{{ route('ps.engineering.insurance.details') }}">
                            <div class="product_items">
                                <span class="circle mb-2"><img src="{{ asset($product_service[5]['color_icon']) }}"
                                                               alt=""></span>
                                <h4> {{ $menus[24]->{app()->getLocale() . '_name'} }} </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="intro_premium_calculator text-center"
                     style="background: url('images/website/title_bg_box.png'); background-repeat: no-repeat">
                    <h2>{!! $home_page_content->{app()->getLocale() . '_online_calculator_title'} !!}</h2>
                    <span class="titleBorderBottom"></span>
                </div>
                <p class="intro_after_description">
                    {{ $home_page_content->{app()->getLocale() . '_online_calculator_description'} }}</p>
            </div>
        </div>
        @include('frontend.product-and-service.common-calculator')

        <div class="row cus_mt_20">
            <div class="col-lg-12">
                <div class="intro_premium_calculator text-center"
                     style="background: url('images/website/title_bg_box.png'); background-repeat: no-repeat">
                    <h2>{!! $home_page_content->{app()->getLocale() . '_work_process_title'} !!}</h2>
                    <span class="titleBorderBottom"></span>
                </div>
                <p class="intro_after_description text-center cus_mt_20">{!! $home_page_content->{app()->getLocale() . '_work_process_description'} !!}</p>
            </div>
            @include('frontend.common.work_flow')
        </div>
    </div>
    <div class="container-fluid cus_mb_20">
        <div class="testimonial_section">
            <div class="container">
                @php
                    $testimonial_infos = App\Models\HomeTestimonialInfo::first();
                    $testimonials = App\Models\HomeTestimonial::all();
                @endphp
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                        <div class="left_content"
                             style="background: url('images/website/title_bg_box.png'); background-repeat: no-repeat">
                            <div class="title">
                                <h2> {{ $testimonial_infos->{app()->getLocale() . '_testimonial_title'} }} </h2>
                                <span class="titleBorderBottom"></span>
                            </div>
                            <p>{{ $testimonial_infos->{app()->getLocale() . '_testimonial_description'} }}</p>
                            <a class="btn about_btn mt-3"
                               href="{{ route('about_us') }}"> {{ __('About CoverSure') }} </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                        <div class="row owl_control_section">
                            <div class="col-lg-12">
                                <a class="owl_control slick_left_show" href="javascript:void(0)">
                                    <img src="{{ asset('images/website/arrow_left.png') }}" alt="">
                                </a>
                                <a class="owl_control slick_right_show" href="javascript:void(0)">
                                    <img src="{{ asset('images/website/arrow_right.png') }}" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="row about_coversure_insurance">
                            @foreach ($testimonials as $list)
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-3">
                                    <div class="testimonial_owl">
                                        <span class="box1"></span>
                                        <span class="box2"></span>
                                        <h4>{{ $list->{app()->getLocale() . '_client_name'} }}</h4>
                                        <span>{{ $list->{app()->getLocale() . '_client_designation'} }}</span>
                                        <p>{{ $list->{app()->getLocale() . '_client_feedback'} }}</p>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-3">
                                <div class="testimonial_owl_active">
                                    <span class="box1"></span>
                                    <span class="box2"></span>
                                    <h4>Rashed Sikhder</h4>
                                    <span>Businessman</span>
                                    <p>I recently got insured with CoverSure Insurance and I couldn't be happier with my
                                        experience. The process was quick and easy, and the team was extremely helpful in
                                        finding the perfect coverage to fit my needs. I especially appreciated their
                                        attention to detail and personalized service. I highly recommend CoverSure Insurance
                                        to anyone in need of reliable and comprehensive coverage in Bangladesh.</p>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row cus_mb_40 justify-content-center">
            <div class="col-lg-12"
                 style="background: url('images/website/title_bg_box.png'); background-repeat: no-repeat">
                <div class="title">
                    <h2> {{ __('News & Events') }} </h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
            @foreach ($news_event_list as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_20">
                    <div class="notice_card">
                        <img class="notice_img" src="{{ asset($item->image) }}" alt="">
                        <span><img class="date_img" src="{{ asset('images/website/calender_green.png') }}"
                                   alt=""></span>
                        <span>{{ $item->{app()->getLocale() . '_date'} }}</span>
                        <a href="{{ route('news_event_details', $item->id) }}">
                            <h4>{{ $item->{app()->getLocale() . '_title'} }}</h4>
                        </a>
                        <p>{!! \Illuminate\Support\Str::words($item->{app()->getLocale() . '_details'}, 5, '...') !!}</p>
                        <a class="read_more_btn" href="{{ route('news_event_details', $item->id) }}">
                            {{ __('Read More') }} </a>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 text-center cus_mt_40">
                <a class="view_all_notice_btn" href="{{ route('more.news_event') }}"> {{ __('View All Notice') }} </a>
            </div>
        </div>
    </div>

{{--    <!-- Modal -->--}}
{{--    <div class="custom_modal_show">--}}

{{--    </div>--}}

    @php
        $home_notice = \App\Models\HomeNotice::first();
    @endphp

    @if($home_notice->status == 1)
        <div class="popup-wrapper" id="popup">
            <div class="background_shade" onclick="closePopup()"></div>
            <div class="popup-content">
                <div class="header">
                    <span class="close" onclick="closePopup()">&times;</span>
                </div>
                <div class="body">
                    <img src="{{ asset(isset($home_notice) ? $home_notice->image : '') }}" alt="popup content image">
                </div>
            </div>
        </div>
    @endif
@endsection
