@extends('backend.layouts.master')
@section('title', 'Boiler Tariff Type Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Boiler Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.calculator.boilerTeriff.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="12">
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Year from</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="year_from" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Year to</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="year_to" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Value(%)</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="value" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12">
                                        <label for=""><input type="radio" name="status" value="1" checked>Active</label>
                                        <label for=""><input type="radio" name="status" value="0">Inactive</label>
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




