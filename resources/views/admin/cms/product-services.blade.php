@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Product & Services Pages
                </div>
                <div class="card-body">
                    @include('admin.cms.product-service-menu')
                </div>
            </div>
        </div>
    </div>
@endsection
