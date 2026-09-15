@extends('backend.layouts.master')
@section('title', 'Notices')

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
        {{-- add Notice info start --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Notice Page</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('save_notice') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Notice Titile (English) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="en_notice_title" class="form-control" id="basiInput"
                                            required placeholder="Notice Titile (English)">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="mt-4">
                                        <label for="basiInput" class="form-label">Notice Titile (Bangla) <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="bn_notice_title" class="form-control" id="basiInput"
                                            required placeholder="Notice Titile (Bangla)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="basiInput" class="form-label">Notice Description (English) <span
                                        class="text-danger">*</span></label>
                                    <textarea type="text" class="summernote" name="en_notice_des"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="basiInput" class="form-label">Notice Description (Bangla) <span
                                        class="text-danger">*</span></label>
                                    <textarea type="text" class="summernote" name="bn_notice_des"></textarea>
                                </div>
                                <div class="col-md-3 mt-3">
                                    Notice Status
                                </div>
                                <div class="col-md-9 mt-3">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">Publish</label>
                                        <input class="form-check-input" type="radio" name="notice_status" id="inlineRadio1" value="1">
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                                        <input class="form-check-input" type="radio" name="notice_status" id="inlineRadio2" value="0">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-success" type="submit">Add this Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- add Notice info end --}}

@endsection
