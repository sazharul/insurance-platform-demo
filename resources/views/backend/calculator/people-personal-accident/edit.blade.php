@extends('backend.layouts.master')
@section('title', 'Peoples Personal Accident Insurance Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Peoples Personal
                                Accident Insurance</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.calculator.peoples-personal-accident.update', $accident->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Calculator Name</label>
                                    <div class="col-md-12 ">
                                        <select name="calculator_id" id="" class="form-control" required>
                                            <option value="" selected disabled>select a option</option>
                                            @foreach ($calculators as $calculator)
                                                <option value="{{ $calculator->id }}"
                                                    {{ $calculator->id == $accident->calculator_id ? 'selected' : '' }}>
                                                    {{ $calculator->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Hero Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="hero_image">
                                        @if (isset($accident->hero_image))
                                            <img src="{{ asset($accident->hero_image) }}" alt=""
                                                style="max-height: 100px; max-width: 100px;"">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Hero Title English</label>
                                    <div class="col-md-12 ">
                                        <textarea name="en_hero_title" class="form-control summernote" required>{!! $accident->en_hero_title !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Hero Title Bangla</label>
                                    <div class="col-md-12 ">
                                        <textarea name="bn_hero_title" class="form-control summernote" required>{!! $accident->bn_hero_title !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Hero SubTitle English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_hero_subtitle" class="form-control"
                                            value="{!! $accident->en_hero_subtitle !!}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Hero SubTitle Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_hero_subtitle" class="form-control"
                                            value="{!! $accident->bn_hero_subtitle !!}" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Plan Type Name English</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_plan_type_name" class="form-control"
                                            value="{!! $accident->en_plan_type_name !!}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Plan Type Name Bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_plan_type_name" class="form-control"
                                            value="{!! $accident->bn_plan_type_name !!}" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Color Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="color_image">
                                        @if (isset($accident->color_image))
                                            <img src="{{ asset($accident->color_image) }}" alt=""
                                                style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">White Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="white_image">
                                        @if (isset($institution->white_image))
                                            <img class="bg-dark" src="{{ asset($institution->white_image) }}"
                                                alt="" style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Capital Sum Insured</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="capital_sum_insured" class="form-control"
                                            value="{!! $accident->capital_sum_insured !!}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Net Premium</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="net_premium" class="form-control"
                                            value="{!! $accident->net_premium !!}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Vat</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="vat" class="form-control"
                                            value="{{ $accident->vat }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Teriff_code</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="teriff_code" class="form-control"
                                            value="{{ $accident->teriff_code }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="1"
                                                {{ $accident->status == 1 ? 'checked' : '' }} required>Active</label>
                                        <label for=""><input type="radio" name="status" value="0"
                                                {{ $accident->status == 0 ? 'checked' : '' }} required>Inactive</label>
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
