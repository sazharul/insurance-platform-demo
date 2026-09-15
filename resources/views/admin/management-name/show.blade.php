@extends('backend.layouts.master')

@section('content')
    <div class="row">
{{--        @include('admin.sidebar')--}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ManagementName {{ $managementname->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/management-name') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/management-name/' . $managementname->id . '/edit') }}" title="Edit ManagementName"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/managementname' . '/' . $managementname->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete ManagementName" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $managementname->id }}</td>
                                </tr>
                                <tr><th> En Name </th><td> {{ $managementname->en_name }} </td></tr><tr><th> Bn Name </th><td> {{ $managementname->bn_name }} </td></tr><tr><th> Status </th><td> {{ $managementname->status }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
