@extends('backend.layouts.master')
@section('title', 'Tariff Type Manage Page')

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
                            <h4>Tariff Type</h4>
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
                                    <a href="{{ route('admin.calculator.boilerTeriff.create') }}" data-toggle="modal"
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
                                        <th scope="col">Year from</th>
                                        <th scope="col">Year to</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tariffs as $tariff)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $tariff->year_from !!}</td>
                                            <td>{!! $tariff->year_to !!}</td>
                                            <td>{!! $tariff->value !!}</td>
                                            <td><a href="{{ route('admin.calculator.boilerTeriff.status', $tariff->id) }}"
                                                    class="fw-bolder status_btn {{ $tariff->status == 1 ? '' : 'danger_btn' }}">{!! $tariff->status == 1 ? 'Active' : 'Inactive' !!}</a>
                                            </td>
                                            <td><a href="{{ route('admin.calculator.boilerTeriff.edit', $tariff->id) }}"
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
