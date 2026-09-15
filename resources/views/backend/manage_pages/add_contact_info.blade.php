@extends('backend.layouts.master')
@section('title', 'Contact Manage')

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
                <div class="card-header">Contact Info</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('save_contact_info') }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company name (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_company_name"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company name (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_company_name"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company email<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company about (English)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_about"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company about (Bangla)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_about"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company address (English)</label>
                                    <input type="text" name="en_address" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company address (Bangla)</label>
                                    <input type="text" name="bn_address" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Phone one (English)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_phone_one"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Phone one (Bangla)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_phone_one"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Phone two (English)</label>
                                    <input type="text" name="en_phone_two"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Phone two (Bangla)</label>
                                    <input type="text" name="bn_phone_two"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Hotline Number (English)</label>
                                    <input type="text" name="en_hotline"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Hotline Number (Bangla)</label>
                                    <input type="text" name="bn_hotline"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company logo</label>
                                    <input type="file" name="logo" placeholder="Google play small icon"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">company favicon</label>
                                    <input type="file" name="favicon" placeholder="company favicon"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Google play icon</label>
                                    <input type="file" name="play_small_icon" placeholder="Google play small icon"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Apple store icon</label>
                                    <input type="file" name="i_small_icon" placeholder="company about"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Google play link</label>
                                    <input type="text" name="play_link" placeholder="Google play link"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Apple store link</label>
                                    <input type="text" name="i_link" placeholder="Apple store link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Facebook link</label>
                                    <input type="text" name="facebook" placeholder="Facebook link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Twitter link</label>
                                    <input type="text" name="twitter" placeholder="Twitter link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Linkedin link</label>
                                    <input type="text" name="linkedin" placeholder="Linkedin link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Youtube link</label>
                                    <input type="text" name="youtube" placeholder="Youtube link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Instagram link</label>
                                    <input type="text" name="instagram" placeholder="Instagram link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Pinterest link</label>
                                    <input type="text" name="pinterest" placeholder="Pinterest link" class="form-control"
                                        id="basiInput">
                                </div>
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
