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

                        <div class="form-group {{ $errors->has('building_img') ? 'has-error' : ''}}">
                            <label for="building_img" class="control-label">{{ 'Building Img' }}</label>
                            <img src="{{asset($companyprofile->building_img)}}" alt="" style="height: 200px; width: 200px;" class="mb-3">
                            <input class="form-control" name="building_img" type="file" id="building_img" value="{{ isset($companyprofile->building_img) ? $companyprofile->building_img : ''}}" >
                            {!! $errors->first('building_img', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_register_name') ? 'has-error' : ''}}">
                            <label for="en_register_name" class="control-label">{{ 'En Register Name' }}</label>
                            <input class="form-control" name="en_register_name" type="text" id="en_register_name" value="{{ isset($companyprofile->en_register_name) ? $companyprofile->en_register_name : ''}}" >
                            {!! $errors->first('en_register_name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_register_name') ? 'has-error' : ''}}">
                            <label for="bn_register_name" class="control-label">{{ 'Bn Register Name' }}</label>
                            <input class="form-control" name="bn_register_name" type="text" id="bn_register_name" value="{{ isset($companyprofile->bn_register_name) ? $companyprofile->bn_register_name : ''}}" >
                            {!! $errors->first('bn_register_name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_register_title') ? 'has-error' : ''}}">
                            <label for="en_register_title" class="control-label">{{ 'En Register Title' }}</label>
                            <input class="form-control" name="en_register_title" type="text" id="en_register_title" value="{{ isset($companyprofile->en_register_title) ? $companyprofile->en_register_title : ''}}" >
                            {!! $errors->first('en_register_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_register_title') ? 'has-error' : ''}}">
                            <label for="bn_register_title" class="control-label">{{ 'Bn Register Title' }}</label>
                            <input class="form-control" name="bn_register_title" type="text" id="bn_register_title" value="{{ isset($companyprofile->bn_register_title) ? $companyprofile->bn_register_title : ''}}" >
                            {!! $errors->first('bn_register_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_register_office') ? 'has-error' : ''}}">
                            <label for="en_register_office" class="control-label">{{ 'En Register Office' }}</label>
                            <input class="form-control" name="en_register_office" type="text" id="en_register_office" value="{{ isset($companyprofile->en_register_office) ? $companyprofile->en_register_office : ''}}" >
                            {!! $errors->first('en_register_office', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_register_office') ? 'has-error' : ''}}">
                            <label for="bn_register_office" class="control-label">{{ 'Bn Register Office' }}</label>
                            <input class="form-control" name="bn_register_office" type="text" id="bn_register_office" value="{{ isset($companyprofile->bn_register_office) ? $companyprofile->bn_register_office : ''}}" >
                            {!! $errors->first('bn_register_office', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_register_address') ? 'has-error' : ''}}">
                            <label for="en_register_address" class="control-label">{{ 'En Register Address' }}</label>
                            <input class="form-control" name="en_register_address" type="text" id="en_register_address" value="{{ isset($companyprofile->en_register_address) ? $companyprofile->en_register_address : ''}}" >
                            {!! $errors->first('en_register_address', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_register_address') ? 'has-error' : ''}}">
                            <label for="bn_register_address" class="control-label">{{ 'Bn Register Address' }}</label>
                            <input class="form-control" name="bn_register_address" type="text" id="bn_register_address" value="{{ isset($companyprofile->bn_register_address) ? $companyprofile->bn_register_address : ''}}" >
                            {!! $errors->first('bn_register_address', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('incorporation_icon') ? 'has-error' : ''}}">
                            <label for="incorporation_icon" class="control-label">{{ 'Incorporation Icon' }}</label>
                            <img src="{{asset($companyprofile->incorporation_icon)}}" alt="" style="height: 40px; width: 40px;" class="mb-3">
                            <input class="form-control" name="incorporation_icon" type="file" id="incorporation_icon" value="{{ isset($companyprofile->incorporation_icon) ? $companyprofile->incorporation_icon : ''}}" >
                            {!! $errors->first('incorporation_icon', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_incorporation_title') ? 'has-error' : ''}}">
                            <label for="en_incorporation_title" class="control-label">{{ 'En Incorporation Title' }}</label>
                            <input class="form-control" name="en_incorporation_title" type="text" id="en_incorporation_title" value="{{ isset($companyprofile->en_incorporation_title) ? $companyprofile->en_incorporation_title : ''}}" >
                            {!! $errors->first('en_incorporation_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_incorporation_title') ? 'has-error' : ''}}">
                            <label for="bn_incorporation_title" class="control-label">{{ 'Bn Incorporation Title' }}</label>
                            <input class="form-control" name="bn_incorporation_title" type="text" id="bn_incorporation_title" value="{{ isset($companyprofile->bn_incorporation_title) ? $companyprofile->bn_incorporation_title : ''}}" >
                            {!! $errors->first('bn_incorporation_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_incorporation_date') ? 'has-error' : ''}}">
                            <label for="en_incorporation_date" class="control-label">{{ 'En Incorporation Date' }}</label>
                            <input class="form-control" name="en_incorporation_date" type="text" id="en_incorporation_date" value="{{ isset($companyprofile->en_incorporation_date) ? $companyprofile->en_incorporation_date : ''}}" >
                            {!! $errors->first('en_incorporation_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_incorporation_date') ? 'has-error' : ''}}">
                            <label for="bn_incorporation_date" class="control-label">{{ 'Bn Incorporation Date' }}</label>
                            <input class="form-control" name="bn_incorporation_date" type="text" id="bn_incorporation_date" value="{{ isset($companyprofile->bn_incorporation_date) ? $companyprofile->bn_incorporation_date : ''}}" >
                            {!! $errors->first('bn_incorporation_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_commencement_of_business') ? 'has-error' : ''}}">
                            <label for="en_commencement_of_business" class="control-label">{{ 'En Commencement Of Business' }}</label>
                            <input class="form-control" name="en_commencement_of_business" type="text" id="en_commencement_of_business" value="{{ isset($companyprofile->en_commencement_of_business) ? $companyprofile->en_commencement_of_business : ''}}" >
                            {!! $errors->first('en_commencement_of_business', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_commencement_of_business') ? 'has-error' : ''}}">
                            <label for="bn_commencement_of_business" class="control-label">{{ 'Bn Commencement Of Business' }}</label>
                            <input class="form-control" name="bn_commencement_of_business" type="text" id="bn_commencement_of_business" value="{{ isset($companyprofile->bn_commencement_of_business) ? $companyprofile->bn_commencement_of_business : ''}}" >
                            {!! $errors->first('bn_commencement_of_business', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_commencement_of_date') ? 'has-error' : ''}}">
                            <label for="en_commencement_of_date" class="control-label">{{ 'En Commencement Of Date' }}</label>
                            <input class="form-control" name="en_commencement_of_date" type="text" id="en_commencement_of_date" value="{{ isset($companyprofile->en_commencement_of_date) ? $companyprofile->en_commencement_of_date : ''}}" >
                            {!! $errors->first('en_commencement_of_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_commencement_of_date') ? 'has-error' : ''}}">
                            <label for="bn_commencement_of_date" class="control-label">{{ 'Bn Commencement Of Date' }}</label>
                            <input class="form-control" name="bn_commencement_of_date" type="text" id="bn_commencement_of_date" value="{{ isset($companyprofile->bn_commencement_of_date) ? $companyprofile->bn_commencement_of_date : ''}}" >
                            {!! $errors->first('bn_commencement_of_date', '<p class="help-block">:message</p>') !!}
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
