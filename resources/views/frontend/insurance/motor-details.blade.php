@extends('frontend.layouts.master')
@section('title', 'Motor Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset($product_service->hero_image) }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $product_service->{app()->getLocale() . '_service_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ __('Product and Services') }}</span> / <span
                        class="text-success fw-bold">{{ $product_service->{app()->getLocale() . '_service_name'} }}</span>
                </h6>

            </div>
        </div>
    </div>

    <section class="cus_mb_20">
        <div class="container">
            <div class="row cus_mt_10">
                <div class="col-md-6 col-sm-12">
                    <h4 class="mt-5 fw-bold">{!! $product_service->{app()->getLocale() . '_title'} !!}</h4>
                    <h6 class="text-muted cus_mt_20" style="text-align: justify">
                        {!! $product_service->{app()->getLocale() . '_short_description'} !!}
                    </h6>
                    <div class="animation_btn_view2">
                        <a href="{{ route('ps.motor_insurance') }}" class="">
                            <img class="left_icon" src="{{ asset('images/website/motor_btn.png') }}" alt=""> {{ __('Get Your Insurance') }}
                            <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 ps-5 motor-image">


                    <img class="img-fluid motor_gif" src="{{ asset($product_service->image) }}" alt="">
                </div>
            </div>
            <div class="row cus_mt_20">
                <div class="col-lg-12">
                    <div class="intro_premium_calculator text-center"
                        style="background: url('../images/website/title_bg_box.png'); background-repeat: no-repeat">
                        <h2>{{ __('Comprehensive coverage on Motor Insurance') }}</h2>
                        <span class="titleBorderBottom"></span>
                    </div>
                </div>
            </div>
            <div class="row coverage_container mx-auto">
                @foreach($product_service->coverage as $item)
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-3">
                    <div class="coverage_insurance_card text-center h-100">
                        <div class="coverage_card_img_box">
                            {{-- <img src="{{ asset($coverage_area[26]['color_image']) }}" alt=""> --}}
                            <img class="default_image"
                                        src="{{ asset($item->white_image) }}" alt="">
                                    <img class="active_image" src="{{ asset($item->color_image) }}"
                                        alt="">
                        </div>
                        <span class="coverage_card_line"></span>
                        <p class="coverage_card_content">
                            {!! $item->{app()->getLocale().'_title'} !!}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
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
