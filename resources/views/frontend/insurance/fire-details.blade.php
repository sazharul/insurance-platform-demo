@extends('frontend.layouts.master')
@section('title', 'Fire Insurance')

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
                <h2 class="fw-bold">{{ $product_service->{app()->getLocale() . '_service_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ __('Product and Services') }}</span> / <span
                        class="text-success fw-bold">{{ $product_service->{app()->getLocale() . '_service_name'} }}</span>
                </h6>

            </div>
        </div>
    </div>

    <section>
        <div class="container cus_mt_20">
            <div class="row">
                <div class="col-md-6 fire-protect">
                    <h4 class="mt-2 fw-bold">{!! $product_service->{app()->getLocale() . '_title'} !!}</h4>
                    <h6 class="mt-5" style="text-align: justify">{!! $product_service->{app()->getLocale() . '_short_description'} !!}</h6>
                    <div class="animation_btn_view2">
                        <a href="{{ route('ps.productAndService') }}" class="">
                            <img class="left_icon" src="{{ asset('images/website/motor_btn.png') }}" alt=""> {{ __('Get Your Insurance') }}
                            <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid fire-protect_main-img" src="{{ asset($product_service->image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="intro_title_panel text-center"
                    style="background: url('../images/website/title_bg_box.png'); background-repeat: no-repeat">
                    <h2>{{ __('An Insured can take the following coverage in Fire policy') }}</h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
        </div>
    </section>


    <section class="cus_mt_20">
        <div class="container">
            <div class="coverage_container">
                <div class="row">
                    @foreach ($product_service->coverage->take(7) as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_10">
                            <div class="coverage_insurance_card text-center">
                                <div class="coverage_card_img_box">
                                    <img class="default_image"
                                        src="{{ asset($item->white_image) }}" alt="">
                                    <img class="active_image" src="{{ asset($item->color_image) }}"
                                        alt="">
                                </div>
                                <span class="coverage_card_line"></span>
                                <p class="coverage_card_content">
                                    {!! $item->{app()->getLocale() . '_title'} !!}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section style="background: #F2F9F6;" class="special_coverage_area">
        <div class="container">
            <div class="row ps_home">
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <div class="intro_premium_calculator text-center" style="background: url('../images/website/title_bg_box.png'); background-repeat: no-repeat">
                            <h2>{{ __('We are also providing the following coverage’s') }}</h2>
                            <span class="titleBorderBottom"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="coverage_container">
                <div class="row">
                    @foreach ($product_service->coverage->skip(7) as $rest_item)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-2">
                            <div class="coverage_insurance_card_white text-center">
                                <div class="coverage_card_img_box">
                                    <img class="default_image"
                                        src="{{ asset($rest_item->white_image) }}" alt="">
                                </div>
                                <span class="coverage_card_line"></span>
                                <p class="coverage_card_content">
                                    {!! $rest_item->{app()->getLocale().'_title'} !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row cus_mt_20">
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
