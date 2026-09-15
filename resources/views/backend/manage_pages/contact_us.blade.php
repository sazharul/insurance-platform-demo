@extends('backend.layouts.master')
@section('title', 'Contact Us Page')

@section('content')

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

    {{-- manage contact info start --}}
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="text-center">Contact Us Manage</h2>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <form action="" method="">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search here.." aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="add_button ms-2 float-end">
                                        <a class="btn btn-success" href="{{ route('contact_us') }}">Add Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mb_30 home_page_management_table_area">

                            <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Contacter Name</th>
                                        <th>Contact Subject</th>
                                        <th>Contacter Email</th>
                                        <th>Contacter Phone</th>
                                        <th>Contact Message</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($contact_uss as $contact_us)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $contact_us->contacter_name }}</td>
                                            <td>{{ $contact_us->contact_subject }}</td>
                                            <td>{{ $contact_us->contacter_email }}</td>
                                            <td>{{ $contact_us->contacter_phone }}</td>
                                            <td>{!! \Illuminate\Support\Str::words($contact_us->contacter_msg, 30, '...') !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- manage contact us info start --}}
@endsection
