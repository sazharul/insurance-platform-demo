@extends('frontend.layouts.master')
@section('title', 'News & Events')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/more_others.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $news_event->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $news_event->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $news_event->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row cus_mt_30 cus_mb_20">
            <div class="col-lg-4 col-md-5 col-sm-8 col-12 event_search_panel">
                <div class="input_field">
                    <input type="search" name="news_event_search" id="news_event_search" class="form-control" placeholder=" {{ __('Search Something...') }} "
                        aria-label="Username" data-url="{{ route('media.search_news_events') }}">
                    <img src="{{ asset('images/website/search.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-4 col-12">
                <div class="filter_btn float-end">
                    <select class="form-select" name="news_event_sort" id="news_event_sort"
                        aria-label="Default select example" data-url="{{ route('media.sort_news_events') }}">
                        <option selected>{{ __('Sort By') }}</option>
                        <option value="newest_news_events"> {{ __('Newest to Oldest') }} </option>
                        <option value="oldest_news_events"> {{ __('Oldest to Newest') }} </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row cus_mb_10 news_event_result justify-content-center">
            @foreach ($news_event_list as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-20">
                    <div class="notice_card h-100">
                        <img class="notice_img" src="{{ asset($item->image) }}" alt="">
                        <span><img class="date_img" src="{{ asset('images/website/calender_green.png') }}"
                                alt=""></span>
                        <span>{{ $item->{app()->getLocale() . '_date'} }}</span>
                        <a href="{{ route('news_event_details', $item->id) }}">
                            <h4>{{ $item->{app()->getLocale() . '_title'} }}</h4>
                        </a>
                        @if (app()->getLocale() == 'bn')
                            <p>{!! \Illuminate\Support\Str::words($item->{app()->getLocale() . '_details'}, 8, '...') !!}</p>
                        @else
                            <p>{!! \Illuminate\Support\Str::words($item->{app()->getLocale() . '_details'}, 10, '...') !!}</p>
                        @endif
                        <a class="read_more_btn" href="{{ route('news_event_details', $item->id) }}">
                            {{ __('Read More') }} </a>
                    </div>
                </div>
            @endforeach
        </div>
{{--        <div class="row mb-5">--}}
{{--            <div class="col-lg-12 text-center">--}}
{{--                <a class="view_load_more_btn"--}}
{{--                    href="javascript:void(0);">{{ $news_event->{app()->getLocale() . '_btn_text'} }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
