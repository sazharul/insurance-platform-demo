@extends('frontend.layouts.master')
@section('title', 'Sale/Buy')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $sale_buy->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $sale_buy->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $sale_buy->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

            </div>
        </div>
    </div>

    <section class="cus_mt_20 cus_mb_20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="titlewithbottomline text-center"
                        style="background: url('images/website/title_bg_box.png'); background-repeat: no-repeat">
                        <h2>{{ $sale_buy->{app()->getLocale() . '_heading'} }}</h2>
                        <span class="titleBorderBottom"></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($sale_buy_list as $item)
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 cus_mt_20">
                        <div class="sale-buy-card h-100">
                            <div class="sale-buy-section">
                                <div class="icon-section">
                                    @if ($item->icon)
                                    <img src="{{ asset($item->icon) }}" alt="">
                                    @else
                                    <img src="{{asset('images/icon/share_sale_buy.png')}}">
                                    @endif
                                </div>
                                <div class="sale-content">
                                    <h5 style="color: #007C4A;">{{ $item->{app()->getLocale() . '_name'} }}</h5>
                                    <p>{!! $item->{app()->getLocale() . '_details'} !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
