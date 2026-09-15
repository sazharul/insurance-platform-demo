@extends('frontend.layouts.master')
@section('title', 'Report & Complains')

@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $report_complain->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $report_complain->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $report_complain->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>
            </div>
        </div>
    </div>

    <div class="container cus_mt_20">
        <div class="row">
            <div class="col-lg-12">
                <div class="complain_heading_info">
                    <h1> {!! $report_complain->{app()->getLocale() . '_heading'} !!} </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="report_middle_info">
                    {!! $report_complain->{app()->getLocale() . '_details'} !!}
                </div>
            </div>
            <div class="col-lg-6 cus_mt_20 cus_mb_30">
                <div class="contact_area">
                    <form action="{{ route('save_complain_message') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h1> {!! $report_complain->{app()->getLocale() . '_form_title'} !!} </h1>
                            </div>
                            <div class="col-lg-12">
                                <div class="input_field">
                                    <input type="text" name="name" class="form-control"
                                        placeholder=" {{ __('Your Name') }} " aria-label="Username">
                                    <img src="{{ asset('images/website/user.png') }}" alt="">
                                    @if ($errors->has('name')) <span class="text-danger">{{ $errors->first('name') }}</span>@endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input_field">
                                    <input type="email" name="email" class="form-control"
                                        placeholder=" {{ __('Your Email') }} " aria-label="Username">
                                    <img src="{{ asset('images/website/email.png') }}" alt="">
                                    @if ($errors->has('email')) <span class="text-danger">{{ $errors->first('email') }}</span>@endif
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="input-group">
                                    <textarea name="message" id="" class="form-control" cols="30" rows="5"
                                        placeholder=" {{ __('Tell us your complains...') }} "></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @if ($errors->has('message')) <span class="text-danger">{{ $errors->first('message') }}</span>@endif
                            </div>
                            <div class="col-lg-12">
                                <button class="contact_us_btn"> {{ __('Send') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
