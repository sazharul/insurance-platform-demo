@extends('frontend.layouts.master')
@section('title', 'Notice Details')

@section('content')
    <section class="notice_details_head">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <h6 class="detaila_page_breadcrumb"> <a class="text-white" href="{{route('ir.notice_investor')}}"> {{ __('Investor Relation / Notice') }}</a> </h6>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="code_of_conduct">
            <div class="row mt-5">
                <div class="col-lg-12 coc_hero">
                    <h4>{{ $notice_details->{app()->getLocale() . '_title'} }}</h4>
                    <p>{{ $notice_details->created_at }}</p>
                    <div class="notice_details">
                        <p>
                            {!! $notice_details->{app()->getLocale() . '_details'} !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                @if (pathinfo($notice_details->notice_file, PATHINFO_EXTENSION) == 'pdf')
                    <div class="col-lg-12 pdf_view">
                        <iframe height="100%" width="100%" src="{{ asset($notice_details->notice_file) }}"></iframe>
                    </div>
                    <div class="col-lg-12 mt-5 mb-5">
                        <a class="download_btn2" href="{{ asset($notice_details->notice_file) }}"> <img
                                src="{{ asset('images/website/download_icon.png') }}" alt=""> {{ __('Download') }} </a>
                    </div>
                @else
                <div class="col-lg-12">
                    <img class="img-fluid" src="{{ asset($notice_details->notice_file)}}" alt="">
                </div>
                    <div class="col-lg-12 mt-5 mb-5">
                        <a class="download_btn2" href="{{ asset($notice_details->notice_file) }}"> <img
                                src="{{ asset('images/website/download_icon.png') }}" alt=""> {{ __('Download') }} </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


