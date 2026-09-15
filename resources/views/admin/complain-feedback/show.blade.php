@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ComplainFeedback {{ $complainfeedback->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/complain-feedback') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/complain-feedback/' . $complainfeedback->id . '/edit') }}" title="Edit ComplainFeedback"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/complainfeedback' . '/' . $complainfeedback->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete ComplainFeedback" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $complainfeedback->id }}</td>
                                </tr>
                                <tr><th> Name </th><td> {{ $complainfeedback->name }} </td></tr><tr><th> Email </th><td> {{ $complainfeedback->email }} </td></tr><tr><th> Message </th><td> {{ $complainfeedback->message }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
