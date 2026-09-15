@extends('frontend.layouts.master')
@section('title', 'CEO Profile')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $ceo_profile->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3">
                    <span class="text-dark">{{ $ceo_profile->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span class="text-success fw-bold">{{ $ceo_profile->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>

            </div>
        </div>
    </div>
    <div class="container cus_mt_20">
        <div class="row profile_area cus_mt_20 cus_mb_20">
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 cus_mt_40 res-mt-3">
                <div class="profile_img_box">
                    <img src="{{ asset($ceo_profile->image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 mt-3 profile_info_area">
                <h1>{{ $ceo_profile->{app()->getLocale() . '_name'} }}</h1>
                <span>{{ $ceo_profile->{app()->getLocale() . '_designation'} }}</span>
                <p>{!! $ceo_profile->{app()->getLocale() . '_details'} !!}</p>
            </div>
        </div>
    </div>
@endsection
