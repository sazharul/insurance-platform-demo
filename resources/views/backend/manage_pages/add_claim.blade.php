@extends('backend.layouts.master')
@section('title', 'Claim')

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
    {{-- add claim info start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Claim Page</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('save_claim') }}" class="form-horizontal"
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
                                    <input type="text" name="bn_breadcrumb2" class="form-control" id="basiInput"
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
                            <div class="col-md-12">
                                <div class="">
                                    <label for="basiInput" class="form-label">Claim Page Image</label>
                                    <input type="file" name="claim_img" placeholder="Claim Page Image"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Claim Heading (English) <span
                                            class="text-danger">*</span></label>
                                            <textarea class="form-control" name="en_claim_heading" id="en_company_details" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Claim Heading (Bangla) <span
                                            class="text-danger">*</span></label>
                                            <textarea class="form-control" name="bn_claim_heading" id="en_company_details" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Claim Description (English) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Claim Description (Bangla) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Info Table Heading (English)<span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Info Table Heading (Bangla)<span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Info Table Description (English) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Info Table Description (Bangla) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="summernote" name="" id="" cols="30" rows="10"></textarea>
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

    {{-- add claim info end --}}

@endsection
