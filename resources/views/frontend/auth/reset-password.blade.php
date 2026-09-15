@extends('frontend.layouts.master')
@section('title', 'Reset Password')

@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ __('Reset Password') }}</h2>
                <h6 class="text-center mt-3"><span> <a class="text-black fw-bold"
                            href="{{ route('fi.annual.report') }}">{{ __('Home') }}</a> </span> / <span
                        class="text-success fw-bold"> {{ __('Reset password') }} </span></h6>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="code_of_conduct">
                <div class="row cus_mt_20 mb-5">
                    <div class="col-lg-12 coc_hero">
                        <form action="{{ route('user.resetPasswordStore') }}" method="post">
                            @csrf
                            <h6 class="bolder mt-3">Password</h6>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input class="filter_card form-control" type="password"
                                        placeholder="Enter your password" name="password">
                                </div>
                            </div>
                            <h6 class="bolder mt-3">Confirm Password</h6>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <input class="filter_card form-control" type="password"
                                        placeholder="Confirm your password" name="password_confirmation">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button type="submit" class="btn btn-primary" style="background-color:#04452B;">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
