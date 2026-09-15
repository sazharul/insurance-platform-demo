@extends('backend.layouts.master')
@section('title', 'Personal validation')

@section('content')
    <div class="container">
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
        {{-- add contct info form start --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Personal validation</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('admin.save_personal_info') }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Minimum <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="minimum" value="{{ $data->minimum ?? '' }}"
                                            class="form-control" id="basiInput" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Maximum <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="maximum" class="form-control" id="basiInput"
                                            value="{{ $data->maximum ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Age Limit<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="age" value="{{ $data->age ?? '' }}"
                                            class="form-control" id="basiInput" required>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button class="btn btn-success" type="submit">Add this Info</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- add contct info form end --}}

    </div>
@endsection
