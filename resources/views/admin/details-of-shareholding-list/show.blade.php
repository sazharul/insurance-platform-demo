@extends('backend.layouts.master')

@section('content')
    <div class="row">
{{--        @include('admin.sidebar')--}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">DetailsOfShareholdingList {{ $detailsofshareholdinglist->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/details-of-shareholding-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/details-of-shareholding-list/' . $detailsofshareholdinglist->id . '/edit') }}" title="Edit DetailsOfShareholdingList"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/detailsofshareholdinglist' . '/' . $detailsofshareholdinglist->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete DetailsOfShareholdingList" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $detailsofshareholdinglist->id }}</td>
                                </tr>
                                <tr><th> En Name </th><td> {{ $detailsofshareholdinglist->en_name }} </td></tr><tr><th> Bn Name </th><td> {{ $detailsofshareholdinglist->bn_name }} </td></tr><tr><th> En Shares No </th><td> {{ $detailsofshareholdinglist->en_shares_no }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
