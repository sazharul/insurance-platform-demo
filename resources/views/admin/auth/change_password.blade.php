@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <div class="row">
                        <form method="post" action="{{ route('save_password') }}" accept-charset="UTF-8">
                            @csrf
                            <div class="col-8 offset-2">

                                <div class="form-group">
                                    <label for="old_password" class="control-label">{{ 'Old Password' }}</label>
                                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">{{ 'New Password' }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class="control-label">{{ 'Confirm Password' }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
