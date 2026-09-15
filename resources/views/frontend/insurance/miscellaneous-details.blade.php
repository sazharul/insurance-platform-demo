@extends('frontend.layouts.master')
@section('title', 'Miscellaneous Insurance')

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
                <div class="col-md-6 h-100">
                    <h4 class="mt-2 fw-bold">{!! $product_service->{app()->getLocale() . '_title'} !!}</h4>
                    <h6 class="text-muted mt-5" style="text-align: justify; font-size: 14px;">{!! $product_service->{app()->getLocale() . '_short_description'} !!}</h6>
                    <div class="animation_btn_view2">
                        <a href="{{ route('ps.personal_accident_insurance') }}" class="">
                            <img class="left_icon" src="{{ asset('images/website/motor_btn.png') }}" alt=""> {{ __('Get Your Insurance') }}
                            <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 h-100">
                    <img class="img-fluid miscellaneous_gif" src="{{ asset('images/website/Group 48095917.png') }}"
                        alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro_title_panel text-center"
                        style="background: url('../images/website/title_bg_box.png'); background-repeat: no-repeat">
                        <h2>{{ __('Miscellaneous insurance covers') }}</h2>
                        <span class="titleBorderBottom"></span>
                    </div>
                </div>
            </div>
            <div class="row cus_mt_20">
                @foreach ($product_service->coverage as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
                        <div class="coverage_list h-100">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="cov_icon_section">
                                        <img src="{{ asset($item->white_image) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="coverage_content">
                                        <p>{!! $item->{app()->getLocale().'_title'} !!}</p>
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
            <div class="row cus_mt_10">
                <div class="col-lg-12">
                    <div class="intro_premium_calculator text-center"
                        style="background: url('../images/website/title_bg_box.png'); background-repeat: no-repeat">
                        <h2>{{ __('Our easy work process for getting Insurance') }}</h2>
                        <span class="titleBorderBottom"></span>
                    </div>
                </div>
                @include('frontend.common.work_flow')
            </div>

        </div>
    </section>



@endsection
