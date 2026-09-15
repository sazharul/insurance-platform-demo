@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">Calculator motor tariff price</div>
                <div class="card-body">
                    <a href="{{ url('/admin/calculator-motor-tariff-price/create') }}" class="btn btn-success btn-sm"
                        title="Add New">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <form method="GET" action="{{ url('/admin/calculator-motor-tariff-price') }}" accept-charset="UTF-8"
                        class="form-inline my-2 my-lg-0" role="search" style="width: 25%;float: right;">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..."
                                value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Insurance Type</th>
                                    <th>Vehicle Category</th>
                                    <th>Vehicle Type</th>
                                    <th>Engine Capacity From - to (cc)</th>
                                    <th>Vehicle Weight From - to (Ton)</th>
                                    <th>ACT Liability Basic Price</th>
                                    <th>Comprehensive Basic</th>
                                    <th>Self Driver</th>
                                    <th>Paid Driver</th>
                                    <th>Teriff Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calculatormotortariffprice as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->insurance_type }}</td>
                                        <td>{{ isset($item->calculatorVehicleCategory) ? $item->calculatorVehicleCategory->en_name : '' }}
                                        </td>
                                        <td>{{ isset($item->calculatorVehicleType) ? $item->calculatorVehicleType->en_name : '' }}
                                        </td>
                                        <td>{{ $item->capacity_from . ' - ' . $item->capacity_to }}
                                        </td>
                                        <td>{{ $item->weight_from . ' - ' . $item->weight_to }}
                                        </td>
                                        <td>{{ $item->act_liability }}</td>
                                        <td>{{ $item->price ?? '-' }}</td>
                                        <td>{{ $item->self_driver }}</td>
                                        <td>{{ $item->paid_driver }}</td>
                                        <td>{{ $item->teriff_code }}</td>
                                        <td>
                                            <a href="{{ url('/admin/calculator-motor-tariff-price/' . $item->id) }}"
                                                title="View CalculatorMotorTariffPrice"></a>
                                            <a href="{{ url('/admin/calculator-motor-tariff-price/' . $item->id . '/edit') }}"
                                                title="Edit CalculatorMotorTariffPrice">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i> Edit</button>
                                            </a>
                                            <form method="POST"
                                                action="{{ url('/admin/calculator-motor-tariff-price' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete CeoProfile"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $calculatormotortariffprice->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
