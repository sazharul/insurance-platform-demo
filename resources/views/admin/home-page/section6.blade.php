@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            @php
            $testimonial_infos = App\Models\HomeTestimonialInfo::all();
            $testimonials = App\Models\HomeTestimonial::all();
            @endphp
            {{-- home page testimonial left side section start  --}}
            <div class="home_testimonial_left_panel">

                {{-- modal start --}}
                <div class="modal fade" id="show_model_home_testimonial_left" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Testimonial Info Add</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="white_card_body">
                                    <div class="card-body">
                                        <form action="{{ route('save_testimonial_left') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card text-center text-white bg-success">
                                                Testimonial
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label" for="inputEmail4">Testimonial Title
                                                        (English)</label>
                                                    <input type="text" name="en_testimonial_title" class="form-control"
                                                        id="inputEmail4" placeholder="Testimonial Title">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label" for="inputEmail4">Testimonial Title
                                                        (Bangla)</label>
                                                    <input type="text" name="bn_testimonial_title" class="form-control"
                                                        id="inputEmail4" placeholder="Testimonial Title">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-text">
                                                            <span class="">Description (En)</span>
                                                        </div>
                                                        <textarea class="form-control" name="en_testimonial_description" aria-label="With textarea"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-text">
                                                            <span class="">Description (Bn)</span>
                                                        </div>
                                                        <textarea class="form-control" name="bn_testimonial_description" aria-label="With textarea"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Add this Info</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- modal end --}}

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <a href="{{ url('/admin/home-page') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <br>
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h2 class="text-center">Home Testimonial Left Info</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="QA_section">
                                    <form action="" method="">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Search here.."
                                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                                    <button class="btn btn-outline-success" type="button"
                                                        id="button-addon2">Search</button>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <div class="add_button ms-2 float-end">
                                                    <button type="button"
                                                        class="btn btn-success click_model_home_testimonial_left">
                                                        Add Testimonial Content
                                                    </button>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </form>
                                    <div class="mb_30 home_page_management_table_area">

                                        <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Testimonial Title (English)</th>
                                                    <th>Testimonial Title (Bangla)</th>
                                                    <th>Testimonial Description (English)</th>
                                                    <th>Testimonial Description (Bangla)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($testimonial_infos as $testimonial_info)
                                                    <tr>
                                                        <td>{{ $testimonial_info->en_testimonial_title }}</td>
                                                        <td>{{ $testimonial_info->bn_testimonial_title }}</td>
                                                        <td>{{ $testimonial_info->en_testimonial_description }}</td>
                                                        <td>{{ $testimonial_info->bn_testimonial_description }}</td>
                                                        <td class="">
                                                            <a class="btn btn-success"
                                                                href="{{ route('edit_testimonial_left', ['id' => $testimonial_info->id]) }}">Edit</a>
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

            </div>
            {{-- home page testimonial left side section end  --}}

            {{-- home page testimonial section start  --}}
            <div class="home_testimonial_panel">

                {{-- modal start --}}
                <div class="modal fade" id="show_model_home_testimonial" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Testimonial Add</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="white_card_body">
                                    <div class="card-body">
                                        <form action="{{ route('save_testimonial') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card text-center text-white bg-success">
                                                Testimonial Add
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="inputEmail4">Client Name
                                                        (English)</label>
                                                    <input type="text" name="en_client_name" class="form-control"
                                                        id="inputEmail4" placeholder="Client Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="inputEmail4">Client Name
                                                        (Bangla)</label>
                                                    <input type="text" name="bn_client_name" class="form-control"
                                                        id="inputEmail4" placeholder="Client Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="inputEmail4">Designation
                                                        (English)</label>
                                                    <input type="text" name="en_client_designation"
                                                        class="form-control" id="inputEmail4"
                                                        placeholder="Client Designation">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="inputEmail4">Designation
                                                        (Bangla)</label>
                                                    <input type="text" name="bn_client_designation"
                                                        class="form-control" id="inputEmail4"
                                                        placeholder="Client Designation">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-text">
                                                            <span class="">Feedback (En)</span>
                                                        </div>
                                                        <textarea class="form-control" name="en_client_feedback" aria-label="With textarea"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-text">
                                                            <span class="">Feedback (Bn)</span>
                                                        </div>
                                                        <textarea class="form-control" name="bn_client_feedback" aria-label="With textarea"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Add this Info</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- modal end --}}

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h2 class="text-center">Home Testimonial</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="QA_section">
                                    <form action="" method="">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Search here.." aria-label="Recipient's username"
                                                        aria-describedby="button-addon2">
                                                    <button class="btn btn-outline-success" type="button"
                                                        id="button-addon2">Search</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="add_button ms-2 float-end">
                                                    <button type="button"
                                                        class="btn btn-success click_model_home_testimonial">
                                                        Add Testimonial Content
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="mb_30 home_page_management_table_area">

                                        <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Client Name (English)</th>
                                                    <th>Client Name (Bangla)</th>
                                                    <th>Client Designation (English)</th>
                                                    <th>Client Designation (Bangla)</th>
                                                    <th>Client Feedback (English)</th>
                                                    <th>Client Feedback (Bangla)</th>
                                                    <th class="text-center" colspan="2">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($testimonials as $testimonial)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $testimonial->en_client_name }}</td>
                                                        <td>{{ $testimonial->bn_client_name }}</td>
                                                        <td>{{ $testimonial->en_client_designation }}</td>
                                                        <td>{{ $testimonial->bn_client_designation }}</td>
                                                        <td>{!! \Illuminate\Support\Str::words($testimonial->en_client_feedback, 30, '...') !!}</td>
                                                        <td>{!! \Illuminate\Support\Str::words($testimonial->bn_client_feedback, 25, '...') !!}</td>
                                                        <td class="text-center">
                                                            <a class="btn btn-success"
                                                                href="{{ route('edit_testimonial', ['id' => $testimonial->id]) }}">Edit</a>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="{{ route('delete_testimonial') }}"
                                                                method="post" id="delete">
                                                                @csrf
                                                                <input type="hidden" value="{{ $testimonial->id }}"
                                                                    name="testimonial_id">
                                                                <input class="btn btn-danger" type="submit"
                                                                    value="Delete"
                                                                    onclick="return confirm('Are you sure?')">
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
                </div>

            </div>
            {{-- home page testimonial section end  --}}
        </div>
    </div>
@endsection
