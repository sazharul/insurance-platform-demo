@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{--        @include('admin.sidebar')--}}

        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.investors-relation-menu')
                </div>
                <div class="card-body">
                    <a href="{{ url('/admin/details-of-shareholding-list/create') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <form method="GET" action="{{ url('/admin/details-of-shareholding-list') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search"
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
                                <th>En Name</th>
                                <th>Bn Name</th>
                                <th>En Shares No</th>
                                <th>Pie Color</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($detailsofshareholdinglist as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->en_name }}</td>
                                        <td>{{ $item->bn_name }}</td>
                                        <td>{{ $item->en_shares_no }}</td>
                                        <td> <span style="background-color: {{ $item->pie_chart_color }};">Pie Color</span> </td>
                                        <td>
                                            <a href="{{ url('/admin/details-of-shareholding-list/' . $item->id . '/edit') }}" title="Edit DetailsOfShareholdingList">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $detailsofshareholdinglist->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
