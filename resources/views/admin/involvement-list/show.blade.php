@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">InvolvementList {{ $involvementlist->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/involvement-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/involvement-list/' . $involvementlist->id . '/edit') }}" title="Edit InvolvementList"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/involvementlist' . '/' . $involvementlist->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete InvolvementList" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $involvementlist->id }}</td>
                                </tr>
                                <tr><th> Chairman Profile Id </th><td> {{ $involvementlist->chairman_profile_id }} </td></tr><tr><th> En Designation </th><td> {{ $involvementlist->en_designation }} </td></tr><tr><th> Bn Designation </th><td> {{ $involvementlist->bn_designation }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
