@extends('backend.layouts.master')
@section('title', 'Personal Awards Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Personal Awards</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.awards.update', $award->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Employee Name</label>
                                    <div class="col-md-12 ">
                                        <select name="employee_id" id="" class="form-control">
                                            <option value="" selected disabled>select a option</option>
                                            @foreach($employees as $employee)
                                                <option value="{{$employee->id}}" {{$employee->id == $award->employee_id ? 'selected': ''}}>{{$employee->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Name English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_name" class="form-control" value="{{$award->en_name}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Name Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control" value="{{$award->bn_name}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Year English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_year" class="form-control" value="{{$award->en_year}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Year Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_year" class="form-control" value="{{$award->bn_year}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Recognition English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_recognition" class="form-control" value="{{$award->en_recognition}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Recognition Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_recognition" class="form-control" value="{{$award->bn_recognition}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="image">
                                        <img src="{{asset($award->image)}}" alt="" style="height: 100px; width: 100px">
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




