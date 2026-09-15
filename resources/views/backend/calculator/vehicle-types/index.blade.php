@extends('backend.layouts.master')
@section('title', 'Vehicle Type Manage Page')

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
                            <h4>Vehicle Type</h4>
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
                                    <a href="{{ route('admin.calculator.vehicle-types.create') }}" data-toggle="modal"
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
                                        <th scope="col">Calculator Name</th>
                                        <th scope="col">Vehicle Category Name</th>
                                        <th scope="col">Name English</th>
                                        <th scope="col">Name Bangla</th>
                                        <th scope="col">FIV Value</th>
                                        <th scope="col">Color Image</th>
                                        <th scope="col">White Image</th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicles as $vehicle)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $vehicle->calculator->en_name !!}</td>
                                            <td>{!! $vehicle->calculatorVehicleCategory->en_name !!}</td>
                                            <td>{!! $vehicle->en_name !!}</td>
                                            <td>{!! $vehicle->bn_name !!}</td>
                                            <td>{{ $vehicle->value }}%</td>
                                            <td><img src="{{ asset($vehicle->color_image) }}"
                                                    style="height: 100px; width: 100px" alt=""></td>
                                            <td><img class="bg-dark" src="{{ asset($vehicle->white_image) }}"
                                                    style="height: 100px; width: 100px" alt=""></td>
                                            <td>{!! $vehicle->weight == 1 ? 'Yes' : 'No' !!}</td>
                                            <td><a href="{{ route('admin.calculator.vehicle-types.status', $vehicle->id) }}"
                                                    class="fw-bolder status_btn {{ $vehicle->status == 1 ? '' : 'danger_btn' }}">{!! $vehicle->status == 1 ? 'Active' : 'Inactive' !!}</a></td>
                                            <td><a href="{{ route('admin.calculator.vehicle-types.edit', $vehicle->id) }}"
                                                    class="btn btn-secondary">Edit</a></td>
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
