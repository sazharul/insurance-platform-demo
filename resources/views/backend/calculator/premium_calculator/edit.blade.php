@extends('backend.layouts.master')
@section('title', 'Premium Calculator Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Premium Calculator</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.update', $calculator->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Name English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_name" class="form-control"
                                            value="{{ $calculator->en_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Name Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control"
                                            value="{{ $calculator->bn_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Color Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="color_image">
                                        @if (isset($calculator->color_image))
                                            <img src="{{ asset($calculator->color_image) }}" alt=""
                                                style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">White Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="white_image">
                                        @if (isset($calculator->white_image))
                                            <img class="bg-dark" src="{{ asset($calculator->white_image) }}" alt=""
                                                style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Age
                                        limit to buy insurance (if any)</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="age_limit" class="form-control"
                                            value="{{ $calculator->age_limit }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Buy
                                        Notice</label>
                                    <div class="col-md-12 ">
                                        <textarea name="notice" class=" summernote form-control">{!! $calculator->notice !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Is
                                        Buyable</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="buyable" value="1"
                                                {{ $calculator->buyable == 1 ? 'checked' : '' }} required>YES</label>
                                        <label for=""><input type="radio" name="buyable" value="0"
                                                {{ $calculator->buyable == 0 ? 'checked' : '' }} required>No</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1"
                                                {{ $calculator->status == 1 ? 'checked' : '' }} requirde>Active</label>
                                        <label for=""><input type="radio" name="status" value="0"
                                                {{ $calculator->status == 0 ? 'checked' : '' }} requirde>Inactive</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success text-center" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
