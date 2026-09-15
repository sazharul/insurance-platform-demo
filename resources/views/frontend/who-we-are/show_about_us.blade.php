@extends('frontend.layouts.master')
@section('title', 'About Us')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $about_us->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $about_us->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $about_us->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
                {{--update section--}}
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-100">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="intro_main_img_div"
                     style="background: url('images/website/title_bg_box.png'); background-repeat: no-repeat">
                    <img class="about_main_img" src="{{ asset($about_us->image1) }}" alt="">
                    <div class="sub_img_div">
                        <img class="img=fluid" src="{{ asset($about_us->image2) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="intro_info_right">
                    {!! $about_us->{app()->getLocale() . '_description'} !!}
                </div>
            </div>
        </div>
        <div class="row mt-100 cus_mb_20">
            <div class="col-lg-12">
                <div class="title_with_bottom_line text-center">
                    <h1> {!! $about_us->{app()->getLocale() . '_core_title'} !!} </h1>
                    <span class="title_bottom_line"></span>
                </div>
            </div>
        </div>
    </div>

    <section style="background: url('images/website/about_bg.png'); background-size:cover;">
        <div class="container">
            <div class="row cus_mb_20">
                <div class="col-lg-4 col-md-6">
                    @foreach ($about_us->{app()->getLocale() . '_left_core_description'} as $core_left)
                        <div class="about_middle_tick_info">
                            <div class="icon_box">
                                <img src="{{ asset('images/website/green_tick.png') }}" alt="">
                            </div>
                            <p> {{$core_left}} </p>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <img class="img-fluid" src="{{ asset('images/website/about_middle_img.png') }}" alt="">
                </div>
                <div class="col-lg-4 col-md-6">
                    @foreach ($about_us->{app()->getLocale() . '_right_core_description'} as $core_right)
                        <div class="about_middle_tick_info">
                            <div class="icon_box">
                                <img src="{{ asset('images/website/green_tick.png') }}" alt="">
                            </div>
                            <p> {{$core_right}} </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row cus_mb_20">
            <div class="col-lg-12">
                <div class="title_with_bottom_line text-center">
                    <h1> <span> {{ $about_us->{app()->getLocale() . '_process_title'} }} </span> </h1>
                    <span class="title_bottom_line"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                @foreach ($about_us->{app()->getLocale() . '_process_description'} as $process)
                    <div class="about_bottom_tick_info">
                        <div class="icon_box">
                            <img src="{{ asset('images/website/archer.png') }}" alt="">
                        </div>
                        <p> {{$process}} </p>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-6 col-md-6 text-center">
                <img class="img-fluid" src="{{ asset('images/website/about_archer_img.png') }}" alt="">
            </div>
        </div>
    </div>


@endsection
