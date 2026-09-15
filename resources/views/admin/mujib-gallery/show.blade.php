@extends('backend.layouts.master')

@section('content')
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">MujibGallery {{ $mujibgallery->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/mujib-gallery') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/mujib-gallery/' . $mujibgallery->id . '/edit') }}" title="Edit MujibGallery"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('/admin/mujibgallery' . '/' . $mujibgallery->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete MujibGallery" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $mujibgallery->id }}</td>
                                </tr>
                                <tr><th> En Title </th><td> {{ $mujibgallery->en_title }} </td></tr><tr><th> Bn Title </th><td> {{ $mujibgallery->bn_title }} </td></tr><tr><th> Image </th><td> {{ $mujibgallery->image }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
