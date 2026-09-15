@extends('backend.layouts.master')
@section('title', 'Peoples Personal Accident Insurance Manage Page')

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
                            <h4>Peoples Personal
                                Accident Insurance</h4>
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
                                    <a href="{{ route('admin.calculator.peoples-personal-accident.create') }}" data-toggle="modal"
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
                                        <th scope="col">Hero Image</th>
                                        <th scope="col">Hero Title English</th>
                                        <th scope="col">Hero Title Bangla</th>
                                        <th scope="col">Hero SubTitle English</th>
                                        <th scope="col">Hero SubTitle Bangla</th>
                                        <th scope="col">Plan Type Name English</th>
                                        <th scope="col">Plan Type Name Bangla</th>
                                        <th scope="col">Color Image</th>
                                        <th scope="col">White Image</th>
                                        <th scope="col">Capital Sum Insured</th>
                                        <th scope="col">Net Premium</th>
                                        <th scope="col">Vat</th>
                                        <th scope="col">Teriff Code</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accidents as $acc)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $acc->calculator->en_name !!}</td>
                                            <td><img class="bg-dark" src="{{ asset($acc->hero_image) }}"
                                                     style="height: 100px; width: 100px" alt=""></td>
                                            <td>{!! $acc->en_hero_title !!}</td>
                                            <td>{!! $acc->bn_hero_title !!}</td>
                                            <td>{!! $acc->en_hero_subtitle !!}</td>
                                            <td>{!! $acc->bn_hero_subtitle !!}</td>
                                            <td>{!! $acc->en_plan_type_name !!}</td>
                                            <td>{!! $acc->bn_plan_type_name !!}</td>
                                            <td><img src="{{ asset($acc->color_image) }}"
                                                    style="height: 100px; width: 100px" alt=""></td>
                                            <td><img class="bg-dark" src="{{ asset($acc->white_image) }}"
                                                    style="height: 100px; width: 100px" alt=""></td>
                                            <td>{!! $acc->capital_sum_insured !!}</td>
                                            <td>{!! $acc->net_premium !!}</td>
                                            <td>{!! $acc->vat !!}</td>
                                            <td>{!! $acc->teriff_code !!}</td>
                                            <td><a href="{{ route('admin.calculator.peoples-personal-accident.status', $acc->id) }}"
                                                    class="fw-bolder status_btn {{ $acc->status == 1 ? '' : 'danger_btn' }}">{!! $acc->status == 1 ? 'Active' : 'Inactive' !!}</a></td>
                                            <td><a href="{{ route('admin.calculator.peoples-personal-accident.edit', $acc->id) }}"
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
