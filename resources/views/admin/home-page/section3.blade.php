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

                    <div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
                        <label for="en_title" class="control-label">{{ 'En Titile' }}</label>
                        <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($homepage->en_title) ? $homepage->en_title : ''}}" >
                        {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
                        <label for="bn_title" class="control-label">{{ 'Bn Titile' }}</label>
                        <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($homepage->bn_title) ? $homepage->bn_title : ''}}" >
                        {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('en_description') ? 'has-error' : ''}}">
                        <label for="en_description" class="control-label">{{ 'En Description' }}</label>
                        <textarea class="form-control" rows="5" name="en_description" type="textarea" id="en_description" >{{ isset($homepage->en_description) ? $homepage->en_description : ''}}</textarea>
                        {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : ''}}">
                        <label for="bn_description" class="control-label">{{ 'Bn Online Calculator Description' }}</label>
                        <textarea class="form-control" rows="5" name="bn_description" type="textarea" id="bn_description" >{{ isset($homepage->bn_description) ? $homepage->bn_description : ''}}</textarea>
                        {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('slider1') ? 'has-error' : ''}}">
                        <label for="slider1" class="control-label">{{ 'Image 1' }}</label>
                        <img src="{{asset($homepage->slider1)}}" alt="" style="height: 100px; width: 150px;">
                        <input class="form-control" name="slider1" type="file" id="slider1" value="{{ isset($homepage->slider1) ? $homepage->slider1 : ''}}" >
                        {!! $errors->first('slider1', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('slider2') ? 'has-error' : ''}}">
                        <label for="slider2" class="control-label">{{ 'Image 2' }}</label>
                        <img src="{{asset($homepage->slider2)}}" alt="" style="height: 100px; width: 150px;">
                        <input class="form-control" name="slider2" type="file" id="slider2" value="{{ isset($homepage->slider2) ? $homepage->slider2 : ''}}" >
                        {!! $errors->first('slider2', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('slider3') ? 'has-error' : ''}}">
                        <label for="slider3" class="control-label">{{ 'Image 3' }}</label>
                        <img src="{{asset($homepage->slider3)}}" alt="" style="height: 100px; width: 150px;">
                        <input class="form-control" name="slider3" type="file" id="slider3" value="{{ isset($homepage->slider3) ? $homepage->slider3 : ''}}" >
                        {!! $errors->first('slider3', '<p class="help-block">:message</p>') !!}
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
