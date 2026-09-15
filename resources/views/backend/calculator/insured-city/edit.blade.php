@extends('backend.layouts.master')
@section('title', 'Insured City Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Insured City</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.insured-city.update', $institution->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
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
