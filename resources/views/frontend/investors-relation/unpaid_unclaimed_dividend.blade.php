@extends('frontend.layouts.master')
@section('title', 'Unpaid Unclaimed Dividend')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($unpaid_unclaimed_dividend > '50'))
                <style>
                    @media(max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
            @else
            @endif
                <h2 class="fw-bold">{{ $unpaid_unclaimed_dividend->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ $unpaid_unclaimed_dividend->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $unpaid_unclaimed_dividend->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row cus_mt_20 cus_mb_20 justify-content-center">
            @foreach ($unpaid_unclaimed_dividend_list as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 cus_mt_10 cus_mb_10">
                    <div class="director_report_card h-100">
                        <div class="title">
                            <h4>{{ $item->{app()->getLocale() . '_title'} }} {{ $item->{app()->getLocale() . '_year'} }}</h4>
                            <span class="titleBorderBottom"></span>
                        </div>
                        <div class="animation_btn_view">
                            <a href="{{ route('ir.unpaid_unclaimed_dividend_details', $item->id) }}"> <img class="left_icon" src="{{ asset('images/website/view_report.png') }}" alt=""> {{ $unpaid_unclaimed_dividend->{app()->getLocale() . '_btn_text'} }}
                                <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
