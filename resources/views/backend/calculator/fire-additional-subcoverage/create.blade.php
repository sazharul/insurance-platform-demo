@extends('backend.layouts.master')
@section('title', 'Fire Additional Subcoverage Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Fire Additional subcoverage</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.StoreFireAdditionalSubcoverage.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Additional Coverage*</label>
                                    <div class="col-md-12 ">
                                        <select name="additional_coverage_id" id="" class="form-control" required>
                                            <option value="" selected>select a option</option>
                                            @foreach ($additional_coverage as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="row mt-3" id="calculation_type">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Calculation Type*</label>
                                    <div class="col-md-12 ">
                                        <select name="type" id="" class="form-control">
                                            <option value="1" selected>Combine Calculation</option>
                                            <option value="2">Single Calculation</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="sub_en_name">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Subcoverage English Name*</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_name" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3" id="sub_bn_name">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Subcoverage Bangla Name*</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control">
                                    </div>
                                </div>

                                {{-- <div class="row mt-3" id="district">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">District</label>
                                    <div class="col-md-12 ">
                                        <select name="district_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($district as $item)
                                                <option value="{{ $item->id }}">{{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="row mt-3" id="is_fixed">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Fixed*</label>
                                    <div class="col-md-12 ">
                                        <select name="is_fixed" id="" class="form-control" required>
                                            <option selected>Select option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
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

@section('js')

@endsection
