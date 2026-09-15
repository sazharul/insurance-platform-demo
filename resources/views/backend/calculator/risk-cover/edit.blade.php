@extends('backend.layouts.master')
@section('title', 'Risk Cover Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Risk Cover</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.risk-cover.update', $risk_cover->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Calculator Name</label>
                                    <div class="col-md-12">
                                        <select name="calculator_id" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach ($calculators as $calculator)
                                                <option value="{{ $calculator->id }}"
                                                    {{ $calculator->id == $risk_cover->calculator_id ? 'selected' : '' }}>
                                                    {{ $calculator->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Name English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_name" class="form-control" value="{{ $risk_cover->en_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Name
                                        Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_name" class="form-control" value="{{ $risk_cover->bn_name }}" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                           style="font-weight: bold; font-size: 20px;">Title English (if any)</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_title" class="form-control" value="{{ $risk_cover->en_title }}" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Title Bangla (if any)</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_title" class="form-control" value="{{ $risk_cover->bn_title }}" >
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                           style="font-weight: bold; font-size: 20px;">Subtitle English (if any)</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_subtitle" class="form-control" value="{{ $risk_cover->en_subtitle }}" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Subtitle Bangla (if any)</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_subtitle" class="form-control" value="{{ $risk_cover->bn_subtitle }}" >
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                           style="font-weight: bold; font-size: 20px;">Value (if any)</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="value" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1" {{ $risk_cover->status == 1 ? 'checked' : '' }} required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0" {{ $risk_cover->status == 0 ? 'checked' : '' }} required>Inactive</label>
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
