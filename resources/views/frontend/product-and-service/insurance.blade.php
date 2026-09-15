@extends('frontend.layouts.master')
@section('title', 'Products and services Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset($product_service['0']->hero_image) }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $product_service[0]->{app()->getLocale() . '_service_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ __('Home') }}</span> / <span
                        class="text-success fw-bold">{{ $product_service[0]->{app()->getLocale() . '_service_name'} }}</span>
                </h6>

            </div>
        </div>
    </div>
    <section>
        <div class="container">

            <div class="row cus_mt_20 ps_home">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 cus_mt_10">
                    <h1>{!! $product_service['0']->{app()->getLocale() . '_title'} !!}</h1>
                    <p>{!! $product_service[0]->{app()->getLocale() . '_short_description'} !!}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 cus_mt_20">
                    <img class="img-fluid hero_main_image" src="{{ asset($product_service['0']['image']) }}" alt="">
                </div>
            </div>
            <div class="row cus_mt_20 ps_home">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro_premium_calculator text-center"
                            style="background: url('../images/website/title_bg_box.png'); background-repeat: no-repeat">
                            <h2>{{ __('We’re providing most exclusive insurance services') }}</h2>
                            <span class="titleBorderBottom"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cus_mb_20 ps_home">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_20">
                    <a href="{{ route('ps.fire.insurance.details') }}">
                        <div class="ps_home_card insurance-icon h-100 ">
                            <div class="img-shadow">
                                <div class="overlay">
                                </div>
                                {{-- <img src="{{ asset('images/website/Rectangle 24789.png') }}" alt=""> --}}
                                <img src="{{ asset($product_service[1]['image']) }}" alt="">
                            </div>
                            <div class="card icon-card">
                                <img class="default_image" src="{{ asset($product_service[1]['color_icon']) }}"
                                    alt="">
                                <img class="active_image" src="{{ asset($product_service[1]['white_icon']) }}"
                                    alt="">
                            </div>

                            <div class="card-body">
                                <div class="line">
                                    <img src="{{ asset('images/website/Line 28.jpg') }}" alt="">
                                </div>
                                <h5>{!! $product_service[1]->{app()->getLocale() . '_service_name'} !!}</h5>
                                @if (app()->getLocale() == 'en')
                                    <h6> {!! $product_service[1]->en_short_description !!}</h6>
                                @else
                                    <h6>{!! strip_tags(substr($product_service[1]->bn_short_description, 0, 200)) !!}</h6>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_20">
                    <a href="{{ route('ps.motor.insurance.details') }}">
                        <div class="ps_home_card insurance-icon h-100 ">
                            <div class="img-shadow">
                                <div class="overlay">
                                </div>
                                <img src="{{ asset($product_service[4]['image']) }}" alt="">
                            </div>
                            <div class="card icon-card">
                                <img class="default_image" src="{{ asset($product_service[4]['color_icon']) }}"
                                    alt="">
                                <img class="active_image" src="{{ asset($product_service[4]['white_icon']) }}"
                                    alt="">
                            </div>
                            <div class="card-body">
                                <div class="line">
                                    <img src="{{ asset('images/website/Line 28.jpg') }}" alt="">
                                </div>
                                <h5>{!! $product_service[4]->{app()->getLocale() . '_service_name'} !!}</h5>
                                @if (app()->getLocale() == 'en')
                                    <h6> {!! $product_service[4]->en_short_description !!}</h6>
                                @else
                                    <h6>{!! strip_tags(substr($product_service[4]->bn_short_description, 0, 200)) !!}</h6>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_20">
                    <a href="{{ route('ps.marine.cargo.insurance.details') }}">
                        <div class="ps_home_card insurance-icon h-100 ">
                            <div class="img-shadow">
                                <div class="overlay">
                                </div>
                                <img src="{{ asset($product_service[2]['image']) }}" alt="">
                            </div>
                            <div class="card icon-card">
                                <img class="default_image" src="{{ asset($product_service[2]['color_icon']) }}"
                                    alt="">
                                <img class="active_image" src="{{ asset($product_service[2]['white_icon']) }}"
                                    alt="">
                            </div>

                            <div class="card-body">
                                <div class="line">
                                    <img src="{{ asset('images/website/Line 28.jpg') }}" alt="">
                                </div>
                                <h5>{!! $product_service[2]->{app()->getLocale() . '_service_name'} !!}</h5>
                                @if (app()->getLocale() == 'en')
                                    <h6> {!! $product_service[2]->en_short_description !!}</h6>
                                @else
                                    <h6>{!! strip_tags(substr($product_service[2]->bn_short_description, 0, 200)) !!}</h6>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_20">
                    <a href="{{ route('ps.miscellaneous.insurance.details') }}">
                        <div class="ps_home_card insurance-icon h-100 ">
                            <div class="img-shadow">
                                <div class="overlay">
                                </div>
                                <img src="{{ asset($product_service[6]['image']) }}" alt="">
                            </div>
                            <div class="card icon-card">
                                <img class="default_image" src="{{ asset($product_service[6]['color_icon']) }}"
                                    alt="">
                                <img class="active_image" src="{{ asset($product_service[6]['white_icon']) }}"
                                    alt="">
                            </div>

                            <div class="card-body">
                                <div class="line">
                                    <img src="{{ asset('images/website/Line 28.jpg') }}" alt="">
                                </div>
                                <h5>{!! $product_service[6]->{app()->getLocale() . '_service_name'} !!}</h5>
                                @if (app()->getLocale() == 'en')
                                    <h6> {!! $product_service[6]->en_short_description !!}</h6>
                                @else
                                    <h6>{!! strip_tags(substr($product_service[6]->bn_short_description, 0, 200)) !!}</h6>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_20">
                    <a href="{{ route('ps.engineering.insurance.details') }}">
                        <div class="ps_home_card insurance-icon h-100 ">
                            <div class="img-shadow">
                                <div class="overlay">
                                </div>
                                <img src="{{ asset($product_service[5]['image']) }}" alt="">
                            </div>
                            <div class="card icon-card">
                                <img class="default_image" src="{{ asset($product_service[5]['color_icon']) }}"
                                    alt="">
                                <img class="active_image" src="{{ asset($product_service[5]['white_icon']) }}"
                                    alt="">
                            </div>

                            <div class="card-body">
                                <div class="line">
                                    <img src="{{ asset('images/website/Line 28.jpg') }}" alt="">
                                </div>
                                <h5>{!! $product_service[5]->{app()->getLocale() . '_service_name'} !!}</h5>
                                @if (app()->getLocale() == 'en')
                                    <h6> {!! $product_service[5]->en_short_description !!}</h6>
                                @else
                                    <h6>{!! strip_tags(substr($product_service[5]->bn_short_description, 0, 200)) !!}</h6>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
