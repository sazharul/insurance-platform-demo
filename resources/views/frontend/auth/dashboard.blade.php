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
                                    <th>{{ __('Policy Information') }}</th>
                                    <th>{{ __('Policy Status') }}</th>
                                    <th>{{ __('Payment History') }}</th>
                                    <th>{{ __('Files') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- style="background: {{ $loop->even ? '#d1e7dd' : '#f4f4f4' }}" --}}
                                @foreach ($orders as $order)
                                    <tr>
                                        <th>
                                            <strong> {{ __('Title') }}: </strong> {{ $order->calculator->en_name }} <br>
                                            <strong> {{ __('Issue Date') }}:</strong>
                                            {{ $order->created_at->format('d/m/Y') }}
                                            @if ($order->mark_as == 1)
                                                <strong> {{ __('Issue Confirm Date') }}:</strong>
                                                {{ $order->updated_at->format('d/m/Y') }}
                                            @endif
                                        </th>
                                        <td>{{ $order->mark_as == 1 ? 'Completed' : 'Pending' }}</td>
                                        <td>
                                            <strong> {{ __('Amount') }}: </strong>{{ number_format($order->amount, 2) }}
                                            <br>
                                            <strong> {{ __('Status') }}: </strong>
                                            <span style="color: {{ ($order->status == 'Processing' || $order->status == 'Success') ? 'green' : 'red' }}">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($order->file1)
                                                <a href="{{ asset($order->file1) }}" download="">Insurance Policy</a>
                                                <hr>
                                            @endif
                                            @if ($order->file2)
                                                <a href="{{ asset($order->file2) }}" download="">Money Receipt</a>
                                                <hr>
                                            @endif
                                            @if ($order->file3)
                                                <a href="{{ asset($order->file3) }}" download="">Others</a>
                                                <hr>
                                            @endif
                                            {{-- @if ($order->file4)
                                                <a href="{{ asset($order->file4) }}" download="">Fourth file by
                                                    CoverSure</a>
                                                    <hr>
                                            @endif --}}
                                        </td>
                                        <td>
                                            @if($order->status == 'Processing' || $order->status == 'Success')
                                                <button class="btn btn-success btn-sm">Paid</button>
                                            @else
                                                @if($order->calculator_id == 4)
                                                    <a class="payment_proceed_btn small_button" href="{{ route('medical_invoice', $order->invoice_sessions) }}">Pay Now</a>
                                                @elseif($order->calculator_id == 3)
                                                    <a class="payment_proceed_btn small_button" href="{{ route('motor_invoice', $order->invoice_sessions) }}">Pay Now</a>

                                                @elseif($order->calculator_id == 5)
                                                    <a class="payment_proceed_btn small_button" href="{{ route('personal_invoice', $order->invoice_sessions) }}">Pay Now</a>

                                                @elseif($order->calculator_id == 6)
                                                    <a class="payment_proceed_btn small_button" href="{{ route('people_personal_invoice', $order->invoice_sessions) }}">Pay
                                                        Now</a>
                                                @endif
                                            @endif

                                            @if($order->calculator_id == 4)
                                                <a href="{{ route('medical_invoice', $order->invoice_sessions) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @elseif($order->calculator_id == 3)
                                                <a href="{{ route('motor_invoice', $order->invoice_sessions) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @elseif($order->calculator_id == 5)
                                                <a href="{{ route('personal_invoice', $order->invoice_sessions) }}" class="btn btn-secondary btn-sm">Details</a>
                                            @elseif($order->calculator_id == 6)
                                                <a href="{{ route('people_personal_invoice', $order->invoice_sessions) }}" class="btn btn-secondary btn-sm">Details</a>
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
