@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Financial Indicators Pages
                </div>
                <div class="card-body">
                    @include('admin.cms.financial-indicators-menu')
                </div>
            </div>
        </div>
    </div>
@endsection
