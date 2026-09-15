@extends('backend.layouts.master')
@section('title', 'Testimonial Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_body">
                <div class="card-body">
                    <a href="{{ url('/admin/home-page-edit/section6') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <form action="{{route('update_testimonial_left')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="testimonial_info_id" value="{{$testimonial_info->id}}">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Testimonial Title (English)</label>
                                <input type="text" name="en_testimonial_title" value="{{$testimonial_info->en_testimonial_title}}" class="form-control" id="inputEmail4"
                                    placeholder="Client Name">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Testimonial Title (Bangla)</label>
                                <input type="text" name="bn_testimonial_title" value="{{$testimonial_info->bn_testimonial_title}}" class="form-control" id="inputEmail4"
                                    placeholder="Client Name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Description (English)</span>
                                    </div>
                                    <textarea class="form-control" name="en_testimonial_description" aria-label="With textarea">{{$testimonial_info->en_testimonial_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Description (Bangla)</span>
                                    </div>
                                    <textarea class="form-control" name="bn_testimonial_description" aria-label="With textarea">{{$testimonial_info->bn_testimonial_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update this Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
