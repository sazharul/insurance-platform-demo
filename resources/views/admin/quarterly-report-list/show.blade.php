@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">QuarterlyReportList {{ $quarterlyreportlist->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/quarterly-report-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/quarterly-report-list/' . $quarterlyreportlist->id . '/edit') }}" title="Edit QuarterlyReportList"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/quarterlyreportlist' . '/' . $quarterlyreportlist->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete QuarterlyReportList" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $quarterlyreportlist->id }}</td>
                                </tr>
                                <tr><th> En Title </th><td> {{ $quarterlyreportlist->en_title }} </td></tr><tr><th> Bn Title </th><td> {{ $quarterlyreportlist->bn_title }} </td></tr><tr><th> En Year </th><td> {{ $quarterlyreportlist->en_year }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
