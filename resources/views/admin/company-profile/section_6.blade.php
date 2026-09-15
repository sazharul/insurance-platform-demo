@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit CompanyProfile #Section 6</div>
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

                        <div class="form-group {{ $errors->has('sponsor_image_thumbnail') ? 'has-error' : ''}}">
                            <label for="sponsor_image_thumbnail" class="control-label">{{ 'Sponsor Image Thumbnail' }}</label>
                            <img src="{{asset($companyprofile->sponsor_image_thumbnail)}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
                            <input class="form-control" name="sponsor_image_thumbnail" type="file" id="sponsor_image_thumbnail" value="{{ isset($companyprofile->sponsor_image_thumbnail) ? $companyprofile->sponsor_image_thumbnail : ''}}" >
                            {!! $errors->first('sponsor_image_thumbnail', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_sponsor_title') ? 'has-error' : ''}}">
                            <label for="en_sponsor_title" class="control-label">{{ 'En Sponsor Title' }}</label>
                            <textarea class="form-control" rows="5" name="en_sponsor_title" type="textarea" id="en_sponsor_title" >{{ isset($companyprofile->en_sponsor_title) ? $companyprofile->en_sponsor_title : ''}}</textarea>
                            {!! $errors->first('en_sponsor_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_sponsor_title') ? 'has-error' : ''}}">
                            <label for="bn_sponsor_title" class="control-label">{{ 'Bn Sponsor Title' }}</label>
                            <textarea class="form-control" rows="5" name="bn_sponsor_title" type="textarea" id="bn_sponsor_title" >{{ isset($companyprofile->bn_sponsor_title) ? $companyprofile->bn_sponsor_title : ''}}</textarea>
                            {!! $errors->first('bn_sponsor_title', '<p class="help-block">:message</p>') !!}
                        </div>

                        <br>
                        <br>
                        <hr>

                        <div class="row">
                            <div class="col-12 form-group">
                                <label class="control-label">{{ 'Company Image 1' }}</label>
                                <img src="{{asset($companyprofile->en_sponsor_details[0]->image)}}" alt="" style="height: 100px; width: 100px;" class="mb-3">
                                <input class="form-control" name="sponsor_company_image1" type="file">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Title 1' }}</label>
                                <input class="form-control" name="en_company_title[]" type="text" value="{{ $companyprofile->en_sponsor_details[0]->title }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Title 1' }}</label>
                                <input class="form-control" name="bn_company_title[]" type="text" value="{{ $companyprofile->bn_sponsor_details[0]->title }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Short Description 1' }}</label>
                                <input class="form-control" name="en_short_description[]" type="text" value="{{ $companyprofile->en_sponsor_details[0]->description }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Short Description 1' }}</label>
                                <input class="form-control" name="bn_short_description[]" type="text" value="{{ $companyprofile->bn_sponsor_details[0]->description }}">
                            </div>
                        </div>


                        <hr>


                        <div class="row">
                            <div class="col-12 form-group">
                                <label class="control-label">{{ 'Company Image 2' }}</label>
                                <img src="{{asset($companyprofile->en_sponsor_details[1]->image)}}" alt="" style="height: 100px; width: 100px;" class="mb-3">
                                <input class="form-control" name="sponsor_company_image2" type="file">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Title 2' }}</label>
                                <input class="form-control" name="en_company_title[]" type="text" value="{{ $companyprofile->en_sponsor_details[1]->title }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Title 2' }}</label>
                                <input class="form-control" name="bn_company_title[]" type="text" value="{{ $companyprofile->bn_sponsor_details[1]->title }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'En Short Description 2' }}</label>
                                <input class="form-control" name="en_short_description[]" type="text" value="{{ $companyprofile->en_sponsor_details[1]->description }}">
                            </div>

                            <div class="col-6 form-group">
                                <label class="control-label">{{ 'Bn Short Description 2' }}</label>
                                <input class="form-control" name="bn_short_description[]" type="text" value="{{ $companyprofile->bn_sponsor_details[1]->description }}">
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
