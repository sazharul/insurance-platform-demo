@extends('frontend.layouts.master')
@section('title', 'Chairman Profile')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $chairman_profile->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $chairman_profile->{app()->getLocale() . '_title'} }}</span> / <span
                        class="text-success fw-bold">{{ $chairman_profile->{app()->getLocale() . '_title'} }}</span></h6>

            </div>
        </div>
    </div>
    <div class="container cus_mt_20">
        <div class="row profile_area">
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 cus_mt_40">
                <div class="profile_img_box">
                    <img src="{{ asset($chairman_profile->chairman_image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 mt-3 profile_info_area">
                <h1>{{ $chairman_profile->{app()->getLocale() . '_name'} }}</h1>
                <span>{{ $chairman_profile->{app()->getLocale() . '_designation'} }}</span>
                <p>
                    {!! $chairman_profile->{app()->getLocale() . '_details'} !!}
                </p>
            </div>
        </div>
        <div class="row cus_mt_20">
            <div class="col-lg-12">
                <div class="title_with_bottom_border">
                    <h2>{{ $chairman_profile->{app()->getLocale() . '_involvement_title'} }}</h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="timeline_wrapper">
                <div class="center-line">
                    <a href="#" class="scroll-icon"><i class="fas fa-caret-up"></i></a>
                </div>
                @foreach ($chairman_involvement_list as $key => $list)
                    @if($key % 2 == 0)
                        <div class="row row-1">
                            <section>
                                <i class="icon fas fa-home"></i>
                                <div class="designation">
                                    <h4>{{ $list->{app()->getLocale() . '_designation'} }}</h4>
                                </div>
                                <div class="details">
                                    <span class="title">{{ $list->{app()->getLocale() . '_company_name'} }}</span>
                                </div>
                                <p>{{ $list->{app()->getLocale() . '_details_name'} }}</p>
                            </section>
                        </div>
                        @else
                        <div class="row row-2">
                            <section>
                                <i class="icon fas fa-home"></i>
                                <div class="designation">
                                    <h4>{{ $list->{app()->getLocale() . '_designation'} }}</h4>
                                </div>
                                <div class="details">
                                    <span class="title">{{ $list->{app()->getLocale() . '_company_name'} }}</span>
                                </div>
                                <p>{{ $list->{app()->getLocale() . '_details_name'} }}</p>
                            </section>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="title_with_bottom_border">
                    <h2>{{ $chairman_profile->{app()->getLocale() . '_awards_title'} }}</h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            @foreach ($chairman_award_list as $list)
                <div class="col-xxl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="profile_award_card h-100">
                        <img class="text-center" src="{{ asset($list->image) }}" alt="Award Pic">
                        <span>{{ $list->{app()->getLocale() . '_year'} }}</span>
                        <h4>{{ $list->{app()->getLocale() . '_title'} }}</h4>
                        <p>{!! $list->{app()->getLocale() . '_description'} !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
