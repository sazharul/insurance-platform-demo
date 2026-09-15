@extends('backend.layouts.master')
@section('title', 'Premium Calculator Manage Page details')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3>{{ $calculator->en_name }} ({{ $calculator->bn_name }})</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4></h4>
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit">
                                                <i class="ti-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Isured Full Name</th>
                                    <th scope="col">Insured Mobile Number</th>
                                    <th scope="col">Vat</th>
                                    <th scope="col">Net Premium</th>
                                    <th scope="col">Total Premium</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Teriff Code</th>
                                    @if (count($orders) > 0 && $orders[0]['calculator_id'] == 3)
                                        <th scope="col">Motor Code</th>
                                    @endif
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->insured_full_name }}</td>
                                        <td>{{ $order->insured_mobile_number }}</td>
                                        <td>{{ $order->vat }}</td>
                                        <td>{{ $order->net_premium }}</td>
                                        <td>{{ $order->amount }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->transaction_id }}</td>
                                        <td>{{ $order->teriff_code }}</td>
                                        @if ($order->calculator_id == 3)
                                            <td>{{ $order->code ?? '-' }}</td>
                                        @endif
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                @if ($order->mark_as == 0)
                                                    <form
                                                        action="{{ route('admin.calculator.acceptCalculatorInsurance', $order->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Accept</button>
                                                    </form>
                                                @else
                                                    <button class="btn btn-success btn-sm" disabled>Accepted</button>
                                                @endif
                                                <a href="{{ route('admin.calculator.invoiceCalculatorInsuraneEdit', $order->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ route('admin.calculator.invoiceCalculatorInsurane', $order->id) }}"
                                                    class="btn btn-info btn-sm">Invoice</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
