@extends('backend.layouts.master')
@section('title', 'Type of Institution Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Type of Institution</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.institution-types.update', $institution->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Calculator Name</label>
                                    <div class="col-md-12">
                                        <select name="calculator_id" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach ($calculators as $calculator)
                                                <option value="{{ $calculator->id }}"
                                                    {{ $calculator->id == $institution->calculator_id ? 'selected' : '' }}>
                                                    {{ $calculator->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Name English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_name" class="form-control"
                                            value="{{ $institution->en_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Name
                                        Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control"
                                            value="{{ $institution->bn_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Color Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="color_image">
                                        @if (isset($institution->color_image))
                                            <img src="{{ asset($institution->color_image) }}" alt="" style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">White Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="white_image">
                                        @if (isset($institution->white_image))
                                            <img class="bg-dark" src="{{ asset($institution->white_image) }}" alt="" style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1"
                                                {{ $institution->status == 1 ? 'checked' : '' }} required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0"
                                                {{ $institution->status == 0 ? 'checked' : '' }} required>Inactive</label>
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
