@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Financial Year List</div>
                <div class="card-body">
                    <a href="{{ route('financial-year-list.index') }}" title="Back">
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

                    <form method="POST" action="{{ route('financial-year-list.update', $financial_year->id) }}" accept-charset="UTF-8" class="form-horizontal"
                          enctype="multipart/form-data">
                        @method("PUT")
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('en_year') ? 'has-error' : ''}}">
                            <label for="en_year" class="control-label">{{ 'En Year' }}</label>
                            <input class="form-control" name="en_year" type="text" id="en_year"
                                   value="{{ isset($financial_year->en_year) ? $financial_year->en_year : ''}}">
                            {!! $errors->first('en_year', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('bn_year') ? 'has-error' : ''}}">
                            <label for="bn_year" class="control-label">{{ 'Bn Year' }}</label>
                            <input class="form-control" name="bn_year" type="text" id="bn_year"
                                   value="{{ isset($financial_year->bn_year) ? $financial_year->bn_year : ''}}">
                            {!! $errors->first('bn_year', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
