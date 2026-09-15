@extends('frontend.layouts.master')
@section('title', 'Engineering Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset($product_service->hero_image) }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($product_service > '50'))
                <style>
                    @media(max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
            @else
            @endif
                <h2 class="fw-bold">{!! $product_service->{app()->getLocale() . '_service_name'} !!}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ __('Products & Services') }}</span> / <span
                        class="text-success fw-bold">{!! $product_service->{app()->getLocale() . '_service_name'} !!}</span></h6>

            </div>
        </div>
    </div>

    <section class="cus_mb_20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-12">

                    <h4 class="mt-2 fw-bold"><span style="font-size: 30px">{!! $product_service->{app()->getLocale() . '_title'} !!}</h4>
                    <h6 class="mt-5" style="text-align: justify; font-size: 14px;">{!! $product_service->{app()->getLocale() . '_short_description'} !!}</h6>
                    <div class="animation_btn_view2">
                        <a href="{{ route('ps.boiler_insurance') }}" class="">
                            <img class="left_icon" src="{{ asset('images/website/motor_btn.png') }}" alt=""> {{ __('Get Your Insurance') }}
                            <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-12">

                    <img class="img-fluid engineering_gif" src="{{ asset('/images/website/Group 48095815.png') }}"
                        alt="">

                </div>
            </div>
            <div class="col-lg-12">
                <div class="intro_title_panel_small text-center"
                    style="background: url('../images/website/title_bg_box.png'); background-repeat: no-repeat">
                    <h2>{{ __('Coverage We offer') }}</h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
            <div class="row cus_mt_20">
                @foreach ($product_service->coverage as $item)
                    <div class="col-lg-6 mt-3">
                        <div class="engineering_coverage_list h-100">
                            <div class="row">
                                <div class="col-lg-4 col-md-3 col-sm-3 col-4">
                                    <div class="eng_coverage_img_box">
                                        <img src="{{ asset($item->white_image) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-9 col-sm-9 col-8">
                                    <div class="eng_coverage_content_box">
                                        <h5 class="fw-bold">{!! $item->{app()->getLocale().'_title'} !!}</h5>
                                        <p class="text-muted">{!! $item->{app()->getLocale().'_short_description'} !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


    <section>
        <div class="container">
            <div class="row cus_mt_20">
                <div class="col-lg-12">
                    <div class="intro_premium_calculator text-center"
                        style="background: url('../images/website/title_bg_box.png'); background-repeat: no-repeat">
                        <h2>{{ __('Our easy work process for getting Insurance') }}</span></h2>
                        <span class="titleBorderBottom"></span>
                    </div>
                </div>
                @include('frontend.common.work_flow')
            </div>

        </div>
    </section>



@endsection
