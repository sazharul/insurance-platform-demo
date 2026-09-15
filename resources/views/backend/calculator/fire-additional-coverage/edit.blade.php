@extends('backend.layouts.master')
@section('title', 'Fire Interest Tariff Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Fire Interest Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.updateFireAdditionalCoverage.update', $teriff->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Additional Coverage*</label>
                                    <div class="col-md-12 ">
                                        <select name="additional_coverage_id" id="" class="form-control" required>
                                            <option value="" selected>select a option</option>
                                            @foreach ($additional_coverage as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->additional_coverage_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Property Location*</label>
                                    <div class="col-md-12 ">
                                        <select name="location_id" id="" class="form-control" required>
                                            <option value="" selected>select a option</option>
                                            @foreach ($property_location as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->location_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Member Association</label>
                                    <div class="col-md-12 ">
                                        <select name="member_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($member as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->member_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="building">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Building Construction*</label>
                                    <div class="col-md-12 ">
                                        <select name="building_construction_id" id="" class="form-control"
                                            required>
                                            <option value="" selected>select a option</option>
                                            @foreach ($building as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->building_construction_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_class_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mt-3" id="value">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Value*</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="value" class="form-control"
                                            value="{{ $teriff->value }}">
                                    </div>
                                </div>

                                

                                <div class="row mt-3" id="district">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Additional Subcoverage</label>
                                    <div class="col-md-12 ">
                                        <select name="additional_subcoverage_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($subcoverage as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->additional_subcoverage_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="district">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">District</label>
                                    <div class="col-md-12 ">
                                        <select name="district_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($district as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->district_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
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

@section('js')
    
@endsection
