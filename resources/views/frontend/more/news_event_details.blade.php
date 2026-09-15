@extends('frontend.layouts.master')
@section('title', 'News & Events Details')

@section('content')
    <section class="details_head_area">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <h6 class="detaila_page_breadcrumb"> <a class="text-white" href="{{route('more.news_event')}}">{{__('More / News & Events')}}</a> </h6>
                    <h1>{{ $news_event_details->{app()->getLocale() . '_title'} }}</h1>
                    <p>{{ $news_event_details->{app()->getLocale() . '_date'} }}</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="details_page_content text-center">
                    <img class="details_hero_img" src="{{asset($news_event_details->image)}}" alt="">
                    <p>{!! $news_event_details->{app()->getLocale() . '_details'} !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
