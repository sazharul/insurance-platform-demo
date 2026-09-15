@extends('frontend.layouts.master')
@section('title', 'Quarterly Report Details')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{__('Quarterly Report Details')}}</h2>
            <h6 class="text-center mt-3"><span class="text-dark"> <a class="text-black fw-bold" href="{{route('fi.quarterly.report')}}">{{__('Financial Indicators')}}</a> </span> / <span
                    class="text-success fw-bold">  {{__('Quarterly Report Details')}}</span></h6>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="code_of_conduct">
            <div class="row cus_mt_20">
                <div class="col-lg-12 coc_hero">
                    <h4>{{ $quarterly_report_details->{app()->getLocale() . '_title'} }} {{ $quarterly_report_details->{app()->getLocale() . '_year'} }}</h4>
                    <a class="download_btn" href="{{asset($quarterly_report_details->pdf_file)}}"> <img src="{{asset('images/website/download_icon.png')}}" alt=""> {{__('Download')}} </a>
                </div>
            </div>
            <div class="row cus_mt_20 cus_mb_20">
                <div class="col-lg-12 pdf_view">
                    <iframe height="100%" width="100%" src="{{asset($quarterly_report_details->pdf_file)}}"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
