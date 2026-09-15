@extends('frontend.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="breadgram-image cus_mb_20">
            <img src="{{ asset('images/website/Frame 1 (5).png') }}" alt="">
            <div class="breadgram-hero-area">
                <style>
                    @media (max-width: 576px) {
                        .container-fluid .breadgram-image h2 {
                            font-size: 10px !important;
                        }
                    }
                </style>
                <h2 class="fw-bold">Change Password</h2>
                <h6 class="text-center mt-3"><span class="text-success fw-bold">{{ auth()->user()->name }}</span>
                </h6>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            @include('frontend.auth.sidebar_dashboard')
            <div class="col-lg-10 mb-3">
                <div class="card" style="margin-top: 12px;">
                    @include('admin.flash')
                    <div class="card-header" style="background: #007C4A; color: #ffffff;">Change Password</div>
                    <div class="card-body">
                        <div class="row">
                            <form method="post" action="{{ route('user.update_password') }}" accept-charset="UTF-8">
                                @csrf
                                <div class="col-8 offset-2">

                                    <div class="form-group">
                                        <label for="old_password" class="control-label">{{ 'Old Password' }}</label>
                                        <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror"
                                               name="old_password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label">{{ 'New Password' }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                               required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password-confirm" class="control-label">{{ 'Confirm Password' }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                               autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <button class="payment_proceed_btn" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
