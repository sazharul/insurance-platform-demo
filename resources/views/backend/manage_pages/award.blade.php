@extends('backend.layouts.master')
@section('title', 'Award Page')

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

        {{-- manage award info start --}}
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h2 class="text-center">Award Manage</h2>
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
                                    <div class="col-md-4">
                                        <div class="add_button ms-2 float-end">
                                            <a class="btn btn-success" href="{{ route('award') }}">Add Award</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="mb_30 home_page_management_table_area">

                                <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Award Name (English)</th>
                                            <th>Award Name (Bangla)</th>
                                            <th>Award Icon</th>
                                            <th>Award Image</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($awards as $award)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{ $award->en_award_name }}</td>
                                                <td>{{ $award->bn_award_name }}</td>
                                                <td>
                                                    <img src="{{ asset($award->award_icon) }}" alt="" style="max-height: 60px; width: auto;">
                                                </td>
                                                <td>
                                                    <img src="{{ asset($award->award_img) }}" alt="" style="max-height: 200px; width: auto;">
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success" href="{{ route('edit_award', ['id' => $award->id]) }}">Edit</a>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('delete_award') }}" method="post" id="delete">
                                                        @csrf
                                                        <input type="hidden" value="{{ $award->id }}" name="award_id">
                                                        <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                                    </form>
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
        {{-- manage award info end --}}
@endsection
