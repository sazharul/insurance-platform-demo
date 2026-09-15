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
                    <img src="{{ asset('images/website/person_white.png') }}" alt="Demo executive placeholder">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 mt-3 profile_info_area">
                <h1>Dear Visitors,</h1>
                <p>
                    Welcome to CoverSure Insurance — a portfolio demonstration platform built to showcase
                    premium calculator workflows, policy purchase flows, and admin tooling for hiring review.
                </p>
                <p>
                    This is not a production insurer website. All products, executives, and company history shown here
                    are fictional demo content. For the legal notice, see the repository DISCLAIMER.md or visit
                    <a href="https://azharulislamsohan.com/legal" target="_blank" rel="noreferrer">azharulislamsohan.com/legal</a>.
                </p>
                <h4>Ms. Nadia Chowdhury</h4>
                <span>Chief Executive Officer (Demo)</span>
            </div>
        </div>
    </div>
@endsection
