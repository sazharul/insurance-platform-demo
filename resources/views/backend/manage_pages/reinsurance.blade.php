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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>En Reinsurance Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reinsurances as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! $item->en_reinsurance_description !!}</td>
                                        <td>
                                            <a href="{{ route('edit_reinsurance', ['id' => $item->id]) }}"><button
                                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i> Edit</button></a>
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
