@extends('frontend.layouts.master')
@section('title', 'Links')

@section('content')
    <div class="container-fluid cus_mb_30">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $links->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $links->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $links->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($link_list as $list)
                <div class="col-xxl-3 col-lg-4 col-md-4 col-sm-6 col-12 cus_mb_30">
                    <div class="links_card text-center h-100">
                        <img class="" src="{{ asset($list->image) }}" alt="">
                        <h4>{{ $list->{app()->getLocale() . '_title'} }}</h4>
                        <a class="view_website_btn" href="{{ $list->url }}" target="_blank"> {{__('Visit Website')}} >></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
