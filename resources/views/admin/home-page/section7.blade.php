@extends('backend.layouts.master')

@section('content')
<div class="row">
    {{-- @include('admin.sidebar') --}}

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit HomePage #{{ $homepage->id }}</div>
            <div class="card-body">
                <a href="{{ url('/admin/home-page') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br />

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ url('/admin/home-page/' . $homepage->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('footer_logo') ? 'has-error' : ''}}">
                        <label for="footer_logo" class="control-label">{{ 'Footer Logo' }}</label>
                        <img src="{{asset($homepage->footer_logo)}}" alt="" style="height: 100px; width: 250px;">
                        <input class="form-control" name="footer_logo" type="file" id="footer_logo" value="{{ isset($homepage->footer_logo) ? $homepage->footer_logo : ''}}" >
                        {!! $errors->first('footer_logo', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('en_footer_logo_description') ? 'has-error' : ''}}">
                        <label for="en_footer_logo_description" class="control-label">{{ 'En Footer Logo Description' }}</label>
                        <input class="form-control" name="en_footer_logo_description" type="text" id="en_footer_logo_description" value="{{ isset($homepage->en_footer_logo_description) ? $homepage->en_footer_logo_description : ''}}" >
                        {!! $errors->first('en_footer_logo_description', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_footer_logo_description') ? 'has-error' : ''}}">
                        <label for="bn_footer_logo_description" class="control-label">{{ 'Bn Footer Logo Description' }}</label>
                        <input class="form-control" name="bn_footer_logo_description" type="text" id="bn_footer_logo_description" value="{{ isset($homepage->bn_footer_logo_description) ? $homepage->bn_footer_logo_description : ''}}" >
                        {!! $errors->first('bn_footer_logo_description', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('play_store_icon') ? 'has-error' : ''}}">
                        <label for="play_store_icon" class="control-label">{{ 'Play Store Icon' }}</label>
                        <img src="{{asset($homepage->play_store_icon)}}" alt="" style="height: 100px; width: 200px;">
                        <input class="form-control" name="play_store_icon" type="file" id="play_store_icon" value="{{ isset($homepage->play_store_icon) ? $homepage->play_store_icon : ''}}" >
                        {!! $errors->first('play_store_icon', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('play_store_link') ? 'has-error' : ''}}">
                        <label for="play_store_link" class="control-label">{{ 'Play Store Link' }}</label>
                        <input class="form-control" name="play_store_link" type="text" id="play_store_link" value="{{ isset($homepage->play_store_link) ? $homepage->play_store_link : ''}}" >
                        {!! $errors->first('play_store_link', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('footer_pabx') ? 'has-error' : ''}}">
                        <label for="footer_pabx" class="control-label">{{ 'Footer PABX' }}</label>
                        <input class="form-control" name="footer_pabx" type="text" id="footer_pabx" value="{{ isset($homepage->footer_pabx) ? $homepage->footer_pabx : ''}}" >
                        {!! $errors->first('footer_pabx', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('footer_hotline') ? 'has-error' : ''}}">
                        <label for="footer_hotline" class="control-label">{{ 'Footer Hotline' }}</label>
                        <input class="form-control" name="footer_hotline" type="text" id="footer_hotline" value="{{ isset($homepage->footer_hotline) ? $homepage->footer_hotline : ''}}" >
                        {!! $errors->first('footer_hotline', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_product') ? 'has-error' : ''}}">
                        <label for="en_foot_product" class="control-label">{{ 'En Footer Product Title' }}</label>
                        <input class="form-control" name="en_foot_product" type="text" id="en_foot_product" value="{{ isset($homepage->en_foot_product) ? $homepage->en_foot_product : ''}}" >
                        {!! $errors->first('en_foot_product', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_product') ? 'has-error' : ''}}">
                        <label for="bn_foot_product" class="control-label">{{ 'Bn Footer Product Title' }}</label>
                        <input class="form-control" name="bn_foot_product" type="text" id="bn_foot_product" value="{{ isset($homepage->bn_foot_product) ? $homepage->bn_foot_product : ''}}" >
                        {!! $errors->first('bn_foot_product', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_product_list1') ? 'has-error' : ''}}">
                        <label for="en_foot_product_list1" class="control-label">{{ 'En Footer Product List 1' }}</label>
                        <input class="form-control" name="en_foot_product_list1" type="text" id="en_foot_product_list1" value="{{ isset($homepage->en_foot_product_list1) ? $homepage->en_foot_product_list1 : ''}}" >
                        {!! $errors->first('en_foot_product_list1', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_product_list1') ? 'has-error' : ''}}">
                        <label for="bn_foot_product_list1" class="control-label">{{ 'Bn Footer Product List 1' }}</label>
                        <input class="form-control" name="bn_foot_product_list1" type="text" id="bn_foot_product_list1" value="{{ isset($homepage->bn_foot_product_list1) ? $homepage->bn_foot_product_list1 : ''}}" >
                        {!! $errors->first('bn_foot_product_list1', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_product_list2') ? 'has-error' : ''}}">
                        <label for="en_foot_product_list2" class="control-label">{{ 'En Footer Product List 2' }}</label>
                        <input class="form-control" name="en_foot_product_list2" type="text" id="en_foot_product_list2" value="{{ isset($homepage->en_foot_product_list2) ? $homepage->en_foot_product_list2 : ''}}" >
                        {!! $errors->first('en_foot_product_list2', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_product_list2') ? 'has-error' : ''}}">
                        <label for="bn_foot_product_list2" class="control-label">{{ 'Bn Footer Product List 2' }}</label>
                        <input class="form-control" name="bn_foot_product_list2" type="text" id="bn_foot_product_list2" value="{{ isset($homepage->bn_foot_product_list2) ? $homepage->bn_foot_product_list2 : ''}}" >
                        {!! $errors->first('bn_foot_product_list2', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_product_list3') ? 'has-error' : ''}}">
                        <label for="en_foot_product_list3" class="control-label">{{ 'En Footer Product List 3' }}</label>
                        <input class="form-control" name="en_foot_product_list3" type="text" id="en_foot_product_list3" value="{{ isset($homepage->en_foot_product_list3) ? $homepage->en_foot_product_list3 : ''}}" >
                        {!! $errors->first('en_foot_product_list3', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_product_list3') ? 'has-error' : ''}}">
                        <label for="bn_foot_product_list3" class="control-label">{{ 'Bn Footer Product List 3' }}</label>
                        <input class="form-control" name="bn_foot_product_list3" type="text" id="bn_foot_product_list3" value="{{ isset($homepage->bn_foot_product_list3) ? $homepage->bn_foot_product_list3 : ''}}" >
                        {!! $errors->first('bn_foot_product_list3', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_product_list4') ? 'has-error' : ''}}">
                        <label for="en_foot_product_list4" class="control-label">{{ 'En Footer Product List 4' }}</label>
                        <input class="form-control" name="en_foot_product_list4" type="text" id="en_foot_product_list4" value="{{ isset($homepage->en_foot_product_list4) ? $homepage->en_foot_product_list4 : ''}}" >
                        {!! $errors->first('en_foot_product_list4', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_product_list4') ? 'has-error' : ''}}">
                        <label for="bn_foot_product_list4" class="control-label">{{ 'Bn Footer Product List 4' }}</label>
                        <input class="form-control" name="bn_foot_product_list4" type="text" id="bn_foot_product_list4" value="{{ isset($homepage->bn_foot_product_list4) ? $homepage->bn_foot_product_list4 : ''}}" >
                        {!! $errors->first('bn_foot_product_list4', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_product_list5') ? 'has-error' : ''}}">
                        <label for="en_foot_product_list5" class="control-label">{{ 'En Footer Product List 5' }}</label>
                        <input class="form-control" name="en_foot_product_list5" type="text" id="en_foot_product_list5" value="{{ isset($homepage->en_foot_product_list5) ? $homepage->en_foot_product_list5 : ''}}" >
                        {!! $errors->first('en_foot_product_list5', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_product_list5') ? 'has-error' : ''}}">
                        <label for="bn_foot_product_list5" class="control-label">{{ 'Bn Footer Product List 5' }}</label>
                        <input class="form-control" name="bn_foot_product_list5" type="text" id="bn_foot_product_list5" value="{{ isset($homepage->bn_foot_product_list5) ? $homepage->bn_foot_product_list5 : ''}}" >
                        {!! $errors->first('bn_foot_product_list5', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_about') ? 'has-error' : ''}}">
                        <label for="en_foot_about" class="control-label">{{ 'En Footer About Title' }}</label>
                        <input class="form-control" name="en_foot_about" type="text" id="en_foot_about" value="{{ isset($homepage->en_foot_about) ? $homepage->en_foot_about : ''}}" >
                        {!! $errors->first('en_foot_about', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_about') ? 'has-error' : ''}}">
                        <label for="bn_foot_about" class="control-label">{{ 'Bn Footer About Title' }}</label>
                        <input class="form-control" name="bn_foot_about" type="text" id="bn_foot_about" value="{{ isset($homepage->bn_foot_about) ? $homepage->bn_foot_about : ''}}" >
                        {!! $errors->first('bn_foot_about', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_about_list1') ? 'has-error' : ''}}">
                        <label for="en_foot_about_list1" class="control-label">{{ 'En Footer About List 1' }}</label>
                        <input class="form-control" name="en_foot_about_list1" type="text" id="en_foot_about_list1" value="{{ isset($homepage->en_foot_about_list1) ? $homepage->en_foot_about_list1 : ''}}" >
                        {!! $errors->first('en_foot_about_list1', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_about_list1') ? 'has-error' : ''}}">
                        <label for="bn_foot_about_list1" class="control-label">{{ 'Bn Footer About List 1' }}</label>
                        <input class="form-control" name="bn_foot_about_list1" type="text" id="bn_foot_about_list1" value="{{ isset($homepage->bn_foot_about_list1) ? $homepage->bn_foot_about_list1 : ''}}" >
                        {!! $errors->first('bn_foot_about_list1', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_about_list2') ? 'has-error' : ''}}">
                        <label for="en_foot_about_list2" class="control-label">{{ 'En Footer About List 2' }}</label>
                        <input class="form-control" name="en_foot_about_list2" type="text" id="en_foot_about_list2" value="{{ isset($homepage->en_foot_about_list2) ? $homepage->en_foot_about_list2 : ''}}" >
                        {!! $errors->first('en_foot_about_list2', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_about_list2') ? 'has-error' : ''}}">
                        <label for="bn_foot_about_list2" class="control-label">{{ 'Bn Footer About List 2' }}</label>
                        <input class="form-control" name="bn_foot_about_list2" type="text" id="bn_foot_about_list2" value="{{ isset($homepage->bn_foot_about_list2) ? $homepage->bn_foot_about_list2 : ''}}" >
                        {!! $errors->first('bn_foot_about_list2', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_about_list3') ? 'has-error' : ''}}">
                        <label for="en_foot_about_list3" class="control-label">{{ 'En Footer About List 3' }}</label>
                        <input class="form-control" name="en_foot_about_list3" type="text" id="en_foot_about_list3" value="{{ isset($homepage->en_foot_about_list3) ? $homepage->en_foot_about_list3 : ''}}" >
                        {!! $errors->first('en_foot_about_list3', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_about_list3') ? 'has-error' : ''}}">
                        <label for="bn_foot_about_list3" class="control-label">{{ 'Bn Footer About List 3' }}</label>
                        <input class="form-control" name="bn_foot_about_list3" type="text" id="bn_foot_about_list3" value="{{ isset($homepage->bn_foot_about_list3) ? $homepage->bn_foot_about_list3 : ''}}" >
                        {!! $errors->first('bn_foot_about_list3', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_about_list4') ? 'has-error' : ''}}">
                        <label for="en_foot_about_list4" class="control-label">{{ 'En Footer About List 4' }}</label>
                        <input class="form-control" name="en_foot_about_list4" type="text" id="en_foot_about_list4" value="{{ isset($homepage->en_foot_about_list4) ? $homepage->en_foot_about_list4 : ''}}" >
                        {!! $errors->first('en_foot_about_list4', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_about_list4') ? 'has-error' : ''}}">
                        <label for="bn_foot_about_list4" class="control-label">{{ 'Bn Footer About List 4' }}</label>
                        <input class="form-control" name="bn_foot_about_list4" type="text" id="bn_foot_about_list4" value="{{ isset($homepage->bn_foot_about_list4) ? $homepage->bn_foot_about_list4 : ''}}" >
                        {!! $errors->first('bn_foot_about_list4', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_about_list5') ? 'has-error' : ''}}">
                        <label for="en_foot_about_list5" class="control-label">{{ 'En Footer About List 5' }}</label>
                        <input class="form-control" name="en_foot_about_list5" type="text" id="en_foot_about_list5" value="{{ isset($homepage->en_foot_about_list5) ? $homepage->en_foot_about_list5 : ''}}" >
                        {!! $errors->first('en_foot_about_list5', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_about_list5') ? 'has-error' : ''}}">
                        <label for="bn_foot_about_list5" class="control-label">{{ 'Bn Footer About List 5' }}</label>
                        <input class="form-control" name="bn_foot_about_list5" type="text" id="bn_foot_about_list5" value="{{ isset($homepage->bn_foot_about_list5) ? $homepage->bn_foot_about_list5 : ''}}" >
                        {!! $errors->first('bn_foot_about_list5', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_legal') ? 'has-error' : ''}}">
                        <label for="en_foot_legal" class="control-label">{{ 'En Footer Legal Title' }}</label>
                        <input class="form-control" name="en_foot_legal" type="text" id="en_foot_legal" value="{{ isset($homepage->en_foot_legal) ? $homepage->en_foot_legal : ''}}" >
                        {!! $errors->first('en_foot_legal', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_legal') ? 'has-error' : ''}}">
                        <label for="bn_foot_legal" class="control-label">{{ 'Bn Footer Legal Title' }}</label>
                        <input class="form-control" name="bn_foot_legal" type="text" id="bn_foot_legal" value="{{ isset($homepage->bn_foot_legal) ? $homepage->bn_foot_legal : ''}}" >
                        {!! $errors->first('bn_foot_legal', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_legal_list1') ? 'has-error' : ''}}">
                        <label for="en_foot_legal_list1" class="control-label">{{ 'En Footer Legal List 1' }}</label>
                        <input class="form-control" name="en_foot_legal_list1" type="text" id="en_foot_legal_list1" value="{{ isset($homepage->en_foot_legal_list1) ? $homepage->en_foot_legal_list1 : ''}}" >
                        {!! $errors->first('en_foot_legal_list1', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_legal_list1') ? 'has-error' : ''}}">
                        <label for="bn_foot_legal_list1" class="control-label">{{ 'Bn Footer Legal List 1' }}</label>
                        <input class="form-control" name="bn_foot_legal_list1" type="text" id="bn_foot_legal_list1" value="{{ isset($homepage->bn_foot_legal_list1) ? $homepage->bn_foot_legal_list1 : ''}}" >
                        {!! $errors->first('bn_foot_legal_list1', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_foot_legal_list2') ? 'has-error' : ''}}">
                        <label for="en_foot_legal_list2" class="control-label">{{ 'En Footer Legal List 2' }}</label>
                        <input class="form-control" name="en_foot_legal_list2" type="text" id="en_foot_legal_list2" value="{{ isset($homepage->en_foot_legal_list2) ? $homepage->en_foot_legal_list2 : ''}}" >
                        {!! $errors->first('en_foot_legal_list2', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_foot_legal_list2') ? 'has-error' : ''}}">
                        <label for="bn_foot_legal_list2" class="control-label">{{ 'Bn Footer Legal List 2' }}</label>
                        <input class="form-control" name="bn_foot_legal_list2" type="text" id="bn_foot_legal_list2" value="{{ isset($homepage->bn_foot_legal_list2) ? $homepage->bn_foot_legal_list2 : ''}}" >
                        {!! $errors->first('bn_foot_legal_list2', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_all_rights_reserved') ? 'has-error' : ''}}">
                        <label for="en_all_rights_reserved" class="control-label">{{ 'En Footer Right Reserved' }}</label>
                        <input class="form-control" name="en_all_rights_reserved" type="text" id="en_all_rights_reserved" value="{{ isset($homepage->en_all_rights_reserved) ? $homepage->en_all_rights_reserved : ''}}" >
                        {!! $errors->first('en_all_rights_reserved', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_all_rights_reserved') ? 'has-error' : ''}}">
                        <label for="bn_all_rights_reserved" class="control-label">{{ 'Bn Footer Right Reserved' }}</label>
                        <input class="form-control" name="bn_all_rights_reserved" type="text" id="bn_all_rights_reserved" value="{{ isset($homepage->bn_all_rights_reserved) ? $homepage->bn_all_rights_reserved : ''}}" >
                        {!! $errors->first('bn_all_rights_reserved', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
