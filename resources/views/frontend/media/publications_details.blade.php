@extends('frontend.layouts.master')
@section('title', 'Publication Details')

@section('content')
    <section class="details_head_area">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <h6 class="detaila_page_breadcrumb"> <a class="text-white" href="{{route('media.publications')}}">{{__('More / Publication Details')}}</a> </h6>
                    <h1>{{ $publications_details->{app()->getLocale() . '_title'} }}</h1>
                    <p>{{ $publications_details->{app()->getLocale() . '_date'} }}</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="details_page_content text-center">
                    <img class="details_hero_img" src="{{asset($publications_details->image)}}" alt="">
                    <p>{!! $publications_details->{app()->getLocale() . '_details'} !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
