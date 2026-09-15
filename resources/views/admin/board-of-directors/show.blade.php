@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">BoardOfDirector {{ $boardofdirector->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/board-of-directors') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/board-of-directors/' . $boardofdirector->id . '/edit') }}" title="Edit BoardOfDirector"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/boardofdirectors' . '/' . $boardofdirector->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete BoardOfDirector" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $boardofdirector->id }}</td>
                                </tr>
                                <tr><th> En Title </th><td> {{ $boardofdirector->en_title }} </td></tr><tr><th> Bn Title </th><td> {{ $boardofdirector->bn_title }} </td></tr><tr><th> En Breadcrumb 1 </th><td> {{ $boardofdirector->en_breadcrumb_1 }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
