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

    {{-- manage contct info form end --}}
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="text-center">Contact Info Manage</h2>
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
                                        <a class="btn btn-success" href="{{route('contact_info')}}">Add Contact Info</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mb_30 home_page_management_table_area">

                            <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Company Name (English)</th>
                                        <th>Company Name (Bangla)</th>
                                        <th>Company Email</th>
                                        <th>About Us (English)</th>
                                        <th>About Us (Bangla)</th>
                                        <th>Address (English)</th>
                                        <th>Address (Bangla)</th>
                                        <th>Phone No 01 (Eng)</th>
                                        <th>Phone No 01 (Bn)</th>
                                        <th>Phone No 02 (Eng)</th>
                                        <th>Phone No 02 (Bn)</th>
                                        <th>Hotline No (Eng)</th>
                                        <th>Hotline No (Bn)</th>
                                        <th>Google Play Link</th>
                                        <th>Apple Store Link</th>
                                        <th>Facebook Link</th>
                                        <th>Twitter Link</th>
                                        <th>Linkedin Link</th>
                                        <th>Youtube Link</th>
                                        <th>Instagram Link</th>
                                        <th>Pinterest Link</th>
                                        <th>Company Logo</th>
                                        <th>Favicon Icon</th>
                                        <th>Play Store Icon</th>
                                        <th>Apple Store Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($contact_infos as $contact_info)
                                        <tr>
                                            <td>{{ $contact_info->en_company_name }}</td>
                                            <td>{{ $contact_info->bn_company_name }}</td>
                                            <td>{{ $contact_info->email }}</td>
                                            <td>{!! \Illuminate\Support\Str::words($contact_info->en_about, 30, '...') !!}</td>
                                            <td>{!! \Illuminate\Support\Str::words($contact_info->bn_about, 25, '...') !!}</td>
                                            <td>{{ $contact_info->en_address }}</td>
                                            <td>{{ $contact_info->bn_address }}</td>
                                            <td>{{ $contact_info->en_phone_one }}</td>
                                            <td>{{ $contact_info->bn_phone_one }}</td>
                                            <td>{{ $contact_info->en_phone_two }}</td>
                                            <td>{{ $contact_info->bn_phone_two }}</td>
                                            <td>{{ $contact_info->en_hotline }}</td>
                                            <td>{{ $contact_info->bn_hotline }}</td>
                                            <td>{{ $contact_info->play_link }}</td>
                                            <td>{{ $contact_info->i_link }}</td>
                                            <td>{{ $contact_info->facebook }}</td>
                                            <td>{{ $contact_info->twitter }}</td>
                                            <td>{{ $contact_info->linkedin }}</td>
                                            <td>{{ $contact_info->youtube }}</td>
                                            <td>{{ $contact_info->instagram }}</td>
                                            <td>{{ $contact_info->pinterest }}</td>
                                            <td>
                                                <img src="{{ asset($contact_info->logo) }}" alt="" style="max-height: 60px; width: auto;">
                                            </td>
                                            <td>
                                                <img src="{{ asset($contact_info->favicon) }}" alt="" style="max-height: 60px; width: auto;">
                                            </td>
                                            <td>
                                                <img src="{{ asset($contact_info->play_small_icon) }}" alt="" style="max-height: 60px; width: auto;">
                                            </td>
                                            <td>
                                                <img src="{{ asset($contact_info->i_small_icon) }}" alt="" style="max-height: 60px; width: auto;">
                                            </td>
                                            <td>
                                                <a class="btn btn-success" href="{{ route('edit_contact_info', ['id' => $contact_info->id]) }}">Edit</a>
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
    </div>
    {{-- manage contct info form end --}}
</div>
@endsection
