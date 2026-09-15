@extends('frontend.layouts.master')
@section('title', 'Commitees of the Board')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($board_commiittees > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $board_commiittees->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $board_commiittees->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $board_commiittees->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>
            </div>
        </div>
    </div>
    <div class="container">
        @include('frontend.who-we-are.commitees-of-the-board.commites_menu')

        <div class="row board_commitee">
            <div class="col-lg-12 text-center">
                <h2>{{ $commiittee_name_active->{app()->getLocale() . '_name'} }}</h2>
            </div>
        </div>
        <div class="row board_commitee cus_mb_20 justify-content-center">
            @foreach ($commiittee_member_name as $member)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 cus_mt_10 text-center">
                    <div class="commitee_card">
                        @if ($member->link_owner_name_id)

                        <a href="{{ route('bods_profile', $member->link_owner_name_id) }}">
                            <div class="img_div">
                                @if ($member->profile_image)
                                <img class="img-fluid" src="{{ asset($member->profile_image) }}" alt="">
                                @else
                                <img src="{{ asset('images/website/person_white_2.png') }}" alt="">
                                @endif
                            </div>
                            <h4>{{ $member->{app()->getLocale() . '_name'} }}</h4>
                            <span>{{ $member->{app()->getLocale() . '_designation'} }}</span>
                        </a>

                    @else
                        <a href="javascript:void(0);">
                            <div class="img_div">
                                @if ($member->profile_image)
                                <img class="img-fluid" src="{{ asset($member->profile_image) }}" alt="">
                                @else
                                <img src="{{ asset('images/website/person_white_2.png') }}" alt="">
                                @endif
                            </div>
                            <h4>{{ $member->{app()->getLocale() . '_name'} }}</h4>
                            <span>{{ $member->{app()->getLocale() . '_designation'} }}</span>
                        </a>

                    @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
