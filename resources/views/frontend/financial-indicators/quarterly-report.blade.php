@extends('frontend.layouts.master')
@section('title', 'Quarterly Report')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/Frame 1 (5).png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $quarterly_report->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $quarterly_report->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold"> {{ $quarterly_report->{app()->getLocale() . '_breadcrumb_2'} }} </span>
                </h6>

            </div>
        </div>
    </div>
    <section class="cus_mb_20">
        <div class="container">
            <div class="row employee_page justify-content-center">
                @php
                    $current_year = '1971';
                @endphp
                @foreach ($quarterly_report_list as $item)
                    @if ($item->en_year != $current_year)
                        <div class="col-lg-12 text-center cus_mt_20">
                            <h3><span class="title_line1"></span>{{ $item->{app()->getLocale() . '_year'} }}<span
                                    class="title_line2"></span></h3>
                        </div>
                        @php
                            $current_year = $item->en_year;
                        @endphp
                    @endif
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 cus_mt_10">
                        <div class="report_card_custom h-100">
                            <div class="left-info">
                                <a href="{{ route('fi.quarterly.report.details', $item->id) }}"><h4>{{ $item->{app()->getLocale() . '_title'} }}
                                    <span>{{ $item->{app()->getLocale() . '_year'} }}</span></h4></a>
                                <span class="annual-line"></span>
                                <div class="animation_btn_view">
                                    <a href="{{ route('fi.quarterly.report.details', $item->id) }}" class="">
                                        <img class="left_icon" src="{{ asset('images/website/view_report.png') }}"
                                            alt=""> {{ $quarterly_report->{app()->getLocale() . '_btn_text'} }}
                                        <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            @if ($item->image)
                                <div class="right-info">
                                    <a href="{{ route('fi.quarterly.report.details', $item->id) }}">
                                        <img class="" src="{{ asset($item->image) }}" alt="">
                                    </a>
                                </div>
                            @else
                                <div class="right-info">
                                    <a href="{{ route('fi.quarterly.report.details', $item->id) }}">
                                        <img class="default_img" src="{{ asset('images/website/Group 48095538.png') }}"   alt="">
                                    </a>

                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
