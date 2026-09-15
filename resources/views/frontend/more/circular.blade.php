@extends('frontend.layouts.master')
@section('title', 'Circular')

@section('content')
    <div class="container cus_mt_30 cus_mb_30">
        <div class="row">
            <div class="col-lg-5">
                <div class="circular_top_info">
                    {!! $circular_page->{app()->getLocale() . '_description'} !!}
                </div>
            </div>
            <div class="col-lg-7">
                <img class="img-fluid circular_main_img" src="{{ asset($circular_page->image) }}" alt="">
            </div>
        </div>
    </div>
    <section class="circular_section cus_mb_30">
        <div class="container">
            <div class="row cus_mb_30">
                <div class="col-lg-12">
                    <div class="title_with_bottom_line text-center">
                        <h1>{{ $circular_page->{app()->getLocale() . '_job_title'} }}</h1>
                        <span class="title_bottom_line"></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($circular_list as $list)
                <div class="col-lg-6 mb-35">
                    <div class="annual-report-section h-100">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-7 col-8">
                                <h4>{{ $list->{app()->getLocale() . '_title'} }}</h4>
                                <span class="annual-line"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5 col-4 text-center">
                                <div class="annual-report-icon">
                                    <img src="{{ asset('images/website/circular_watermark.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="animation_btn_view">
                                    <a href="{{ route('more.circular_details', $list->id) }}" class="">
                                        <img class="left_icon" src="{{ asset('images/website/view_report.png') }}" alt="">  {{ $circular_page->{app()->getLocale() . '_btn_text'} }}
                                        <img class="arrow_icon" src="{{ asset('images/website/report_arrow.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
