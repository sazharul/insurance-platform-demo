@extends('frontend.layouts.master')
@section('title', 'IT Infrastructure')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{ $it_infrastructure->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span
                    class="text-dark">{{ $it_infrastructure->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                    class="text-success fw-bold">{{ $it_infrastructure->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="code_of_conduct">
            <div class="row cus_mt_20">
                <div class="col-lg-12 coc_hero text-center">
                    <h4> {{ $it_infrastructure->{app()->getLocale() . '_heading'} }} </h4>
                </div>
                <div class="col-lg-12 text-justify">
                    <p>{!! $it_infrastructure->{app()->getLocale() . '_description'} !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
