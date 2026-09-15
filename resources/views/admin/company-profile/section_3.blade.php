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

                        <div class="form-group {{ $errors->has('en_listing_stock_dh') ? 'has-error' : ''}}">
                            <label for="en_listing_stock_dh" class="control-label">{{ 'En Listing Stock Dh' }}</label>
                            <input class="form-control" name="en_listing_stock_dh" type="text" id="en_listing_stock_dh" value="{{ isset($companyprofile->en_listing_stock_dh) ? $companyprofile->en_listing_stock_dh : ''}}" >
                            {!! $errors->first('en_listing_stock_dh', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_listing_stock_dh') ? 'has-error' : ''}}">
                            <label for="bn_listing_stock_dh" class="control-label">{{ 'Bn Listing Stock Dh' }}</label>
                            <input class="form-control" name="bn_listing_stock_dh" type="text" id="bn_listing_stock_dh" value="{{ isset($companyprofile->bn_listing_stock_dh) ? $companyprofile->bn_listing_stock_dh : ''}}" >
                            {!! $errors->first('bn_listing_stock_dh', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_listing_stock_dh_date') ? 'has-error' : ''}}">
                            <label for="en_listing_stock_dh_date" class="control-label">{{ 'En Listing Stock Dh Date' }}</label>
                            <input class="form-control" name="en_listing_stock_dh_date" type="text" id="en_listing_stock_dh_date" value="{{ isset($companyprofile->en_listing_stock_dh_date) ? $companyprofile->en_listing_stock_dh_date : ''}}" >
                            {!! $errors->first('en_listing_stock_dh_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_listing_stock_dh_date') ? 'has-error' : ''}}">
                            <label for="bn_listing_stock_dh_date" class="control-label">{{ 'Bn Listing Stock Dh Date' }}</label>
                            <input class="form-control" name="bn_listing_stock_dh_date" type="text" id="bn_listing_stock_dh_date" value="{{ isset($companyprofile->bn_listing_stock_dh_date) ? $companyprofile->bn_listing_stock_dh_date : ''}}" >
                            {!! $errors->first('bn_listing_stock_dh_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_listing_stock_ch') ? 'has-error' : ''}}">
                            <label for="en_listing_stock_ch" class="control-label">{{ 'En Listing Stock Ch' }}</label>
                            <input class="form-control" name="en_listing_stock_ch" type="text" id="en_listing_stock_ch" value="{{ isset($companyprofile->en_listing_stock_ch) ? $companyprofile->en_listing_stock_ch : ''}}" >
                            {!! $errors->first('en_listing_stock_ch', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_listing_stock_ch') ? 'has-error' : ''}}">
                            <label for="bn_listing_stock_ch" class="control-label">{{ 'Bn Listing Stock Ch' }}</label>
                            <input class="form-control" name="bn_listing_stock_ch" type="text" id="bn_listing_stock_ch" value="{{ isset($companyprofile->bn_listing_stock_ch) ? $companyprofile->bn_listing_stock_ch : ''}}" >
                            {!! $errors->first('bn_listing_stock_ch', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_listing_stock_ch_date') ? 'has-error' : ''}}">
                            <label for="en_listing_stock_ch_date" class="control-label">{{ 'En Listing Stock Ch Date' }}</label>
                            <input class="form-control" name="en_listing_stock_ch_date" type="text" id="en_listing_stock_ch_date" value="{{ isset($companyprofile->en_listing_stock_ch_date) ? $companyprofile->en_listing_stock_ch_date : ''}}" >
                            {!! $errors->first('en_listing_stock_ch_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_listing_stock_ch_date') ? 'has-error' : ''}}">
                            <label for="bn_listing_stock_ch_date" class="control-label">{{ 'Bn Listing Stock Ch Date' }}</label>
                            <input class="form-control" name="bn_listing_stock_ch_date" type="text" id="bn_listing_stock_ch_date" value="{{ isset($companyprofile->bn_listing_stock_ch_date) ? $companyprofile->bn_listing_stock_ch_date : ''}}" >
                            {!! $errors->first('bn_listing_stock_ch_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_allotment_of_public_date') ? 'has-error' : ''}}">
                            <label for="en_allotment_of_public_date" class="control-label">{{ 'En Allotment Of Public Date' }}</label>
                            <input class="form-control" name="en_allotment_of_public_date" type="text" id="en_allotment_of_public_date" value="{{ isset($companyprofile->en_allotment_of_public_date) ? $companyprofile->en_allotment_of_public_date : ''}}" >
                            {!! $errors->first('en_allotment_of_public_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_allotment_of_public_date') ? 'has-error' : ''}}">
                            <label for="bn_allotment_of_public_date" class="control-label">{{ 'Bn Allotment Of Public Date' }}</label>
                            <input class="form-control" name="bn_allotment_of_public_date" type="text" id="bn_allotment_of_public_date" value="{{ isset($companyprofile->bn_allotment_of_public_date) ? $companyprofile->bn_allotment_of_public_date : ''}}" >
                            {!! $errors->first('bn_allotment_of_public_date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_allotment_of_public') ? 'has-error' : ''}}">
                            <label for="en_allotment_of_public" class="control-label">{{ 'En Allotment Of Public' }}</label>
                            <input class="form-control" name="en_allotment_of_public" type="text" id="en_allotment_of_public" value="{{ isset($companyprofile->en_allotment_of_public) ? $companyprofile->en_allotment_of_public : ''}}" >
                            {!! $errors->first('en_allotment_of_public', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_allotment_of_public') ? 'has-error' : ''}}">
                            <label for="bn_allotment_of_public" class="control-label">{{ 'Bn Allotment Of Public' }}</label>
                            <input class="form-control" name="bn_allotment_of_public" type="text" id="bn_allotment_of_public" value="{{ isset($companyprofile->bn_allotment_of_public) ? $companyprofile->bn_allotment_of_public : ''}}" >
                            {!! $errors->first('bn_allotment_of_public', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('capital_icon') ? 'has-error' : ''}}">
                            <label for="capital_icon" class="control-label">{{ 'Capital Icon' }}</label>
                            <img src="{{asset($companyprofile->capital_icon)}}" alt="" style="height: 80px; width: 80px;" class="mb-3">
                            <input class="form-control" name="capital_icon" type="file" id="capital_icon" value="{{ isset($companyprofile->capital_icon) ? $companyprofile->capital_icon : ''}}" >
                            {!! $errors->first('capital_icon', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_paid_capital_title') ? 'has-error' : ''}}">
                            <label for="en_paid_capital_title" class="control-label">{{ 'En Paid Capital Title' }}</label>
                            <input class="form-control" name="en_paid_capital_title" type="text" id="en_paid_capital_title" value="{{ isset($companyprofile->en_paid_capital_title) ? $companyprofile->en_paid_capital_title : ''}}" >
                            {!! $errors->first('en_paid_capital_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_paid_capital_title') ? 'has-error' : ''}}">
                            <label for="bn_paid_capital_title" class="control-label">{{ 'Bn Paid Capital Title' }}</label>
                            <input class="form-control" name="bn_paid_capital_title" type="text" id="bn_paid_capital_title" value="{{ isset($companyprofile->bn_paid_capital_title) ? $companyprofile->bn_paid_capital_title : ''}}" >
                            {!! $errors->first('bn_paid_capital_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_paid_capital_info') ? 'has-error' : ''}}">
                            <label for="en_paid_capital_info" class="control-label">{{ 'En Paid Capital Info' }}</label>
                            <input class="form-control" name="en_paid_capital_info" type="text" id="en_paid_capital_info" value="{{ isset($companyprofile->en_paid_capital_info) ? $companyprofile->en_paid_capital_info : ''}}" >
                            {!! $errors->first('en_paid_capital_info', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_paid_capital_info') ? 'has-error' : ''}}">
                            <label for="bn_paid_capital_info" class="control-label">{{ 'Bn Paid Capital Info' }}</label>
                            <input class="form-control" name="bn_paid_capital_info" type="text" id="bn_paid_capital_info" value="{{ isset($companyprofile->bn_paid_capital_info) ? $companyprofile->bn_paid_capital_info : ''}}" >
                            {!! $errors->first('bn_paid_capital_info', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_authorized_capital_title') ? 'has-error' : ''}}">
                            <label for="en_authorized_capital_title" class="control-label">{{ 'En Authorized Capital Title' }}</label>
                            <input class="form-control" name="en_authorized_capital_title" type="text" id="en_authorized_capital_title" value="{{ isset($companyprofile->en_authorized_capital_title) ? $companyprofile->en_authorized_capital_title : ''}}" >
                            {!! $errors->first('en_authorized_capital_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_authorized_capital_title') ? 'has-error' : ''}}">
                            <label for="bn_authorized_capital_title" class="control-label">{{ 'Bn Authorized Capital Title' }}</label>
                            <input class="form-control" name="bn_authorized_capital_title" type="text" id="bn_authorized_capital_title" value="{{ isset($companyprofile->bn_authorized_capital_title) ? $companyprofile->bn_authorized_capital_title : ''}}" >
                            {!! $errors->first('bn_authorized_capital_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_authorized_capital_info') ? 'has-error' : ''}}">
                            <label for="en_authorized_capital_info" class="control-label">{{ 'En Authorized Capital Info' }}</label>
                            <input class="form-control" name="en_authorized_capital_info" type="text" id="en_authorized_capital_info" value="{{ isset($companyprofile->en_authorized_capital_info) ? $companyprofile->en_authorized_capital_info : ''}}" >
                            {!! $errors->first('en_authorized_capital_info', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_authorized_capital_info') ? 'has-error' : ''}}">
                            <label for="bn_authorized_capital_info" class="control-label">{{ 'Bn Authorized Capital Info' }}</label>
                            <input class="form-control" name="bn_authorized_capital_info" type="text" id="bn_authorized_capital_info" value="{{ isset($companyprofile->bn_authorized_capital_info) ? $companyprofile->bn_authorized_capital_info : ''}}" >
                            {!! $errors->first('bn_authorized_capital_info', '<p class="help-block">:message</p>') !!}
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
