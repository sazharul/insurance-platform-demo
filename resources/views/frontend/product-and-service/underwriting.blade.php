@extends('frontend.layouts.master')
@section('title', 'Underwriting')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{ $underwriting->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span
                    class="text-dark">{{ $underwriting->{app()->getLocale() . '_breadcrumb1'} }}</span> / <span
                    class="text-success fw-bold">{{ $underwriting->{app()->getLocale() . '_breadcrumb2'} }}</span></h6>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row text-center cus_mt_10">
            <div class="col-lg-12">
                <img class="underwriting_hero_img" src="{{asset($underwriting->underwriting_img)}}" alt="hero image">
            </div>
        </div>
        <div class="row text-center underwriting_hero_area">
            <div class="col-lg-12">
                {!! $underwriting->{app()->getLocale() . '_under_des'} !!}
            </div>
        </div>
        <div class="row underwriting_body text-center">
            <div class="col-lg-12">
                <a class="btn experience_btn" href="javascript:void(0)"> {{ $underwriting->{app()->getLocale() . '_exp_num'} }} </a>
            </div>
            <div class="col-lg-12 cus_mt_20">
                {!! $underwriting->{app()->getLocale() . '_under_des_last'} !!}
            </div>
        </div>
    </div>
</div>
@endsection
