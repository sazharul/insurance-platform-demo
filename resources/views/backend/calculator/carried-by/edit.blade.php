@extends('backend.layouts.master')
@section('title', 'Carried By Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Carried By</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.carried-bies.update', $carry->id) }}" method="post"
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
                                                    {{ $calculator->id == $carry->calculator_id ? 'selected' : '' }}>
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
                                            value="{{ $carry->en_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Name
                                        Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control"
                                            value="{{ $carry->bn_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Color Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="color_image">
                                        @if (isset($carry->color_image))
                                            <img src="{{ asset($carry->color_image) }}" alt="" style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">White Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="white_image">
                                        @if (isset($carry->white_image))
                                            <img class="bg-dark" src="{{ asset($carry->white_image) }}" alt="" style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Charge Type</label>
                                    <div class="col-md-12">
                                        <select name="charge_type" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            <option value="1"   {{ $carry->charge_type == 1 ? 'selected' : '' }}>Fixed</option>
                                            <option value="2" {{ $carry->charge_type == 2 ? 'selected' : '' }}>Fraction</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Price Limit</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="price_limit" value="{{ $carry->price_limit }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Amount</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="amount" value="{{ $carry->amount }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Next Price Limit</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="next_price_limit" value="{{ $carry->next_price_limit }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Next Amount</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="next_amount" value="{{ $carry->next_amount }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1"
                                                {{ $carry->status == 1 ? 'checked' : '' }} required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0"
                                                {{ $carry->status == 0 ? 'checked' : '' }} required>Inactive</label>
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
