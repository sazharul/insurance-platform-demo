@extends('frontend.layouts.master')
@section('title', 'Board of Directors')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($board_of_directors > '50'))
                <style>
                    @media(max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
            @else
            @endif
                <h2 class="fw-bold">{{ $board_of_directors->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $board_of_directors->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $board_of_directors->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>
            </div>
        </div>
    </div>
    <div class="container mt-20">

        @php
            $chairman_info = $designation->chairmanInfo;
        @endphp

        <div class="row">
            <div class="col-lg-12 mobile_bods">
                <div class="board_of_director_card_section">
                    <div class="row all_bods">
                        <div class="col-lg-4 col-md-3 col-sm-12 col-12">
                            <div class="chairman_left_image_section">
                                <div class="profile_img_box">
                                    <img src="{{ (isset($chairman_info)) ? asset($chairman_info->image) : '' }}" alt="">
                                    <span class="director_image_frame"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-12 col-12 mt-3 profile_info_area">
                            <h3>{{ (isset($chairman_info)) ? $chairman_info->{app()->getLocale() . '_name'} : '' }}</h3>
                            <span>{{ $designation->{app()->getLocale() . '_name'} }}</span>
                            <p>{!! \Illuminate\Support\Str::words( $chairman_info->{app()->getLocale() . '_details'}, 30, '...') !!}</p>
                            <a href="{{ route('bods_profile', $chairman_info->id) }}"> {{ __('View Profile') }}
                                <img src="{{ asset('images/website/arrow_profile.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($board_category as $cateygory)


        <div class="row">
            <div class="col-lg-12">
                <div class="intro_premium_calculator text-center">
                    <h2><span>{{ $cateygory->{app()->getLocale() . '_name'} }}</span></h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
        </div>

        <div class="row cus_mb_20">

            @foreach ($cateygory->boardMember as $board_member)

            @if ($board_member->designation->en_name != 'Chairman')
            <div class="col-lg-6 mobile_bods cus_mt_10">
                <div class="board_of_director_card_section">
                    <div class="row all_bods cus_mt_10">
                        <div class="col-lg-4 col-md-3 col-sm-12 col-12">
                            <div class="profile_img_box">
                                @if ($board_member->image)
                                <img src="{{ asset($board_member->image) }}" alt="">
                                @else
                                <img src="{{ asset('images/website/person_blank.png') }}" alt="">
                                @endif
                                <span class="director_image_frame"></span>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-12 col-12 cus_mt_10 profile_info_area">
                            <h3>{{ $board_member->{app()->getLocale() . '_name'} }}</h3>
                            <span>{{ $board_member->designation->{app()->getLocale() . '_name'} }}</span>
                            <p>{!! \Illuminate\Support\Str::words($board_member->{app()->getLocale() . '_details'}, 30, '...') !!}</p>
                            <a href="{{ route('bods_profile', $board_member->id) }}"> {{ __('View Profile') }}
                                <img src="{{ asset('images/website/arrow_profile.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>

        @endforeach
    </div>
@endsection
