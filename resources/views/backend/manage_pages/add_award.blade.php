@extends('backend.layouts.master')
@section('title', 'Award Page')

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
        {{-- add award info start --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Award Page</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('save_award') }}" class="form-horizontal" enctype="multipart/form-data"">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Award Name (English) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_award_name" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Award Name (Bangla)<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_award_name" class="form-control" id="basiInput"
                                            required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Award Icon</label>
                                        <input type="file" name="award_icon" placeholder=""
                                            class="form-control" id="basiInput">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Award Image</label>
                                        <input type="file" name="award_img" placeholder=""
                                            class="form-control" id="basiInput">
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
        {{-- add award info end --}}

@endsection
