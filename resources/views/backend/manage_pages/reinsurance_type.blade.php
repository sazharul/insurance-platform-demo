@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('admin.flash')
                <div class="card-header">
                    @include('admin.cms.product-service-menu')
                </div>
                <div class="card-body">
                    <a href="{{ url('/admin/reinsurance-type') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>En Reinsurance Type Name</th>
                                    <th>Bn Reinsurance Type Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reinsurance_type as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->en_reinsurance_type_name }}</td>
                                        <td>{{ $item->bn_reinsurance_type_name }}</td>
                                        <td>
                                            <a href="{{ route('edit_reinsurance_type', ['id' => $item->id]) }}"><button
                                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ route('delete_reinsurance_type') }}" id="delete"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $item->id }}" name="reinsurance_type_id">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete Claim Money" onclick="return confirm('Are you sure?')"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i> Delete
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
@endsection
