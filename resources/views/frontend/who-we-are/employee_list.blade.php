@extends('frontend.layouts.master')
@section('title', 'Employee List')

@section('content')
<div class="container-fluid">
    <div class="breadgram-image">
        <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
        <div class="breadgram-hero-area">
            <h2 class="fw-bold">{{ $employee->{app()->getLocale() . '_title'} }}</h2>
            <h6 class="text-center mt-3"><span class="text-dark">{{ $employee->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                    class="text-success fw-bold">{{ $employee->{app()->getLocale() . '_breadcrumb_2'} }}</span></h6>

        </div>
    </div>
</div>
    <div class="container">
        <div class="row cus_mb_20">
            <div class="col-lg-12">
                <form action="" method="">
{{--                    <a class="btn sort_btn" href="javascript:void(0)"> {{__("Sort By")}}--}}
{{--                        <img src="{{ asset('images/website/sort_by.png') }}" alt="">--}}
{{--                    </a>--}}
                </form>
            </div>
        </div>
        <div class="row employee_page">
            <div class="col-lg-12 text-center">
                <h3><span class="title_line1"></span> {{__('Demo Office')}} <span class="title_line2"></span></h3>
                <p> {{__('Demo Business District, Dhaka, Bangladesh')}} </p>
            </div>
        </div>
        <div class="row cus_mb_30 justify-content-center">

            @foreach ($employee_list as $item)


            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mt-3">
                <div class="management_info">
                    <div class="management_left">
                        @if ($item->profile_image)
                        <img src="{{asset($item->profile_image)}}" alt="">
                        @else
                        <img src="{{ asset('images/website/person_white.png') }}" alt="">
                        @endif
                    </div>
                    <div class="management_right">
                        <h4>{{ $item->{app()->getLocale() . '_name'} }}</h4>
                        <p>{{ (isset($item->designation)) ? $item->designation->{app()->getLocale() . '_name'} : '' }}</p>
                        <div class="icon_box">
                            <img src="{{asset('images/website/location_active.png')}}" alt="">
                        </div>
                        <span>{{ $item->{app()->getLocale() . '_address'} }}</span> <br>
                        <div class="icon_box">
                            <img src="{{asset('images/website/branch_active.png')}}" alt="">
                        </div>
                        <span>{{ (isset($item->departmentInfo)) ? $item->departmentInfo->{app()->getLocale() . '_name'} : '' }}</span> <br>
                        <div class="icon_box">
                            <img src="{{asset('images/website/call_active.png')}}" alt="">
                        </div>
                        <span>{{ $item->{app()->getLocale() . '_phone_number'} }}</span> <br>
                        <div class="icon_box">
                            <img src="{{asset('images/website/email_active.png')}}" alt="">
                        </div>
                        <span>{{ $item->email }}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
