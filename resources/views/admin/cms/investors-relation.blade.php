@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    investors relation Pages
                </div>
                <div class="card-body">
                    @include('admin.cms.investors-relation-menu')
                </div>
            </div>
        </div>
    </div>
@endsection
