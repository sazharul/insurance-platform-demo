@extends('backend.layouts.master')
@section('title', 'Product Coverage Edit Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Edit Coverage</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.product_service.coverage.update', $coverage->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Product Service Title</label>
                                    <div class="col-md-12">
                                        <select name="product_service_id" id="" class="form-control">
                                            <option value="" disabled selected><--Select a option--></option>
                                            @foreach($product_services as $service)
                                                <option value="{{$service->id}}" {{$service->id == $coverage->product_service_id ? 'selected' : ''}}>{!! $service->en_title !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Title English</label>
                                    <div class="col-md-12 ">
                                        <textarea name="en_title" class="summernote form-control">{{$coverage->en_title}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Title Bangla</label>
                                    <div class="col-md-12 ">
                                        <textarea name="bn_title" class="summernote form-control">{{$coverage->bn_title}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Short Description English</label>
                                    <div class="col-md-12 ">
                                        <textarea name="en_short_description" class="summernote form-control">{{$coverage->en_short_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Short Description Bangla</label>
                                    <div class="col-md-12 ">
                                        <textarea name="bn_short_description" class="summernote form-control">{{$coverage->bn_short_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">White Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="white_image">
                                        @if(isset($coverage->white_image))
                                            <img src="{{asset($coverage->white_image)}}" alt="" style="max-height: 100px; max-width: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Color Image</label>
                                    <div class="col-md-12 ">
                                        <input type="file" name="color_image">
                                        @if(isset($coverage->color_image))
                                            <img src="{{asset($coverage->color_image)}}" alt="" style="max-height: 100px; max-width: 100px;">
                                        @endif
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




