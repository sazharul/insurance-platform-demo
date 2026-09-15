@extends('frontend.layouts.master')
@section('title', 'Shareholding Position')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($share_holding_position > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $share_holding_position->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $share_holding_position->{app()->getLocale() . '_breadcrumb_1'} }}</span> /
                    <span
                        class="text-success fw-bold">{{ $share_holding_position->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>

            </div>
        </div>
    </div>

    <section class="cus_mt_20 cus_mb_10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="details_of_shareholding_position">
                        <h3>{{ $share_holding_position->{app()->getLocale() . '_heading'} }}</h3>
                        <p>{{ $share_holding_position->{app()->getLocale() . '_sub_heading'} }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="financial_highlights_table_area">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> {{ __('SL') }} .</th>
                                        <th>{{ $share_holding_position->{app()->getLocale() . '_table_name'} }}</th>
                                        <th>{{ $share_holding_position->{app()->getLocale() . '_table_status'} }}</th>
                                        <th>{{ $share_holding_position->{app()->getLocale() . '_table_of_shares'} }}</th>
                                        <th>{{ $share_holding_position->{app()->getLocale() . '_table_of_share_in'} }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($share_holding_position_list as $item)
                                        <tr style="background: {{$loop->even ? '#d1e7dd' : '#f4f4f4' }}">
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $item->{app()->getLocale() . '_name'} }}</td>
                                            <td>{{ $item->{app()->getLocale() . '_status'} }}</td>
                                            <td>{{ $item->{app()->getLocale() . '_shares_no'} }}</td>
                                            <td>{{ $item->{app()->getLocale() . '_shares_percentage'} }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
