@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-header">CalculatorMotorTariffPrice {{ $calculatormotortariffprice->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/calculator-motor-tariff-price') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/calculator-motor-tariff-price/' . $calculatormotortariffprice->id . '/edit') }}" title="Edit CalculatorMotorTariffPrice"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/calculatormotortariffprice' . '/' . $calculatormotortariffprice->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete CalculatorMotorTariffPrice" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $calculatormotortariffprice->id }}</td>
                                </tr>
                                <tr><th> Vehicle Category Id </th><td> {{ $calculatormotortariffprice->vehicle_category_id }} </td></tr><tr><th> Vehicle Type Id </th><td> {{ $calculatormotortariffprice->vehicle_type_id }} </td></tr><tr><th> Engine Capacity Id </th><td> {{ $calculatormotortariffprice->engine_capacity_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
