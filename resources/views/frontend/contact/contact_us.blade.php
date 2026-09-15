@extends('frontend.layouts.master')
@section('title', 'Contact US')

@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/contact_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $contact_us->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $contact_us->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $contact_us->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>

    <div class="container cus_mt_20 cus_mb_20">
        <div class="row">
            <div class="col-lg-4 col-12 cus_mt_20 cus_mb_20">
                <h1 class="contact_title ">{{ $contact_us->{app()->getLocale() . '_heading'} }}</h1>
                <div class="contact_info_area mb-3">
                    <div class="icon_div">
                        <img src="{{ asset($contact_us->location_icon) }}" alt="">
                    </div>
                    <div class="info_div">
                        <h4>{{ $contact_us->{app()->getLocale() . '_location_title'} }}</h4>
                        <span>{{ $contact_us->{app()->getLocale() . '_location_address'} }}</span>
                    </div>
                </div>
                <div class="contact_info_area mb-3">
                    <div class="icon_div">
                        <img src="{{ asset($contact_us->email_icon) }}" alt="">
                    </div>
                    <div class="info_div">
                        <h4>{{ $contact_us->{app()->getLocale() . '_email_title'} }}</h4>
                        <span>{{ $contact_us->{app()->getLocale() . '_email_address'} }}</span>
                    </div>
                </div>
                <div class="contact_info_area">
                    <div class="icon_div">
                        <img src="{{ asset($contact_us->hotline_icon) }}" alt="">
                    </div>
                    <div class="info_div">
                        <h4>{{ $contact_us->{app()->getLocale() . '_hotline_title'} }}</h4>
                        <span>{{ $contact_us->{app()->getLocale() . '_hotline_address'} }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 cus_mt_20 cus_mb_20 ">
                <div class="contact_area">
                    <form action="{{ route('save_contact_message') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input_field">
                                    <input type="text" name="contacter_name" class="form-control"
                                        placeholder=" {{ __('Your Name') }} " aria-label="Username">
                                    <img src="{{ asset('images/website/user.png') }}" alt="">
                                    @if ($errors->has('contacter_name')) <span class="text-danger">{{ $errors->first('contacter_name') }}</span>@endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="input_field">
                                    <input type="email" name="contacter_email" class="form-control"
                                        placeholder=" {{ __('Your Email') }} " aria-label="Username">
                                    <img src="{{ asset('images/website/email.png') }}" alt="">
                                    @if ($errors->has('contacter_email')) <span class="text-danger">{{ $errors->first('contacter_email') }}</span>@endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <textarea name="contacter_msg" id="" class="form-control" cols="30" rows="5"
                                        placeholder=" {{ __('Write Message') }} "></textarea> <br>
                                        <label for=""></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @if ($errors->has('contacter_msg')) <span class="text-danger">{{ $errors->first('contacter_msg') }}</span>@endif
                            </div>
                            <div class="col-lg-12">
                                <button
                                    class="contact_us_btn">{{ $contact_us->{app()->getLocale() . '_btn_text'} }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
