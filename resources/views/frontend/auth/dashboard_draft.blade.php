@extends('frontend.layouts.master')
@section('title', 'Dashboard')

@section('style')
    <style>
        .small_button {
            font-size: 13px;
            padding: 5px 10px;
            margin-bottom: 10px;
            font-weight: normal;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image cus_mb_20">
            <img src="{{ asset('images/website/Frame 1 (5).png') }}" alt="">
            <div class="breadgram-hero-area">
                <style>
                    @media (max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
                <h2 class="fw-bold">Dashboard</h2>
                <h6 class="text-center mt-3"><span class="text-success fw-bold">{{ auth()->user()->name }}</span>
                </h6>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            @include('frontend.auth.sidebar_dashboard')
            <div class="col-lg-10">
                <div class="financial_highlights_table_area">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Policy Information') }} .</th>
                                    <th>{{ __('Policy Status') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Total Amount') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- style="background: {{ $loop->even ? '#d1e7dd' : '#f4f4f4' }}" --}}
                                @foreach ($orders as $order)
                                    @php
                                        $all_data = json_decode($order->data1);
                                    @endphp
                                    <tr>
                                        <th>
                                            <strong> {{ __('Title') }}: </strong> {{ $order->calculator_name }} <br>
                                        </th>
                                        <td>Pending</td>
                                        <td>Draft</td>
                                        <td>{{ $all_data->total_amount }}</td>
                                        <td>
                                            @if($order->calculator_id == 3)
                                                <a href="{{ route('motor_invoice', $order->id) }}" class="payment_proceed_btn small_button">Pay Now</a>
                                            @elseif($order->calculator_id == 4)
                                                <a href="{{ route('medical_invoice', $order->id) }}" class="payment_proceed_btn small_button">Pay Now</a>
                                            @elseif($order->calculator_id == 5)
                                                <a href="{{ route('personal_invoice', $order->id) }}" class="payment_proceed_btn small_button">Pay Now</a>
                                            @elseif($order->calculator_id == 6)
                                                <a href="{{ route('people_personal_invoice', $order->id) }}" class="payment_proceed_btn small_button">Pay Now</a>
                                            @elseif($order->calculator_id == 7)
                                                <a href="{{ route('bongobondhu_invoice', $order->id) }}" class="payment_proceed_btn small_button">Pay Now</a>
                                            @elseif($order->calculator_id == 8)
                                                <a href="{{ route('flat_invoice', $order->id) }}" class="payment_proceed_btn small_button">Pay Now</a>
                                            @endif

                                            @if($order->calculator_id == 3)
                                                <a href="{{ route('motor_invoice', $order->id) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @elseif($order->calculator_id == 4)
                                                <a href="{{ route('medical_invoice', $order->id) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @elseif($order->calculator_id == 5)
                                                <a href="{{ route('personal_invoice', $order->id) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @elseif($order->calculator_id == 6)
                                                <a href="{{ route('people_personal_invoice', $order->id) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @elseif($order->calculator_id == 7)
                                                <a href="{{ route('bongobondhu_invoice', $order->id) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @elseif($order->calculator_id == 8)
                                                <a href="{{ route('flat_invoice', $order->id) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @endif
                                        </td>
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
