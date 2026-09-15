@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.more-menu')
                </div>
                <div class="card-body">

                    <form method="GET" action="{{ url('/admin/proposal-form') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search" style="width: 25%;float: right;">
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
                                    <th>#</th><th>En Title</th><th>Bn Title</th><th>En Breadcrumb 1</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($proposalform as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->en_title }}</td><td>{{ $item->bn_title }}</td><td>{{ $item->en_breadcrumb_1 }}</td>
                                    <td>
                                        <a href="{{ url('/admin/proposal-form/' . $item->id) }}" title="View ProposalForm"> </a>
                                        <a href="{{ url('/admin/proposal-form/' . $item->id . '/edit') }}" title="Edit ProposalForm"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $proposalform->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
