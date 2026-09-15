@extends('frontend.layouts.master')
@section('title', 'Details Shareholding Position')

@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="breadgram-image">
            <img src="{{ asset('images/website/ir_breadcrumb.png') }}" alt="">
            <div class="breadgram-hero-area">
                <h2 class="fw-bold">{{ $details_of_shareholding->{app()->getLocale() . '_title'} }}</h2>
                <h6 class="text-center mt-3"><span
                        class="text-dark">{{ $details_of_shareholding->{app()->getLocale() . '_breadcrumb_1'} }}</span> /
                    <span
                        class="text-success fw-bold">{{ $details_of_shareholding->{app()->getLocale() . '_breadcrumb_2'} }}</span>
                </h6>

            </div>
        </div>
    </div>

    <section class="cus_mt_20 cus_mb_20">
        <div class="container">
            <div class="row cus_mt_20">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <h4 class="" style="font-size: 32px; font-weight: bold">
                        {{ $details_of_shareholding->{app()->getLocale() . '_heading'} }}
                    </h4>
                    <div class="shareholding-line"></div>
                    <p class="cus_mt_20">
                        {!! $details_of_shareholding->{app()->getLocale() . '_sub_heading'} !!}
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="share_holding_chart_section">
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="share_holding_info">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="financial_highlights_table_area td_with_background">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>{{ $details_of_shareholding->{app()->getLocale() . '_table_name'} }}</th>
                                        <th>{{ $details_of_shareholding->{app()->getLocale() . '_table_of_shares'} }}</th>
                                        <th>{{ $details_of_shareholding->{app()->getLocale() . '_table_of_share_in'} }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details_of_shareholding_list as $item)
                                        <tr style="background: {{$loop->even ? '#d1e7dd' : '#f4f4f4' }}">
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $item->{app()->getLocale() . '_name'} }}</td>
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
    {{-- Retrieve pie chart colors from the database --}}
    @php
    $x = DB::table('details_of_shareholding_lists')->pluck('en_name')->toArray();
    $y = DB::table('details_of_shareholding_lists')->pluck('en_shares_percentage')->toArray();
    $data = DB::table('details_of_shareholding_lists')->pluck('pie_chart_color')->toArray();
    @endphp
@endsection
@section('script')
    <script>
        var xValues = {!! json_encode($x) !!};
        var yValues = {!! json_encode($y) !!};

        var barColors = {!! json_encode($data) !!};

        new Chart("myChart", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: false
                }
            }
        });
    </script>

@endsection
