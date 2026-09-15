@extends('frontend.layouts.master')
@section('title', 'Investors Relation Department')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
        <div class="breadgram-hero-area">
            @if (strlen($investor_ralation_department > '50'))
            <style>
                @media(max-width: 576px) {
                    .container-fluid .breadgram-image h2 {
                        font-size: 10px !important;
                    }
                }
            </style>
        @else
        @endif
            <h2 class="fw-bold">{{ $investor_ralation_department->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span
                    class="text-dark">{{ $investor_ralation_department->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                    class="text-success fw-bold">{{ $investor_ralation_department->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="code_of_conduct">
            <div class="row cus_mt_20">
                <div class="col-lg-12 coc_hero text-center">
                    <h4> {{ $investor_ralation_department->{app()->getLocale() . '_heading'} }} </h4>
                </div>
                <div class="col-lg-12 text-justify">
                    <p>{!! $investor_ralation_department->{app()->getLocale() . '_description'} !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
