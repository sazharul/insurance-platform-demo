@extends('frontend.layouts.master')
@section('title', 'Forgot password')

@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ __('Forgot password') }}</h2>
                <h6 class="text-center mt-3"><span> <a class="text-black fw-bold"
                            href="{{ route('fi.annual.report') }}">{{ __('Home') }}</a> </span> / <span
                        class="text-success fw-bold"> {{ __('Forgot password') }} </span></h6>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="code_of_conduct">
                <div class="row cus_mt_20 mb-5">
                    <div class="col-lg-12 coc_hero">
                        <form action="{{ route('user.forgotPasswordStore') }}" method="post">
                            @csrf
                            <h6 class="bolder mt-3">Mobile Number</h6>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input class="filter_card form-control" type="text" placeholder="Enter your mobile number" name="phone">
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button type="submit" class="btn btn-primary" style="background-color:#04452B;">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row cus_mt_20 mb-5">
                    <div class="col-md-6 coc_hero">
                        <h6><span><a href="{{ route('user.login') }}" class="text-success">Already have an account?</a></span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
