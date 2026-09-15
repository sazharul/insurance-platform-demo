@extends('backend.layouts.master')
@section('title', 'Reinsurance Type Edit')

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
        {{-- edit Reinsurance Type start --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Reinsurance Type</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ url('/admin/manage-reinsurance-type') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <form method="POST" action="{{ route('update_reinsurance_type') }}" class="form-horizontal" enctype="multipart/form-data"">
                            {{ csrf_field() }}
                            <input type="hidden" name="reinsurance_type_id" value="{{$reinsurance_type->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">En Reinsurance Type Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_reinsurance_type_name" value="{{$reinsurance_type->en_reinsurance_type_name}}" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Bn Reinsurance Type Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_reinsurance_type_name" value="{{$reinsurance_type->bn_reinsurance_type_name}}" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn-success" type="submit">Update this Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- edit Reinsurance Type end --}}

@endsection
