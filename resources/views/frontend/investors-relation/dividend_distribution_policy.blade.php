@extends('frontend.layouts.master')
@section('title', 'Dividend Distribution Policy')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $dividend_distribution_policy->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ $dividend_distribution_policy->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $dividend_distribution_policy->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="code_of_conduct">
                <div class="row">
                    <div class="col-lg-12 coc_hero">
                        <h4>{{ $dividend_distribution_policy->{app()->getLocale() . '_heading'} }}</h4>
                        <a class="download_btn" href="{{asset($dividend_distribution_policy->pdf_file)}}" download>
                            <img src="{{asset('images/website/download_icon.png')}}" alt=""> {{ $dividend_distribution_policy->{app()->getLocale() . '_btn_text'} }}
                        </a>
                    </div>
                </div>

                <div class="row cus_mb_30 cus_mt_20">
                    <div class="col-lg-12 pdf_view">
                        <iframe height="100%" width="100%" src="{{asset($dividend_distribution_policy->pdf_file)}}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
