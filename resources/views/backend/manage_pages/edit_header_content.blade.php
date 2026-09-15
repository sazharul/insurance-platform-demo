@extends('backend.layouts.master')
@section('title', 'Footer Content Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_body">
                <div class="card-body">
                    <form action="{{route('update_header_content')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="header_content_id" value="{{$header_content->id}}">
                        <div class="card text-center text-white bg-success mb-2">
                            Home Page Header Content
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Header Title (English)</label>
                                <input type="text" name="en_header_title" value="{{$header_content->en_header_title}}" class="form-control" id="inputEmail4"
                                    placeholder="Header Title (English)">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Header Title (Bangla)</label>
                                <input type="text" name="bn_header_title" value="{{$header_content->bn_header_title}}" class="form-control" id="inputEmail4"
                                    placeholder="Header Title (Bangla)">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Short Description (English)</span>
                                    </div>
                                    <textarea class="form-control" name="en_short_description" aria-label="With textarea">{{$header_content->header_company_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Short Description (Bangla)</span>
                                    </div>
                                    <textarea class="form-control" name="bn_short_description" aria-label="With textarea">{{$header_content->header_company_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Header First Image</label>
                                <img src="{{asset($header_content->header_img_one)}}" alt="" style="height=100px; width: 200px;">
                                <input type="file" name="header_img_one" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Header Second Image</label>
                                <img src="{{asset($header_content->header_img_two)}}" alt="" style="height=100px; width: 200px;">
                                <input type="file" name="header_img_two" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Header Third Image</label>
                                <img src="{{asset($header_content->header_img_three)}}" alt="" style="height=100px; width: 200px;">
                                <input type="file" name="header_img_three" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update this Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
