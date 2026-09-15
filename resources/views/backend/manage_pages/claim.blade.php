@extends('backend.layouts.master')
@section('title', 'Claim')

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

    {{-- manege claim info start --}}
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            @include('admin.cms.product-service-menu')
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
                                        <a class="btn btn-success" href="{{ route('claim') }}">Add Claim Page Info</a>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
                        <div class="mb_30 home_page_management_table_area">

                            <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Claim Heading (English)</th>
                                        <th>Claim Heading (Bangla)</th>
                                        <th>Description (English)</th>
                                        <th>Description (Bangla)</th>
                                        {{-- <th>Claim Page Image</th>
                                        <th>Claim Statement Heading (English)</th>
                                        <th>Claim Statement Heading (Bangla)</th>
                                        <th>Claim Statement Description (English)</th>
                                        <th>Claim Statement Description (Bangla)</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($claims as $claim)
                                        <tr>
                                            <td>{!! $claim->en_claim_heading !!}</td>
                                            <td>{!! $claim->bn_claim_heading !!}</td>
                                            <td>{!! \Illuminate\Support\Str::words($claim->en_claim_description, 25, '...') !!}</td>
                                            <td>{!! \Illuminate\Support\Str::words($claim->bn_claim_description, 25, '...') !!}</td>
                                            {{-- <td>
                                                <img src="{{ asset($claim->claim_img) }}" alt=""
                                                    style="max-height: 200px; width: auto;">
                                            </td>
                                            <td>{{ $claim->en_statement_head }}</td>
                                            <td>{{ $claim->bn_statement_head }}</td>
                                            <td>{!! \Illuminate\Support\Str::words($claim->en_claim_state_des, 25, '...') !!}</td>
                                            <td>{!! \Illuminate\Support\Str::words($claim->bn_claim_state_des, 25, '...') !!}</td> --}}
                                            <td>
                                                <a class="btn btn-success"
                                                    href="{{ route('edit_claim', ['id' => $claim->id]) }}">Edit</a>
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
    {{-- manage claim info start --}}
@endsection
