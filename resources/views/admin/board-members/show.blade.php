@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">BoardMember {{ $boardmember->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/board-members') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/board-members/' . $boardmember->id . '/edit') }}" title="Edit BoardMember"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/boardmembers' . '/' . $boardmember->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete BoardMember" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $boardmember->id }}</td>
                                </tr>
                                <tr><th> Board Cat Id </th><td> {{ $boardmember->board_cat_id }} </td></tr><tr><th> Designation Id </th><td> {{ $boardmember->designation_id }} </td></tr><tr><th> En Name </th><td> {{ $boardmember->en_name }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
