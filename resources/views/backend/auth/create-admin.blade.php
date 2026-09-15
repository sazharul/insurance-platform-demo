@extends('backend.layouts.master')
@section('title', 'Admin Register Page')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">Admin Registration</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.auth.storeAdmin') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="email">Full name*</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Full name" name="name">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Email</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Phone</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Image</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>

                                <label for="">Address</label>
                                <div class="input-group mb-3">
                                    <textarea type="text" class="form-control" placeholder="Address" name="address"></textarea>
                                </div>


                                <div class="row">
                                    <div class="col-8">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection









