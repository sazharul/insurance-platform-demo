@extends('backend.layouts.master')
@section('title', 'Countries to be Visited Manage Page')

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
                            <h4>Countries to be Visited</h4>
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
                                    <a href="{{ route('admin.calculator.country-visits.create') }}" data-toggle="modal"
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
                                        <th scope="col">Insurance Sub Name</th>
                                        <th scope="col">Country Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Age from to</th>
                                        <th scope="col">Day from to</th>
                                        <th scope="col">Premium amount</th>
                                        <th scope="col">Price Range</th>
                                        <th scope="col">Price Amount</th>
                                        <th scope="col">Next Price Range</th>
                                        <th scope="col">Next Amount</th>
                                        <th scope="col">Teriff Code</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ins_sub_types as $ins_sub_type)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $ins_sub_type->calculator->en_name !!}</td>
                                            <td>{!! $ins_sub_type->calculatorCountry->en_name !!}
                                            </td>
                                            <td>{!! $ins_sub_type->country_type_name !!}</td>

                                            <td><a href="{{ route('admin.calculator.country-visits.status', $ins_sub_type->id) }}"
                                                    class="fw-bolder status_btn {{ $ins_sub_type->status == 1 ? '' : 'danger_btn' }}">{!! $ins_sub_type->status == 1 ? 'Active' : 'Inactive' !!}</a>
                                            </td>
                                            <td>{{ $ins_sub_type->age_from . ' - ' . $ins_sub_type->age_to }}</td>
                                            <td>{{ $ins_sub_type->day_from . ' - ' . $ins_sub_type->day_to }}</td>
                                            <td>{{ $ins_sub_type->amount }}</td>
                                            <td>{{ $ins_sub_type->price_limit }}</td>
                                            <td>{{ $ins_sub_type->amount_limit }}</td>
                                            <td>{{ $ins_sub_type->next_price_limit }}</td>
                                            <td>{{ $ins_sub_type->next_amount }}</td>
                                            <td>{{ $ins_sub_type->teriff_code }}</td>
                                            <td><a href="{{ route('admin.calculator.country-visits.edit', $ins_sub_type->id) }}"
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
