@extends('frontend.layouts.master')
@section('title', 'Price Sensitive Information')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($price_sensitive > '50'))
                <style>
                    @media(max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
            @else
            @endif
                <h2 class="fw-bold">{{ $price_sensitive->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ $price_sensitive->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $price_sensitive->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center cus_mt_20 cus_mb_20">
            @foreach ($price_sensitive_list as $item)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 cus_mt_10 cus_mb_10">
                    <div class="annual-report-section querterly-section h-100">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-7 col-8">
                                <h4>{{ $item->{app()->getLocale() . '_title'} }} <span>{{ $item->{app()->getLocale() . '_year'} }}</span></h4>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5 col-4 text-center">
                                <div class="annual-report-icon">
                                    <img src="{{ asset('images/website/Group 48095538.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <p> {{__('Published Date')}}: {{ $item->created_at->format('d-m-y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="animation_btn_view">
                                    <a href="{{ route('ir.price.sensitive.information.details', $item->id)}}" class="">
                                        <img class="left_icon" src="{{ asset('images/website/view_report.png') }}" alt=""> {{ $price_sensitive->{app()->getLocale() . '_btn_text'} }}
                                        <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
