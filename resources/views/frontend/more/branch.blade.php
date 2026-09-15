@extends('frontend.layouts.master')
@section('title', 'Branches')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold"> {{ __('Branches') }} </h2>
                <h6 class="text-center mt-3"><span class="text-dark"> {{ __('More') }} </span> / <span
                        class="text-success fw-bold"> {{ __('Branches') }} </span></h6>

            </div>
        </div>
    </div>

    <section class="cus_mt_30 cus_mb_30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @php
                        $branch_location = App\Models\BranchLocation::where('status',1)->orderBy('position','asc')->get();
                    @endphp
                    <a class="btn btn-outline-success sort_btn" role="button" href="#" data-bs-toggle="dropdown">
                        <span>{{ __('Sort By') }}</span>
                        <img src="{{ asset('images/website/sort_by.png') }}" alt="">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:void(0);"
                               onclick="getBranchListByLocation(this, '{{ route('get_branch_list', 'all') }}')">All</a>
                        </li>
                        @foreach ($branch_location as $location)
                            <li><a class="dropdown-item" href="javascript:void(0);"
                                   onclick="getBranchListByLocation(this, '{{ route('get_branch_list', $location->id) }}')">{{ $location->{app()->getLocale() . '_name'} }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row show_all_branch justify-content-center">
                @foreach ($branch_list as $list)
                    {{-- @dd($list); --}}
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 cus_mt_20">
                        <div class="branch-area h-100">
                            <div class="branch-component">
                                <strong class="district_name">{{ $list->{app()->getLocale() . '_name'} }}</strong>
                                <div class="district">
                                </div>
                                <div class="img_box">
                                    @if ($list->image)
                                    <img src="{{ asset($list->image) }}" alt="">
                                    @else
                                    <img src="{{ asset('images/website/person_white.png') }}" alt="">
                                    @endif
                                </div>

                                <div class="mt-3">
                                    <h4 class="text-capitalize">{{ $list->{app()->getLocale() . '_employee_name'} }}</h4>
                                    <p>{{ $list->{app()->getLocale() . '_employee_designation'} }}</p>

                                </div>
                                <div class="mt-3 branch-middle-component">
                                    <span><img src="{{ asset('images/website/Vector (11).png') }}" alt=""></span>
                                    <p>{{ $list->{app()->getLocale() . '_address'} }}</p>

                                </div>
                                <div class="mt-3 branch-middle-component">
                                    <span class="item-1"><img style="margin-bottom: 8px"
                                                              src="{{ asset('images/website/Vector (12).png') }}" alt=""></span>
                                    <p class="item-2"> {{ $list->{app()->getLocale() . '_contact_number'} }},
                                        {{ $list->{app()->getLocale() . '_contact_number2'} }}</p>
                                </div>

                                <div class="maps">
                                    <img src="{{ asset('images/website/maps122.png') }}" alt="">
                                    <a href="{{ $list->branch_map_url }}" target="_blank"> {{ __('Google Maps') }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
