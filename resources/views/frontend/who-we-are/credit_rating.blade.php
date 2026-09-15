@extends('frontend.layouts.master')
@section('title', 'Credit Rating')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{ $credit_rating->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span
                    class="text-dark">{{ $credit_rating->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                    class="text-success fw-bold">{{ $credit_rating->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="code_of_conduct">
            <div class="row">
                <div class="col-lg-12 coc_hero">
                    <h4>{{ $credit_rating->{app()->getLocale() . '_subject'} }}</h4>
                    <a class="download_btn" href="{{asset($credit_rating->pdf_file)}}"> <img src="{{asset('images/website/download_icon.png')}}" alt=""> {{__('Download')}} </a>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-lg-12 pdf_view">
                    <iframe height="100%" width="100%" src="{{asset($credit_rating->pdf_file)}}"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
