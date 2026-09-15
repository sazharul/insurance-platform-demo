@extends('frontend.layouts.master')
@section('title', 'Proposal Form')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{ $proposal_form->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span
                    class="text-dark">{{ $proposal_form->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                    class="text-success fw-bold">{{ $proposal_form->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($proposal_form_list as $item)
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 cus_mb_30 cus_mt_30">
                <div class="annual-report-section h-100">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-7 col-8">
                            <h4>{{ $item->{app()->getLocale() . '_title'} }}</span></h4>
                            <span class="annual-line"></span>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-4 text-center">
                            <div class="annual-report-icon">
                                <img src="{{ asset('images/website/Group 48095538.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="animation_btn_view">
                                <a href="{{ route('more.proposal_form_list', $item->id)}}" class="">
                                    <img class="left_icon" src="{{ asset('images/website/view_report.png') }}" alt="">  {{ $proposal_form->{app()->getLocale() . '_btn_text'} }}
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
</div>
@endsection
