@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.home-menu')
                </div>
                <div class="card-body">

                    <form method="GET" action="{{ url('/admin/home-page') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search"
                          style="width: 25%;float: right;">
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
                                <th>#</th>
                                <th>Section</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Top Nav bar</td>
                                    <td>
                                        <a href="{{ route('home_page_section_1') }}" title="Edit HomePage">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Top Logo Section</td>
                                    <td>
                                        <a href="{{ route('home_page_section_2') }}" title="Edit HomePage">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Hero Area</td>
                                    <td>
                                        <a href="{{ route('home_page_section_3') }}" title="Edit HomePage">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Title & Description</td>
                                    <td>
                                        <a href="{{ route('home_page_section_4') }}" title="Edit HomePage">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Work Process</td>
                                    @php
                                    $work_process = App\Models\WorkProcess::first();
                                    @endphp
                                    <td>
                                        <a href="{{ route('edit_work_process', $work_process->id) }}" title="Edit HomePage">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Testimonial</td>
                                    <td>
                                        <a href="{{ route('home_page_section_6') }}" title="Edit HomePage">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Manage</button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Footer</td>
                                    <td>
                                        <a href="{{ route('home_page_section_7') }}" title="Edit HomePage">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $homepage->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
