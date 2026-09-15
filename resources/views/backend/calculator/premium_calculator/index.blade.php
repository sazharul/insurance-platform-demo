@extends('backend.layouts.master')
@section('title', 'Premium Calculator Manage Page')

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
                            <h4>Premium Calculator Manage</h4>
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
                                    <a href="{{ route('admin.calculator.create') }}" data-toggle="modal"
                                        data-target="#addcategory" class="btn_1">Add
                                        New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">

                        <table class="table table-striped lms_table_active3 ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name English/Bangla</th>
                                    <th scope="col">Color/White Image</th>
                                    <th scope="col">Age Limit</th>
                                    <th scope="col">Buyable</th>
                                    <th scope="col">Notice</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calculators as $calculator)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $calculator->en_name }}
                                            <hr> {{ $calculator->bn_name }}
                                        </td>
                                        <td><img src="{{ asset($calculator->color_image) }}"
                                                style="height: 100px; width: 100px" alt="">
                                            <hr>
                                            <img class="bg-dark" src="{{ asset($calculator->white_image) }}"
                                                style="height: 100px; width: 100px" alt="">
                                        </td>
                                        <td>{{ $calculator->age_limit != null ? $calculator->age_limit . ' Years' : 'Optional' }}
                                        </td>
                                        <td>
                                            {{ $calculator->buyable == 1 ? 'YES' : 'NO' }}
                                        </td>
                                        <td>
                                            {!! $calculator->notice ?? '-' !!}
                                        </td>
                                        <td><a href="{{ route('admin.calculator.status', $calculator->id) }}"
                                                class="fw-bolder status_btn {{ $calculator->status == 1 ? '' : 'danger_btn' }}">{{ $calculator->status == 1 ? 'Active' : 'Inactive' }}</a>
                                        </td>
                                        <td>

                                            <a href="{{ route('admin.calculator.edit', $calculator->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                        <td>
                                            <a href="{{ route('admin.calculator.details', $calculator->id) }}"
                                                class="btn btn-info"
                                                @if (
                                                    $calculator->id == 1 ||
                                                        $calculator->id == 2 ||
                                                        $calculator->id == 9 ||
                                                        $calculator->id == 10 ||
                                                        $calculator->id == 11 ||
                                                        $calculator->id == 12) style="visibility: hidden" @endif>View
                                                Details</a>
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
