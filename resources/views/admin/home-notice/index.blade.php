@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.home-menu')
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ url('/admin/home-notice') }}" accept-charset="UTF-8"
                          class="form-inline my-2 my-lg-0" role="search" style="width: 25%;float: right;">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..."
                                   value="{{ request('search') }}">
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
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($homenotice as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img style="width: 100px;" src="{{ asset($item->image) }}" alt="">
                                        </td>
                                        <td>
                                            {{ $item->status == 1 ? 'Publish' : 'Unpublish'}}
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/home-notice/' . $item->id . '/edit') }}"
                                               title="Edit HomeNotice">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div
                            class="pagination-wrapper"> {!! $homenotice->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
