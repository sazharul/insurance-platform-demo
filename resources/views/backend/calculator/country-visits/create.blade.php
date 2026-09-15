@extends('backend.layouts.master')
@section('title', 'Countries to be Visited Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Countries to be Visited</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.country-visits.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Calculator Name</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_id" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach ($calculators as $calculator)
                                                <option value="{{ $calculator->id }}">{{ $calculator->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Insurance sub type</label>
                                        <div class="col-md-12 ">
                                            <select name="Insurance_sub_type_id" id="" class="form-control"
                                                required>
                                                <option value="" selected disabled>select</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->en_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Select Country type</label>
                                        <div class="col-md-12 ">
                                            <select name="country_type_id" id="" class="form-control" required>
                                                <option value="" selected disabled>select</option>
                                                <option value="1">Excluding USA and CANADA (NONSCHENGENING)</option>
                                                <option value="2">Excluding USA and CANADA (SCHENGENING)</option>
                                                <option value="3">Including USA and CANADA (NONSCHENGENING)</option>
                                                <option value="4">Including USA and CANADA (SCHENGENING)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Day from</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="day_from" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Day to</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="day_to" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Age from</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="age_from" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Age to</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="age_to" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Premium Amount</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="amount" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Price Limit</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="price_limit" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Amount</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="amount_limit" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Next Price Limit</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="next_price_limit" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Next Amount</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="next_amount" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Teriff Code</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="teriff_code" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1"
                                                checked required>Active</label>
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
