@extends('frontend.layouts.master')
@section('title', 'Mission & Vission')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $mission_vission->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $mission_vission->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $mission_vission->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>

            </div>
        </div>
    </div>
    <div class="container cus_mt_20">
        <div class="row mission_vission">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="">
                    <img class="img-fluid" src="{{ asset($mission_vission->main_image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mt-100">
                {!! $mission_vission->{app()->getLocale() . '_details'} !!}
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="intro_premium_calculator text-center">
                    <h2><span> {{ $mission_vission->{app()->getLocale() . '_mission_title'} }} </span></h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
        </div>
        <div class="row mission_vission_body mt-2">
            <div class="body_left col-lg-6 col-md-6 col-sm-12 mb-2 text-center">
                <div class="rotate_box1">
                    <div class="rotate_box2">
                        <img src="{{ asset($mission_vission->mission_image) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-2 num_box">
                        <div class="num_first">
                            {{ __('01') }}
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 mb-2">
                        <div class="info_first">
                            {{ $mission_vission->{app()->getLocale() . '_mission_info_1'} }}
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-1 num_box">
                        <div class="num_sec">
                            {{ __('02') }}
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-11 mb-2">
                        <div class="info_sec">
                            {{ $mission_vission->{app()->getLocale() . '_mission_info_2'} }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="intro_premium_calculator text-center">
                    <h2><span> {{ $mission_vission->{app()->getLocale() . '_vision_title'} }} </span></h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
        </div>
        <div class="row mission_vission_body cus_mb_20 cus_mt_20">
            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-2 num_box">
                        <div class="num_first">
                            {{ __('01') }}
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 mb-2">
                        <div class="info_first">
                            {{ $mission_vission->{app()->getLocale() . '_vision_info_1'} }}
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-1 num_box">
                        <div class="num_sec">
                            {{ __('02') }}
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-11 col-sm-11 col-11 mb-2">
                        <div class="info_sec">
                            {{ $mission_vission->{app()->getLocale() . '_vision_info_2'} }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="body_left col-lg-6 col-md-6 col-sm-12 text-center">
                <div class="rotate_box1 float-end mt-5">
                    <div class="rotate_box2">
                        <img src="{{ asset($mission_vission->vision_image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
