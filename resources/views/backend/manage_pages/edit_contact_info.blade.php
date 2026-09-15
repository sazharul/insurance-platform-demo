@extends('backend.layouts.master')
@section('title', 'Update Contact Info')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contact Info Update</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('update_contact_info') }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="contact_info_id" value="{{$contact_info->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company name (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_company_name" value="{{ $contact_info->en_company_name ?? '' }}"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company name (Bangla) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_company_name" value="{{ $contact_info->bn_company_name ?? '' }}"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company email<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ $contact_info->email ?? '' }}"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company about (English)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_about" value="{{ $contact_info->en_about ?? '' }}"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company about (Bangla)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_about" value="{{ $contact_info->bn_about ?? '' }}"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company address (English)</label>
                                    <input type="text" name="en_address" value="{{ $contact_info->en_address ?? '' }}" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Company address (Bangla)</label>
                                    <input type="text" name="bn_address" value="{{ $contact_info->bn_address ?? '' }}" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Phone one (English)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_phone_one" value="{{ $contact_info->en_phone_one ?? '' }}"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Phone one (Bangla)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_phone_one" value="{{ $contact_info->bn_phone_one ?? '' }}"
                                        class="form-control" id="basiInput" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Phone two (English)</label>
                                    <input type="text" name="en_phone_two" value="{{ $contact_info->en_phone_two ?? '' }}"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Phone two (Bangla)</label>
                                    <input type="text" name="bn_phone_two" value="{{ $contact_info->bn_phone_two ?? '' }}"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Hotline Number (English)</label>
                                    <input type="text" name="en_hotline" value="{{ $contact_info->en_hotline ?? '' }}"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Hotline Number (Bangla)</label>
                                    <input type="text" name="bn_hotline" value="{{ $contact_info->bn_hotline ?? '' }}"
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
                                <img src="{{ asset($contact_info->logo) }}" style="max-height:70px;width:auto;">
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">company favicon</label>
                                    <input type="file" name="favicon" placeholder="company favicon"
                                        class="form-control" id="basiInput">
                                </div>
                                <img src="{{ asset($contact_info->favicon) }}" style="max-height:70px;width:auto;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Google play icon</label>
                                    <input type="file" name="play_small_icon" placeholder="Google play small icon"
                                        class="form-control" id="basiInput">
                                </div>
                                <img src="{{ asset($contact_info->play_small_icon) }}" style="max-height:70px;width:auto;">
                            </div>
                            <div class="col-md-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Apple store icon</label>
                                    <input type="file" name="i_small_icon" placeholder="company about"
                                        class="form-control" id="basiInput">
                                </div>
                                <img src="{{ asset($contact_info->i_small_icon) }}" style="max-height:70px;width:auto;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Google play link</label>
                                    <input type="text" name="play_link" value="{{ $contact_info->play_link ?? '' }}" placeholder="Google play link"
                                        class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Apple store link</label>
                                    <input type="text" name="i_link" value="{{ $contact_info->i_link ?? '' }}" placeholder="Apple store link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Facebook link</label>
                                    <input type="text" name="facebook" value="{{ $contact_info->facebook ?? '' }}" placeholder="Facebook link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Twitter link</label>
                                    <input type="text" name="twitter" value="{{ $contact_info->twitter ?? '' }}" placeholder="Twitter link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Linkedin link</label>
                                    <input type="text" name="linkedin" value="{{ $contact_info->linkedin ?? '' }}" placeholder="Linkedin link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Youtube link</label>
                                    <input type="text" name="youtube" value="{{ $contact_info->youtube ?? '' }}" placeholder="Youtube link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Instagram link</label>
                                    <input type="text" name="instagram" value="{{ $contact_info->instagram ?? '' }}" placeholder="Instagram link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Pinterest link</label>
                                    <input type="text" name="pinterest" value="{{ $contact_info->pinterest ?? '' }}" placeholder="Pinterest link" class="form-control"
                                        id="basiInput">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-success" type="submit">Update this Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
