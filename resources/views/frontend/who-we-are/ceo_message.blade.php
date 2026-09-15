@extends('frontend.layouts.master')
@section('title', 'CEO Message')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">CEO's Message</h2>
                <h6 class="text-center mt-3"><span class="text-dark">Who we are</span> / <span
                        class="text-success fw-bold">CEO's Message</span></h6>

            </div>
        </div>
    </div>
    <div class="container mt-20">
        <div class="row profile_area mb-3">
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 mt-3">
                <div class="profile_img_box">
                    <img src="{{ asset('images/website/chairman.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 mt-3 profile_info_area">
                <img src="{{ asset('images/website/bismillah.png') }}" alt="">
                <h1>Dear Viewers,</h1>
                <p>
                    I am delighted to welcome you to the Website of CoverSure Insurance Company Ltd. at a the time when the
                    company has been celebrating 37 years of its achievements. Being an AA+ rated leading first generation
                    non-life insurance company with high claim paying & prudent underwriting ability, CoverSure is ever-ready
                    to cater every insurance needs of all classes of business.

                    As you know, we are now in the era of globalisation and as such we intend to stay with what is most
                    advanced and progressive. We also want to provide you with the best and the latest. We shall continue to
                    innovate new ideas to suit your growing needs as well as keep you updated always.

                    Our endeavor of launching this website is to keep you abreast with our services and keep you informed of
                    our new products as well as our new policies to meet your expectations.

                    A very warm wishes to you,
                </p>
                <img src="{{ asset('images/website/signature_chairman.png') }}" alt="">
                <span class="signature_bottom_line"></span>
                <h4>Demo CEO</h4>
                <span>Chief Executive Officer</span>
            </div>
        </div>
    </div>
@endsection
