@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">ContactU {{ $contactu->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/contact-us') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/contact-us/' . $contactu->id . '/edit') }}" title="Edit ContactU"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/contactus' . '/' . $contactu->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete ContactU" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $contactu->id }}</td>
                                </tr>
                                <tr><th> En Title </th><td> {{ $contactu->en_title }} </td></tr><tr><th> Bn Title </th><td> {{ $contactu->bn_title }} </td></tr><tr><th> En Breadcrumb 1 </th><td> {{ $contactu->en_breadcrumb_1 }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
