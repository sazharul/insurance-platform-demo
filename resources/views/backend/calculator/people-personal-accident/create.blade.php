@extends('backend.layouts.master')
@section('title', 'Peoples Personal Accident Insurance Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Peoples Personal
                                Accident Insurance</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.calculator.peoples-personal-accident.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Calculator Name</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_id" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach($calculators as $calculator)
                                                <option value="{{$calculator->id}}">{{$calculator->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="hero_image" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title English</label>
                                    <div class="col-md-12 ">
                                        <textarea name="en_hero_title" class="form-control summernote" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Title Bangla</label>
                                    <div class="col-md-12 ">
                                        <textarea name="bn_hero_title" class="form-control summernote" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_subtitle" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero SubTitle Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_subtitle" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Plan Type Name English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_plan_type_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Plan Type Name Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_plan_type_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Color Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="color_image" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">White Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="white_image" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Capital Sum Insured</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="capital_sum_insured" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Net Premium</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="net_premium" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Vat</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="vat" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Teriff Code</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="teriff_code" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1" checked required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0" required>Inactive</label>
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




