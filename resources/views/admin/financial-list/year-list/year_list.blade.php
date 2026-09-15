@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.financial-indicators-menu')
                </div>
                <div class="card-body">
                    @include('admin.financial-list.particular_menu')

                    <form method="GET" action="{{ url('/admin/financial-list') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search"
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
                        <table class="table" id="editAbleTable">
                            <thead>
                                <tr>
                                    <th> {{__('SL')}} .</th>
                                    <th>En Year</th>
                                    <th>Bn Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($financial_particular as $item)
                                    <tr style="background: {{ ($loop->even) ? '#d1e7dd' : '#f4f4f4' }};">
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{ $item->en_year }}</td>
                                        <td>{{ $item->bn_year }}</td>

                                        <td>
                                            <a href="{{ route('financial-year-list.edit', $item->id) }}" title="Edit EmployeeList">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                            </a>
                                            <form method="POST" action="{{ route('financial-year-list.destroy', $item->id) }}" accept-charset="UTF-8"
                                                  style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete CeoProfile"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    Delete
                                                </button>
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
    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
@endsection
