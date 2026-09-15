@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Contact Section Pages
                </div>
                <div class="card-body">
                    @include('admin.cms.contact-menu')
                </div>
            </div>
        </div>
    </div>
@endsection

