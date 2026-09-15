@extends('backend.layouts.master')
@section('title', 'Reinsurance Coverage Add')

@section('content')
        @if (Session::has('message'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
        {{-- add Reinsurance Coverage start --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Reinsurance Coverage</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ url('/admin/manage-reinsurance-coverage') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <form method="POST" action="{{ route('save_reinsurance_coverage') }}" class="form-horizontal" enctype="multipart/form-data"">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">En Reinsurance Coverage Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_reinsurance_coverage_name" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Bn Reinsurance Coverage Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_reinsurance_coverage_name" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn-success" type="submit">Add this Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- add Reinsurance Coverage end --}}

@endsection
