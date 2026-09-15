@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.contact-menu')
                </div>
                <div class="card-body">

                    <form method="GET" action="{{ url('/admin/contact-message') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search" style="width: 25%;float: right;">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th><th>Name</th><th>Email</th><th>Message</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $contact_uss = App\Models\ContactUS::get();
                            @endphp
                            @foreach($contact_uss as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->contacter_name }}</td><td>{{ $item->contacter_email }}</td><td>{{ $item->contacter_msg }}</td>
                                    <td>
                                        <form action="{{ route('delete_contact_message') }}" method="post" id="delete">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="contact_us_id">
                                            <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
