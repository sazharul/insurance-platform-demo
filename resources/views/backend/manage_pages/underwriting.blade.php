@extends('backend.layouts.master')
@section('title', 'Underwriting')

@section('content')
    @if (Session::has('message'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

        {{-- manage underwriting info start --}}
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h2 class="text-center">
                                    @include('admin.cms.product-service-menu')
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <form action="" method="">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search here.." aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="add_button ms-2 float-end">
                                            <a class="btn btn-success" href="{{ route('underwriting') }}">Add Underwriting</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </form>
                            <div class="mb_30 home_page_management_table_area">

                                <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Underwriting Description (English)</th>
                                            <th>Underwriting Description (Bangla)</th>
                                            <th>Description 2 (English)</th>
                                            <th>Description 2 (Bangla)</th>
                                            <th>Underwriting Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($underwritings as $underwriting)
                                            <tr>
                                                <td>{!! \Illuminate\Support\Str::words($underwriting->en_under_des, 25, '...') !!}</td>
                                                <td>{!! \Illuminate\Support\Str::words($underwriting->bn_under_des, 30, '...') !!}</td>
                                                <td>{!! \Illuminate\Support\Str::words($underwriting->en_under_des_last, 25, '...') !!}</td>
                                                <td>{!! \Illuminate\Support\Str::words($underwriting->bn_under_des_last, 30, '...') !!}</td>
                                                <td>
                                                    <img src="{{ asset($underwriting->underwriting_img) }}" alt="" style="max-height: 200px; width: auto;">
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="{{ route('edit_underwriting', ['id' => $underwriting->id]) }}">Edit</a>
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
        {{-- manage underwriting info end --}}
@endsection
