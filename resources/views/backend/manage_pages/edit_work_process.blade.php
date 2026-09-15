@extends('backend.layouts.master')
@section('title', 'Work Process Edit')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_body">
                <div class="card-body">
                    <a href="{{ url('/admin/home-page') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br>
                    <br>
                    <form action="{{ route('update_work_process') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="work_process_id" value="{{ $work_process->id }}">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">First Icon</label>
                                <img src="{{ asset($work_process->wp_first_icon) }}" alt=""
                                    style="max-height=60px; width: auto;">
                                <input type="file" name="wp_first_icon" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">First Title (English)</label>
                                <input type="text" name="en_wp_first_title"
                                    value="{{ $work_process->en_wp_first_title }}" class="form-control" id="inputEmail4"
                                    placeholder="Title">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">First Title (Bangla)</label>
                                <input type="text" name="bn_wp_first_title"
                                    value="{{ $work_process->bn_wp_first_title }}" class="form-control" id="inputEmail4"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">First Description (English)</span>
                                    </div>
                                    <textarea class="form-control" name="en_wp_first_description" aria-label="With textarea">{{ $work_process->en_wp_first_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">First Description (Bangla)</span>
                                    </div>
                                    <textarea class="form-control" name="bn_wp_first_description" aria-label="With textarea">{{ $work_process->bn_wp_first_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Second Icon</label>
                                <img src="{{ asset($work_process->wp_sec_icon) }}" alt=""
                                    style="max-height=60px; width: auto;">
                                <input type="file" name="wp_sec_icon" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Second Title (English)</label>
                                <input type="text" name="en_wp_sec_title"value="{{ $work_process->en_wp_sec_title }}"
                                    class="form-control" id="inputEmail4" placeholder="Title">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Second Title (Bangla)</label>
                                <input type="text" name="bn_wp_sec_title"value="{{ $work_process->bn_wp_sec_title }}"
                                    class="form-control" id="inputEmail4" placeholder="Title">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Second Description (English)</span>
                                    </div>
                                    <textarea class="form-control" name="en_wp_sec_description" aria-label="With textarea">{{ $work_process->en_wp_sec_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Second Description (Bangla)</span>
                                    </div>
                                    <textarea class="form-control" name="bn_wp_sec_description" aria-label="With textarea">{{ $work_process->bn_wp_sec_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Third Icon</label>
                                <img src="{{ asset($work_process->wp_third_icon) }}" alt=""
                                    style="max-height=60px; width: auto;">
                                <input type="file" name="wp_third_icon" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Third Title (English)</label>
                                <input type="text" name="en_wp_third_title"
                                    value="{{ $work_process->en_wp_third_title }}" class="form-control" id="inputEmail4"
                                    placeholder="Title">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Third Title (Bangla)</label>
                                <input type="text" name="bn_wp_third_title"
                                    value="{{ $work_process->bn_wp_third_title }}" class="form-control" id="inputEmail4"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Third Description (English)</span>
                                    </div>
                                    <textarea class="form-control" name="en_wp_third_description" aria-label="With textarea">{{ $work_process->en_wp_third_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Third Description (Bangla)</span>
                                    </div>
                                    <textarea class="form-control" name="bn_wp_third_description" aria-label="With textarea">{{ $work_process->bn_wp_third_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="inputEmail4">Forth Icon</label>
                                <img src="{{ asset($work_process->wp_forth_icon) }}" alt=""
                                    style="max-height=60px; width: auto;">
                                <input type="file" name="wp_forth_icon" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Forth Title (English)</label>
                                <input type="text" name="en_wp_forth_title"
                                    value="{{ $work_process->en_wp_forth_title }}" class="form-control" id="inputEmail4"
                                    placeholder="Title">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail4">Forth Title (Bangla)</label>
                                <input type="text" name="bn_wp_forth_title"
                                    value="{{ $work_process->bn_wp_forth_title }}" class="form-control" id="inputEmail4"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Forth Description (English)</span>
                                    </div>
                                    <textarea class="form-control" name="en_wp_forth_description" aria-label="With textarea">{{ $work_process->en_wp_forth_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Forth Description (Bangla)</span>
                                    </div>
                                    <textarea class="form-control" name="bn_wp_forth_description" aria-label="With textarea">{{ $work_process->bn_wp_forth_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update this Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
