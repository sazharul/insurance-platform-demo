@extends('frontend.layouts.master')
@section('title', 'Circular Details')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="breadgram-image">
                <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
                <div class="breadgram-hero-area">
                    <h2 class="fw-bold">{{ $circular_page->{app()->getLocale() . '_title'} }}</h2>
                    <h6 class="text-center mt-3"><span> <a class="text-black fw-bold" href="{{route('more.circular')}}">{{ $circular_page->{app()->getLocale() . '_breadcrumb_1'} }}</a> </span> / <span
                            class="text-success fw-bold">{{ $circular_page->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="code_of_conduct">
                <div class="row cus_mt_20">
                    <div class="col-lg-12 coc_hero">
                        <h4>{{ $circular_details->{app()->getLocale() . '_title'} }}</h4>
                        <a class="download_btn" href="{{asset($circular_details->pdf_file)}}"> <img src="{{asset('images/website/download_icon.png')}}" alt=""> {{__('Download')}} </a>
                    </div>
                </div>
                <div class="row cus_mt_20 cus_mb_20">
                    <div class="col-lg-12 pdf_view">
                        <iframe height="100%" width="100%" src="{{asset($circular_details->pdf_file)}}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
