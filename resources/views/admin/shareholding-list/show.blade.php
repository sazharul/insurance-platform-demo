@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">ShareholdingList {{ $shareholdinglist->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/shareholding-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/shareholding-list/' . $shareholdinglist->id . '/edit') }}" title="Edit ShareholdingList"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/shareholdinglist' . '/' . $shareholdinglist->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete ShareholdingList" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $shareholdinglist->id }}</td>
                                </tr>
                                <tr><th> En Name </th><td> {{ $shareholdinglist->en_name }} </td></tr><tr><th> Bn Name </th><td> {{ $shareholdinglist->bn_name }} </td></tr><tr><th> En Status </th><td> {{ $shareholdinglist->en_status }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
