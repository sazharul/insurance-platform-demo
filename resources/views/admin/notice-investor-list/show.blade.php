@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">NoticeInvestorList {{ $noticeinvestorlist->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/notice-investor-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/notice-investor-list/' . $noticeinvestorlist->id . '/edit') }}" title="Edit NoticeInvestorList"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/noticeinvestorlist' . '/' . $noticeinvestorlist->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete NoticeInvestorList" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $noticeinvestorlist->id }}</td>
                                </tr>
                                <tr><th> Icon </th><td> {{ $noticeinvestorlist->icon }} </td></tr><tr><th> En Year </th><td> {{ $noticeinvestorlist->en_year }} </td></tr><tr><th> Bn Year </th><td> {{ $noticeinvestorlist->bn_year }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
