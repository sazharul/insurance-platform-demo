@extends('backend.layouts.master')
@section('title', 'Engine Capacity Manage Page')

@section('content')
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
                            <h4>Engine Capacity</h4>
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
                                <div class="add_button ms-2">
                                    <a href="{{ route('admin.calculator.engine-capacity.create') }}" data-toggle="modal"
                                        data-target="#addcategory" class="btn_1">Add
                                        New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <table class="table lms_table_active3 ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Vehicle Category Name</th>
                                        <th scope="col">Vehicle Type Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($capacities as $vehicle)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $vehicle->calculatorVehicleCategory->en_name !!}</td>
                                            <td>{!! (isset($vehicle->calculatorVehicleType)) ? $vehicle->calculatorVehicleType->en_name : '' !!}</td>
                                            <td><a href="{{ route('admin.calculator.engine-capacity.status', $vehicle->id) }}"
                                                    class="fw-bolder status_btn {{ $vehicle->status == 1 ? '' : 'danger_btn' }}">{!! $vehicle->status == 1 ? 'Active' : 'Inactive' !!}</a></td>
                                            <td><a href="{{ route('admin.calculator.engine-capacity.edit', $vehicle->id) }}"
                                                    class="btn btn-secondary">Edit</a>
                                                <form method="POST" action="{{ route('admin.calculator.engine-capacity.delete', $vehicle->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete CeoProfile"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
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
    </div>
@endsection
