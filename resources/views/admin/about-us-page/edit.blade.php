@extends('backend.layouts.master')

@section('content')
    <div class="row">
        {{-- @include('admin.sidebar') --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit AboutUsPage #{{ $aboutuspage->id }}</div>
                <div class="card-body">
                    <a href="{{ url('/admin/about-us-page') }}" title="Back">
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

                    <form method="POST" action="{{ url('/admin/about-us-page/' . $aboutuspage->id) }}" accept-charset="UTF-8" class="form-horizontal"
                          enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('en_title') ? 'has-error' : ''}}">
                            <label for="en_title" class="control-label">{{ 'En Title' }}</label>
                            <input class="form-control" name="en_title" type="text" id="en_title" value="{{ isset($aboutuspage->en_title) ? $aboutuspage->en_title : ''}}">
                            {!! $errors->first('en_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_title') ? 'has-error' : ''}}">
                            <label for="bn_title" class="control-label">{{ 'Bn Title' }}</label>
                            <input class="form-control" name="bn_title" type="text" id="bn_title" value="{{ isset($aboutuspage->bn_title) ? $aboutuspage->bn_title : ''}}">
                            {!! $errors->first('bn_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_breadcrumb_1') ? 'has-error' : ''}}">
                            <label for="en_breadcrumb_1" class="control-label">{{ 'En Breadcrumb 1' }}</label>
                            <input class="form-control" name="en_breadcrumb_1" type="text" id="en_breadcrumb_1"
                                   value="{{ isset($aboutuspage->en_breadcrumb_1) ? $aboutuspage->en_breadcrumb_1 : ''}}">
                            {!! $errors->first('en_breadcrumb_1', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_breadcrumb_1') ? 'has-error' : ''}}">
                            <label for="bn_breadcrumb_1" class="control-label">{{ 'Bn Breadcrumb 1' }}</label>
                            <input class="form-control" name="bn_breadcrumb_1" type="text" id="bn_breadcrumb_1"
                                   value="{{ isset($aboutuspage->bn_breadcrumb_1) ? $aboutuspage->bn_breadcrumb_1 : ''}}">
                            {!! $errors->first('bn_breadcrumb_1', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_breadcrumb_2') ? 'has-error' : ''}}">
                            <label for="en_breadcrumb_2" class="control-label">{{ 'En Breadcrumb 2' }}</label>
                            <input class="form-control" name="en_breadcrumb_2" type="text" id="en_breadcrumb_2"
                                   value="{{ isset($aboutuspage->en_breadcrumb_2) ? $aboutuspage->en_breadcrumb_2 : ''}}">
                            {!! $errors->first('en_breadcrumb_2', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_breadcrumb_2') ? 'has-error' : ''}}">
                            <label for="bn_breadcrumb_2" class="control-label">{{ 'Bn Breadcrumb 2' }}</label>
                            <input class="form-control" name="bn_breadcrumb_2" type="text" id="bn_breadcrumb_2"
                                   value="{{ isset($aboutuspage->bn_breadcrumb_2) ? $aboutuspage->bn_breadcrumb_2 : ''}}">
                            {!! $errors->first('bn_breadcrumb_2', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('image1') ? 'has-error' : ''}}">
                            <label for="image1" class="control-label">{{ 'Image1' }}</label>
                            @if (isset($aboutuspage->image1) ? $aboutuspage->image1 : '')
                            <img src="{{asset(isset($aboutuspage->image1) ? $aboutuspage->image1 : '')}}" alt="" style="height: 100px; width: 100px;" class="mb-3">
                            @else
                            @endif
                            <input class="form-control" name="image1" type="file" id="image1" value="{{ isset($aboutuspage->image1) ? $aboutuspage->image1 : ''}}">
                            {!! $errors->first('image1', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('image2') ? 'has-error' : ''}}">
                            <label for="image2" class="control-label">{{ 'Image2' }}</label>
                            @if (isset($aboutuspage->image2) ? $aboutuspage->image2 : '')
                            <img src="{{asset(isset($aboutuspage->image2) ? $aboutuspage->image2 : '')}}" alt="" style="height: 100px; width: 100px;" class="mb-3">
                            @else
                            @endif
                            <input class="form-control" name="image2" type="file" id="image2" value="{{ isset($aboutuspage->image2) ? $aboutuspage->image2 : ''}}">
                            {!! $errors->first('image2', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_description') ? 'has-error' : ''}}">
                            <label for="en_description" class="control-label">{{ 'En Description' }}</label>
                            <textarea class="form-control" rows="5" name="en_description" type="textarea"
                                      id="en_description">{{ isset($aboutuspage->en_description) ? $aboutuspage->en_description : ''}}</textarea>
                            {!! $errors->first('en_description', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_description') ? 'has-error' : ''}}">
                            <label for="bn_description" class="control-label">{{ 'Bn Description' }}</label>
                            <textarea class="form-control" rows="5" name="bn_description" type="textarea"
                                      id="bn_description">{{ isset($aboutuspage->bn_description) ? $aboutuspage->bn_description : ''}}</textarea>
                            {!! $errors->first('bn_description', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('en_core_title') ? 'has-error' : ''}}">
                            <label for="en_core_title" class="control-label">{{ 'En Core Title' }}</label>
                            <input class="form-control" name="en_core_title" type="text" id="en_core_title"
                                   value="{{ isset($aboutuspage->en_core_title) ? $aboutuspage->en_core_title : ''}}">
                            {!! $errors->first('en_core_title', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('bn_core_title') ? 'has-error' : ''}}">
                            <label for="bn_core_title" class="control-label">{{ 'Bn Core Title' }}</label>
                            <input class="form-control" name="bn_core_title" type="text" id="bn_core_title"
                                   value="{{ isset($aboutuspage->bn_core_title) ? $aboutuspage->bn_core_title : ''}}">
                            {!! $errors->first('bn_core_title', '<p class="help-block">:message</p>') !!}
                        </div>

                        <br>
                        <br>
                        <hr>

                        <div class="core_left_list">
                            @if(isset($aboutuspage->en_left_core_description))
                                @foreach($aboutuspage->en_left_core_description as $items)
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="en_left_core_description" class="control-label">{{ 'En Left Core List' }}</label>
                                            <input class="form-control" name="en_left_core_list[]" type="text" value="{{ $items }}">
                                        </div>
                                        <div class="{{ ($loop->iteration > 1) ? 'col-5' : 'col-6' }} form-group">
                                            <label for="bn_left_core_description" class="control-label">{{ 'Bn Left Core List' }}</label>
                                            <input class="form-control" name="bn_left_core_list[]" type="text"
                                                   value="{{ $aboutuspage->bn_left_core_description[$loop->iteration-1] }}">
                                        </div>
                                        @if($loop->iteration > 1)
                                            <div class="col-1">
                                                <button class="btn btn-danger btn-sm" onclick="remove_core_list(this)" type="button" style="margin-top: 24px">Remove
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="en_left_core_description" class="control-label">{{ 'En Left Core List' }}</label>
                                        <input class="form-control" name="en_left_core_list[]" type="text">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="bn_left_core_description" class="control-label">{{ 'Bn Left Core List' }}</label>
                                        <input class="form-control" name="bn_left_core_list[]" type="text">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <button class="btn btn-primary" onclick="add_more_core_list()" type="button">Add New +</button>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <br>
                        <div class="form-group {{ $errors->has('core_image') ? 'has-error' : ''}}">
                            <label for="core_image" class="control-label">{{ 'Core Image' }}</label>
                            @if (isset($aboutuspage->image1) ? $aboutuspage->core_image : '')
                            <img src="{{asset(isset($aboutuspage->core_image) ? $aboutuspage->core_image : '')}}" alt="" style="height: 100px; width: 100px;" class="mb-3">
                            @else
                            @endif
                            <input class="form-control" name="core_image" type="file" id="core_image"
                                   value="{{ isset($aboutuspage->core_image) ? $aboutuspage->core_image : ''}}">
                            {!! $errors->first('core_image', '<p class="help-block">:message</p>') !!}
                        </div>

                        <br>
                        <br>
                        <hr>
                        <div class="core_right_list">
                            @if(isset($aboutuspage->en_left_core_description))
                                @foreach($aboutuspage->en_left_core_description as $items)
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="en_right_core_description" class="control-label">{{ 'En Right Core List' }}</label>
                                            <input class="form-control" name="en_right_core_list[]" type="text" value="{{ $items }}">
                                        </div>
                                        <div class="{{ ($loop->iteration > 1) ? 'col-5' : 'col-6' }} form-group">
                                            <label for="bn_right_core_description" class="control-label">{{ 'Bn Right Core List' }}</label>
                                            <input class="form-control" name="bn_right_core_list[]" type="text" value="{{ $aboutuspage->bn_left_core_description[$loop->iteration-1] }}">
                                        </div>
                                        @if($loop->iteration > 1)
                                            <div class="col-1">
                                                <button class="btn btn-danger btn-sm" onclick="remove_core_list(this)" type="button" style="margin-top: 24px">Remove
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="en_right_core_description" class="control-label">{{ 'En Right Core List' }}</label>
                                        <input class="form-control" name="en_right_core_list[]" type="text">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="bn_right_core_description" class="control-label">{{ 'Bn Right Core List' }}</label>
                                        <input class="form-control" name="bn_right_core_list[]" type="text">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <button class="btn btn-primary" onclick="add_more_core_right_list()" type="button">Add New +</button>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <br>

                        <div class="form-group {{ $errors->has('en_process_title') ? 'has-error' : ''}}">
                            <label for="en_process_title" class="control-label">{{ 'En Process Title' }}</label>
                            <input class="form-control" name="en_process_title" type="text" id="en_process_title" value="{{ isset($aboutuspage->en_process_title) ? $aboutuspage->en_process_title : ''}}" >
                            {!! $errors->first('en_process_title', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('bn_process_title') ? 'has-error' : ''}}">
                            <label for="bn_process_title" class="control-label">{{ 'Bn Process Title' }}</label>
                            <input class="form-control" name="bn_process_title" type="text" id="bn_process_title" value="{{ isset($aboutuspage->bn_process_title) ? $aboutuspage->bn_process_title : ''}}" >
                            {!! $errors->first('bn_process_title', '<p class="help-block">:message</p>') !!}
                        </div>

                        <br>
                        <br>
                        <hr>
                        <div class="process_list">
                            @if(isset($aboutuspage->en_process_description))
                                @foreach($aboutuspage->en_process_description as $items)
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="en_right_core_description" class="control-label">{{ 'En Process List' }}</label>
                                            <input class="form-control" name="en_process_list[]" type="text" value="{{ $items }}">
                                        </div>
                                        <div class="{{ ($loop->iteration > 1) ? 'col-5' : 'col-6' }} form-group">
                                            <label for="bn_right_core_description" class="control-label">{{ 'Bn Process List' }}</label>
                                            <input class="form-control" name="bn_process_list[]" type="text" value="{{ $aboutuspage->bn_process_description[$loop->iteration-1] }}">
                                        </div>
                                        @if($loop->iteration > 1)
                                            <div class="col-1">
                                                <button class="btn btn-danger btn-sm" onclick="remove_core_list(this)" type="button" style="margin-top: 24px">Remove
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="en_right_core_description" class="control-label">{{ 'En Process List' }}</label>
                                        <input class="form-control" name="en_process_list[]" type="text">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="bn_right_core_description" class="control-label">{{ 'Bn Process List' }}</label>
                                        <input class="form-control" name="bn_process_list[]" type="text">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <button class="btn btn-primary" onclick="add_more_process_list()" type="button">Add New +</button>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <br>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="maintain_list_hide" style="display: none">
        <div class="row">
            <div class="col-6 form-group">
                <label for="en_left_core_description" class="control-label">{{ 'En Left Core List' }}</label>
                <input class="form-control" name="en_left_core_list[]" type="text">
            </div>
            <div class="col-5 form-group">
                <label for="bn_left_core_description" class="control-label">{{ 'Bn Left Core List' }}</label>
                <input class="form-control" name="bn_left_core_list[]" type="text">
            </div>
            <div class="col-1">
                <button class="btn btn-danger btn-sm" onclick="remove_core_list(this)" type="button" style="margin-top: 24px">Remove</button>
            </div>
        </div>
    </div>

    <div class="maintain_list_right_hide" style="display: none">
        <div class="row">
            <div class="col-6 form-group">
                <label for="en_left_core_description" class="control-label">{{ 'En Right Core List' }}</label>
                <input class="form-control" name="en_right_core_list[]" type="text">
            </div>
            <div class="col-5 form-group">
                <label for="bn_left_core_description" class="control-label">{{ 'Bn Right Core List' }}</label>
                <input class="form-control" name="bn_right_core_list[]" type="text">
            </div>
            <div class="col-1">
                <button class="btn btn-danger btn-sm" onclick="remove_core_list(this)" type="button" style="margin-top: 24px">Remove</button>
            </div>
        </div>
    </div>

    <div class="process_list_hide" style="display: none">
        <div class="row">
            <div class="col-6 form-group">
                <label for="en_left_core_description" class="control-label">{{ 'En Process List' }}</label>
                <input class="form-control" name="en_process_list[]" type="text">
            </div>
            <div class="col-5 form-group">
                <label for="bn_left_core_description" class="control-label">{{ 'Bn Process List' }}</label>
                <input class="form-control" name="bn_process_list[]" type="text">
            </div>
            <div class="col-1">
                <button class="btn btn-danger btn-sm" onclick="remove_core_list(this)" type="button" style="margin-top: 24px">Remove</button>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        function add_more_core_list() {
            let maintain_list = $('.maintain_list_hide').html()
            $('.core_left_list').append(maintain_list);
        }

        function add_more_core_right_list() {
            let maintain_list = $('.maintain_list_right_hide').html()
            $('.core_right_list').append(maintain_list);
        }

        function add_more_process_list() {
            let maintain_list = $('.process_list_hide').html()
            $('.process_list').append(maintain_list);
        }

        function remove_core_list(e) {
            $(e).parent().parent().remove();
        }
    </script>
@endsection
