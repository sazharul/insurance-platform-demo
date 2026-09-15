@extends('frontend.layouts.master')
@section('title', 'Md Profile')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">Managing Director Profile</h2>
            <h6 class="text-center mt-3"><span class="text-dark">Who we are</span> / <span
                    class="text-success fw-bold">Managing Director Profile</span></h6>

        </div>
    </div>
</div>
    <div class="container mt-50">
        <div class="row profile_area mb-5">
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 mt-3">
                <div class="profile_img_box">
                    <img src="{{ asset('images/website/person_white.png') }}" alt="Demo executive placeholder">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 mt-3 profile_info_area">
                <h1>Mr. Karim Rahman</h1>
                <span>Managing Director (Demo)</span>
                <p>
                    This is a fictional executive profile for the CoverSure portfolio demonstration platform.
                    CoverSure is an independent showcase for hiring review — not affiliated with any production insurer.
                    All names, biographies, and imagery on this page are synthetic demo content only.
                </p>
            </div>
        </div>
    </div>
@endsection
