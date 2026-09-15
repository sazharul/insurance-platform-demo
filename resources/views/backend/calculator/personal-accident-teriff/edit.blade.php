@extends('backend.layouts.master')
@section('title', 'Personal Accident Tariff Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Personal Accident Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.updatePersonalAccidentTeriff.update', $teriff->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="5">

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Class of occupation</label>
                                    <div class="col-md-12 ">
                                        <select name="occupation_id" id="" class="form-control">
                                            <option value="" selected>select a option</option>
                                            @foreach ($occupation as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($teriff->occupation_id == $item->id) {{ 'selected' }} @endif>
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
                                    <div class="col-md-6">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Price Limit</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="price_limit"
                                                value="{{ $teriff->price_limit }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Amount</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="amount_limit" value="{{ $teriff->amount_limit }}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Next Price Limit</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="next_price_limit"
                                                value="{{ $teriff->next_price_limit }}" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Next Amount</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="next_amount"
                                                value="{{ $teriff->next_amount }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <label for="" class="col-md-12 "
                                            style="font-weight: bold; font-size: 20px;">Teriff Code</label>
                                        <div class="col-md-12 ">
                                            <input type="text" name="teriff_code" class="form-control" value="{{ $teriff->teriff_code }}" required>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row mt-3" id="armored">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Medical benefits</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="medical_benefits" value="1"
                                                {{ $teriff->medical_benefits == 1 ? 'checked' : '' }}>Yes</label>
                                        <label for=""><input type="radio" name="medical_benefits" value="0"
                                                {{ $teriff->medical_benefits == 0 ? 'checked' : '' }}>No</label>
                                    </div>
                                </div> --}}

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
