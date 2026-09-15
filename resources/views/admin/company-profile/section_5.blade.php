@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit CompanyProfile #{{ $companyprofile->id }}</div>
                <div class="card-body">
                    <a href="{{ url('/admin/company-profile') }}" title="Back">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                    </a>
                    <br/>
                    <br/>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/company-profile/' . $companyprofile->id) }}" accept-charset="UTF-8" class="form-horizontal"
                          enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-12 form-group">
                                <label class="control-label">{{ 'Icon 1' }}</label>
                                <img src="{{asset($companyprofile->icon)}}" alt="" style="height: 80px; width: 80px;" class="mb-3">
                                <input class="form-control" name="icon[]" type="file">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Value 1' }}</label>
                                <input class="form-control" name="en_asset[]" type="text" value="{{ (isset($companyprofile->en_asset_details)) ? $companyprofile->en_asset_details[0]->asset : '' }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Value 1' }}</label>
                                <input class="form-control" name="bn_asset[]" type="text" value="{{ (isset($companyprofile->bn_asset_details)) ? $companyprofile->bn_asset_details[0]->asset : '' }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Description 1' }}</label>
                                <input class="form-control" name="en_asset_text[]" type="text" value="{{ (isset($companyprofile->en_asset_details)) ? $companyprofile->en_asset_details[0]->description : '' }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Description 1' }}</label>
                                <input class="form-control" name="bn_asset_text[]" type="text" value="{{ (isset($companyprofile->bn_asset_details)) ? $companyprofile->bn_asset_details[0]->description : '' }}">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12 form-group">
                                <label class="control-label">{{ 'Icon 2' }}</label>
                                <img src="{{asset($companyprofile->icon)}}" alt="" style="height: 80px; width: 80px;" class="mb-3">
                                <input class="form-control" name="icon[]" type="file">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Value 2' }}</label>
                                <input class="form-control" name="en_asset[]" type="text" value="{{ (isset($companyprofile->en_asset_details)) ? $companyprofile->en_asset_details[1]->asset : '' }}" >
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Value 2' }}</label>
                                <input class="form-control" name="bn_asset[]" type="text" value="{{ (isset($companyprofile->bn_asset_details)) ? $companyprofile->bn_asset_details[1]->asset : '' }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Description 2' }}</label>
                                <input class="form-control" name="en_asset_text[]" type="text" value="{{ (isset($companyprofile->en_asset_details)) ? $companyprofile->en_asset_details[1]->description : '' }}" >
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Description 2' }}</label>
                                <input class="form-control" name="bn_asset_text[]" type="text" value="{{ (isset($companyprofile->bn_asset_details)) ? $companyprofile->bn_asset_details[1]->description : '' }}">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12 form-group">
                                <label class="control-label">{{ 'Icon 3' }}</label>
                                <img src="{{asset($companyprofile->icon)}}" alt="" style="height: 80px; width: 80px;" class="mb-3">
                                <input class="form-control" name="icon[]" type="file">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Value 3' }}</label>
                                <input class="form-control" name="en_asset[]" type="text" value="{{ (isset($companyprofile->en_asset_details)) ? $companyprofile->en_asset_details[2]->asset : '' }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Value 3' }}</label>
                                <input class="form-control" name="bn_asset[]" type="text" value="{{ (isset($companyprofile->bn_asset_details)) ? $companyprofile->bn_asset_details[2]->asset : '' }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Description 3' }}</label>
                                <input class="form-control" name="en_asset_text[]" type="text" value="{{ (isset($companyprofile->en_asset_details)) ? $companyprofile->en_asset_details[2]->description : '' }}" >
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Description 3' }}</label>
                                <input class="form-control" name="bn_asset_text[]" type="text" value="{{ (isset($companyprofile->bn_asset_details)) ? $companyprofile->bn_asset_details[2]->description : '' }}">
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')

@endsection
