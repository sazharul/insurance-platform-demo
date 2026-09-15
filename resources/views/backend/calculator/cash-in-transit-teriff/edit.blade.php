@extends('backend.layouts.master')
@section('title', 'Cash In Transit Tariff Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Cash in Transit Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.updateCashInTransitTeriff.update', $teriff->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="10">

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

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Turnover up to</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="turnover_up_to" class="form-control" value="{{ $teriff->turnover_up_to }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Turnover up to Value</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="turnover_up_to_value" class="form-control" value="{{ $teriff->turnover_up_to_value }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Turnover For Over</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="turnover_for_over" class="form-control" value="{{ $teriff->turnover_for_over }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Turnover for Over Value</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="turnover_for_over_value" class="form-control" value="{{ $teriff->turnover_for_over_value }}">
                                    </div>
                                </div>

                                <div class="row mt-3" id="armored">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Armored</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="armored" value="1"
                                                {{ $teriff->armored == 1 ? 'checked' : '' }}>Yes</label>
                                        <label for=""><input type="radio" name="armored" value="0"
                                                {{ $teriff->armored == 0 ? 'checked' : '' }}>No</label>
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
