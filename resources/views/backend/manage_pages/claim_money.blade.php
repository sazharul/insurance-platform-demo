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
                    <a href="{{ url('/admin/claim-money') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>En Year</th>
                                    <th>Bn Year</th>
                                    <th>En Money</th>
                                    <th>Bn Money</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($claim_money as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->en_claim_year }}</td>
                                        <td>{{ $item->bn_claim_year }}</td>
                                        <td>{{ $item->en_claim_money }}</td>
                                        <td>{{ $item->bn_claim_money }}</td>
                                        <td>
                                            <a href="{{ route('edit_claim_money', ['id' => $item->id]) }}"><button
                                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ route('delete_claim_money') }}" id="delete"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $item->id }}" name="claim_money_id">
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
