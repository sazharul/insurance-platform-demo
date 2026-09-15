@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">ChairmanAwardList {{ $chairmanawardlist->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/chairman-award-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/chairman-award-list/' . $chairmanawardlist->id . '/edit') }}" title="Edit ChairmanAwardList"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/chairmanawardlist' . '/' . $chairmanawardlist->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete ChairmanAwardList" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Name</th><td>{{ $chairmanawardlist->id }}</td>
                                </tr>
                                <tr><th> Chairman Profile Id </th><td> {{ $chairmanawardlist->chairman_profile_id }} </td></tr><tr><th> Image </th><td> {{ $chairmanawardlist->image }} </td></tr><tr><th> En Year </th><td> {{ $chairmanawardlist->en_year }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
