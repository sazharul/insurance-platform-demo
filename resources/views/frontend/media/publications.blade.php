@extends('frontend.layouts.master')
@section('title', 'Media Publications')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $publications->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $publications->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $publications->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>

    <div class="container cus_mt_20 cus_mb_30">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="media_head_btn_area">
                    <a class="btn_active" href="{{ route('media.publications') }}"> <img
                            src="{{ asset('images/website/publications_active.png') }}" alt="">
                        {{ __('Publications') }} </a>
                    <a class="btn" href="{{ route('media.images') }}"> <img
                            src="{{ asset('images/website/images.png') }}" alt=""> {{ __('Images') }} </a>
                    <a class="btn" href="{{ route('media.videos') }}"> <img
                            src="{{ asset('images/website/videos.png') }}" alt=""> {{ __('Videos') }} </a>
                </div>
            </div>
            <div class="col-lg-12 cus_mt_30 text-center">
                <div class="media_search_area">
                        <input type="text" name="publications_search" id="publications_search" placeholder=" {{ __('Search for Publications') }} " data-url="{{ route('media.search_publicaitons') }}">
                        <img src="" alt="">
                        <a href="javascript:void(0)"> {{ __('Search') }} </a>
                </div>
            </div>
        </div>
        <div class="row cus_mb_10">
            <div class="col-lg-12">
                <div class="filter_btn float-end">
                    <select class="form-select" name="publication_sort" id="publication_sort"
                        aria-label="Default select example" data-url="{{ route('media.sort_publicaitons') }}">
                        <option selected>{{ __('Sort By') }}</option>
                        <option value="newest_publications"> {{__('Newest to Oldest')}} </option>
                        <option value="oldest_publications"> {{__('Oldest to Newest')}} </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row publication_sort_result">
            @foreach ($publication_list as $item)
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-3">
                    <div class="publication_card h-100">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-3 col-12 text-center">
                                <a href="{{ route('media.publications_details', $item->id) }}" class="pb_content_left">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </a>
                            </div>

                            <div class="col-xl-9 col-lg-8 col-md-9 col-sm-9 col-12">
                                <a href="{{ route('media.publications_details', $item->id) }}" class="pb_content_right">
                                    <img src="{{ asset('images/website/calender_green.png') }}" alt="">
                                    <span>{{ $item->{app()->getLocale() . '_date'} }}</span>
                                    <h4>{{ $item->{app()->getLocale() . '_title'} }}</h4>
                                    <p>- {{ $item->{app()->getLocale() . '_newspaper_name'} }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
