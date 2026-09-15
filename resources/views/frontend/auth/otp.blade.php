@extends('frontend.layouts.master')
@section('title', 'OTP verification')

@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ __('OTP verification') }}</h2>
                <h6 class="text-center mt-3"><span> <a class="text-black fw-bold"
                                                       href="{{ route('fi.annual.report') }}">{{ __('Home') }}</a> </span> / <span
                        class="text-success fw-bold"> {{ __('OTP') }} </span></h6>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="code_of_conduct">
                <div class="row cus_mt_20 mb-5">
                    <div class="col-lg-12 coc_hero">
                        <div class="text-center">
                            <p>
                            <form action="{{ route('user.resendOTP') }}" method="post">
                                @csrf
                                <input type="hidden" name="phone" value="{{ session('phone') }}">
                                Enter your otp that was send your mobile number
                                ****{{ substr(session('phone'), -3) }}.
                                <button type="submit" class="btn btn-link">Resend otp</button>
                            </form>
                            </p>
                        </div>
                        <form action="{{ route('user.OTP') }}" method="post">
                            @csrf
                            <input type="hidden" name="ref" value="{{ request()->ref }}" required>
                            <h6 class="bolder mt-3">OTP</h6>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input class="filter_card form-control" type="text" placeholder="Enter your otp" name="otp">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button type="submit" class="btn btn-primary" style="background-color:#04452B;">Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
