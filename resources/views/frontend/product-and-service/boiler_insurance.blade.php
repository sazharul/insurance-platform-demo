@extends('frontend.layouts.master')
@section('title', 'Boiler Insurance')

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/pc_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                @if (strlen($boiler > '50'))
                    <style>
                        @media(max-width: 576px) {
                            .container-fluid .breadgram-image h2 {
                                font-size: 9px !important;
                            }
                        }
                    </style>
                @else
                @endif
                <h2 class="fw-bold">{{ $boiler->{app()->getLocale() . '_name'} }}</h2>
                <h6 class="text-center mt-3"><span class="text-dark"><a class="text-dark fw-bold"
                            href="{{ route('ps.productAndService') }}">{{ __('Product') }}</a></span> / <span
                        class="text-success fw-bold">{{ $boiler->{app()->getLocale() . '_name'} }}</span></h6>

            </div>
        </div>
    </div>

    <div class="container cus_mb_20">
        <script>
            document.querySelector("input[type=number]")
                .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
        </script>
        {{-- @include('frontend.product-and-service.common-calculator') --}}
        <div class="row cus_mt_20">
            <div class="col-lg-12">
                <div class="calculator_back_btn_area">
                    <a class="calculator_back_btn" href="{{ route('ps.productAndService') }}"> <img
                            src="{{ asset('images/website/report_arrow.png') }}" alt=""> Go Back</a>
                </div>
            </div>
        </div>
        <div class="fire_container cus_mt_20">
            <div class="fire_container_content cash_in_safe_panel">
                <form action="">
                    <h2 class="mb-3"> {{ __('Year of Manufacture') }} </h2>
                    <input class="filter_card form-control" type="text" placeholder="YYYY" min="1999" max="2020"
                        id="getBoilerDate">
                    <h2 class="mt-5 mb-3"> {{ __('Total Sum Insured') }} </h2>
                    <input class="filter_card form-control" type="text" placeholder="Type total sum insured e.g. 1,00,00"
                        id="total_amount">

                    <h2 class="mt-5 mb-3"> {{ __('Surrounding Property Price') }} </h2>
                    <input class="filter_card form-control" type="text" placeholder="Type property price : e.g. 100000"
                        id="SPP">


                    <div class="row text-center cus_mt_20 cus_mb_20">
                        <div class="col-lg-12">
                            <span><img src="{{ asset('images/website/alert.png') }}" alt=""></span>
                            <span class="alert_msg"> {{ __('Minimum Premium BDT 5000.00') }} </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 new_btn_setup">
                            <a class="btn fire_btn fire_btn_reset mb-2" href="">{{ __('Reset') }}</a>
                            <a class="btn fire_btn fire_btn_calculate mb-2" href="javascript:;"
                                data-url="{{ route('calculation.boilerTeriff') }}" data-bs-toggle="modal"
                                data-bs-target="#mediclaimCalculateModal"
                                onclick="boilerTeriffType(this)">{{ __('Calculate') }}</a>
                        </div>
                        <div class="modal fade calculator_modal" id="mediclaimCalculateModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalLabel">
                                            {{ __('Premium Calculator') }} </h2>
                                    </div>
                                    <form action="">
                                        @csrf
                                        <div id="addmodalcalculation"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#getBoilerDate").datepicker({
                dateFormat: 'yy'
            });
        });​
    </script>
@endsection
