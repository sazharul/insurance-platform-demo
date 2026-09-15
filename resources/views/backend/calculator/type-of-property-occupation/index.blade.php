@extends('backend.layouts.master')
@section('title', 'Type of Property Or Occupation Manage Page')

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
                            <h4>Property Or Occupation</h4>
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
                                    <a href="{{ route('admin.calculator.occupation.create') }}" data-toggle="modal"
                                        data-target="#addcategory" class="btn_1">Add
                                        New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <table class="table  table-striped lms_table_active3 ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Calculator Name</th>
                                        <th scope="col">Name English/Bangla</th>
                                        <th scope="col">Title English</th>
                                        <th scope="col">Title Bangla</th>
                                        <th scope="col">Color Image</th>
                                        <th scope="col">White Image</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($property_occupations as $calculator)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $calculator->calculator->en_name }}</td>
                                            <td>{{ $calculator->en_name }}
                                                <hr> {{ $calculator->bn_name }}
                                            </td>
                                            <td>{{ $calculator->en_title }}</td>
                                            <td>{{ $calculator->bn_title }}</td>
                                            <td><img src="{{ asset($calculator->color_image) }}"
                                                    style="height: 100px; width: 100px" alt=""></td>
                                            <td><img class="bg-dark" src="{{ asset($calculator->white_image) }}"
                                                    style="height: 100px; width: 100px" alt=""></td>
                                            <td>{{ $calculator->value }}</td>
                                            <td><a href="{{ route('admin.calculator.occupation.status', $calculator->id) }}"
                                                    class="status_btn fw-bolder {{ $calculator->status == 1 ? '' : 'danger_btn' }}">{{ $calculator->status == 1 ? 'Active' : 'Inactive' }}</a>
                                            </td>
                                            <td><a href="{{ route('admin.calculator.occupation.edit', $calculator->id) }}"
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
