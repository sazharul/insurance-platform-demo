@extends('frontend.layouts.master')
@section('title', 'Notice to the investors')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($notice_investor > '50'))
                <style>
                    @media(max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
            @else
            @endif
                <h2 class="fw-bold">{{ $notice_investor->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ $notice_investor->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $notice_investor->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @php
            $current_year = "1971";
        @endphp
        @foreach ($notice_investor_list as $item)
            @if ($item->en_year != $current_year)
            <div class="col-lg-12 text-center">
                <h2 class="notice_year">{{ $item->{app()->getLocale() .'_year'} }}</h2>
            </div>
            @php
            $current_year = $item ->en_year;
            @endphp
            @endif
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 cus_mb_20">
                <div class="notice_box h-100">
                    <div class="notice_image_box">
                        @if ($item->icon)
                        <img src="{{ asset($item->icon) }}" alt="">
                        @else
                        <img src="{{asset('images/icon/notice.png')}}">
                        @endif
                    </div>
                    <div class="right_notice_box">
                        <a href="{{ route('investor_notice_details', $item->id) }}">
                            <h3>{{ $item->{app()->getLocale() . '_title'} }}</h3>
                        </a>
                        <span>{{ $notice_investor->{app()->getLocale() . '_uploaded_date'} }}</span>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
