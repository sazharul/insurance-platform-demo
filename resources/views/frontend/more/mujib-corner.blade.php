@extends('frontend.layouts.master')
@section('title', 'Mujib Corner')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $mujib_corner->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $mujib_corner->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $mujib_corner->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>


    <div class="container cus_mt_30 cus_mb_30">
        <div class="row">
            <div class="col-12">
                <div class="sk_muib_content">
                    <div class="mujib_main_image">
                        <img src="{{ asset($mujib_corner->mujib_image) }}" alt="">
                        <span class="mujib_image_frame"></span>
                    </div>
                    <div>
                        {!! $mujib_corner->{app()->getLocale() . '_details'} !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="cus_mt_30 cus_mb_30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="font-weight: bold">
                        {{ $mujib_corner->{app()->getLocale() . '_gallery_title'} }}
                    </h3>
                </div>
            </div>
            <div class="row cus_mt_20 mujib_image_slider">
                @foreach ($mujib_gallery as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-3">
                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid"
                             style="height: 300px; width: 300px">
                    </div>
                @endforeach
            </div>
            <div class="row float-end">
                <div class="col-lg-12 owl_control_section mt-3">
                    <a class="owl_control mujib_img_left_show" href="javascript:void(0)">
                        <img src="{{ asset('images/website/arrow_left.png') }}" alt="">
                    </a>
                    <a class="owl_control mujib_img_right_show" href="javascript:void(0)">
                        <img src="{{ asset('images/website/arrow_right.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-80">
        <div class="row mt-5 cus_mb_30">
            @foreach ($mujib_video_list as $video)
                <div class="col-lg-4 cus_mt_30">
                    <div class="youtube_video_wrapper">
                        {{-- <iframe src="{{$video->youtube_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                        <iframe width="420" height="315" src="{{$video->youtube_link}}"></iframe>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
