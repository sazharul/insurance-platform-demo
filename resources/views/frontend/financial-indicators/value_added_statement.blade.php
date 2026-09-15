@extends('frontend.layouts.master')
@section('title', 'Value Added Statement')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($value_added_statement > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $value_added_statement->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $value_added_statement->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $value_added_statement->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row cus_mb_20 justify-content-center">
                @foreach ($value_added_statement_list as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 cus_mt_20">
                        <div class="report_card_custom h-100">
                            <div class="left-info">
                                <a href="{{ route('fi.value_added_statement_details', $item->id) }}">
                                    <h4>{{ $item->{app()->getLocale() . '_title'} }}
                                        <span>{{ $item->{app()->getLocale() . '_year'} }}</span>
                                    </h4>
                                </a>
                                <span class="annual-line"></span>
                                <div class="animation_btn_view">
                                    <a href="{{ route('fi.value_added_statement_details', $item->id) }}" class="">
                                        <img class="left_icon" src="{{ asset('images/website/view_report.png') }}"
                                            alt=""> {{ $value_added_statement->{app()->getLocale() . '_btn_text'} }}
                                        <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            @if ($item->image)
                                <div class="right-info">
                                    <a href="{{ route('fi.value_added_statement_details', $item->id) }}">

                                        <img class="" src="{{ asset($item->image) }}" alt="">
                                    </a>
                                </div>
                            @else
                                <div class="right-info">
                                    <a href="{{ route('fi.annual.report.details', $item->id) }}">

                                        <img class="default_img" src="{{ asset('images/website/Group 48095538.png') }}"
                                            alt="">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
