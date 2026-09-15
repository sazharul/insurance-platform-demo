@extends('backend.layouts.master')
@section('title', 'Carried By Manage Page')

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
                            <h4>Carried By</h4>
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
                                    <a href="{{ route('admin.calculator.carried-bies.create') }}" data-toggle="modal"
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
                                        <th scope="col">Name English</th>
                                        <th scope="col">Name Bangla</th>
                                        <th scope="col">Color Image</th>
                                        <th scope="col">White Image</th>
                                        <th scope="col">Charge Type</th>
                                        <th scope="col">Price Range</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Next Price Range</th>
                                        <th scope="col">Next Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carries as $carry)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $carry->calculator->en_name !!}</td>
                                            <td>{!! $carry->en_name !!}</td>
                                            <td>{!! $carry->bn_name !!}</td>
                                            <td><img src="{{ asset($carry->color_image) }}"
                                                    style="height: 100px; width: 100px" alt=""></td>
                                            <td><img class="bg-dark" src="{{ asset($carry->white_image) }}"
                                                    style="height: 100px; width: 100px" alt=""></td>
                                            <td>
                                            @if ( $carry->charge_type == 1)
                                                Fixed
                                            @elseif ( $carry->charge_type == 2)
                                                Fraction
                                            @else

                                            @endif
                                            </td>
                                            <td>{{ $carry->price_limit }}</td>
                                            <td>{{ $carry->amount }}</td>
                                            <td>{{ $carry->next_price_limit }}</td>
                                            <td>{{ $carry->next_amount }}</td>
                                            <td><a href="{{ route('admin.calculator.carried-bies.status', $carry->id) }}"
                                                    class="fw-bolder status_btn {{ $carry->status == 1 ? '' : 'danger_btn' }}">{!! $carry->status == 1 ? 'Active' : 'Inactive' !!}</a>
                                            </td>
                                            <td><a href="{{ route('admin.calculator.carried-bies.edit', $carry->id) }}"
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
