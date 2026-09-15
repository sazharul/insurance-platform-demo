@extends('backend.layouts.master')
@section('title', 'Underwriting')

@section('content')
    {{-- edit underwriting info start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/manage-underwriting') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('update_underwriting') }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="underwriting_id" value="{{$underwriting->id}}">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_title" value="{{$underwriting->en_title}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_title" value="{{$underwriting->bn_title}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Breadcrumb 1 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_breadcrumb1" value="{{$underwriting->en_breadcrumb1}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Breadcrumb 1 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_breadcrumb1" value="{{$underwriting->bn_breadcrumb1}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> En Breadcrumb 2 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_breadcrumb2" value="{{$underwriting->en_breadcrumb2}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label"> Bn Breadcrumb 2 <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_breadcrumb2" value="{{$underwriting->bn_breadcrumb2}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label">Underwriting Image</label>
                                    <img class="mb-3" src="{{asset($underwriting->underwriting_img)}}" alt="" style="max-height: 200px; width:auto;">
                                    <input type="file" name="underwriting_img" placeholder=""
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Underwriting Description (English) <span
                                    class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="5" name="en_under_des" type="textarea" id="en_details" >{{$underwriting->en_under_des}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Underwriting Description (Bangla) <span
                                        class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="5" name="bn_under_des" type="textarea" id="bn_details" >{{$underwriting->bn_under_des}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label">Experience In Years (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_exp_num" value="{{$underwriting->en_exp_num}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <label for="basiInput" class="form-label">Experience In Years (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_exp_num" value="{{$underwriting->bn_exp_num}}" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Underwriting Description (English) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="5" name="en_under_des_last" type="textarea" id="en_company_details" >{{$underwriting->en_under_des_last}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <label for="basiInput" class="form-label">Underwriting Description (Bangla) <span
                                        class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="5" name="bn_under_des_last" type="textarea" id="bn_company_details" >{{$underwriting->bn_under_des_last}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Update this Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- edit underwriting info end --}}

@endsection
