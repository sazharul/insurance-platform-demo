@extends('frontend.layouts.master')
@section('title', 'Management')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $management->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark">{{ $management->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $management->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>
            </div>
        </div>
    </div>
    <div class="container cus_mt_20">

        <div class="row">
            <div class="col-sm-12">
                <div class="management_team_description">
                    {!! $management->{app()->getLocale() . '_description'} !!}
                    <h3 class="meet_our_managment_team">{!! $management->{app()->getLocale() . '_manage_title'} !!}</h3>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mx-auto text-center">
                <div class="management_card">
                    <div class="img_div">
                        @if ($chief->image)
                        <img class="img-fluid" src="{{ asset($chief->image) }}" alt="">
                        @else
                        <img src="{{ asset('images/website/person_blank.png') }}" alt="">
                        @endif
                    </div>
                    <h3>{{ $chief->{app()->getLocale() . '_name'} }}</h3>
                    <span>{{ $chief->{app()->getLocale() . '_designation'} }}</span>
                    <span></span>
                </div>
            </div>
        </div>


        @if(isset($management_member))
            <div class="row cus_mb_10 justify-content-center">
                @foreach($management_member as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_10 mx-auto text-center">
                        <div class="management_card">
                            <div class="img_div">
                                @if ($item->image)
                                <img class="img-fluid" src="{{ asset($item->image) }}" alt="">
                                @else
                                <img src="{{ asset('images/website/person_blank.png') }}" alt="">
                                @endif
                            </div>
                            <h3>{{ $item->{app()->getLocale() . '_name'} }}</h3>
                            <span>{{ $item->{app()->getLocale() . '_designation'} }}</span>
                            <span></span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
