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


                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">{{ 'Email' }}</label>
                        <input class="form-control" name="email" type="text" id="email" value="{{ isset($homepage->email) ? $homepage->email : ''}}" >
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        <label for="phone" class="control-label">{{ 'Phone' }}</label>
                        <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($homepage->phone) ? $homepage->phone : ''}}" >
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                        <label for="mobile" class="control-label">{{ 'Mobile' }}</label>
                        <input class="form-control" name="mobile" type="text" id="mobile" value="{{ isset($homepage->mobile) ? $homepage->mobile : ''}}" >
                        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('facebook_link') ? 'has-error' : ''}}">
                        <label for="facebook_link" class="control-label">{{ 'Facebook Link' }}</label>
                        <input class="form-control" name="facebook_link" type="text" id="facebook_link" value="{{ isset($homepage->facebook_link) ? $homepage->facebook_link : ''}}" >
                        {!! $errors->first('facebook_link', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('youtube_link') ? 'has-error' : ''}}">
                        <label for="youtube_link" class="control-label">{{ 'Youtube Link' }}</label>
                        <input class="form-control" name="youtube_link" type="text" id="youtube_link" value="{{ isset($homepage->youtube_link) ? $homepage->youtube_link : ''}}" >
                        {!! $errors->first('youtube_link', '<p class="help-block">:message</p>') !!}
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
