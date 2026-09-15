@extends('backend.layouts.master')
@section('title', 'Tariff Type Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Tariff Type</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.calculator.boilerTeriff.update', $tariff->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="calculator_id" value="{{ $tariff->calculator_id }}">
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Year from</label>
                                    <div class="col-md-12">
                                        <input type="text" name="year_from" class="form-control" value="{{$tariff->year_from}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Year to</label>
                                    <div class="col-md-12">
                                        <input type="text" name="year_to" class="form-control" value="{{$tariff->year_to}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Value(%)</label>
                                    <div class="col-md-12">
                                        <input type="text" name="value" class="form-control" value="{{$tariff->value}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12">
                                        <label for=""><input type="radio" name="status" value="1" {{$tariff->status == 1 ? 'checked' : ''}}>Active</label>
                                        <label for=""><input type="radio" name="status" value="0" {{$tariff->status == 0 ? 'checked' : ''}}>Inactive</label>
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




