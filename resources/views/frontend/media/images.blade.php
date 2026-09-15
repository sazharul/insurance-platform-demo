@extends('frontend.layouts.master')
@section('title', 'Media Images')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $images->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $images->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $images->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>

    <div class="container cus_mt_20 cus_mb_30">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="media_head_btn_area">
                    <a class="btn" href="{{ route('media.publications') }}"> <img
                            src="{{ asset('images/website/publications.png') }}" alt=""> {{ __('Publications') }}
                    </a>
                    <a class="btn_active" href="{{ route('media.images') }}"> <img
                            src="{{ asset('images/website/images_active.png') }}" alt=""> {{ __('Images') }} </a>
                    <a class="btn" href="{{ route('media.videos') }}"> <img
                            src="{{ asset('images/website/videos.png') }}" alt=""> {{ __('Videos') }} </a>
                </div>
            </div>
            <div class="col-lg-12 cus_mt_30 text-center">
                <div class="media_search_area">
                    <input type="text" name="images_search" id="images_search"
                        placeholder=" {{ __('Search for Media') }} "
                        data-url="{{ route('media.search_images') }}">
                    <img src="" alt="">
                    <a href="javascript:void(0)"> {{ __('Search') }} </a>
                </div>
            </div>
        </div>
        <div class="row cus_mb_10">
            <div class="col-lg-12">
                <div class="filter_btn float-end">
                    <select class="form-select" name="image_sort" id="image_sort"
                        aria-label="Default select example" data-url="{{ route('media.sort_images') }}">
                        <option selected>{{ __('Sort By') }}</option>
                        <option value="newest_images"> {{__('Newest to Oldest')}} </option>
                        <option value="oldest_images"> {{__('Oldest to Newest')}} </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row images_result">
            @foreach ($images_list as $item)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-3">
                    <div class="media_card" data-bs-toggle="modal" data-bs-target="#imagegallerymodal{{ $item->id }}"
                        onclick="show_gallery_slider('{{ $item->id }}')">


                        <div class="row p-0">
                            @if (isset($item->groupImage))
                                @foreach ($item->groupImage as $index => $single_image)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-0">
                                        <img class="gallery_grid_img" src="{{ asset($single_image->name) }}"
                                            alt="">
                                    </div>
                                    @if ($index == 3)
                                    @break
                                @endif
                            @endforeach
                        @endif
                    </div>

                    <div class="media_title_panel">
                        <h6>{{ $item->{app()->getLocale() . '_title'} }}</h6>
                        <span class="media_date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                        <span class="media_count"><img src="{{ asset('images/website/img_gallery.png') }}"
                                alt=""></span>
                    </div>
                </div>
            </div>

            <!--image Popup Modal -->
            <div class="modal fade" id="imagegallerymodal{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content modal_custom_content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $item->{app()->getLocale() . '_title'} }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="image-gallery-slider slider_name{{ $item->id }}">
                                @if (isset($item->groupImage))
                                    @foreach ($item->groupImage as $single_image)
                                        <img src="{{ asset($single_image->name) }}" alt="">
                                    @endforeach
                                @endif
                            </div>

                            <div class="image-gallery-slider-thumbnail slider_thumbnail_name{{ $item->id }}">
                                @if (isset($item->groupImage))
                                    @foreach ($item->groupImage as $single_image)
                                        <img src="{{ asset($single_image->name) }}" alt="">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
