@extends('backend.layouts.master')
@section('title', 'Cash in transit Tariff Type Manage Page')

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
                            <h4>Cash in Transit Tariff Type</h4>
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
                                    <a href="{{ route('admin.calculator.createCashInTransitTeriff.create') }}"
                                        data-toggle="modal" data-target="#addcategory" class="btn_1">Add
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
                                        <th scope="col">Institutions</th>
                                        <th scope="col">SRCC</th>
                                        <th scope="col">Turnover up to</th>
                                        <th scope="col">Turnover up to value</th>
                                        <th scope="col">Turnover for over</th>
                                        <th scope="col">Turnover for over value</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Armored</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teriffs as $teriff)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $teriff->calculator->en_name !!}</td>
                                            <td>{!! $teriff->institute->en_name !!}</td>
                                            <td>{!! $teriff->srcc->en_name ?? '-' !!}</td>
                                            <td>{{ number_format($teriff->turnover_up_to, 2) }}</td>
                                            <td>{{ $teriff->turnover_up_to_value }}%</td>
                                            <td>{{ number_format($teriff->turnover_for_over, 2) }}</td>
                                            <td>{{ $teriff->turnover_for_over_value }}%</td>
                                            <td><a href="{{ route('admin.calculator.statusCashInTransitTeriff.status', $teriff->id) }}"
                                                    class="fw-bolder status_btn {{ $teriff->status == 1 ? '' : 'danger_btn' }}">{!! $teriff->status == 1 ? 'Active' : 'Inactive' !!}</a>
                                            </td>
                                            <td><a href="javascript:;"
                                                    class="fw-bolder status_btn {{ $teriff->armored == 1 ? '' : 'danger_btn' }}">{!! $teriff->armored == 1 ? 'Yes' : 'No' !!}</a>
                                            </td>
                                            <td><a href="{{ route('admin.calculator.editCashInTransitTeriff.edit', $teriff->id) }}"
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
