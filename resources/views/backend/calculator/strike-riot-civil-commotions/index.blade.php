@extends('backend.layouts.master')
@section('title', 'Strike Riot Civil Commotion (SRCC) Type Manage Page')

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
                            <h4>Strike Riot Civil Commotion (SRCC) Type</h4>
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
                                    <a href="{{ route('admin.calculator.strike-riot-civil-commotions.create') }}" data-toggle="modal"
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
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($institutions as $institution)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $institution->calculator->en_name !!}</td>
                                            <td>{!! $institution->en_name !!}</td>
                                            <td>{!! $institution->bn_name !!}</td>
                                            <td><a href="{{ route('admin.calculator.strike-riot-civil-commotions.status', $institution->id) }}"
                                                    class="fw-bolder status_btn {{ $institution->status == 1 ? '' : 'danger_btn' }}">{!! $institution->status == 1 ? 'Active' : 'Inactive' !!}</a></td>
                                            <td><a href="{{ route('admin.calculator.strike-riot-civil-commotions.edit', $institution->id) }}"
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
