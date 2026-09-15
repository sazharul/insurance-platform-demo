@extends('backend.layouts.master')
@section('title', 'Product Service Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Product Service</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.product_service.services.update', $service->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Service name english</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="en_service_name" class="form-control" value="{{ $service->en_service_name }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Service name bangla</label>
                                    <div class="col-md-12 ">
                                        <input type="text" name="bn_service_name" class="form-control" value="{{ $service->bn_service_name }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Title English</label>
                                    <div class="col-md-12 ">
                                        <textarea name="en_title" class="summernote form-control">{{ $service->en_title }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Title Bangla</label>
                                    <div class="col-md-12 ">
                                        <textarea name="bn_title" class="summernote form-control">{{ $service->bn_title }}</textarea>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Short Description English</label>
                                    <div class="col-md-12">
                                        <textarea name="en_short_description" class="summernote form-control">{{ $service->en_short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Short Description Bangla</label>
                                    <div class="col-md-12 ">
                                        <textarea name="bn_short_description" class="summernote">{{ $service->bn_short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Hero Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="hero_image">
                                        @if (isset($service->hero_image))
                                            <img src="{{ asset($service->hero_image) }}" alt=""
                                            style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12"
                                        style="font-weight: bold; font-size: 20px;">White Icon</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="white_icon">
                                        @if (isset($service->white_icon))
                                            <img src="{{ asset($service->white_icon) }}" alt=""
                                            style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12"
                                        style="font-weight: bold; font-size: 20px;">Color Icon</label>
                                    <div class="col-md-12">
                                        <input type="file" name="color_icon">
                                        @if (isset($service->color_icon))
                                            <img src="{{ asset($service->color_icon) }}" alt=""
                                            style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="image">
                                        @if (isset($service->image))
                                            <img src="{{ asset($service->image) }}" alt=""
                                            style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Insurance Process Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="insurance_process_image">
                                        @if (isset($service->insurance_process_image))
                                            <img src="{{ asset($service->insurance_process_image) }}" alt=""
                                            style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 "
                                        style="font-weight: bold; font-size: 20px;">Status</label>
                                    <div class="col-md-12 ">
                                        <label for=""><input type="radio" name="status" value="0"
                                                {{ $service->status == 0 ? 'checked' : '' }}>Inactive</label>
                                        <label for=""><input type="radio" name="status" value="1"
                                                {{ $service->status == 1 ? 'checked' : '' }}>Active</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success" value="Update Service">
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
