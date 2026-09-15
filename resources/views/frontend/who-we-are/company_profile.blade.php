@extends('frontend.layouts.master')
@section('title', 'Company Profile')

@section('content')

    <div class="container cus_mt_20 res-mt-50">
        <div class="row cus_mb_20 company_profile">
            <div class="col-lg-6 col-md-4 col-sm-12 col-12 text-center">
                <div class="company_profile_image">
                    <img class="img-fluid" src="{{ asset($company_profile->company_image) }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12 col-12">
                {!! $company_profile->{app()->getLocale() . '_company_details'} !!}

                <p class="cus_mt_10">{{ $company_profile->{app()->getLocale() . '_maintain_title'} }}</p>

                <div class="row">

                    @foreach ($company_profile->{app()->getLocale() . '_maintaining_list'} as $items)
                        <div class="col-lg-1 col-md-1 col-sm-1 col-1">
                            <img src="{{ asset('images/website/item_list_icon.png') }}" alt="">
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-11">{{ $items }}</div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="row office_info">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12 text-center">
                <img class="img-fluid" src="{{ asset($company_profile->building_img) }}" alt="">
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6 col-12 middle_info cus_mt_30">
                <div class="title">
                    <h2>{{ $company_profile->{app()->getLocale() . '_register_name'} }}</h2>
                    <span class="titleBorderBottom"></span>
                    <h1>{{ $company_profile->{app()->getLocale() . '_register_title'} }}</h1>
                    <h2>{{ $company_profile->{app()->getLocale() . '_register_office'} }}</h2>
                    <span class="titleBorderBottom"></span>
                    <h1>{{ $company_profile->{app()->getLocale() . '_register_address'} }}</h1>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-12">
                <div class="row right_info plr-20">
                    <div class="col-lg-12 info">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-2 text-center">
                                <img src="{{ asset($company_profile->incorporation_icon) }}" alt="">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-9 col-10">
                                <span>{{ $company_profile->{app()->getLocale() . '_incorporation_title'} }}</span>
                                <p>{{ $company_profile->{app()->getLocale() . '_incorporation_date'} }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 info mt-3">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-2 text-center">
                                <img src="{{ asset($company_profile->incorporation_icon) }}" alt="">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-9 col-10">
                                <span>{{ $company_profile->{app()->getLocale() . '_commencement_of_business'} }}</span>
                                <p>{{ $company_profile->{app()->getLocale() . '_commencement_of_date'} }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row company_info cus_mb_30 cus_mt_30 body-bg-img">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 info_div">
                <p>{{ $company_profile->{app()->getLocale() . '_listing_stock_dh'} }}</p>
                <p class="year">{{ $company_profile->{app()->getLocale() . '_listing_stock_dh_date'} }}</p>
                <span></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 info_div">
                <p>{{ $company_profile->{app()->getLocale() . '_listing_stock_ch'} }}</p>
                <p class="year">{{ $company_profile->{app()->getLocale() . '_listing_stock_ch_date'} }}</p>
                <span></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 info_div">
                <p>{{ $company_profile->{app()->getLocale() . '_allotment_of_public_date'} }}</p>
                <p class="year">{{ $company_profile->{app()->getLocale() . '_allotment_of_public'} }}</p>
                <span></span>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12 info_div info_div_active">
                <div class="row">
                    <div class="col-lg-12 info_div_right">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-2 text-center">
                                <img src="{{ asset($company_profile->capital_icon) }}" alt="">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-10">
                                <p>{{ $company_profile->{app()->getLocale() . '_paid_capital_title'} }}</p>
                                <p>{{ $company_profile->{app()->getLocale() . '_paid_capital_info'} }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 info_div_right">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-2 text-center">
                                <img src="{{ asset($company_profile->capital_icon) }}" alt="">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-10">
                                <p>{{ $company_profile->{app()->getLocale() . '_authorized_capital_title'} }}</p>
                                <p>{{ $company_profile->{app()->getLocale() . '_authorized_capital_info'} }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container company_short_info_panel ptb-30">
        <div class="row">
            @foreach ($company_profile->{app()->getLocale() . '_value_details'} as $items)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 short_info_div text-center">
                    <p>{{ $items->{app()->getLocale() . '_value'} }}</p>
                    <span>{{ $items->{app()->getLocale() . '_description'} }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-170">
        <div class="row">
            <div class="col-lg-12">
                <div class="company_profile_bg_bar">
                    @foreach ($company_profile->{app()->getLocale() . '_asset_details'} as $asset)
                        <div class="cp_items">
                            <span class="circle mb-2"><img src="{{ asset(isset($asset->icon) ? $asset->icon : '') }}" alt=""></span>
                            <p> {!! $asset->asset !!} </p>
                            <p> {{ $asset->description }} </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mission_vission_body company_info mb-2 mt-3">
            <div class="body_left col-lg-6 col-md-6 col-sm-12 mt-5 mb-5 text-center">
                <div class="rotate_box1">
                    <div class="rotate_box2">
                        <img src="{{ asset($company_profile->sponsor_image_thumbnail) }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12">
                <h3>{!! $company_profile->{app()->getLocale() . '_sponsor_title'} !!}</h3>
                    <div class="sponsor_div1">
                        <div class="sponsor_img_box">
                            <img src="{{ asset($company_profile->{app()->getLocale() . '_sponsor_details'}[0]->image) }}" alt="">
                        </div>
                        <div class="sponsor_info_box">
                            <h4>{!! $company_profile->{app()->getLocale() . '_sponsor_details'}[0]->title !!}</h4>
                            <p>{!! $company_profile->{app()->getLocale() . '_sponsor_details'}[0]->description !!}
                            </p>
                        </div>
                    </div>

                <div class="sponsor_div2 mt-3">
                    <div class="sponsor_img_box text-center">
                        <img src="{{ asset( $company_profile->{app()->getLocale() . '_sponsor_details'}[1]->image) }}" alt="">
                    </div>
                    <div class="sponsor_info_box">
                        <h4>{!! $company_profile->{app()->getLocale() . '_sponsor_details'}[1]->title !!}</h4>
                        <p>{!! $company_profile->{app()->getLocale() . '_sponsor_details'}[1]->description !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
