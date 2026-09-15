@extends('frontend.layouts.master')
@section('title', 'Awards')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/more_others.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{ $awards->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $awards->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $awards->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

        </div>
    </div>
</div>
<div class="container cus_mb_30">
    <div class="row award_panel justify-content-center">
        @foreach ($award_list as $item)
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 cus_mt_20 cus_mb_40">
            <div class="award_card h-100">
                <div class="award_icon_box">
                    @if ($item->icon)
                    <img src="{{ asset($item->icon) }}" alt="">
                    @else
                    <img src="{{asset('images/icon/award.png')}}">
                    @endif
                </div>
                <h2>{{ $item->{app()->getLocale() . '_title'} }}</h2>
                <p class="text-justify">{{ $item->{app()->getLocale() . '_award_details'} }}</p>
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#show_big_image{{ $item->id }}">
                    <img class="main_img img-fluid" src="{{asset($item->image)}}" alt="">
                </a>

                <!--image Popup Modal -->
                <div class="modal fade" id="show_big_image{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content modal_custom_content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $item->{app()->getLocale() . '_title'} }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="show_big_image">
                                    <img src="{{asset($item->image)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
