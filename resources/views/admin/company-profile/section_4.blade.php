@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit CompanyProfile #Section 4</div>
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
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Value 1' }}</label>
                                <input class="form-control" name="en_value[]" type="text" value="{{ $companyprofile->en_value_details[0]->en_value }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Value 1' }}</label>
                                <input class="form-control" name="bn_value[]" type="text" value="{{ $companyprofile->bn_value_details[0]->bn_value }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Description 1' }}</label>
                                <input class="form-control" name="en_description[]" type="text" value="{{ $companyprofile->en_value_details[0]->en_description }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Description 1' }}</label>
                                <input class="form-control" name="bn_description[]" type="text" value="{{ $companyprofile->bn_value_details[0]->bn_description }}">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Value 2' }}</label>
                                <input class="form-control" name="en_value[]" type="text" value="{{ $companyprofile->en_value_details[1]->en_value }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Value 2' }}</label>
                                <input class="form-control" name="bn_value[]" type="text" value="{{ $companyprofile->bn_value_details[1]->bn_value }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Description 2' }}</label>
                                <input class="form-control" name="en_description[]" type="text" value="{{ $companyprofile->en_value_details[1]->en_description }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Description 2' }}</label>
                                <input class="form-control" name="bn_description[]" type="text" value="{{ $companyprofile->bn_value_details[1]->bn_description }}">
                            </div>
                        </div>


                        <hr>


                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Value 3' }}</label>
                                <input class="form-control" name="en_value[]" type="text" value="{{ $companyprofile->en_value_details[2]->en_value }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Value 3' }}</label>
                                <input class="form-control" name="bn_value[]" type="text" value="{{ $companyprofile->bn_value_details[2]->bn_value }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Description 3' }}</label>
                                <input class="form-control" name="en_description[]" type="text" value="{{ $companyprofile->en_value_details[2]->en_description }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Description 3' }}</label>
                                <input class="form-control" name="bn_description[]" type="text" value="{{ $companyprofile->bn_value_details[2]->bn_description }}">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Value 4' }}</label>
                                <input class="form-control" name="en_value[]" type="text" value="{{ $companyprofile->en_value_details[3]->en_value }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Value 4' }}</label>
                                <input class="form-control" name="bn_value[]" type="text" value="{{ $companyprofile->bn_value_details[3]->bn_value }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Description 4' }}</label>
                                <input class="form-control" name="en_description[]" type="text" value="{{ $companyprofile->en_value_details[3]->en_description }}">
                            </div>
                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Description 4' }}</label>
                                <input class="form-control" name="bn_description[]" type="text" value="{{ $companyprofile->bn_value_details[3]->bn_description }}">
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
