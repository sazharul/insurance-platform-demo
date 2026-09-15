@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">CommitteeBoard {{ $committeeboard->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/committee-board') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/committee-board/' . $committeeboard->id . '/edit') }}" title="Edit CommitteeBoard"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/committeeboard' . '/' . $committeeboard->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete CommitteeBoard" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $committeeboard->id }}</td>
                                </tr>
                                <tr><th> En Title </th><td> {{ $committeeboard->en_title }} </td></tr><tr><th> Bn Title </th><td> {{ $committeeboard->bn_title }} </td></tr><tr><th> En Breadcrumb 1 </th><td> {{ $committeeboard->en_breadcrumb_1 }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
