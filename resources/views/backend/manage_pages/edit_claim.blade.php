@extends('backend.layouts.master')
@section('title', 'Claim Update')

@section('content')
    {{-- add claim info start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/manage-claim') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('update_claim') }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="claim_id" value="{{$claim->id}}">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_title" value="{{$claim->en_title}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_title" value="{{$claim->bn_title}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Breadcrumb 1 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_breadcrumb1" value="{{$claim->en_breadcrumb1}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Breadcrumb 1 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_breadcrumb1" value="{{$claim->bn_breadcrumb1}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Breadcrumb 2 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_breadcrumb2" value="{{$claim->en_breadcrumb2}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Breadcrumb 2 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_breadcrumb2" value="{{$claim->bn_breadcrumb2}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Claim Heading (English) <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="en_claim_heading" id="en_company_details" aria-label="With textarea">{{$claim->en_claim_heading}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Claim Heading (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="bn_claim_heading" id="bn_company_details" aria-label="With textarea">{{$claim->bn_claim_heading}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Description (English)</span>
                                    </div>
                                    <textarea class="form-control" name="en_claim_description" id="en_details" aria-label="With textarea">{{$claim->en_claim_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Description (Bangla)</span>
                                    </div>
                                    <textarea class="form-control" name="bn_claim_description" id="bn_details" aria-label="With textarea">{{$claim->bn_claim_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="">
                                    <label for="basiInput" class="form-label">Claim Page Image</label>
                                    <img class="mb-3" src="{{ asset($claim->claim_img) }}" style="max-height:200px; width:auto;">
                                    <input type="file" name="claim_img" placeholder="Claim Page Image"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Claim Statement Heading (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_statement_head" value="{{$claim->en_statement_head}}" class="form-control" id="basiInput"
                                        required placeholder="Claim Statement Heading (English)">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Claim Statement Heading (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_statement_head" value="{{$claim->bn_statement_head}}" class="form-control" id="basiInput"
                                        required placeholder="Claim Statement Heading (Bangla)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="basiInput" class="form-label">Claim Statement Description (English) <span
                                    class="text-danger">*</span></label>
                                <div class="white_box mb_30">
                                    <textarea name="en_claim_state_des" id="en_description" class="kt-ckeditor-1">{{$claim->en_claim_state_des}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="basiInput" class="form-label">Claim Statement Description (Bangla) <span
                                    class="text-danger">*</span></label>
                                <div class="white_box mb_30">
                                    <textarea name="bn_claim_state_des" id="bn_description" class="kt-ckeditor-2">{{$claim->bn_claim_state_des}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success" type="submit">Update this Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- add claim info end --}}
@endsection
