@extends('backend.layouts.master')
@section('title', 'Underwriting')

@section('content')
    @if (Session::has('message'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
    {{-- add underwriting info start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Underwriting Page</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('save_underwriting') }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_title" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_title" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Breadcrumb 1 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_breadcrumb1" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Breadcrumb 1 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_breadcrumb1" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Breadcrumb 2 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_breadcrumb2" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Breadcrumb 2 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_breadcrumb2" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label">Underwriting Image</label>
                                    <input type="file" name="underwriting_img" placeholder=""
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Underwriting Description (English) <span
                                    class="text-danger">*</span></label>
                                    <textarea class="summernote" name="en_under_des" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Underwriting Description (Bangla) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="bn_under_des" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label">Experience In Years (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_exp_num" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label">Experience In Years (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_exp_num" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Underwriting Description (English) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="en_under_des_last" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Underwriting Description (Bangla) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="bn_under_des_last" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Add this Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- add underwriting info end --}}
@endsection
