@extends('backend.layouts.master')
@section('title', 'Home Page Content Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_body">
                <div class="card-body">
                    <form action="{{ route('update_home_header') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="hh_info_id" value="{{$hh_info->id}}">
                        <div class="card text-center text-white bg-success">
                            Header Section
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Hero 1st Image</label> <br>
                                <img src="{{asset($hh_info->header_first_img)}}" alt="" style="height=100px; width: 150px;">
                                <input type="file" name="header_first_img" class="form-control"
                                    id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                    aria-label="Upload">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Hero 2nd Image</label> <br>
                                <img src="{{asset($hh_info->header_sec_img)}}" alt="" style="height=100px; width: 150px;">
                                <input type="file" name="header_sec_img" class="form-control"
                                    id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                    aria-label="Upload">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Hero 3rd Image</label> <br>
                                <img src="{{asset($hh_info->header_third_img)}}" alt="" style="height=100px; width: 150px;">
                                <input type="file" name="header_third_img" class="form-control"
                                    id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                    aria-label="Upload">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <input class="btn btn-success" type="submit" value="Update this Info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
