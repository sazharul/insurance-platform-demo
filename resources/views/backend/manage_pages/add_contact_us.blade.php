@extends('backend.layouts.master')
@section('title', 'Contact Us Page')

@section('content')
    {{-- add contact us info start --}}
    @if (Session::has('message'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contact Us Page</div>
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('save_contact_us') }}" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Your Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="contacter_name" class="form-control" id="basiInput" required
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Subject<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="contact_subject" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Your Email<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="contacter_email" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mt-4">
                                    <label for="basiInput" class="form-label">Your phone<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="contacter_phone" class="form-control" id="basiInput"
                                        required placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">Tell what you want to know</span>
                                    </div>
                                    <textarea class="form-control" name="contacter_msg" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success" type="submit">Add this Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- add claim info end --}}

@endsection
