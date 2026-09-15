@extends('frontend.layouts.master')
@section('title', 'Marine Cargo Insurance')

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

    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 marine-cargo-ins">
                    <h4 class="mt-2 fw-bold">{!! $product_service->{app()->getLocale() . '_title'} !!}</h4>
                    <p class="mt-3" style="text-align: justify; font-size: 14px;">{!! $product_service->{app()->getLocale() . '_short_description'} !!}</p>
                    <div class="animation_btn_view2">
                        <a href="{{ route('ps.marine_cargo_insurance') }}" class="">
                            <img class="left_icon" src="{{ asset('images/website/motor_btn.png') }}" alt=""> {{ __('Get Your Insurance') }}
                            <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid marine-cargo-main-img" src="{{ asset($product_service->image) }}" alt="">
                </div>
            </div>
            <div class="row cus_mt_20">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <img src="{{ asset($product_service_twice->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <div class="row mt-2 ps-5">
                        <h4><span class="text-dark fw-bold" style="font-size: 28px">{!! $product_service_twice->{app()->getLocale() . '_title'} !!}</h4>
                    </div>

                    <div class="row mt-3 ps-5">
                        <p class="ms-0 fw-bold" style="font-size: 16px">{!! $product_service_twice->{app()->getLocale() . '_short_description'} !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mt-2 fw-bold" style="font-size: 28px"><span
                            style="font-size: 28px">{{ __('Protection for the unpredictable sea') }} <br></span>
                        <span class="text-success" style="font-size: 32px"> {{ __('Marine Hull Insurance') }}</span>
                    </h2>
                </div>
            </div>
            {{-- for 992 to mobile start --}}
                <div class="row cus_mt_20 marine_small_device" style="display: none;">
                    <div class="col-lg-12 text-center">
                        <img class="img-fluid" src="{{ asset('backend/img/marin_middle_image.png') }}" alt="">
                    </div>
                    {{-- @foreach ($product_service->coverage as $item) --}}
                        <div class="col-md-4 col-sm-6 col-12 cus_mt_20">
                            <div class="coverage_insurance_card text-center">
                                <div class="coverage_card_img_box">
                                    {{-- <img src="{{ asset($coverage_area[26]['color_image']) }}" alt=""> --}}
                                    <img class="default_image" src="{{ asset($product_service->coverage[0]->white_image) }}"
                                        alt="">
                                    <img class="active_image" src="{{ asset($product_service->coverage[0]->color_image) }}"
                                        alt="">
                                </div>
                                <span class="coverage_card_line"></span>
                                <p class="coverage_card_content">
                                    {!! $product_service->coverage[0]->{app()->getLocale() . '_title'} !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 cus_mt_20">
                            <div class="coverage_insurance_card text-center">
                                <div class="coverage_card_img_box">
                                    {{-- <img src="{{ asset($coverage_area[26]['color_image']) }}" alt=""> --}}
                                    <img class="default_image" src="{{ asset($product_service->coverage[1]->white_image) }}"
                                        alt="">
                                    <img class="active_image" src="{{ asset($product_service->coverage[1]->color_image) }}"
                                        alt="">
                                </div>
                                <span class="coverage_card_line"></span>
                                <p class="coverage_card_content">
                                    {!! $product_service->coverage[1]->{app()->getLocale() . '_title'} !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 cus_mt_20">
                            <div class="coverage_insurance_card text-center">
                                <div class="coverage_card_img_box">
                                    {{-- <img src="{{ asset($coverage_area[26]['color_image']) }}" alt=""> --}}
                                    <img class="default_image" src="{{ asset($product_service->coverage[2]->white_image) }}"
                                        alt="">
                                    <img class="active_image" src="{{ asset($product_service->coverage[2]->color_image) }}"
                                        alt="">
                                </div>
                                <span class="coverage_card_line"></span>
                                <p class="coverage_card_content">
                                    {!! $product_service->coverage[2]->{app()->getLocale() . '_title'} !!}
                                </p>
                            </div>
                        </div>
                    {{-- @endforeach --}}
                </div>
            {{-- for 992 to mobile end --}}
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            {{-- for 1200 and up start --}}
            <div class="row marine_large_device">
                <div class="col-md-2 mt-5">
                    <div class="coverage_insurance_card text-center">
                        <div class="coverage_card_img_box">
                            {{-- <img src="{{ asset($coverage_area[26]['color_image']) }}" alt=""> --}}
                            <img class="default_image" src="{{ asset($product_service->coverage[0]->white_image) }}"
                                alt="">
                            <img class="active_image" src="{{ asset($product_service->coverage[0]->color_image) }}"
                                alt="">
                        </div>
                        <span class="coverage_card_line"></span>
                        <p class="coverage_card_content">
                            {!! $product_service->coverage[0]->{app()->getLocale() . '_title'} !!}
                        </p>
                    </div>

                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('backend/img/marin_middle_image.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="coverage_insurance_card text-center">
                                <div class="coverage_card_img_box">
                                    {{-- <img src="{{ asset($coverage_area[26]['color_image']) }}" alt=""> --}}
                                    <img class="default_image"
                                        src="{{ asset($product_service->coverage[1]->white_image) }}" alt="">
                                    <img class="active_image" src="{{ asset($product_service->coverage[1]->color_image) }}"
                                        alt="">
                                </div>
                                <span class="coverage_card_line"></span>
                                <p class="coverage_card_content">
                                    {!! $product_service->coverage[1]->{app()->getLocale() . '_title'} !!}
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="row cus_mt_20">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="coverage_insurance_card text-center">
                                <div class="coverage_card_img_box">
                                    {{-- <img src="{{ asset($coverage_area[26]['color_image']) }}" alt=""> --}}
                                    <img class="default_image"
                                        src="{{ asset($product_service->coverage[2]->white_image) }}" alt="">
                                    <img class="active_image" src="{{ asset($product_service->coverage[2]->color_image) }}"
                                        alt="">
                                </div>
                                <span class="coverage_card_line"></span>
                                <p class="coverage_card_content">
                                    {!! $product_service->coverage[2]->{app()->getLocale() . '_title'} !!}
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            {{-- for 1200 and up start --}}
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row>
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
