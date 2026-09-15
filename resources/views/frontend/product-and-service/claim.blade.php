@extends('frontend.layouts.master')
@section('title', 'Claim')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{ $claim->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span
                    class="text-dark">{{ $claim->{app()->getLocale() . '_breadcrumb1'} }}</span> / <span
                    class="text-success fw-bold">{{ $claim->{app()->getLocale() . '_breadcrumb2'} }}</span></h6>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="claim_area">
            <div class="row cus_mt_20">
                <div class="col-lg-4 text-center">
                    <img class="img-fluid" src="{{asset($claim->claim_img)}}" alt="hero image">
                </div>
                <div class="col-lg-8">
                    <h1>{!! $claim->{app()->getLocale() . '_claim_heading'} !!}</h1>

                    <p>{!! $claim->{app()->getLocale() . '_claim_description'} !!}</p>
                </div>
            </div>
        </div>
        <div class="claim_area_colored cus_mt_20 cus_mb_20">
            <div class="row mb-3">
                <div class="col-lg-12 text-center mt-3">
                    <h2 class="figure_settlement_heading">{{ $claim->{app()->getLocale() . '_statement_head'} }}</h2>
                </div>
            </div>
            <div class="row claimed_info_area rplr-0">
                <div class="col-lg-5">
                    {!! $claim->{app()->getLocale() . '_claim_state_des'} !!}
                </div>
                <div class="col-lg-7 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 col-6">
                            <div class="claim_data_section">
                                <h4 class="special_one"> {{__('Year')}} </h4>
                            <ul>
                                @foreach ($claim_money as $year)
                                <li style="background: {{$loop->even ? '#d1e7dd' : '#f4f4f4' }}"> {{ $year->{app()->getLocale() . '_claim_year'} }}  </li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-6">
                            <div class="claim_data_section">
                            <h4> {{__('Taka in Milliion')}} </h4>
                            <ul>
                                @foreach ($claim_money as $money)
                                <li style="background: {{$loop->even ? '#d1e7dd' : '#f4f4f4' }}"> {{ $money->{app()->getLocale() . '_claim_money'} }}  </li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
