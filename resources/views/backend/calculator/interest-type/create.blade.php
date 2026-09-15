@extends('backend.layouts.master')
@section('title', 'Interest Type Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Interest Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.interest-type.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="1">
                                <div class="row mt-2">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Occupation Name</label>
                                    <div class="col-md-12 ">
                                        <select name="occupation_id" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach ($occupation as $calculator)
                                                <option value="{{ $calculator->id }}">{{ $calculator->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12">
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
