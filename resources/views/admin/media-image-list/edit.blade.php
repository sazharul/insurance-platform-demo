@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit MediaImageList #{{ $mediaimagelist->id }}</div>
                <div class="card-body">
                    <a href="{{ url('/admin/media-image-list') }}" title="Back">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                    </a>
                    <br/>
                    <br/>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if(isset($mediaimagelist->groupImage))
                        <div class="row">
                            @foreach($mediaimagelist->groupImage as $item)
                                <div class="col-sm-1">
                                    <div class="media_image">
                                        <form method="POST" action="{{  route('media_single_image_delete', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="delete_image" title="Delete CeoProfile"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> X
                                            </button>
                                        </form>
                                        <img style="width: 100%" src="{{ asset($item->name) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/admin/media-image-list/' . $mediaimagelist->id) }}" accept-charset="UTF-8" class="form-horizontal"
                          enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.media-image-list.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
