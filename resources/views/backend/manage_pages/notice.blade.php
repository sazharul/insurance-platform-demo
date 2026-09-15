@extends('backend.layouts.master')
@section('title', 'Notices')

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

        {{-- manage Notices info start --}}
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h2 class="text-center">Notices Manage</h2>
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
                                            <a class="btn btn-success" href="{{ route('notice') }}">Add Notice</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mb_30 home_page_management_table_area">

                                <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Notice Title (English)</th>
                                            <th>Notice Title (Bangla)</th>
                                            <th>Notice Description (English)</th>
                                            <th>Notice Description (Bangla)</th>
                                            <th class="text-center">Status</th>
                                            <th colspan="3" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($notices as $notice)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{ $notice->en_notice_title }}</td>
                                                <td>{{ $notice->bn_notice_title }}</td>
                                                <td>{!! \Illuminate\Support\Str::words($notice->en_notice_des, 25, '...') !!}</td>
                                                <td>{!! \Illuminate\Support\Str::words($notice->bn_notice_des, 25, '...') !!}</td>
                                                <td><a href="#" class="status_btn mt-2">{{ $notice->notice_status==1? 'Published':'Unpublished'}}</a></td>
                                                <td class="text-center">
                                                    <a class="btn btn-success" href="{{ route('edit_notice', ['id' => $notice->id]) }}">Edit</a>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('delete_notice') }}" method="post" id="delete">
                                                        @csrf
                                                        <input type="hidden" value="{{ $notice->id }}" name="notice_id">
                                                        <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                                    </form>
                                                </td>
                                                <td>
                                                    @if($notice->notice_status==1)
                                                        <a class="btn btn-warning" href="{{ route('notice_status',['id'=>$notice->id]) }}">Unpublished</a>
                                                    @else
                                                        <a class="btn btn-info" href="{{ route('notice_status',['id'=>$notice->id]) }}">Published</a>
                                                    @endif
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
        {{-- manage Notices info end --}}
@endsection
