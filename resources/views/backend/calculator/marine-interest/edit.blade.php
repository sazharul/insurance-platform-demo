@extends('backend.layouts.master')
@section('title', 'Marine Interest Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Marine Interest Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.updateMarineInterest.update', $teriff->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="2">



                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Risk coverage</label>
                                    <div class="col-md-12 ">
                                        <select name="risk_coverage_id" id="" class="form-control" required>
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
                                        style="font-weight: bold; font-size: 20px;">English Name</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_name" class="form-control" value="{{ $teriff->en_name }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Bangla Name</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control" value="{{ $teriff->bn_name }}">
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
