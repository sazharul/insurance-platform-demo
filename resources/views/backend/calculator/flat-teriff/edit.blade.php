@extends('backend.layouts.master')
@section('title', 'Flat/Apartment Tariff Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Flat/Apartment Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.updateFlatTeriff.update', $teriff->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="8">

                                <div class="row mt-3">
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
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Location</label>
                                    <div class="col-md-12 ">
                                        <select name="location_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($location as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->location_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Risk coverage</label>
                                    <div class="col-md-12 ">
                                        <select name="risk_coverage_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($risk_coverage as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->risk_coverage_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Value</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="value" class="form-control"
                                            value="{{ $teriff->value }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Teriff Code</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="teriff_code" class="form-control"
                                            value="{{ $teriff->teriff_code }}">
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
