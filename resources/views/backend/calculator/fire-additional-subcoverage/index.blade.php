@extends('backend.layouts.master')
@section('title', 'Fire Additional Subcoverage Manage Page')

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
                            <h4>Fire Additional Subcoverage</h4>
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
                                    <a href="{{ route('admin.calculator.createFireAdditionalSubcoverage.create') }}"
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
                                        <th scope="col">Additional Coverage</th>
                                        <th scope="col">Subcoverage Name</th>
                                        <th scope="col">Calculation Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Is Fixed</th>
                                        {{-- <th scope="col">District</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teriffs as $teriff)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $teriff->additionalCoverage->en_name !!}</td>
                                            <td>{{ $teriff->en_name }} <br>{{ $teriff->bn_name }}</td>
                                            <td>{{ $teriff->type == 0 ? 'Combine' : 'Single' }}</td>
                                            <td><a href="{{ route('admin.calculator.statusFireAdditionalSubcoverage.status', $teriff->id) }}"
                                                    class="fw-bolder status_btn {{ $teriff->status == 1 ? '' : 'danger_btn' }}">{!! $teriff->status == 1 ? 'Active' : 'Inactive' !!}</a>
                                                <br>
                                                <br>
                                                <a href="{{ route('admin.calculator.defaultFireAdditionalSubcoverage.default', $teriff->id) }}"
                                                    class="fw-bolder status_btn {{ $teriff->is_fixed == 1 ? 'danger_btn' : '' }}">{!! $teriff->is_fixed == 1 ? 'Fixed' : 'Optional' !!}</a>
                                                <hr>
                                            </td>
                                            <td>{{ $teriff->is_fixed == 1 ? 'Yes' : 'No' }}</td>


                                            {{-- <td>{{ $teriff->district_id }} </td> --}}
                                            <td><a href="{{ route('admin.calculator.editFireAdditionalSubcoverage.edit', $teriff->id) }}"
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
