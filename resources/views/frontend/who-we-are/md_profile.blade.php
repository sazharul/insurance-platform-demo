@extends('frontend.layouts.master')
@section('title', 'Md Profile')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">Md's Profile</h2>
            <h6 class="text-center mt-3"><span class="text-dark">Who we are</span> / <span
                    class="text-success fw-bold">Md's Profile</span></h6>

        </div>
    </div>
</div>
    <div class="container mt-50">
        <div class="row profile_area mb-5">
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 mt-3">
                <div class="profile_img_box">
                    <img src="{{ asset('images/website/ceo.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 mt-3 profile_info_area">
                <h1>Mr. Demo Executive</h1>
                <span>Managing Director</span>
                <p>
                    Mr. Demo Executive Joined CoverSure Insurance Company Limited (COVERSURE) on November 29, 2021 as Chief Executive Officer (CEO) with the approval from IDRA.
                    Mr. Haque started his career with M.J. Abedin & Co., Chartered Accountants as Audit Manager in 1991. He worked in Underwriting, Claims, Re-insurance, Export Credit Guarantee & Administration Department from 1991 to 2019 holding key position. His Career as a Chief Executive Officer (CEO) is almost 10 years. Out of which 4 years in Mercantile Insurance & 5 years in Northern Islami Insurance.
                </p>
            </div>
        </div>
    </div>
@endsection
