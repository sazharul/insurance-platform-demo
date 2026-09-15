@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">CommitteeBoardMember {{ $committeeboardmember->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/committee-board-member') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/committee-board-member/' . $committeeboardmember->id . '/edit') }}" title="Edit CommitteeBoardMember"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/committeeboardmember' . '/' . $committeeboardmember->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete CommitteeBoardMember" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $committeeboardmember->id }}</td>
                                </tr>
                                <tr><th> Committee Name Id </th><td> {{ $committeeboardmember->committee_name_id }} </td></tr><tr><th> Profile Image </th><td> {{ $committeeboardmember->profile_image }} </td></tr><tr><th> En Designation </th><td> {{ $committeeboardmember->en_designation }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
