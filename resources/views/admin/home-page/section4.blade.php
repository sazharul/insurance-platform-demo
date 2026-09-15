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

                    <div class="form-group {{ $errors->has('en_online_calculator_title') ? 'has-error' : ''}}">
                        <label for="en_online_calculator_title" class="control-label">{{ 'En Online Calculator Titile' }}</label>
                        <input class="form-control" name="en_online_calculator_title" type="text" id="en_online_calculator_title" value="{{ isset($homepage->en_online_calculator_title) ? $homepage->en_online_calculator_title : ''}}" >
                        {!! $errors->first('en_online_calculator_title', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_online_calculator_title') ? 'has-error' : ''}}">
                        <label for="bn_online_calculator_title" class="control-label">{{ 'Bn Online Calculator Titile' }}</label>
                        <input class="form-control" name="bn_online_calculator_title" type="text" id="bn_online_calculator_title" value="{{ isset($homepage->bn_online_calculator_title) ? $homepage->bn_online_calculator_title : ''}}" >
                        {!! $errors->first('bn_online_calculator_title', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('en_online_calculator_description') ? 'has-error' : ''}}">
                        <label for="en_online_calculator_description" class="control-label">{{ 'En Online Calculator Description' }}</label>
                        <input class="form-control" name="en_online_calculator_description" type="text" id="en_online_calculator_description" value="{{ isset($homepage->en_online_calculator_description) ? $homepage->en_online_calculator_description : ''}}" >
                        {!! $errors->first('en_online_calculator_description', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('bn_online_calculator_description') ? 'has-error' : ''}}">
                        <label for="bn_online_calculator_description" class="control-label">{{ 'Bn Online Calculator Description' }}</label>
                        <input class="form-control" name="bn_online_calculator_description" type="text" id="bn_online_calculator_description" value="{{ isset($homepage->bn_online_calculator_description) ? $homepage->bn_online_calculator_description : ''}}" >
                        {!! $errors->first('bn_online_calculator_description', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('en_work_process_title') ? 'has-error' : ''}}">
                        <label for="en_work_process_title" class="control-label">{{ 'En Work Process Titile' }}</label>
                        <input class="form-control" name="en_work_process_title" type="text" id="en_work_process_title" value="{{ isset($homepage->en_work_process_title) ? $homepage->en_work_process_title : ''}}" >
                        {!! $errors->first('en_work_process_title', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('bn_work_process_title') ? 'has-error' : ''}}">
                        <label for="bn_work_process_title" class="control-label">{{ 'Bn Work Process Titile' }}</label>
                        <input class="form-control" name="bn_work_process_title" type="text" id="bn_work_process_title" value="{{ isset($homepage->bn_work_process_title) ? $homepage->bn_work_process_title : ''}}" >
                        {!! $errors->first('bn_work_process_title', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('en_work_process_description') ? 'has-error' : ''}}">
                        <label for="en_work_process_description" class="control-label">{{ 'En Work Process Description' }}</label>
                        <input class="form-control" name="en_work_process_description" type="text" id="en_work_process_description" value="{{ isset($homepage->en_work_process_description) ? $homepage->en_work_process_description : ''}}" >
                        {!! $errors->first('en_work_process_description', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('bn_work_process_description') ? 'has-error' : ''}}">
                        <label for="bn_work_process_description" class="control-label">{{ 'Bn Work Process Description' }}</label>
                        <input class="form-control" name="bn_work_process_description" type="text" id="bn_work_process_description" value="{{ isset($homepage->bn_work_process_description) ? $homepage->bn_work_process_description : ''}}" >
                        {!! $errors->first('bn_work_process_description', '<p class="help-block">:message</p>') !!}
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
