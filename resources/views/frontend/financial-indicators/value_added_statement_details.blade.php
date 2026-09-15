@extends('frontend.layouts.master')
@section('title', 'Value Added Statement Details')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
        <div class="breadgram-hero-area">
            @if (strlen($value_added_statement > '50'))
                <style>
                    @media(max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
            @else
            @endif
            <h2 class="fw-bold">{{ $value_added_statement->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span
                    class="text-dark"> <a class="text-black fw-bold" href="{{route('fi.value_added_statement')}}">{{ $value_added_statement->{app()->getLocale() . '_breadcrumb_1'} }}</a> </span> / <span
                    class="text-success fw-bold"> {{__('Value Added Statement Details')}} </span>
            </h6>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="code_of_conduct">
            <div class="row cus_mt_20">
                <div class="col-lg-12 coc_hero">
                    <h4>{{ $value_added_statement_list_details->{app()->getLocale() . '_title'} }}</h4>
                    <a class="download_btn" href="{{asset($value_added_statement_list_details->pdf_file)}}"> <img src="{{asset('images/website/download_icon.png')}}" alt=""> {{__('Download')}} </a>
                </div>
            </div>
            <div class="row cus_mt_20 cus_mb_20">
                <div class="col-lg-12 pdf_view">
                    <iframe height="100%" width="100%" src="{{asset($value_added_statement_list_details->pdf_file)}}"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
