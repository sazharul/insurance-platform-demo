@extends('backend.layouts.master')
@section('title', 'Testimonial Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_body">
                <div class="card-body">
                    <a href="{{ url('/admin/home-page-edit/section6') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br>
                    <br>
                    <form action="{{route('update_testimonial')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Client Name (English)</label>
                                <input type="text" name="en_client_name" value="{{$testimonial->en_client_name}}" class="form-control" id="inputEmail4"
                                    placeholder="Client Name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Client Name (Bangla)</label>
                                <input type="text" name="bn_client_name" value="{{$testimonial->bn_client_name}}" class="form-control" id="inputEmail4"
                                    placeholder="Client Name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Designation (English)</label>
                                <input type="text" name="en_client_designation" value="{{$testimonial->en_client_designation}}" class="form-control" id="inputEmail4"
                                    placeholder="Client Designation">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Designation (Bangla)</label>
                                <input type="text" name="bn_client_designation" value="{{$testimonial->bn_client_designation}}" class="form-control" id="inputEmail4"
                                    placeholder="Client Designation">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Feedback (English)</span>
                                    </div>
                                    <textarea class="form-control" name="en_client_feedback" aria-label="With textarea">{{$testimonial->en_client_feedback}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Feedback (Bangla)</span>
                                    </div>
                                    <textarea class="form-control" name="bn_client_feedback" aria-label="With textarea">{{$testimonial->bn_client_feedback}}</textarea>
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
