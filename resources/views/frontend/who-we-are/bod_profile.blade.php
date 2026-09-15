@extends('frontend.layouts.master')
@section('title', 'Board of Directors')

@section('content')
@php
$board_of_directors = App\Models\BoardOfDirector::first();
@endphp
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold"> {{__('Board of Directors Profile')}} </h2>
            <h6 class="text-center mt-3"><span class="text-dark"> {{__('Who we are')}} </span> / <span
                    class="text-success fw-bold"> <a class="text-success" href="{{route('board_of_directors')}}">{{ $board_of_directors->{app()->getLocale() . '_breadcrumb_2'} }}</a> </span> / <span class="text-dark"> {{ $board_of_directors->{app()->getLocale() . '_breadcrumb_3'} }} {{ $bod_details->{app()->getLocale() . '_name'} }} </span></h6>

        </div>
    </div>
</div>
    <div class="container mt-50">
        <div class="row profile_area mb-5">
            <div class="col-lg-12">
                <div class="profile_back_btn_area">
                    <a class="profile_back_btn" href="{{route('board_of_directors')}}"> <img src="{{asset('images/website/report_arrow.png')}}" alt=""> Go Back</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 mt-3">
                <div class="profile_img_box">
                    <img src="{{ asset($bod_details->image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 mt-3 profile_info_area">
                <h1>{{ $bod_details->{app()->getLocale() . '_name'} }}</h1>
                <span>{{ $bod_details->designation->{app()->getLocale() . '_name'} }}</span>
                <p>
                    {!! $bod_details->{app()->getLocale() . '_details'} !!}
                </p>
            </div>
        </div>
    </div>
@endsection
