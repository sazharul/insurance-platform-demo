@extends('frontend.layouts.master')
@section('title', 'Product & Services')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold"> {{ __('Premium Calculator') }} </h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ __('Products & Services') }}</span> / <span
                        class="text-success fw-bold"> {{ __('Premium Calculator') }} </span></h6>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">

            @include('frontend.product-and-service.common-calculator')


        </div>
    </div>
@endsection
