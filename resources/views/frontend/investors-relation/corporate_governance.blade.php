@extends('frontend.layouts.master')
@section('title', 'Corporate Governance')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
        <div class="breadgram-hero-area">
            @if (strlen($corporate_governance > '50'))
            <style>
                @media(max-width: 576px) {
                    .container-fluid .breadgram-image h2 {
                        font-size: 10px !important;
                    }
                }
            </style>
        @else
        @endif
            <h2 class="fw-bold">{{ $corporate_governance->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span
                    class="text-dark">{{ $corporate_governance->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                    class="text-success fw-bold">{{ $corporate_governance->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="code_of_conduct">
            <div class="row cus_mt_20">
                <div class="col-lg-12 coc_hero">
                    <h4>{{ $corporate_governance->{app()->getLocale() . '_subject'} }}</h4>
                    <a class="download_btn" href="{{asset($corporate_governance->pdf_file)}}"> <img src="{{asset('images/website/download_icon.png')}}" alt=""> {{__('Download')}} </a>
                </div>
            </div>
            <div class="row cus_mt_20 cus_mb_20">
                <div class="col-lg-12 pdf_view">
                    <iframe height="100%" width="100%" src="{{asset($corporate_governance->pdf_file)}}"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
