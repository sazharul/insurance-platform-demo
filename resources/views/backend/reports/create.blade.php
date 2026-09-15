@extends('backend.layouts.master')
@section('title', 'Reports Create Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Add Reports</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.reports_for.reports.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-5">
                                    <label for="" class="col-md-12 mt-3" style="font-weight: bold; font-size: 20px;">Title English</label>
                                    <div class="col-md-12 mt-3">
                                        <textarea name="en_title" class="summernote form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <label for="" class="col-md-12 mt-3" style="font-weight: bold; font-size: 20px;">Title Bangla</label>
                                    <div class="col-md-12 mt-3">
                                        <textarea name="bn_title" class="summernote form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <label for="" class="col-md-12 mt-3" style="font-weight: bold; font-size: 20px;">Icon Image</label>
                                    <div class="col-md-12 mt-3">
                                        <input type="file" name="icon_image">
                                    </div>
                                </div>
                                <div class="row mt-5">
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




