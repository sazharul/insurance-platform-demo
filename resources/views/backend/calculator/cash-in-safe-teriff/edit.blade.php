@extends('backend.layouts.master')
@section('title', 'Cash In Safe and In Transit Tariff Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">EditCash in Safe Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.updateCashInSafeTeriff.update', $teriff->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="9">

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Institution</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_institute_type_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($institution as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->calculator_institute_type_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="property">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Property Location</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_property_location_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($property_location as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->calculator_property_location_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">SRCC</label>
                                    <div class="col-md-12 ">
                                        <select name="srcc_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($srcc as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->srcc_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="building">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Building Construction</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_building_construction_id" id=""
                                            class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($building as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->calculator_building_construction_id == $item->id) {{ 'selected' }} @endif>
                                                    {{ $item->en_class_title }}</option>
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
