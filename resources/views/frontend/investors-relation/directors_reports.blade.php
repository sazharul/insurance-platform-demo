@extends('frontend.layouts.master')
@section('title', 'Directors Reports')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $directors_reports->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ $directors_reports->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $directors_reports->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row cus_mt_10 cus_mb_20 justify-content-center">
            @foreach ($directors_report_list as $item)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 cus_mt_20">
                <div class="director_report_card h-100">
                    <p><span> {{__('Published date')}} :</span> {{ $item->{app()->getLocale() . '_published_date'} }}</p>
                    <div class="title">
                        <h4>{{ $item->{app()->getLocale() . '_title'} }} {{ $item->{app()->getLocale() . '_year'} }}</h4>
                        <span class="titleBorderBottom"></span>
                    </div>
                    <div class="animation_btn_view">
                        <a href="{{ route('ir.directors_reports_details', $item->id)}}">
                            <img class="left_icon" src="{{ asset('images/website/view_report.png') }}" alt="">
                            {{ $directors_reports->{app()->getLocale() . '_btn_text'} }}
                            <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
