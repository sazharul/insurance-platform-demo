@extends('backend.layouts.master')
@section('title', 'Home Page Manage')

@section('content')
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

    {{-- home page work process section start  --}}
    <div class="home_work_process_panel">

        {{-- modal start --}}
        <div class="modal fade" id="show_model_home_work_process" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLongTitle">Add Home Page Content</h5> --}}
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{route('save_work_process')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card text-center text-white bg-success mb-2">
                                        Work Process Content
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">First Icon</label>
                                            <input type="file" name="wp_first_icon" class="form-control" id="inputGroupFile04"
                                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">First Title (English)</label>
                                            <input type="text" name="en_wp_first_title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">First Title (Bangla)</label>
                                            <input type="text" name="bn_wp_first_title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <span class="">First Description (English)</span>
                                                </div>
                                                <textarea class="form-control" name="en_wp_first_description" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <span class="">First Description (Bangla)</span>
                                                </div>
                                                <textarea class="form-control" name="bn_wp_first_description" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Second Icon</label>
                                            <input type="file" name="wp_sec_icon" class="form-control" id="inputGroupFile04"
                                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Second Title (English)</label>
                                            <input type="text" name="en_wp_sec_title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Second Title (Bangla)</label>
                                            <input type="text" name="bn_wp_sec_title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <span class="">Second Description (English)</span>
                                                </div>
                                                <textarea class="form-control" name="en_wp_sec_description" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <span class="">Second Description (Bangla)</span>
                                                </div>
                                                <textarea class="form-control" name="bn_wp_sec_description" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Third Icon</label>
                                            <input type="file" name="wp_third_icon" class="form-control" id="inputGroupFile04"
                                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Third Title (English)</label>
                                            <input type="text" name="en_wp_third_title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Third Title (Bangla)</label>
                                            <input type="text" name="bn_wp_third_title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <span class="">Third Description (English)</span>
                                                </div>
                                                <textarea class="form-control" name="en_wp_third_description" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <span class="">Third Description (Bangla)</span>
                                                </div>
                                                <textarea class="form-control" name="bn_wp_third_description" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Forth Icon</label>
                                            <input type="file" name="wp_forth_icon" class="form-control" id="inputGroupFile04"
                                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Forth Title (English)</label>
                                            <input type="text" name="en_wp_forth_title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="inputEmail4">Forth Title (Bangla)</label>
                                            <input type="text" name="bn_wp_forth_title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <span class="">Forth Description (English)</span>
                                                </div>
                                                <textarea class="form-control" name="en_wp_forth_description" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <span class="">Forth Description (Bangla)</span>
                                                </div>
                                                <textarea class="form-control" name="bn_wp_forth_description" aria-label="With textarea"></textarea>
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
                                <h2 class="text-center">Home Page Work Process</h2>
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
                                            <button type="button" class="btn btn-success click_model_home_work_process">
                                                Add Work Process Content
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mb_30 home_page_management_table_area">

                                <table id="new_data_table" class="table dt-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>First Icon</th>
                                            <th>First Title (English)</th>
                                            <th>First Title (Bangla)</th>
                                            <th>First Description (English)</th>
                                            <th>First Description (Bangla)</th>
                                            <th>Second Icon</th>
                                            <th>Second Title (English)</th>
                                            <th>Second Title (Bangla)</th>
                                            <th>Second Description (English)</th>
                                            <th>Second Description (Bangla)</th>
                                            <th>Third Icon</th>
                                            <th>Third Title (English)</th>
                                            <th>Third Title (Bangla)</th>
                                            <th>Third Description (English)</th>
                                            <th>Third Description (Bangla)</th>
                                            <th>Forth Icon</th>
                                            <th>Forth Title (English)</th>
                                            <th>Forth Title (Bangla)</th>
                                            <th>Forth Description (English)</th>
                                            <th>Forth Description (Bangla)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($work_processes as $work_process)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($work_process->wp_first_icon) }}" alt=""
                                                        style="max-height: 60px; width: auto;">
                                                </td>
                                                <td>{{ $work_process->en_wp_first_title }}</td>
                                                <td>{{ $work_process->bn_wp_first_title }}</td>
                                                <td>{{ $work_process->en_wp_first_description }}</td>
                                                <td>{{ $work_process->bn_wp_first_description }}</td>
                                                <td>
                                                    <img src="{{ asset($work_process->wp_sec_icon) }}" alt=""
                                                        style="max-height: 60px; width: auto;">
                                                </td>
                                                <td>{{ $work_process->en_wp_sec_title }}</td>
                                                <td>{{ $work_process->bn_wp_sec_title }}</td>
                                                <td>{{ $work_process->en_wp_sec_description }}</td>
                                                <td>{{ $work_process->bn_wp_sec_description }}</td>
                                                <td>
                                                    <img src="{{ asset($work_process->wp_third_icon) }}" alt=""
                                                        style="max-height: 60px; width: auto;">
                                                </td>
                                                <td>{{ $work_process->en_wp_third_title }}</td>
                                                <td>{{ $work_process->bn_wp_third_title }}</td>
                                                <td>{{ $work_process->en_wp_third_description }}</td>
                                                <td>{{ $work_process->bn_wp_third_description }}</td>
                                                <td>
                                                    <img src="{{ asset($work_process->wp_forth_icon) }}" alt=""
                                                        style="max-height: 60px; width: auto;">
                                                </td>
                                                <td>{{ $work_process->en_wp_forth_title }}</td>
                                                <td>{{ $work_process->bn_wp_forth_title }}</td>
                                                <td>{{ $work_process->en_wp_forth_description }}</td>
                                                <td>{{ $work_process->bn_wp_forth_description }}</td>
                                                <td>
                                                    <a class="btn btn-success" href="{{ route('edit_work_process', ['id' => $work_process->id]) }}">Edit</a>
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
    {{-- home page work process section end  --}}
@endsection
