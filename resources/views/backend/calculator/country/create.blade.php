@extends('backend.layouts.master')
@section('title', 'Countries to be Visited Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Country</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.country.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Name English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Name Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Country Type</label>
                                    <div class="col-md-12 ">
                                        <select name="type" id="" class="form-control">
                                            <option value="" disabled selected>Select a option</option>
                                            <option value="1">NONSCHENGEN</option>
                                            <option value="2">SCHENGEN</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1" checked
                                                required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0"
                                                required>Inactive</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success text-center" value="Create">
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
