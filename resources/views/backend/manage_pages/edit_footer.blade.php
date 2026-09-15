@extends('backend.layouts.master')
@section('title', 'Footer Content Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_body">
                <div class="card-body">
                    <form action="{{ route('update_footer') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="footer_id" value="{{$footer->id}}">
                        <div class="card text-center text-white bg-success mb-2">
                            Footer Section
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Footer Copyright (English)</label>
                                <input type="text" name="en_footer_copyright" value="{{$footer->en_footer_copyright}}" class="form-control" id="inputEmail4"
                                    placeholder="Footer Copyright (English)">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Footer Copyright (Bangla)</label>
                                <input type="text" name="bn_footer_copyright" value="{{$footer->bn_footer_copyright}}" class="form-control" id="inputEmail4"
                                    placeholder="Footer Copyright (Bangla)">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Newsletter (English)</label>
                                <input type="text" name="en_newsletter" value="{{$footer->en_newsletter}}" class="form-control" id="inputEmail4"
                                    placeholder="Newsletter (English)">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Newsletter (Bangla)</label>
                                <input type="text" name="bn_newsletter" value="{{$footer->bn_newsletter}}" class="form-control" id="inputEmail4"
                                    placeholder="Newsletter (Bangla)">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Newsletter Description (English)</label>
                                <input type="text" name="en_newsletter_des" value="{{$footer->en_newsletter_des}}" class="form-control" id="inputEmail4"
                                    placeholder="Newsletter (English)">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Newsletter Description (Bangla)</label>
                                <input type="text" name="bn_newsletter_des" value="{{$footer->bn_newsletter_des}}" class="form-control" id="inputEmail4"
                                    placeholder="Newsletter (Bangla)">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update this Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
