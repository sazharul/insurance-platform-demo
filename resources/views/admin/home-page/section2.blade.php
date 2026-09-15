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

                    <div class="form-group {{ $errors->has('year_log') ? 'has-error' : ''}}">
                        <label for="year_log" class="control-label">{{ 'Year Log' }}</label>
                        <img src="{{asset($homepage->year_log)}}" alt="" style="height: 100px; width: 100px;">
                        <input class="form-control" name="year_log" type="file" id="year_log" value="{{ isset($homepage->year_log) ? $homepage->year_log : ''}}" >
                        {!! $errors->first('year_log', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('location_icon') ? 'has-error' : ''}}">
                        <label for="location_icon" class="control-label">{{ 'Location Logo' }}</label>
                        <img src="{{asset($homepage->location_icon)}}" alt="" style="height: 100px; width: 100px;">
                        <input class="form-control" name="location_icon" type="file" id="location_icon" value="{{ isset($homepage->location_icon) ? $homepage->location_icon : ''}}" >
                        {!! $errors->first('location_icon', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_location') ? 'has-error' : ''}}">
                        <label for="en_location" class="control-label">{{ 'En Location' }}</label>
                        <input class="form-control" name="en_location" type="text" id="en_location" value="{{ isset($homepage->en_location) ? $homepage->en_location : ''}}" >
                        {!! $errors->first('en_location', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_location') ? 'has-error' : ''}}">
                        <label for="bn_location" class="control-label">{{ 'Bn Location' }}</label>
                        <input class="form-control" name="bn_location" type="text" id="bn_location" value="{{ isset($homepage->bn_location) ? $homepage->bn_location : ''}}" >
                        {!! $errors->first('bn_location', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('main_logo') ? 'has-error' : ''}}">
                        <label for="main_logo" class="control-label">{{ 'Main Logo' }}</label>
                        <img src="{{asset($homepage->main_logo)}}" alt="" style="height: 100px; width: 200px;">
                        <input class="form-control" name="main_logo" type="file" id="main_logo" value="{{ isset($homepage->main_logo) ? $homepage->main_logo : ''}}" >
                        {!! $errors->first('main_logo', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_motto') ? 'has-error' : ''}}">
                        <label for="en_motto" class="control-label">{{ 'En Motto' }}</label>
                        <input class="form-control" name="en_motto" type="text" id="en_motto" value="{{ isset($homepage->en_motto) ? $homepage->en_motto : ''}}" >
                        {!! $errors->first('en_motto', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_motto') ? 'has-error' : ''}}">
                        <label for="bn_motto" class="control-label">{{ 'Bn Motto' }}</label>
                        <input class="form-control" name="bn_motto" type="text" id="bn_motto" value="{{ isset($homepage->bn_motto) ? $homepage->bn_motto : ''}}" >
                        {!! $errors->first('bn_motto', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('en_hot_line') ? 'has-error' : ''}}">
                        <label for="en_hot_line" class="control-label">{{ 'En Hot Line' }}</label>
                        <input class="form-control" name="en_hot_line" type="text" id="en_hot_line" value="{{ isset($homepage->en_hot_line) ? $homepage->en_hot_line : ''}}" >
                        {!! $errors->first('en_hot_line', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_hot_line') ? 'has-error' : ''}}">
                        <label for="bn_hot_line" class="control-label">{{ 'Bn Hot Line' }}</label>
                        <input class="form-control" name="bn_hot_line" type="text" id="bn_hot_line" value="{{ isset($homepage->bn_hot_line) ? $homepage->bn_hot_line : ''}}" >
                        {!! $errors->first('bn_hot_line', '<p class="help-block">:message</p>') !!}
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
