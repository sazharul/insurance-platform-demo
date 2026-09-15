@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.who-we-are-menu')
                </div>
                <div class="card-body">
                    <a href="{{ url('/admin/committee-board-member/create') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <form method="GET" action="{{ url('/admin/committee-board-member') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search"
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
                                <th>Member Name</th>
                                <th>Image</th>
                                <th>Committee Name</th>
                                <th>Designation</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($committeeboardmember as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->en_name }}</td>
                                        <td> <img src="{{ asset($item->profile_image) }}" style="width: 100px; background: #000000;" alt=""></td>
                                        <td>{{ (isset($item->commiteeInfo)) ? $item->commiteeInfo->en_name : '' }}</td>
                                        <td>{{ $item->en_designation }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>
                                        @if($item->status==1)
                                        <a class="fw-bold">Published</a>
                                    @else
                                        <a class="fw-bold">Unpublished</a>
                                    @endif
                                    </td>
                                        <td>
                                            <a href="{{ url('/admin/committee-board-member/' . $item->id) }}" title="View CommitteeBoardMember"> </a>
                                            <a href="{{ url('/admin/committee-board-member/' . $item->id . '/edit') }}" title="Edit CommitteeBoardMember">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                            </a>
                                            <form method="POST" action="{{ url('/admin/committee-board-member' . '/' . $item->id) }}" accept-charset="UTF-8"
                                                  style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete CeoProfile"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $committeeboardmember->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
