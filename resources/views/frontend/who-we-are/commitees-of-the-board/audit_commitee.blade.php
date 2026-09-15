@extends('frontend.layouts.master')
@section('title', 'Audit Committee')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/who_we_are_hero.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold"> {{ __('Committees of the Board') }} </h2>
                <h6 class="text-center mt-3"><span class="text-dark"> {{ __('Who we are') }} </span> / <span
                        class="text-success fw-bold"> {{ __('Audit Committee') }} </span></h6>

            </div>
        </div>
    </div>

    <div class="container">
        @include('frontend.who-we-are.commitees-of-the-board.commites_menu')
        <div class="row board_commitee">
            <div class="col-lg-12 text-center">
                <h2>{{ $commiittee_name[1]->{app()->getLocale() . '_name'} }}</h2>
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
