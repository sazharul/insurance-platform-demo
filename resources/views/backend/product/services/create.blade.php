@extends('backend.layouts.master')
@section('title', 'Product Service Add Page')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center text-capitalize">Add Product Service</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.product_service.services.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Service name english</label>
                                <div class="col-md-12 ">
                                    <input type="text" name="en_service_name" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Service name bangla</label>
                                <div class="col-md-12 ">
                                    <input type="text" name="bn_service_name" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Title English</label>
                                <div class="col-md-12">
                                    <textarea name="en_title" class="summernote form-control"></textarea>
                                </div>
                            </div>



                            <div class="row mt-3">
                                <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">Title Bangla</label>
                                <div class="col-md-12 ">
                                    <textarea name="bn_title" class="summernote form-control"></textarea>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Short Description English</label>
                                <div class="col-md-12 ">
                                    <textarea name="en_short_description" class="summernote form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Short Description Bangla</label>
                                <div class="col-md-12 ">
                                    <textarea name="bn_short_description" class="summernote form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Hero Image</label>
                                <div class="col-md-12 ">
                                    <input type="file" name="hero_image">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-12" style="font-weight: bold; font-size: 20px;">White Icon</label>
                                <div class="col-md-12">
                                    <input type="file" name="white_icon">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Color Icon</label>
                                <div class="col-md-12 ">
                                    <input type="file" name="color_icon">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Image</label>
                                <div class="col-md-12 ">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Insurance Process Image</label>
                                <div class="col-md-12 ">
                                    <input type="file" name="insurance_process_image">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-12 " style="font-weight: bold; font-size: 20px;">Status</label>
                                <div class="col-md-8">
                                    <label for=""><input type="radio" name="status" value="0" checked>Inactive</label>
                                    <label for=""><input type="radio" name="status" value="1" >Active</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success" value="Add Service">
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




