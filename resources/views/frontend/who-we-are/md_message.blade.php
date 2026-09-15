@extends('frontend.layouts.master')
@section('title', 'CEO & MD Message')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($chairman_message > '50'))
                <style>
                    @media(max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
            @else
            @endif
                <h2 class="fw-bold">{{ $chairman_message->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ $chairman_message->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $chairman_message->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

            </div>
        </div>
    </div>
    <div class="container cus_mt_20">
        <div class="row profile_area cus_mb_20">
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 cus_mt_40">
                <div class="profile_img_box">
                    <img src="{{ asset($chairman_message->image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 cus_mt_10 profile_info_area cha_description">
                <img src="{{ asset($chairman_message->arabic_img) }}" alt="" class="cus_mb_20">

                {!! $chairman_message->{app()->getLocale() . '_details'} !!}


                <img src="{{ asset($chairman_message->signature_img) }}" alt="">
                <span class="signature_bottom_line"></span>
                <h4>{{ $chairman_message->{app()->getLocale() . '_name'} }}</h4>
                <span>{{ $chairman_message->{app()->getLocale() . '_designation'} }}</span>
            </div>
        </div>
    </div>
@endsection
