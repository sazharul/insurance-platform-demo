@extends('frontend.layouts.master')
@section('title', 'Reinsurence')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $reinsurance->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $reinsurance->{app()->getLocale() . '_breadcrumb1'} }}</span> / <span
                        class="text-success fw-bold">{{ $reinsurance->{app()->getLocale() . '_breadcrumb2'} }}</span></h6>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="reinsurance_content">
                <div class="row cus_mt_20">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                        <img class="img-fluid" src="{{ asset($reinsurance->reinsurance_hero_img) }}" alt="hero image">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <h2>{!! $reinsurance->{app()->getLocale() . '_reinsurance_description'} !!}</h2>

                        <p class="mb-3">{{ $reinsurance->{app()->getLocale() . '_reinsurance_type_details'} }}</p>
                        <div class="row">
                            @foreach ($reinsurance_type as $type)
                                <div class="col-lg-4">
                                    <div class="">
                                        <img src="{{ asset('images/website/item_list_icon.png') }}" alt="">
                                        <span>{{ $type->{app()->getLocale() . '_reinsurance_type_name'} }}</span>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        <p class="cus_mt_20 cus_mb_20">{{ $reinsurance->{app()->getLocale() . '_reinsurance_type_details2'} }}</p>
                        <div class="reinsurance_ads mb-10">
                            <div class="ads_left">{{ $reinsurance->{app()->getLocale() . '_reinsurance_percentage'} }}
                            </div>
                            <div class="ads_right">{!! $reinsurance->{app()->getLocale() . '_percentage_description'} !!}</span></div>
                        </div>
                        <p>{{ $reinsurance->{app()->getLocale() . '_reinsurance_type_details3'} }}</p>
                    </div>
                    <div class="col-lg-12 text-center">
                        <p class="ads_heading">{!! $reinsurance->{app()->getLocale() . '_reinsurance_coverage_title'} !!}</p>
                    </div>
                </div>
                <div class="row cus_mt_20 cus_mb_20">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        @foreach ($reinsurance_coverage_first as $first_coverage)
                            <div class="reinsurance_coverage_item">
                                <img src="{{ asset('images/website/green_tick.png') }}" alt="">
                                <span>{{ $first_coverage->{app()->getLocale() . '_reinsurance_coverage_name'} }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                        <img class="img-fluid" src="{{ asset($reinsurance->reinsurance_coverage_img) }}" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        @foreach ($reinsurance_coverage_last as $rest_coverage)
                            <div class="reinsurance_coverage_item">
                                <img src="{{ asset('images/website/green_tick.png') }}" alt="">
                                <span>{{ $rest_coverage->{app()->getLocale() . '_reinsurance_coverage_name'} }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row reinsurance_broker cus_mt_20 cus_mb_20">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <img class="img-fluid" src="{{ asset($reinsurance->reinsurance_broker_img) }}" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>{!! $reinsurance->{app()->getLocale() . '_reinsurance_broker_title'} !!}</p>
                        @foreach ($reinsurance_broker as $broker)
                            <div class="reinsurance_coverage_item">
                                <img src="{{ asset('images/website/green_tick.png') }}" alt="">
                                <span>{{ $broker->{app()->getLocale() . '_reinsurance_broker_name'} }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
