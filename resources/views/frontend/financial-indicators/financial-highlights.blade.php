@extends('frontend.layouts.master')
@section('title', 'Financial Highlights')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image cus_mb_20">
            <img src="{{ asset('images/website/Frame 1 (5).png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($financial_highlight > '50'))
                    <style>
                        @media (max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 10px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $financial_highlight->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $financial_highlight->{app()->getLocale() . '_breadcrumb_1'} }}</span> / <span
                        class="text-success fw-bold">{{ $financial_highlight->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="financial_highlights_title">
                    <h2>{{ $financial_highlight->{app()->getLocale() . '_financial_highlights_title'} }}</h2>
                    <span class="titleBorderBottom"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="financial_highlights_infos">
                    <button>
                        <img src="{{ asset('images/website/finance.png') }}" alt="">
                        <span>{{ $financial_highlight->{app()->getLocale() . '_short_info'} }}</span>
                    </button>
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
                                    <th> {{__('SL')}} .</th>
                                    <th>{{ $financial_highlight->{app()->getLocale() . '_particulars'} }}</th>
                                    @foreach($financial_year as $year)
                                        <th>{{  $year->{app()->getLocale() . '_year'} }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($financial_particular as $item)
                                    <tr style="background: {{$loop->even ? '#d1e7dd' : '#f4f4f4' }}">
                                        <th>{{$loop->iteration}}</th>
                                        <td>{!! $item->{app()->getLocale() . '_particulars'} !!}</td>
                                        @foreach($financial_year as $year)
                                            @php
                                                $value_info_list = \App\Models\FinancialList::where('financial_particulars_id', $item->id)->where('financial_years_id', $year->id)->first();
                                            @endphp
                                            @if(isset($value_info_list))
                                                <td>{!! $value_info_list->{app()->getLocale() . '_value'} !!}</td>
                                            @else
                                                <td></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
