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

                            <form action="{{route('admin.calculator.tariff-types.update', $tariff->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Calculator Name</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_id" id="" class="form-control">
                                            <option value="" selected disabled>select a option</option>
                                            @foreach($calculators as $calculator)
                                                <option value="{{$calculator->id}}" {{$calculator->id == $tariff->calculator_id ? 'selected' : ''}}>{{$calculator->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Name English</label>
                                    <div class="col-md-12">
                                        <input type="text" name="en_name" class="form-control" value="{{$tariff->en_name}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Name Bangla</label>
                                    <div class="col-md-12">
                                        <input type="text" name="bn_name" class="form-control" value="{{$tariff->bn_name}}">
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Value</label>
                                    <div class="col-md-12">
                                        <input type="text" name="value" class="form-control" value="{{$tariff->value}}">
                                    </div>
                                </div> --}}
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




